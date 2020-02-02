<?php
use utlmoj\utlmoj as utl;

ini_set('max_execution_time', 0);
$start = microtime(true);

$selfj = new SelfJoin(); // should be named: MessageBoard, MainMenu...
$selfj->ctr(); //ROUTING = starts scripts according url params cmd, ... 

$end = microtime(true);

echo '<br />'.'Vrijeme izvoðenja: '.($end - $start) . ' sekundi';




class SelfJoin { // should be named: MessageBoard, MainMenu...
 
 // 1. C R U D (M O D E L) PROPERTIES :
 protected $inTransaction = false;
 
 protected $db;
 protected $table;
 protected $idname;
 protected $idval;
 // c r u d actions (CURSORS = named sql set process comands):
 // D = cursor for deleting
 protected $cdel_row_byid ; 
 // R e a d cursor
 protected $cr_max_rbrdet_inm ;
 protected $cr_byid_nivo_orddet_inm ;
 protected $cr_byid ; // R E A D r o w B Y I D (M O D E L c R u d)
 protected $cr_byid_colname ; 
 // U p d a t e cursor
 protected $cu_incr_rbrdet_inm ;
 // C r e a t e cursor
 protected $cc_mast_or_det ;
 
 // 2. U T L S F U N C T I O N S (H E L P E R S) :
 protected $utl; // OUTSIDE WEBSERVERDOCROOT
 // a d r e s s properties :
 protected $curpgurl;
 protected $curpgpath;

 // 3. V I E W PROPERTIES :
 protected $form_errors = array();
 
 
 public function __construct() { // I N I T I A L I Z E (B O O T S T R A P I N G)
 set_exception_handler(array($this,'logAndDie'));
 
 // C R U D (m o d e l) properties :
 $this->table = 'message';
 $this->idname = 'id';
 $this->idval_url = isset($_REQUEST[$this->idname]) ?
 intval($_REQUEST[$this->idname]) : '';
 
 // C R U D actions (cursors, named sql set process comands):
$this->cdel_row_byid = // cd_ means cursor for deleting
"DELETE FROM $this->table WHERE $this->idname=?"; //$values[]=$parent_id;

$this->cr_max_rbrdet_inm;
"SELECT MAX(thread_pos) FROM $this->table WHERE thread_id = ? AND parent_id = ?"; 

$this->cr_byid_nivo_orddet_inm= // cr_ means cursor for reading
"SELECT thread_id,level,thread_pos FROM $this->table WHERE $this->idname=?";

$this->cu_incr_rbrdet_inm=
"UPDATE $this->table SET thread_pos = thread_pos + 1 WHERE thread_id = ? AND thread_pos >= ?";

$this->cc_mast_or_det="INSERT INTO $this->table "
. "($this->idname, thread_id,parent_id, thread_pos, posted_on, level, author, subject, body) "
.'VALUES (?,?,?,?,?,?,?,?,?)';

$this->cr_byid=
"SELECT author,subject,body,posted_on FROM $this->table WHERE $this->idname = ?";

$this->cr_byid_colname=
"SELECT subject FROM $this->table WHERE $this->idname = ?";

 
 // 1. g l o b a l u t l s, s e t t i n g s :
 $curpgpath =__FILE__; $mastpgpath=$curpgpath; //dirname(__DIR__) ;
 $this->curpgpath = $curpgpath;
 require_once($_SERVER['DOCUMENT_ROOT'].'/config_site.php');
 $this->curpgurl = $curpgurl ; 
 //htmlentities($_SERVER['PHP_SELF'],ENT_QUOTES);
 //$_SERVER['DOCUMENT_ROOT'] = eg J:\awww\apl\dev1\
 
 $this->utl = $utl;
 
?><SCRIPT LANGUAGE="JavaScript"><!-- Begin 
<?php echo file_get_contents($jsd.$ds.'key_pressed.js');?>//End --></SCRIPT><?php if ('') $utl->phpjsmsg('aaaaaaaaaa key_ pressed.js IS INCLUD E D');
 
 // 2. g l o b a l c r u d :
 $dbi = 'sqlite3'; $sqlitetbl = 'tema.sqlite3' ; //$dsn='default';
 require_once($gloresdir.$ds.'db_conn.php'); //requires klase/dbi.php
 $this->db = $db;
// ******************************************
 $title = '<h1>Teme (threads) (poruka-odgovor, zadaæa, izbornik) selfjoin PHP PDO SQLite3</h1>' ;
 $title2 = 'Teme selfjoin'; // ibrowser tab txt
 $basecss=$cssd.$ds.'style00.css'; //'default' or $cssd.$ds.'style00.css';
 include ($gloresdir.'/hdr.php');
 //include ($cnfgd.$ds.'hdr.php');

 } // e n d _ _ c o n s t r u c t
 
 
 
 
 public function ctr() { // M A N A G E (R O U T I N G)
 // The value of $_REQUEST['cmd'] tells us what to do
 $cmd = isset($_REQUEST['cmd']) ? $_REQUEST['cmd'] : 'tbl';
 // frontend - user actions (backend in sqlitestudio) :
 switch ($cmd) {
 case 'delrec':
 $this->utl->phpjsmsgyn('Obrisati redak ?'
 , '?cmd=delrecyes&'.$this->idname.'='.$this->idval_url);
 break;
 case 'delrecyes': 
 //case 'delrec': 
 if ($this->idval_url) $this->delrec($this->idval_url);
 else $this->utl->phpjsmsg('Nije zadana šifra retka za brisanje !');
 $this->tbl();
 break;
 case 'frm_rpt': // read an self join r o w
 $this->frm_rpt();
 break;
 case 'frm_post': // display form to post self join r o w
 $this->frm_post();
 break;
 case 'crerec': // insert - i n s e r t posted self join r o w
 if ($this->valid()) { // if m s g e is v a l i d,
 $this->crerec(); // then i n s e r t it
 $this->tbl(); // and display self join list
 } else {
 $this->frm_post(); // otherwise, redisplay the posting form
 }
 break;
 case 'tbl': // show self join r o w s list
 default:
 $this->tbl();
 break;
 }
 }





