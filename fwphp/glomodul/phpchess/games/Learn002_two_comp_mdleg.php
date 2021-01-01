<?php
use \Ryanhs\Chess\Chess;
include '../phpchess/Chess.php';  //51 kB   require 'vendor/autoload.php';

    $url_protocol = ( (isset($_SERVER['HTTPS']) and $_SERVER['HTTPS'] == 'on') 
       ? 'https://' : 'http://'
    ) ;
    //dev1:8083 or sspc2:8083 :
    $url_domain = filter_var($_SERVER['HTTP_HOST'] . '/',FILTER_SANITIZE_URL); 
    $wsroot_url = $url_protocol .  $url_protocol ;

      $REQUEST_URI = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL) ;
      $uri_arr = explode('?', $REQUEST_URI) ; 
      $module_relpath = dirname(dirname(rtrim(ltrim($uri_arr[0],'/'),'/')));
      $module_url = $wsroot_url.$module_relpath.'/';

      $img_path = dirname(dirname( __FILE__ )) . DIRECTORY_SEPARATOR .'img'. DIRECTORY_SEPARATOR ;
      //$img_path = realpath( dirname( __FILE__ ) .'/phpchess/img/' );
      $img_url = $module_url .'img/';
      $img_dirrel = '/'. $module_relpath .'/img/' ; //str_replace( $url_protocol,'', $img_url );
      //$basedir = $_SERVER['DOCUMENT_ROOT'] . "/timesheet/files/$folder_name";
      //rename("$basedir/un_approved/$approve_employee_username", "$basedir/approved/$approve_employee_username);

      //rename($img_dirrel ."z_distance_white.png", $img_dirrel ."test.png");
      //rename($img_path ."z_distance_white.png", $img_path ."test.png");

$tabtitle = 'Analisis of '.basename(__FILE__ ,'.php') ; include '../phpchess/hdr.php' ;
?>
<h2><?=$tabtitle?> Black\'s turn</h2>
<p>Because we are not the computers and we cannot calculate all the lines, so :</p>
<ol>
  <li>Understanding of the general ideas will help us in the calculation</li>
  <li>During the game we should <strong>think about the position in general first</strong>, then start to <strong>calculate the concrete variations</strong>. 1.realize ALL POSSIBILITIES and 2.calculate all of them to realize which one is the best.
  </li>
  <li>Calculated&nbsp; <strong>variations </strong>will provide the <strong>right plans</strong></li>
  <li>To calculate we need :
     <ol>
     <li>calculate only LOGICAL MOVES - which follow base strategy principles of a chess game. 
     </li>
     <li>calculate FORCING LINES (moves group) first of all (* Checks; * Captures (take something); * Attack) which force an opponent to do something. 
	 It is much easier for us to calculate such forcing lines. We should first try to find ATTACKING MOVES which force opponent to go back and to defend his position.</li>
	   <li>Idea of the <strong>piece's activity</strong> is the main idea of a chess game. We can evaluate any 
	   (changes in) position, by estimating the change of activity. 
       We should try to attack all the time, it doesn't matter if the opponent 
	   attacked us with his last move or not. 
     </li>
     </ol>
</ol>

<br />Middlegame between two computers, unbalanced position looks difficult to find good moves here.



<?php
// F E N :
if (isset($_GET['fen'])) { $fen_startboard=$_GET['fen'];} 
else {$fen_startboard='k5r1/pb1nqpb1/2p1p3/Qp2P1p1/3PN3/1P4B1/4BPP1/1K1R4 w - - 0 1'; }
// P O Z :
if (isset($_GET['poz'])) { $poz=$_GET['poz'];} else {$poz=''; }
                           echo '<br />ln '. __LINE__ .' SAYS $fen_startboard=' ;
                           echo '<pre>'. $fen_startboard .'</pre>' ;


$chess = new Chess($fen_startboard);
                    //echo $chess->get_boardhtml( 'put help for problem here eg To easy' ) ;
$chess->load_fen($fen_startboard); // Chess::DEFAULT_POSITION
//$chess->put(['type' => 'P', 'color' => Chess::BLACK], 'f5');
echo $chess ;



