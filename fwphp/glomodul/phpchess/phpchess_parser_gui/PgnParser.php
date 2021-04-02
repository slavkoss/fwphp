<?php

class PgnParser
{

    private $pgnFile;
    private $_fullParsing = true;
    private $pgnContent;
    private $pgnGames;
    public  $gameParser; //was private
    public  $pgnGameParser; //was private

    public function __construct($pgnFile = "", $fullParsing = true) //both param. set $this... here
    {
        if ($pgnFile) {

            $this->pgnFile = $this->sanitize($pgnFile);

            if (!file_exists($this->pgnFile)) {
                throw new Exception("File not found: " . $this->pgnFile);
            }
        }

        $this->_fullParsing = $fullParsing;

        $this->gameParser    = new GameParser();
        $this->pgnGameParser = new PgnGameParser();
    }



    private function getExtension($filePath) { $tokens = explode(".", $filePath); return strtolower(array_pop($tokens)); } //called by s anitize

    private function sanitize($filePath) //called by __c onstruct
    {
        $extension = $this->getExtension($filePath);
        if ($extension != 'pgn') return null;

        //if (class_exists("LudoDBRegistry"))  //tries to load LudoDBRegistry.php !!
        //{    $tempPath = LudoDBRegistry::get('FILE_UPLOAD_PATH');
        //} else {
            $tempPath = null;
        //}

        if ( isset($tempPath)
             && substr($filePath, 0, strlen($tempPath)) == $tempPath
        ) {

        } else {
            if (substr($filePath, 0, 1) === "/") return null;
        }

        //None of ._-/ or 0-9 or a-z replace with "" in $file Path :
        $filePath = preg_replace("/[^0-9\.a-z_\-\/]/si", "", $filePath);
        /* 
        [^ = Negated set - Match any character NOT IN set 0-9\.a-z_\-\/
        0-9 a single character in the range between 0 (index 48) and 9 (index 57) (case insensitive)

        \. matches the character . literally (case insensitive)

        a-z a single character in the range between a (index 97) and z (index 122) (case insensitive)
        _ matches the character _ literally (case insensitive)

        \- matches the character - literally (case insensitive)
        \/ matches the character / literally (case insensitive)

        Global pattern flags
        s modifier: single line. Dotall feature - Dot matches newline characters (not supported in some browsers)
        i modifier: insensitive. Case insensitive match (ignores case of [a-zA-Z]) */

        if (!file_exists($filePath)) return null;

        return $filePath;

    }


    public static function getArrayOfGames($pgn)
    {
        return self::getPgnGamesAsArray($pgn);
    }

    private function splitPgnIntoGames($pgnString)
    {
        return $this->getPgnGamesAsArray($pgnString);
    }

    private function getPgnGamesAsArray($pgn)
    {
        $ret = array();
        $content = "\n\n" . $pgn;
        $games = preg_split("/\n\n\[/s", $content, -1, PREG_SPLIT_DELIM_CAPTURE);
        for ($i = 1, $count = count($games); $i < $count; $i++) {
            $gameContent = trim("[" . $games[$i]);
            if (strlen($gameContent) > 10) {
                array_push($ret, $gameContent);
            }
        }
        return $ret;
    }

    public function getGamesAsJSON() { return json_encode($this->getParsedGames(false)); }
    private function fullParsing()  { return $this->_fullParsing; }
    public function setPgnContent($content) { $this->pgnContent = $content; }

    private function cleanPgn() //preg_ replace, str_ replace
    {
        $c = $this->pgnContent;

        $c = preg_replace('/"\]\s{0,10}\[/s', "]\n[", $c);
        $c = preg_replace('/"\]\s{0,10}([\.0-9]|{)/s', "\"]\n\n$1", $c);

        $c = preg_replace("/{\s{0,6}\[%emt[^\}]*?\}/", "", $c);

        $c = preg_replace("/\\$[0-9]+/s", "", $c);
        $c = str_replace("({", "( {", $c);
        $c = preg_replace("/{([^\[]*?)\[([^}]?)}/s", '{$1-SB-$2}', $c);
        $c = preg_replace("/\r/s", "", $c);
        $c = preg_replace("/\t/s", "", $c);
        $c = preg_replace("/\]\s+\[/s", "]\n[", $c);
        $c = str_replace(" [", "[", $c);
        $c = preg_replace("/([^\]])(\n+)\[/si", "$1\n\n[", $c);
        $c = preg_replace("/\n{3,}/s", "\n\n", $c);
        $c = str_replace("-SB-", "[", $c);
        $c = str_replace("0-0-0", "O-O-O", $c);
        $c = str_replace("0-0", "O-O", $c);

        return $c;
    }