 // F R O N T E N D - user actions :
 protected function crerec() { // crud1. FRONTEND A D D SELFJOIN ROW
 $parent_id = isset($_REQUEST['parent_id']) ?
 intval($_REQUEST['parent_id']) : 0;
 // Make sure m s g e doesn't change while we're working with it.
 $this->db->beginTransaction();
 $this->inTransaction = true;
 // is this m s g e a reply?
 if ($parent_id) {
 // get the thread, level, and thread_pos of the parent m s g e
 //"SELECT thread_id,level,thread_pos FROM $this->table WHERE $this->idname=?";
 $st = $this->db->prepare($this->cr_byid_nivo_orddet_inm);
 $st->execute(array($parent_id));
 $parent = $st->fetch();
 // a reply's level is one greater than its parent's
 $level = $parent['level'] + 1;
 // what's biggest thread_pos in this thread among m s g e s with the same parent? 
 //"SELECT MAX(thread_pos) FROM $this->table WHERE thread_id = ? AND parent_id = ?";
 $st = $this->db->prepare($this->cr_max_rbrdet_inm);
 $st->execute(array($parent['thread_id'], $parent_id));
 $thread_pos = $st->fetchColumn(0);
 // are there existing replies to this parent?
 if ($thread_pos) {
 // this thread_pos goes after the biggest existing one
 $thread_pos++;
 } else {
 // this is the first reply, so put it right after the parent
 $thread_pos = $parent['thread_pos'] + 1;
 }
 // increment thread_pos of all m s g e s in the thread that come after this one 
 //"UPDATE $this->table SET thread_pos = thread_pos + 1 WHERE thread_id = ? AND thread_pos >= ?";
 $st = $this->db->prepare($this->cu_incr_rbrdet_inm);
 $st->execute(array($parent['thread_id'], $thread_pos));
 // the new m s g e should be i n s. with the parent's thread_id
 $thread_id = $parent['thread_id'];
 } else {
 // m s g e is not reply, so it's the s t a r t of new t h r e a d
 $thread_id = $this->db->query(
 "SELECT MAX(thread_id) + 1 
 FROM $this->table")->fetchColumn(0);
 // If there are no rows yet, make sure we s t a r t at 1 for thread_id
 if (! $thread_id) {
 $thread_id = 1;
 }
 $level = 0;
 $thread_pos = 0;
 }
 // i n s e r t m s g e into DB. Using prepare() and execute() makes sure that all fields are properly quoted 
 //"INSERT INTO $this->table "
 //. "($this->idname, thread_id,parent_id, thread_pos, posted_on, level, author, subject, body) "
 //.'VALUES (?,?,?,?,?,?,?,?,?)';
 $st = $this->db->prepare($this->cc_mast_or_det);
 $st->execute(array(
null, $thread_id, $parent_id, $thread_pos, date('c'), $level
,$_REQUEST['author'], $_REQUEST['subject'],$_REQUEST['body']));
 // Commit all the operations
 $this->db->commit();
 $this->inTransaction = false;
 }
 
 
 
 
 
 
 
 protected function tbl() // crud2. D I S P L A Y H I E R A R C H Y
 { //print '<h2><a href="http://dev:8083/test/books/a01cookbook/tema.php">Teme (poruka-odgovor)</a></h2>';
 // provide a way to p o s t non-reply m s g e
 // IZBORNIK t b l - i c e :
 
 // t b l h d r r o w (action menu) :
 $lnk_addmaster = '<strong>'."<a class='btn' href='".$this->curpgurl
 ."?cmd=frm_post'>Otvoriti novu temu (nit, thread)</a>"
 .'</strong> ';
 print $lnk_addmaster;
 if ('1') print '&nbsp;&nbsp;&nbsp; Help = Klik Rbr.
 &nbsp;&nbsp;&nbsp;
 |...| = | bytes|idniti, rbruniti, nivo, id, idviši| '
 .'<hr/>';

 //order m s g s by their thread (thread_id) and their position within thread (thread_pos)
 $st = $this->db->query(
 "SELECT $this->idname, subject,author"
 .",LENGTH(body) body_length,posted_on,level,thread_id,thread_pos
 ,parent_id,url"
 ." FROM $this->table ORDER BY thread_id,thread_pos");
 
 
 while ($row = $st->fetch()) {
 
 $when = date('Y-m-d H:i', strtotime($row['posted_on']));
 
 // indent m s g e s with level > 0
 print '<font style="font-family: Courier;">'
 .str_repeat('&nbsp;',2 * $row['level']) .'</font>';

 // print info about m s g with
 // - link to open page eg http://dev1:8083/01apl/04tema/tema.php
 // - link to read it
 print
 // ----------- 1. thread_id (NIT) = ORD.NO :
 ( ($row['level'] == 0) // branch root
 ?
 //'<strong>'
 // Help (msg content report) = Klik Rbr :
 "<a href='" . $this->curpgurl
 . "?cmd=frm_rpt&amp;$this->idname={$row[$this->idname]}"
 ."'>"
 . '<span class="btnsmall">'
 .'<font style="color: black; font-family: Courier;">' 
 // background-color: red; 
 .str_repeat('&nbsp;', (6 - strlen($row['thread_id'])) )
 .$row['thread_id'] //.'</strong>'
 .'</font>'
 . '</span>'
 .'</a>'
 .'. ' 
 :
 // ----------- 2. thread_pos = ORD.NO IN THREAD - Help (msg content report) = Klik Rbr u niti :
 "<a href='" . $this->curpgurl
 . "?cmd=frm_rpt&amp;$this->idname={$row[$this->idname]}"
 ."'>"
 //.'&nbsp;&nbsp;'.$row['thread_pos'].'. ' .'</strong>'
 . '<span>'
 .'<font style="color: black; background-color: white; font-family: Courier;">' 
 .str_repeat('&nbsp;', (6 - strlen($row['thread_pos'])) )
 .$row['thread_pos'] //.'</strong>'
 .'</font>'
 . '</span>'
 .'</a>'
 .'. ' 
 
 
 )
 // Klik msg to open page :
 // eg http://dev1:8083/index.php?cmd=lsweb&dir=J:\awww\apl\dev1\test\01info
 ."<a href='" . htmlentities($row['url'],ENT_QUOTES)
 ."'>"
 . htmlentities($row['subject'],ENT_QUOTES)
 .'</strong>'
 . '</a> '
 . ' by '. htmlentities($row['author'],ENT_QUOTES) . ' @ '
 . htmlentities($when,ENT_QUOTES)
 ;
 // L I N K c m d = d e l r e c
 printf('<a href="%s?cmd=delrec&'.$this->idname.'=%s'
 //.'&'.'rrgo'.'=%s'
 .'">'.'%s</a>'
 , $this->curpgurl
 , $row[$this->idname]
 //, $pgrr1
 , '<font style="color: red;">'.' |'.'</font>'
 .'BRIŠI' // d e l e t e
 .'<font style="color: red;">'.'|'.'</font>'
 );
 print " {$row['body_length']} " // bytes|
 . " |PROMJ " // u p d a t e
 ;
if ('1') print "|{$row['thread_id']},{$row['thread_pos']},{$row['level']}
,{$row[$this->idname]},{$row['parent_id']}|";
print '<br/>';

 } // e n d p r i n t r o w s
 
 print '<hr/>'.$lnk_addmaster;
 } // e n d f n t b l ( )

 
 
 
 
 protected function frm_rpt() { // crud3. R O W REPORT (m s g b o d y...)
 // make sure the m s g e i d we are passed is an integer and really represents a m s g e 
 if (! isset($_REQUEST[$this->idname])) {
 throw new Exception('Nije formirana šifra poruke');
 }
 $id = intval($_REQUEST[$this->idname]);
 //"SELECT author,subject,body,posted_on FROM $this->table WHERE $this->idname = ?";
 $st = $this->db->prepare($this->cr_byid);
 $st->execute(array($id));
 $msg = $st->fetch();
 if (! $msg) {
 throw new Exception('Loša šifra poruke');
 }
 /* don't display user-entered HTML, but display newlines as
 HTML line breaks */
 $body = str_replace('{{/strong}}','</strong>',
 str_replace('{{strong}}','<strong>',
 nl2br(htmlentities($msg['body']))
 ));
 //
 while (false !== strpos($body, '{{url}}')) {
 $beg = strpos($body, '{{url}}');
 $end = strpos($body, '{{/url}}');
 $url = substr($body, $beg+7, $end - $beg -7);
 $url2 = '<a href="'.$url.'">'.$url.'</a>'; // </strong>
 $body = str_replace('{{url}}'.$url.'{{/url}}',$url2,$body);
 //$body .= '<br />'.$url2;
 }
 //
 // display m s g e with links to reply and return to the m s g e list
 $subject = htmlentities($msg['subject']);
 $author = htmlentities($msg['author']);
 // ---------------------------------------
 // h d r m e n u f r m _ v i e w - a
 // --------------------------------------
 print<<<_HTML_
 <h2>$subject</h2>
 <h3>
 by $author &nbsp; &nbsp;
 <a href="$this->curpgurl?cmd=frm_post&parent_id=$id">Odgovor</a>
 &nbsp; &nbsp; <a href="$this->curpgurl?cmd=tbl">Stablo poruka</a>
 </h3>
 <hr/>

 <p>$body</p>

_HTML_;
 } // tbl()

 
 
 
 
 
 protected function frm_post() // crud4. ENTER USER DATA & PROCESS IT
 {
 $safe = array();
 foreach (array('author','subject','body') as $field) {

 // escape input values :
 if (isset($_POST[$field])) {
 $safe[$field] = htmlentities($_POST[$field]);
 } else { $safe[$field] = ''; }

 // make err m s g s display in red :
 if (isset($this->form_errors[$field])) {
 $this->form_errors[$field] = '<span style="color: red">' .
 $this->form_errors[$field] . '</span><br/>';
 } else { $this->form_errors[$field] = ''; }
 } // e n d f o r e a c h


 // is this m s g e reply ?
 if (isset($_REQUEST['parent_id']) &&
 $parent_id = intval($_REQUEST['parent_id'])) {
 // send parent_id along when form is submitted
 $parent_field = sprintf(
 '<input type="hidden" 
 name="parent_id" 
 value="$this->idname" />'
 , $parent_id);
 // if no subject's been passed in, use parent's subject
 if (! strlen($safe['subject'])) {
 //"SELECT subject FROM $this->table WHERE $this->idname = ?";
 $st = $this->db->prepare($this->cr_byid_colname);
 $st->execute(array($parent_id));
 $parent_subject = $st->fetchColumn(0);
 /* prefix 'Re: ' to parent subject if it exists and
 doesn't already have 'Re:' */
 $safe['subject'] = htmlentities($parent_subject);
 if ( $parent_subject
 && (! preg_match('/^re:/i',$parent_subject)))
 { $safe['subject'] = "Re: {$safe['subject']}"; }
 }
 } else { $parent_field = ''; }


 // display posting form, with errors and default values
 print<<<_HTML_
 <form method="post" action="$this->curpgurl">
 <table>
 <tr>
 <td>Your Name:</td>
 <td>{$this->form_errors['author']}
 <input type="text" name="author" value="{$safe['author']}" />
 </td>
 <tr>
 <td>Subject:</td>
 <td>{$this->form_errors['subject']}
 <input type="text" name="subject" value="{$safe['subject']}" />
 </td>
 <tr>
 <td>Poruka:</td>
 <td>{$this->form_errors['body']}
 <textarea rows="4" cols="30" wrap="physical"
 name="body">{$safe['body']}</textarea>
 </td>
 <tr><td colspan="2"><input type="submit" value="Pošaljite poruku" /></td></tr>
 </table>
 $parent_field
 <input type="hidden" name="cmd" value="crerec" />
 </form>
_HTML_;
}



 // B A C K E N D - administrator actions :
 protected function delrec($parent_id) { // crud5 BACKEND D ELETE R OW
   //$parent_id = isset($_REQUEST[$this->idname]) ? intval($_REQUEST[$this->idname]) : 0;
  // $this->idval_url
  //basename(__FILE__).' SAYS'.'<br>'.'$id'.'=='.$parent_id.'=='
  if ('') $this->utl->phpjsmsg('***** '.__FUNCTION__.'() SAYS: ' 
   .'<br>'.'$dml=***'.$this->cdel_row_byid.'***<br>'.'?=$parent_id=***'
   .$parent_id.'***');
   // is this m s g e a reply?
   if ($parent_id) {
   // Make sure m s g e doesn't change while we're working with it.
   $this->db->beginTransaction();
   $this->inTransaction = true;
   //"DELETE FROM $this->table WHERE $this->idname=?"; //$values[]=$parent_id;
   $st = $this->db->prepare($this->cdel_row_byid);
   //or $this->db->get_con()->prepare ?
   $st->execute(array($parent_id));
   // fetchAll() is needed only for s e l e c t 
   //Commit all the operations
   $this->db->commit();
   $this->inTransaction = false;
   } 
 }

 
 
 
 



 // 5. makes sure something is entered in each field :
 protected function valid() {
   $this->form_errors = array();
   // R E Q U I R E D U S E R D A T A :
   if (! (isset($_POST['author']) && strlen(trim($_POST['author'])))) {
   $this->form_errors['author'] = 'Upišite vaše ime (autor).';
   }
   if (! (isset($_POST['subject']) && strlen(trim($_POST['subject'])))) {
   $this->form_errors['subject'] = 'Upišite naslov poruke.';
   }
   if (! (isset($_POST['body']) && strlen(trim($_POST['body'])))) {
   $this->form_errors['body'] = 'Upišite tekst poruke.';
   }
   return (count($this->form_errors) == 0);
 }

 // 6.
 protected function logAndDie(Exception $e) {
   print 'ERROR: ' . htmlentities($e->getMessage());
   if ($this->db && $this->db->inTransaction()) {
   $this->db->rollback();
   }
   exit();
 }
 
 
 
 
 
} // e n d c l a s s



/**
* Themes (threads) (msg-reply, task, menu) 
* Teme (niti) (poruka-odgovor, zadaæa, izbornik)
* PHP, Javascript, PDO SQLite3, selfjoin, 2015.12.7
*
* LICENCE: Free code example - if you use it, do not remove this:
* Slavko Srakoèiæ, Croatia, Zagreb
* see my blog http://phporacle.altervista.org
*
*
* 1. ADRESSES :
* J:\awww\apl\dev1\01apl\04tema\tema.php
* http://dev1:8083/01apl/04tema/tema.php
*
* 2. robocopy (or Git) SYNCHRONIZATION: 2 click this .bat script (or git)
* J:\awww\apl\dev1\01apl\04tema\1_sync_tema_sifrarnik_JtoH.bat
*
* 3. DDL: see CREATE TABLE message at this script end
*
* 4. Home page looks like :
* Open new thema (nit, thread) Help = Klik Ord.Nr
* |...| = |bytes| idniti, rbruniti, nivo, id, idviši |
* 1. MSGs self join sqlite3 THIS PG by ss @ 2015-03-25 01:41 |DELETE| 1900 |UPDATE |1,0,0 ,1,0|
*     1. funkcije by ss @ 2015-03-25 01:42 |DEL| 1654 |UPD|1,1,1 ,2,1|
*          2. Re: funkcije by ss @ 2015-03-26 14:31 |DEL| 14 |UPD|1,2,2 ,18,2|
*     3. funkcija save() by ss @ 2015-03-25 01:52 |DEL| 1296 |UPD|1,3,2 ,3,2|
* ...
* 2. Z-WAMP menu by aa @ 2015-12-05 15:58 |DELE| 14 |UPD |3,0,0 ,25,0|
*
*
* 5. PHP CREATED JAVASCRIPT MSG & YES-NO DIALOGS :
* $this->utl->phpjsmsg(7 parameters), phpjsmsgyn() 
* 6. F U N C T I O N S IN THIS SCRIPT
*LINE FUNCTION WHAT (HOW) IS DOING 
*89: public __construct() { // INITIALIZE (B O O T S T R A P I N G)
*151: public ctr() { // M A N A G E (R O U T I N G)
*192: protected crerec() { // crud1. FRONTEND A D D SELFJOIN ROW
*257: protected tbl() { // crud2. D I S P L A Y HIERARCHY
*363: protected frm_rpt() { // crud3. R O W REPORT (m s g b o d y...)
*417: protected frm_post() // crud4. ENTER USER DATA & PROCESS IT
*491: protected delrec() { // crud5 BACKEND D E L E T E R O W
*522: protected valid() {
*538: protected logAndDie(Exception $e) {
*
*/




// <strong><a href="http://...">http://...</a></strong>
// if (false !== strpos($string, $substring)) { /* found it! */ }
// if (strpos($haystack, $needle) !== false) echo 'match!';
// $withoutCommas = is_numeric(str_replace(',', '', $number));

/*
ALTER TABLE message RENAME TO sqlitestudio_temp_table;

CREATE TABLE message (
 id INTEGER PRIMARY KEY AUTOINCREMENT,
 subject CHAR (255),
 url VARCHAR (500),
 thread_id [INT UNSIGNED] NOT NULL,
 thread_pos [INT UNSIGNED] NOT NULL,
 level [INT UNSIGNED] NOT NULL,
 parent_id [INT UNSIGNED] NOT NULL,
 author CHAR (255),
 body MEDIUMTEXT,
 posted_on DATETIME NOT NULL
);

INSERT INTO message (
id
,subject
,url
,thread_id
,thread_pos
,level
,parent_id
,author
,body
,posted_on
)
SELECT
id
,subject
,url
,thread_id
,thread_pos
,level
,parent_id
,author
,body
,posted_on
FROM sqlitestudio_temp_table;

DROP TABLE sqlitestudio_temp_table;




 TO INCLUDE RESULTS OF EXECUTING FN OR EXPRESSION WITHIN A STRING
 You can put vars, obj.prop, array el. (if subscript is unquoted) directly in double-quoted strings:

 eg print "You owe $amounts[payment] immediately.";
 eg print "My circle's diameter is $circle->diameter inches.";

 Curly braces around more complicated expressions to interpolate them into a string:

 print "I have {$children} children.";
 print "You owe {$amounts['payment']} immediately.";
 print "My circle's diameter is {$circle->getDiameter()} inches.";

 Direct interpolation or string concat. also works with heredocs:
 print <<< END
 Right now, the time is
 END
 . strftime('%c') . <<< END
 but tomorrow it will be
END
 . strftime('%c',time() + 86400);

 
 {{url}} http://dev1:8083/my_dev/pdo/tema/tema.php {{/url}}
 J:\awww\apl\dev1\my_dev\pdo\tema\tema.php
 J:\dev_web\htdocs\test\books\a01cookbook\tema.php


Promjene podataka programom J:\aplp\aplp\sqlitestudio\SQLiteStudio.exe

SELFJOIN TABLE :
 1. C INSERT frm data,
 2. R DISPLAY tbl, row,
 3. V VALIDATE, E set_exception_handler
Not neccessarily here:
U UPDATE and D DELETE WITH J:\aplp\aplp\sqlitestudio\SQLiteStudio.exe

*/