?>
<strong><u>Position 1. black's turn</strong></u>.

<p>There are 2 black's attacking moves: <strong>23. ...f5</strong> or ...c5?.
            <p style="margin-left: 80px;">23...c5 24. Nd6 making the move forward to good square. We can then realize that the ...c5 move wasn't <strong>attacking move</strong>. That's why <strong>we should stop the calculation of line 23...c5</strong>. You can see how general understanding helps calculation. </p>
<p><strong>23...f5</strong> 24. white has several answers.</p>


<p>
<strong>
<a href="Learn002_two_comp_mdleg.php?fen=<?=$fen_startboard?>&amp;poz=2">24.exf6</a></strong>. Other moves-candidates are Nd6 and Nc5 (<strong>principle of maximum activity works, we only need to consider the moves forward</strong>). Comparing moves Nd6 and Nc5 we can realize that 
<strong>Nd6 should be more powerful than Nc5</strong>, because <strong>it is the most forward move</strong>. 
We need to calculate only white's answers
24. exf6 because that is the forcing move and 24. Nd6 doesn't look very good, because black can answer 
<strong>24...f4 and cut off the white's bishop</strong>.
<p>

<?php
  switch ($poz) {
  case  '2': 
     //1. from :
     $chess->remove('f7');
             //copy($img_path ."arrow_black_from.png", $img_path ."bp.png");
             //$chess->put(['type' => 'P', 'color' => Chess::BLACK], 'f7');
             //echo $chess ;
             //copy($img_path ."bp_original.png", $img_path ."bp.png");
     //1. to :
     $chess->put(['type' => 'P', 'color' => Chess::BLACK], 'f5');

     //2. from - to :
     $chess->remove('f5'); //an passant
     $chess->remove('e5'); $chess->put(['type' => 'P', 'color' => Chess::WHITE], 'f6');
     echo $chess ;
     break ;
  default: break;
  }
?>
<strong><u>Position 2. After 24.exf6. Black's turn</u></strong>.



<p>
After 24.exf6 <strong>Nxf6</strong> white candidate-moves are 
25.Nxf6, 25.Nxg5 (captures), 25.Bd6 (attacking move) and 25.Nc5 (because it is the move forward).


<p style="margin-left: 80px;">
25. Nxf6 Qxf6 we can see that doesn't give anything for white. It only removed the pressure, which as we know, is not very good.

 <p style="margin-left: 80px;">
Therefore, 25. Nxg5 also looks too passive for so hard position. For example, after 25...Bh6 26.Nf3 Ne4 black gets more activity and the white's attack is over. Certainly, it is not the position white wants to get.


 <br><br>White also has the moves Nc5 and Nd6, but we mainly need to consider 
 the forcing moves. If white goes 25.Nd6 black can simply answer 25...Nd5 and 
everything is OK for black. <br>


<p>Now we need to calculate the last forcing move for white:

