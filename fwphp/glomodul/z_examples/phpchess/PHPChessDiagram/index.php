<?php
//https://www.media-division.com/how-to-create-chess-diagrams-with-php/
//http://sspc2:8083/fwphp/glomodul/phpchess/PHPChessDiagram/index.php?fen=r2qk2r/ppp2ppp/3bpn2/2P2b2/3P4/1B3P2/PP2N1PP/R1BQ1RK1&size=150

define('BOARD_SIZE',         200);
define('DARK_SQUARE_COLOR', '#b5876b');
define('LITE_SQUARE_COLOR', '#f0dec7');
define('PIECES',            'kqrnbpKQRNBP');
define('DIGITS',            '12345678');
define('CACHE_PATH',        './cache/');
define('SPRITE_PATH',       './pieces/');

// validate input
// index.php?fen=r2qk2r/ppp2ppp/3bpn2/2P2b2/3P4/1B3P2/PP2N1PP/R1BQ1RK1&size=150
$input = filter_input_array(INPUT_GET, [
    'fen' => [
        'filter' => FILTER_SANITIZE_STRING,
        'flags'  => FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH
    ],
    'size'=>[
        'filter'  => FILTER_VALIDATE_INT,
        'options' => [
            'default'   => BOARD_SIZE,
            'max_range' => 1000,
            'min_range' => 100
        ]
    ],
    'reversed'=>[
        'filter'  => FILTER_VALIDATE_BOOLEAN
    ],
]);

$fen       = $input['fen'] ?? '';
$size      = $input['size'] ?? BOARD_SIZE;
$reversed  = $input['reversed'] ?? 0;
$file_name = request_to_file_name($fen, $size, $reversed);
$file_path = CACHE_PATH . $file_name;

if (try_cached_file($file_path))
    exit();

$board    = parse_fen($fen);

/*
$sprites  = load_sprites($board);
$img      = create_image($size);

if ($img === false)
    exit('GD error');

draw_board($img);
add_pieces($img, $board, $reversed, $sprites);
output_image($img, $file_name);
cleanup($img, $sprites);
*/

/**
 * Given the request data, constructs a file name as an MD5 hash.
 * @param string  $fen
 * @param int     $size
 * @param boolean $reversed
 * @return string
 */
function request_to_file_name($fen, $size, $reversed)
{
    // keep only the first part of the FEN, replace slashes
    str_replace('/', '-', explode(' ', $fen)[0]);

    // construct the name
    $name = join('_', [$fen, $size, $reversed]);

    // strip everything not allowed
    $name = preg_replace("/[^kqrnbpKQRNBP_0-9\-]+/", "", $name);

    // return an MD5 hash. This way we avoid issues with case-insensitive file systems
    return md5($name) . ".png";
}

/**
 * Check if the specified file exists and is readable. If so, output and return true.
 * Otherwise, return false.
 * @param  string $file_path
 * @return boolean
 */
function try_cached_file($file_path)
{
    if (is_readable($file_path))
    {
        header('Content-type: image/png');
        if (readfile($file_path) !== false)
            return true;
    }
    return false;
}

/**
 * Parse FEN to board.
 * @param string $fen FEN string
 * @return array board array
 * @see https://en.wikipedia.org/wiki/Forsyth%E2%80%93Edwards_Notation
 *
 * FEN string looks like this:
 * rnbqkbnr/pp1ppppp/8/2p5/4P3/8/PPPP1PPP/RNBQKBNR w KQkq c6 0 2
 * 
 * Lowercase characters are black, uppercase are white. K=King, Q=Queen and so on, with P standing for Pawn. The stuff after the first space is about the board state and does not concern us in this case.
 *
 * The board is read from the top left corner, to the right and downwards. A forward slash acts as new line. Numbers are for empty spaces. So “8/2p5” can be read as “8 empty spaces, then on the next row (rank) 2 empty spaces, a pawn, then 5 more empty spaces.
 * 
 * So to parse a FEN into a a64-square array, we’d write:
*/
function parse_fen($fen)
{
    // keep only the piece info from the FEN and turn into array
    $chars = str_split(explode(' ', $fen)[0]);
    $board = array_fill(0, 64, ' ');
    $row = 0;
    $col = 0;

    foreach($chars as $chr)
    {
        if ($row > 7)
            break;
        else
        if ($chr == '/' || $col > 7)
        {
            $row++;
            $col = 0;
        }
        elseif (strpos(DIGITS, $chr) !== false)
            $col += intval($chr);
        elseif (strpos(PIECES, $chr) !== false)
        {
            $board[$row*8+$col] = $chr;
            $col++;
        }
    }
          echo __METHOD__ .' SAYS: '.'<pre>$board='; echo print_r($board) .'</pre>';
    return $board;
}