    public function getUnparsedGames()
    {
        if (!isset($this->pgnGames)) {
            if ($this->pgnFile && !isset($this->pgnContent)) {

                $this->pgnContent = file_get_contents($this->pgnFile);
            }
            $this->pgnGames = $this->splitPgnIntoGames($this->cleanPgn($this->pgnContent));
        }

        return $this->pgnGames;
    }

    public function countGames() { $games = $this->getUnparsedGames(); return count($games); }
    public function getCleanPgn() { return $this->cleanPgn($this->pgnContent); }
    public function getFirstGame() { return $this->getGameByIndex(0); }

    public function getGameByIndexShort($index)
    {
        $games = $this->getUnparsedGames();
        if (count($games) && count($games) > $index) {
            $game = $this->getParsedGame($games[$index]);
            $game["moves"] = $this->toShortVersion($game["moves"]);
            return $game;
        }
        return null;

    }


    public function getGameByIndex($index)
    {
        $games = $this->getUnparsedGames();
        if (count($games) && count($games) > $index) {
            return $this->getParsedGame($games[$index]);
        }
        return null;
    }



    private function getParsedGameShort($unParsedGame)
    {
        $this->pgnGameParser->setPgn($unParsedGame);
        $ret = $this->pgnGameParser->getParsedData();
        if ($this->fullParsing()) {
            $ret = $this->gameParser->getParsedGame($ret, true);
            $moves = &$ret["moves"];
            $moves = $this->toShortVersion($moves);
        }
        return $ret;
    }

    private function getParsedGame($unParsedGame)
    {
        $this->pgnGameParser->setPgn($unParsedGame);
        $ret = $this->pgnGameParser->getParsedData();
        if ($this->fullParsing()) {
            $ret = $this->gameParser->getParsedGame($ret);
        }
        return $ret;
    }

    public function getParsedGames($short = false)  //was private
    {
        $games = $this->getUnparsedGames();
        $ret = array();
        for ($i = 0, $count = count($games); $i < $count; $i++) {
            try {
                $g = $short 
                ? $this->getParsedGameShort($games[$i]) : $this->getParsedGame($games[$i]);
                $ret[] = $g;

            } catch (Exception $e) {

            }
        }
        return $ret;
    }
    //public f unction getGames() {return $this->getParsedGames(false);} //get Parsed Games(false)
    //public f unction getGamesShort() {return $this->getParsedGames(true);} //get Parsed Games(true)


    private function toShortVersion($branch) //called by get Game By Index Short, get Parsed Game Short
    {
        foreach ($branch as &$move) {

            if (isset($move["from"])) {
                $move["n"] = $move["from"] . $move["to"];
                unset($move["fen"]);
                unset($move["from"]);
                unset($move["to"]);
                if (isset($move["variations"])) {
                    $move["v"] = array();
                    foreach ($move["variations"] as $variation) {
                        $move["v"][] = $this->toShortVersion($variation);
                    }
                }
                unset($move["variations"]);
            }

        }
        return $branch;
    }


/*
  J:\awww\www\fwphp\glomodul\phpchess\phpchess_parser_gui\PgnParser.php (22 hits)
ln 13:     public f unction __construct($pgnFile = "", $fullParsing = true)
ln 28:     private f unction sanitize($filePath)
ln 52:     private f unction getExtension($filePath)
ln 59:     public f unction setPgnContent($content)
ln 64:     private f unction cleanPgn()
ln 90:     public static f unction getArrayOfGames($pgn)
ln 95:     private f unction splitPgnIntoGames($pgnString)
ln 100:    private f unction getPgnGamesAsArray($pgn)
ln 114:    public f unction getGamesAsJSON()
ln 119:    private f unction fullParsing()
ln 124:    public f unction getUnparsedGames()
ln 137:    public f unction countGames()
ln 143:    public f unction getCleanPgn()
ln 148:    public f unction getFirstGame()
ln 153:    public f unction getGameByIndexShort($index)
ln 166:    public f unction getGameByIndex($index)
ln 175:    //public f unction getGames() { return $this->getParsedGames(false); }
ln 177:    public f unction getGamesShort()
ln 182:    public f unction getParsedGames($short = false)  //was private
ln 200:    private f unction toShortVersion($branch)
ln 223:    private f unction getParsedGame($unParsedGame)
ln 233:    private f unction getParsedGameShort($unParsedGame)
*/

}
