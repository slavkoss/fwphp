
\r?\n   is END_OF_LINE_LIN_WIN="\r?\n"=CRLF       ok

(\[((?:\r?\n)|.)*\])     --is all [...]

-- lines containing [...] as string :
\[([\w]+)\s+\"([\s\S]*)\"\]  -------- WORKS - extract hdr key-value pairs

^\[([\w]+)\s+\"([\s\S]*)\"\]\r?\n
/\[([\w]+)\s+\"([\s\S]*)\"\]/




ORIGINAL
class extract {
  const HEADER_ REGEX = '/^(\[((?:\r?\n)|.)*\])(?:\r?\n){2}/';   --not working
  const HEADER_KEY_REGEX = '/^\[([A-Z][A-Za-z]*)\s.*\]$/';
  const HEADER_VALUE_REGEX = '/^\[[A-Za-z]+\s"(.*)"\]$/';
  const COMMENTS_REGEX = '/(\{[^}]+\})+?/';
  const MOVE_VARIATIONS_REGEX = '/(\([^\(\)]+\))+?/';
  const MOVE_NUMBER_REGEX = '/\d+\.(\.\.)?/';
  const MOVE_INDICATOR_REGEX = '/\.\.\./';
  const ANNOTATION_GLYPHS_REGEX = '/\$\d+/';
  const MULTIPLE_SPACES_REGEX = '/\s+/';


[Event "London"]
[Site "London ENG"]
[Date "1851.06.21"]
[EventDate "?"]
[Round "?"]
[Result "1-0"]
[White "Adolf Anderssen"]
[Black "Lionel Adalbert Bagration Felix Kieseritzky"]
[ECO "C33"]
[WhiteElo "?"]
[BlackElo "?"]
[PlyCount "45"]

1.e4 e5 2.f4 exf4 3.Bc4 Qh4+ 4.Kf1 b5 5.Bxb5 Nf6 6.Nf3 Qh6
7.d3 Nh5 8.Nh4 Qg5 9.Nf5 c6 10.g4 Nf6 11.Rg1 cxb5 12.h4 Qg6
13.h5 Qg5 14.Qf3 Ng8 15.Bxf4 Qf6 16.Nc3 Bc5 17.Nd5 Qxb2
18.Bd6 {18.Bd6?! was not a good move, when 18. d4! is winning, just like 18. Be3! or 18. Re1!}
   Bxg1 {It is from this move that Blacks defeat stems. Wilhelm
Steinitz 1879 suggested : 18... Qxa1+; likely moves to follow are 19. Ke2 Qb2 20. Kd2 Bxg1.
Reuben Fine 1952 suggested : "If here, e.g. 18. . . . QxRa1+; 19. Ke2, QxRg1; then 20. Nxg7+, Kd8; 21. Bc7#."
in "The Middle Game in Chess" reprint 1972, at 20}
19. e5 Qxa1+ 20. Ke2 Na6 21.Nxg7+ Kd8 22.Qf6+ Nxf6 23.Be7#
{Very strange game ! Kieseritzky sure showed his limitation by going for piece-grabs. Kieseritzky had a plus score v Anderssen ! https://www.chessgames.com/perl/chessgame?gid=1018910 See https://lichess.org/study/NT0Qzi5p/3IX6FElR#0 }
1-0


    /*
    https://regexone.com/  https://regexr.com/  https://regex101.com/
    https://www.freeformatter.com/regex-tester.html
    regexp are used to EXTRACT INFO from text eg code, log files, spreadsheets, even documents.

    PGN format, including its SAN (standard algebaric notation) specification, is documented in the "Portable Game Notation Specification and Implementation Guide", available here:
    http://www.chessclub.com/help/PGN-spec

    The Regexp::Common manual https://metacpan.org/pod/Regexp::Common documents the use of the Regexp::Common framework and interface, used by Regexp::Common::Chess.

          pgn consists of two sections: Tag Pairs and Move Text.

    ^...$  Starts and ends to only match full line string
    abc...  Letters
    123... Digits
    .  Any Character
    \.  Period   eg pattern ...\. matches string 896. or ?=+. or...
    (.*)  Capture all, see below CaptGr
    ?  Optional character  eg \d+ files? found\?  is  1 file found? or 2 files found?
    \d  Any Digit
    \D  Any Non-digit character
    \w  Any Alphanumeric character
    \W  Any Non-alphanumeric character
    \s  Any Whitespace
    \S  Any Non-whitespace character

    [abc]  Only a, b, or c  eg [cmf]an is description of 'can', 'man', 'fan'...
    [^abc]  Not a, b, nor c
    [a-z]  Characters a to z
    [0-9]  Numbers 0 to 9

    {m}  m Repetitions
    {m,n}  m to n Repetitions
    *  Zero or more repetitions
    +  One or more repetitions

    (...)  CaptGr (Capturing Group)  eg ^(file.+)\.pdf$  is fileaa.pdf or file_07241999.pdf or...
    (a(bc))  Capture Sub-group  eg (\w+ (\d+))  is alfanums, 1 blank, digits  is Nov 2020...

    (abc|def)  Matches abc or def. "|" acts like boolean OR (matches expression BEFORE OR AFTER "|"). It can operate within group, or on whole expression. Patterns will be tested in order.

    NonCaptGr (?:\r?\n) means whattodo: skip="?:" skipwhat: END_OF_LINE_LIN_WIN="\r?\n"=CRLF
           ?: NonCaptGr group Groups multiple tokens together without creating CaptGr.
           \r? matches a carriage return (ASCII 13)
               ? Quantifier - Matches 0 or 1 of the preceding token, effectively making it OPTIONAL.
           \n matches a line-feed (newline) character (ASCII 10)

    */
 // preg_match(): Delimiter must not be alphanumeric or backslash 
 //const HEADER_REGEX = '/^(\[((?:\r?\n)|.)*\])(?:\r?\n){2}/'; // not working
 // lines containing [...] as string :
 //const HEADER_REGEX = '/^\[([\w]+)\s+\"([\s\S]*)\"\]\r?\n$/'; // \r?\n=CRLF (optional CR - Linux)
 //const HEADER_REGEX   = '/\[([\w]+)\s+\"([\s\S]*)\"\]/'; // \r?\n=CRLF (optional CR - Linux)
                  /*
          HEADER_ REGEX describes string eg :
          [Event "London"]
          [Site "London ENG"]

    ^ asserts position at start of a line. Matches the beginning of the string, or the beginning of a line if the multiline flag (m) is enabled. This matches a position, not a character.

    ( 
      1st CAPTURING GROUP (\[((?:\r?\n)|.)*\])  in  ^(\[((?:\r?\n)|.)*\])(?:\r?\n){2}
             - Groups multiple tokens together
               and creates a capture group for extracting substring or using backreference.
      \[ matches character "[" literally (char code 91, case sensitive)
                  
      ( 2nd NonCaptGr contained in 1st ((?:\r?\n)|.)* - Groups multiple tokens like 1st CaptGr
        has 2 alternatives

        1st Alternative is NonCaptGr (?:\r?\n)   means skip="?:" skipwhat: END_OF_LINE_LIN_WIN="\r?\n"=CRLF

        |  is "or"

        2nd Alternative "."=dot - equivalent to [^\n\r].
           dot matches any character (except for linebreaks - line terminators)
      )
        * Quantifier Matches between zero and unlimited times
                Ee [Event "London"] - parsing stops after "o" in "London" becouse :
                WARNING : A repeated CaptGr will only capture last iteration.
                Put CaptGr AROUND REPEATED GROUP to capture all iterations
                or use NonCaptGr instead if you are not interested in the data.

      \] matches the character ] literally (case sensitive)
    )

    (
      NonCaptGr (?:\r?\n){2}  in ^(\[((?:\r?\n)|.)*\])(?:\r?\n){2}
      means skip="?:" skipwhat: END_OF_LINE_LIN_WIN="\r?\n"=CRLF
    )
      {2} Quantifier — Matches exactly 2 times

    Global pattern flags
      g modifier: global. All matches (dont return after first match)
      m modifier: multi line. Causes ^ and $ to match the begin/end of each line (not only begin/end of string)
    */