<p><strong>25.Bd6</strong> is an attacking move. Black has forcing move <strong>
25...Qd8</strong> or bad moves 25...Qd7 and 25...Qf7. We should not calculate ...Qe8, because it is the move back, (which breaks 
the principle of maximum of activity). After 25...Qd8 white needs to protect the queen 
somehow. It is the only thing he can do. White has just 2 possibilities: 26. 
Qxd8 or Bc7 (because the knight on the e4 is hanging). After the passive move 
25...Qf7 white has a lot of moves. White can go Bc5, Bf3 to support the knight 
with the bishop, Nc5, or Nxf6. Certainly, it will be much harder to calculate 
this line. We should focus our attention on the forcing moves. That way it will 
be much easier to calculate, especially in the hard complicated positions. <br>
<p>
After 25...Qf7 26.Bc5 a6 27.Qb6 white has a winning position. We can see 
that we really should focus our attention on the forcing move 25...Qd8.
<p>
White has 
2 forcing answers: 26.Qxd8 and 26.Bc7. <br>We need to start calculation from the 
most forcing move 26.Qxd8. After 26...Rxd8 white has a choice with several forcing 
answers: the bishop can attack the rook somehow and the knight can take on f6. 
Comparing the bishop's moves, we can see that 27.Be7 is more powerful, because 
it attacks 2 pieces, so no reason for us to calculate the worse move 27.Bc7. <br>
The variation 27.Nxf6 Bxf6 is pretty simple. White has to go back 28.Bc5 and it 
is the end of the forcing line. At the end of the forcing variation, we should 
evaluate the final position and remember this evaluation. After the calculation 
of all the lines, we will compare such evaluations and decide which line is the 
best. We can see in this position, that situation favor black: he is up a pawn 
and white hasn't any real threats.<br>Regarding the move 27.Be7, the last 
forcing move, we can see that white is attacking 2 pieces, so the only forcing 
move for black here is 27...Nxe4. Then, after the forcing line 28.Bxd8 Nc3 29.Kc2 
Nxe2 black has a decisive material advantage of 2 minor pieces against the rook. 
It is winning for black. <br>
<p>
Now we can realize the move 26.Qxd8 was a bad decision for white, and we only 
need to calculate the move 26.Bc7 now. What will be an aggressive answer for 
black? Black has 26...Qd5. The queen is attacking the b3 pawn and the knight on 
e4. White has 2 answers, which can solve both problems: Nd2 and Nc5. Regarding 
the principle of maximum activity, we should only calculate moves forward. There 
is no reason for us to calculate the Nd2 move, because it is obviously bad. 
After 27.Nc5 it is the end of the forcing line, so we need to evaluate the 
position. Certainly the position is still very complicated, but it is OK for 
black. White hasn't any huge threats as after Bf3, black can answer Qf5 with 
check; the knight can't make moves, because of Qxb3; after Bb6 black can answer 
a6 and again white can't move the knight. Now it is the black's turn, so he can 
make some normal move and everything should be fine.


<p>
All these lines were our calculation of the black's move 23...f5 in the starting 
position. And certainly we should calculate them before black makes the move 
23...f5. It seems like this way of thinking takes a lot of time, but it is not 
true. It took a lot of time only because of my detailed explanation. When you 
automate the right way of calculation, you will do it very quickly. I recommend 
you stop the video now and try to visualize all the calculations I have done. 
This will be good training and you will also see that it is possible to do it 
quite quickly. <br>We will analyze the game until the end, but I will not 
explain every move in so much detail. Otherwise, the lesson will be too long. 
You should understand that the way of thinking will be the same all the time. So 
if I don't explain some moves, you can stop the video and calculate them by 
yourself. It will be a good training for you.<br>Let's resume the analysis. In 
the game, there followed:<br>23...f5 24.exf6 Nf6 25.Bd6 Qd8 26.Bc7 Qd5 27.Nc5<p>
So both players made the best moves.<br>What should black do now? First we 
should try to find the attacking moves. How can we do it? You need to divide the 
board on 2 parts (in your head certainly), and find the moves of your pieces on 
the opponent's territory of the board which will attack something or take 
something. Usually there are just 1 or 2 attacking possibilities, and you can 
find them easily. For example, in this position black can play ...Qxg2 or ...Ne4. 
27...Qxg2 is too optimistic, because of 28.Bb6 a6 29.Na6 1:0.


