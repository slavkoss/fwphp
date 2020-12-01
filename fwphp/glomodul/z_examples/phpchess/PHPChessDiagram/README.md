# Chess Diagram Generator
Generate chess diagrams with a simple PHP script.

Requires PHP 7 and the GD extension.

# Installation

Copy files on the server. Create cache folder that is writable by Apache/Nginx.

# Parameters

Send parameters as a query string:
* fen = FEN string for the diagram
* size = size of the diagram (100 to 1000 pixels)
* reverse = set to true if you want the board to be reversed (black pieces at the bottom)

So this request `index.php?fen=r2qk2r/ppp2ppp/3bpn2/2P2b2/3P4/1B3P2/PP2N1PP/R1BQ1RK1&size=150`

will generate this diagram:

![Diagram](https://github.com/armandn/PHPChessDiagram/blob/master/diagram_small.png?raw=true)

# Details

Read more about how the code works in [this article](https://www.media-division.com/how-to-create-chess-diagrams-with-php/)