/**
 * Check if string is uppercase.
 * @param string $str
 * @return bool
 */
function is_upper($str)
{
    return $str === strtoupper($str);
}

/**
 * Given a character representing a piece (e.g. 'K', 'q', 'N'...), return the corresponding PNG name
 * @param string $p
 * @return string
 */
function get_sprite_name($p)
{
    $name = (is_upper($p) ? 'w' : 'b') . strtolower($p);
    return SPRITE_PATH . "$name.png";
}

/**
 * Preload needed sprites for pieces. Returns an array where the key is a string of the piece type
 * ('K', 'q', ...) and the value is the image resource. Only the needed sprites are loaded.
 * @param array $board
 * @return array
 */
function load_sprites($board)
{
    $sprites = [];
    $chars   = array_unique($board);
    foreach($chars as $chr)
    {
        if (strpos(PIECES, $chr) !== false)
        {
            $file = get_sprite_name($chr);
            $sprites[$chr] = imagecreatefrompng($file);
        }
    }
    return $sprites;
}

/**
 * Create empty image of given size. If the image cannot be created, FALSE is returned.
 * @param int $size
 * @return false|resource
 */
function create_image($size)
{
    if (!function_exists('imagecreatetruecolor'))
        return false;

    return imagecreatetruecolor($size, $size);
}

/**
 * Convert a hex string, e.g. '#aabbcc' to array of RGB components.
 * @param $clr
 * @return array
 */
function hex_rgb($clr)
{
    return array_map(
        function($c)
        {
            return hexdec(str_pad($c, 2, $c));
        },
        str_split(ltrim($clr, '#'),
        strlen($clr) > 4 ? 2 : 1));
}

/**
 * Draw the squares on the image.
 * @param resource $img
 */
function draw_board($img)
{
    $size = imagesx($img)/8;
    for ($row=0; $row<8; $row++)
    {
        for ($col=0; $col<8; $col++)
        {
            $hex   = (($row + $col) % 2 === 1) ? DARK_SQUARE_COLOR : LITE_SQUARE_COLOR;
            $rgb   = hex_rgb($hex);
            $color = imagecolorallocate($img, $rgb[0], $rgb[1], $rgb[2]);

            $x1 = $col * $size;
            $y1 = $row * $size;
            $x2 = $x1 + $size - 1;
            $y2 = $y1 + $size - 1;

            imagefilledrectangle($img, $x1, $y1, $x2, $y2, $color);
        }
    }
}

/**
 * Place pieces on the board.
 * @param resource $img         image to add pieces to
 * @param array    $board       board array
 * @param boolean  $reversed    true to reverse the board
 * @param array    $sprites     reference to the loaded sprites
 */
function add_pieces($img, $board, $reversed, $sprites)
{
    $sq_size = imagesx($img)/8;

    for ($i=0; $i<64; $i++)
    {
        $p = $board[$i];
        if ($p == ' ')
            continue;

        $col   = $i % 8;
        $row   = ($i - $col) / 8;

        if ($reversed)
        {
            $col = 7 - $col;
            $row = 7 - $row;
        }

        $x     = $col * $sq_size;
        $y     = $row * $sq_size;
        $piece = $sprites[$p];

        if (!empty($piece))
        {
            $p_size = imagesx($piece);
            imagecopyresampled($img, $piece, $x, $y, 0, 0, $sq_size, $sq_size, $p_size, $p_size);
        }
    }
}

/**
 * Output image, optionally forcing a download if name is specified.
 * @param resource $img
 * @param string   $file_name
 * @param boolean  $force_save
 */
function output_image($img, $file_name, $force_save=false)
{
    $file_path = CACHE_PATH.$file_name;

    header('Content-type: image/png');

    if ($force_save)
        header("Content-disposition: attachment; filename=\"$file_name.png\"");

    imagetruecolortopalette($img, false, 8);

    // try to write PNG file to cache and then output the saved file.
    // If that fails, encode the PNG again and output it.
    if (!is_writeable(CACHE_PATH) ||
        (imagepng($img, $file_path, 9) === false) ||
        (readfile($file_path) === false))
        imagepng($img, null, 9);
}

/**
 * Destroy created images.
 * @param resource $img
 * @param array $sprites
 */
function cleanup($img, $sprites)
{
    imagedestroy($img);
    foreach($sprites as $sprite)
    {
        imagedestroy($sprite);
    }
}