<p>
27...Ne4 is bad also because white can make the attacking moves 28. Bb6 a6 29.Bf3 
and white is winning. So in this position black cannot attack. If you can't 
attack, you need to increase the activity of your pieces or decrease your 
opponent's activity. This helps you to find the best moves. There is one more 
base principle of chess strategy, which I didn't tell you before. It is the 
principle of neutralizing the most active piece of an opponent, which is on your 
territory of the board. That means if you see an opponent's piece on your 
territory of the board, you should attack it and force it to go back or exchange 
it. This will be the most important task for you in this position. <br>For 
example, in this position white has 3 pieces on the black's territory: Qa5, Bc7, 
Nc5. Black needs to attack these pieces somehow. It is impossible to attack the 
queen now. There is only 1 move to attack the bishop – 27...Ne8, but it only helps 
white to attack after 28.Bb6, so 27...Ne8 is not a good idea. Finally black has 
several moves to attack the knight on the c5: Ne4, Nd7, Bf8. As we know, 27...Ne4 
is a bad idea. After 27...Nd7 white has only 1 attacking answer 28.Bf3 and after 
28...Qf5 29.Be4 the white's position is very aggressive. Black has started to make 
the moves back. For example, after 29...Qf7 I think white has a lot of ways to 
resume the attack. One of them is 30.Nxb7 Kxb7 31.Rc1.<br>Now we have 1 last 
candidate-move: 27...Bf8. This move works well, because after 28.Bf3, black can 
play 28...Qf5+ with check and then take the knight on c5 with the bishop. If white 
doesn't play Bf3 he can't move the knight, because of the weakness on the b3. 
That's why in the game, black played


<p>
27...Bf8 Then after the logical moves 28.Bb6 a6 29.Bf3 Qf5+ 30.Kb2 Bxc5 (to 
neutralize the bishop which is on black's territory of the board) we can see 
another position when white has a choice. To find all the candidate-moves, I 
recommend you to focus the attention on every single piece, starting from the 
king, then queen, rooks, bishops, knights, pawns. Using this way, you will find 
all the possibilities and will not miss something. Let's do it in this position. 
White has no logical moves with the king and queen. The rook can't make any 
forcing moves as well. The bishop on b6 can take on c5. The bishop on f3 can 
take on c6. And the pawn can take on the c5, so the candidate-moves are Bxc5, 
Bxc6, dxc5. One more recommendation is: you should calculate all the forcing 
moves, even if they look bad for the first sight. Nearly all combinations start 
from a sudden move. If you don't calculate such moves, you will never find the 
combinative ideas. On the other hand, if the move (for example the sacrificing 
move) is bad, you will realize it very quickly. <br>So in this position, the 
most aggressive move for white here is Bxc6, and that is what white did it in 
the game. If white will try to do something else, the situation will be much 
easier for black. For example, 31.Bxc5 Nd7 (attack the bishop), and it will look 
like 31.Bxc5 help black to keep the position. That is why white played<p>
31.Bxc6<br>After the opponent's move you should ask yourself “what is the 
opponent's threat?” or “what the opponent is going to do on the next move?” This 
simple recommendation helps to avoid blunders. For example, in this position 
white is threatening Qxa6 and Qxb7 mate. That's why black has only 2 
candidate-moves: Kb8 and Qxf2+. In the game, black played <br>31...Qxf2+<br>It is 
a logical move, because it wins material. There is one other base rule of a 
chess game: principle of the material. It means you should take something if you 
can. It looks obvious, but a lot of players break this simple rule very often, 
because they start to think about something else, and forget about the main 
ideas. The principles of activity and material are the 2 most important ideas in 
a chess game. That means you should follow them most of all. Quite often people 
make mistakes because they know too much information about chess and cannot 
decide which factors are the most important in the position. Because there are 
many factors in every position: safety of the king, activity of the pieces, open 
files, weaknesses, and so on. So you need to understand the most important idea 
in the position. After these lessons I hope you will understand which ideas are 
the most important. It is the base principles of the chess game which I am 
telling you during these lessons. Let's resume our analysis.<br>After 31...Qxf2+ 
white can't play 32.Rd2, because in the line 32...Qxd2+ 33.Qxd2 Bxb6 34.Bb7+ Kb7 
black simplify the position and get the huge material advantage. That is why 
this line is bad for white. In the game there was:<br>32.Ka1 Kb8 33.dxc5<p>
<br>White is keeping up the pressure. You can see that the strategic principles 
help all the time.<br>33...Nd5<br>Black has improved the position of the knight.<br>
Now white has a huge choice. The forcing moves are: Ba7+, Bc7+ (checks), Bxb7, 
Bxd5, Rxd5 (captures). I will not show you all the variations, because it will 
take a lot of time. You can stop the video and try to do it by yourself. The 
system of calculation is the same: you need to calculate the moves with check 
first, and then captures. <br>In the game it was:<br>34.Bc7+ Kc8 <br>Black can't 
take, because after 34...Nc7 white goes 35.Qb6 and mates the black's king.<br>
After 35.Bxd5 Bxd5 white has several moves-candidates: Qxa6+ (check), Rxd5 
(capture) and Bd6 (attacking the king). By the way, the sudden move 36.Rxd5 
gives white a draw: 36...exd5 37.Qxa6+ Kxc7 38.Qb6+ Kc8 39.Qe6+ and white is 
resuming making checks. Black cannot play 38...Kd7 because 39.c6+ (with a 
discovered attack) winning the black's queen. You just can see again, how 
important to consider the forcing moves, including the moves, which look bad.<p>
White chose the line 36.Bd6 <br>Now black needs to cover the c7 square, so he 
played 36...Qf7 and consolidated the position. The move 37.Qa6 is not dangerous, 
black simply goes 37...Qb7 and everything is fine for black. 38.Qxb7+ Kxb7 black 
will take back one of the pawns with ...Bxb3 or ...Bxg2, so the move 37.Qxa6 didn't 
even help to win the material. The position become quite simple, white cannot do 
anything real, so there is no reason for us to resume the analysis. In the game, 
the players made several more moves and agreed to a draw. The remaining moves 
were: <br>37.Rc1 (with an idea of pawn c5-c6) Rd8 (to stop c6) 38.Kb2 Qg7+ 
39.Ka3 Qb7 40.Rf1 Bg2 41.Rg1 Rd7 42.Qd2 b4+ 43.Qxb4 DRAW.<br>This position is 
quite drawish, for example the line: 43...Qxb4+ 44.Kxb4 Rb7+ 45.Ka5 Bd5 we can see 
that the players will take a lot of material and right now it is a completely 
equal position with opposite colored bishops, this is a draw.<br>During this 
lesson, I have told you how to calculate the lines and how to apply the base 
strategy principles in the complicated positions. So, I have showed you the 
right way of thinking, how the Grandmasters think in the complicated positions.<br>




<h2>Conclusions</h2>
<p>
You should understand in general what you need to do in every stage of game. In 
the opening, you need to <strong>develop</strong> pieces, then <strong>castle</strong> 
and <strong>connect rooks</strong>. In the middlegame, you should compose an
<strong>attacking plan</strong>: find an <strong>object of attack</strong> and 
realize <strong>how</strong> you can attack it with your pieces. In the endgame, 
the <strong>pawn structure determines the plan</strong>: you can <strong>advance 
your passed pawns or attack the opponent's weak pawns</strong>. These ideas give 
you general direction in how to play the different stages of the game.<p>
&nbsp;To find the concrete moves, you should use the <strong>base strategic 
principles and calculate the variations</strong>. According to the base 
principles, you should try to make the <strong>attacking moves first</strong>. 
If there are no attacking possibilities, you need to use the principles of the
<strong>least active piece</strong>, <strong>maximum activity</strong>, and
<strong>neutralizing</strong> the opponent's most active pieces. There are some 
other principles also, but these were the main ones. After realizing which move 
should be the best according to the general principles, you need to <strong>
check the concrete variations</strong>. When calculating, you should find
<strong>all the forcing candidate-moves first</strong> and calculate them until 
the <strong>end of the forcing line</strong>.


<p>
This way of thinking will help you to find the best move in any position. I have 
showed you how it works in 2 examples, and the second one was really difficult, 
but when you have a clear system of thinking you can play the hard positions as 
well. Certainly you need to practice the ideas from this lesson for some time. 
When you understand it deeply and automate this way of thinking, you will start 
to think like a Grandmaster and get the Grandmaster's results!<br><br>


<hr />

<?php
echo '<br />$module_url='. $module_url ;
echo '<br />$module_relpath='. $module_relpath ;
echo '<br />$img_url='. $img_url ;
echo '<br />$img_dirrel='. $img_dirrel ;
echo '<br />$img_path='. $img_path ;
//rename($dir.'older filename', $dir.'/new filename' )
echo '<br /><br />';

