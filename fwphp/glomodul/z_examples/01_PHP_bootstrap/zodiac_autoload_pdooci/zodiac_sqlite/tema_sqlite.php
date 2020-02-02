<?php
$board = new MessageBoard();
$board->ctr();


class MessageBoard 
{
    protected $db;
    protected $form_errors = array();
    protected $inTransaction = false;
    //
    public function __construct() {
        set_exception_handler(array($this,'logAndDie'));
        $this->db = new PDO('sqlite:tema.sqlite');
        $this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }
    //
    public function ctr() {
        // The value of $_REQUEST['cmd'] tells us what to do
        $cmd = isset($_REQUEST['cmd']) ? $_REQUEST['cmd'] : 'tbl';
        switch ($cmd) {
            case 'frm_view':          // read an individual m s g e
              $this->frm_view();
              break;
            case 'frm_post':          // display form to post  m s g
              $this->frm_post();
              break;
            case 'save':            //  insert - save posted  m s g e
              if ($this->valid()) { // if m s g e is valid,
                  $this->save();    // then save it
                  $this->tbl();    // and display  m s g e list
              } else {
                  $this->frm_post();    // otherwise, redisplay the posting form
              }
              break;
            case 'tbl':          // show a m s g e list 
            default:
              $this->tbl();
              break;
        }
    }
    
    
    
    
    
    
    // ***********************************
    // 1. save  m s g  to  d b
    // ***********************************
    protected function save() {
        $parent_id = isset($_REQUEST['parent_id']) ?
                     intval($_REQUEST['parent_id']) : 0;
        // Make sure m s g e doesn't change while we're working with it.
        $this->db->beginTransaction();
        $this->inTransaction = true;
        // is this m s g e a reply?
        if ($parent_id) {
            // get the thread, level, and thread_pos of the parent m s g e
            $st = $this->db->prepare("SELECT thread_id,level,thread_pos
                                FROM message WHERE id = ?");
            $st->execute(array($parent_id));
            $parent = $st->fetch();
            // a reply's level is one greater than its parent's
            $level = $parent['level'] + 1;
            /* what's the biggest thread_pos in this thread among m s g e s
            with the same parent? */
            $st = $this->db->prepare('SELECT MAX(thread_pos) FROM message
                    WHERE thread_id = ? AND parent_id = ?');
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
            /* increment the thread_pos of all m s g e s in the thread that
         come after this one */
            $st = $this->db->prepare('UPDATE message SET thread_pos = thread_pos
                                  + 1 WHERE thread_id = ? AND thread_pos >= ?');
            $st->execute(array($parent['thread_id'], $thread_pos));
            // the new m s g e should be saved with the parent's thread_id
            $thread_id = $parent['thread_id'];
        } else {
            // m s g e is not reply, so it's the s t a r t of new t h r e a d
            $thread_id = $this->db->query('SELECT MAX(thread_id) + 1 FROM
                              message')->fetchColumn(0);
            // If there are no rows yet, make sure we s t a r t at 1 for thread_id
            if (! $thread_id) {
                $thread_id = 1;
            }
            $level = 0;
            $thread_pos = 0;
        }
        /* i n s e r t the m s g e into DB. Using prepare() and execute()
        makes sure that all fields are properly quoted */
        $st = $this->db->prepare("INSERT INTO message (id,thread_id,parent_id,
                       thread_pos,posted_on,level,author,subject,body)
                       VALUES (?,?,?,?,?,?,?,?,?)");
        $st->execute(array(null,$thread_id,$parent_id,$thread_pos,
                           date('c'),$level,$_REQUEST['author'],
                           $_REQUEST['subject'],$_REQUEST['body']));
        // Commit all the operations
        $this->db->commit();
        $this->inTransaction = false;
    }
    //
    // ***********************************
    // 2. d i s p l a y  all  m s g s
    // ***********************************
    /*  TO INCLUDE RESULTS OF EXECUTING FN OR EXPRESSION WITHIN A STRING
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
    */
    protected function tbl() {
        print '<h2><a href="http://dev:8083/test/books/a01cookbook/tema.php">Teme (poruke i odgovori)</a></h2>';
        // provide a way to p o s t  non-reply m s g e
        // IZBORNIK t b l - i c e :
        print '<strong>'."<a href='" . htmlentities($_SERVER['PHP_SELF']) .
           "?cmd=frm_post'>Otvoriti novu temu (nit, thread)</a>".'</strong>'
           .'<hr/>';
        //      
        /* order the m s g e s by their thread (thread_id) and their position
        within the thread (thread_pos) */
        $st = $this->db->query("SELECT id, subject,author"
           .",LENGTH(body) AS body_length,posted_on,level,thread_id"
           ." FROM message ORDER BY thread_id,thread_pos");
        while ($row = $st->fetch()) {
            // indent m s g e s with level > 0
            print str_repeat('&nbsp;',4 * $row['level']);
            
            // print info about  m s g e with  link to read it
            $when = date('Y-m-d H:i', strtotime($row['posted_on']));
            print "<a href='" . htmlentities($_SERVER['PHP_SELF']) .
            "?cmd=frm_view&amp;id={$row['id']}'>" 
            
            . (($row['level'] == 0) ? "<strong>".$row['thread_id'].'. ' : '')
            . htmlentities($row['subject']) . '</a> ' 
            . (($row['level'] == 0) ? '</strong>' : '') 
            
            . ' by '. htmlentities($row['author']) . ' @ ' .
            htmlentities($when)." ({$row['body_length']} bytes) <br/>";
        }

    }
    //
    // ***********************************
    // 3. d i s p l a y individual  m s g
    // ***********************************
    public function frm_view() {
        /* make sure the m s g e id we're passed is an integer and really
        represents a m s g e */
        if (! isset($_REQUEST['id'])) {
            throw new Exception('Nije formirana šifra poruke');
        }
        $id = intval($_REQUEST['id']);
        $st = $this->db->prepare("SELECT author,subject,body,posted_on
                                 FROM message WHERE id = ?");
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
// <strong><a href="http://...">http://...</a></strong>
// if (false !== strpos($string, $substring)) { /* found it! */ }
// if (strpos($haystack, $needle) !== false) echo 'match!';
// $withoutCommas = is_numeric(str_replace(',', '', $number));
        // display m s g e with links to reply and return to the m s g e list
        $self = htmlentities($_SERVER['PHP_SELF']);
        $subject = htmlentities($msg['subject']);
        $author = htmlentities($msg['author']);
        // ---------------------------------------
        // h d r  m e n u  f r m _ v i e w - a
        // --------------------------------------
        print<<<_HTML_
         <h2>$subject</h2>
         <h3>
            by $author &nbsp; &nbsp;  
            <a href="$self?cmd=frm_post&parent_id=$id">Odgovor</a>
            &nbsp; &nbsp; <a href="$self?cmd=tbl">Stablo poruka</a>
         </h3>
         <hr/>
         
         <p>$body</p>
         
_HTML_;
    }
    //
    //
    // *************************************************
    // 4. d i s p l a y  f o r m  for posting   m s g 
    // *************************************************
    public function frm_post() 
    {
        $safe =  array();
        foreach (array('author','subject','body') as $field) {
        
            // escape input values :
            if (isset($_POST[$field])) {
                $safe[$field] = htmlentities($_POST[$field]);
            } else { $safe[$field] = ''; }
        
            // make err  m s g s  display in red :
            if (isset($this->form_errors[$field])) {
                $this->form_errors[$field] = '<span style="color: red">' .
                   $this->form_errors[$field] . '</span><br/>';
            } else { $this->form_errors[$field] = ''; }
        } // e n d  f o r e a c h 
        
        
        // is this m s g e  reply ?
        if (isset($_REQUEST['parent_id']) &&
        $parent_id = intval($_REQUEST['parent_id'])) {
        // send parent_id along when form is submitted
        $parent_field =
            sprintf('<input type="hidden" name="parent_id" value="%d" />',
                    $parent_id);
        // if no subject's been passed in, use parent's subject
        if (! strlen($safe['subject'])) {
             $st = $this->db->prepare('SELECT subject FROM message WHERE
                          id = ?');
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
    $self = htmlentities($_SERVER['PHP_SELF']);
    print<<<_HTML_
      <form method="post" action="$self">
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
      <input type="hidden" name="cmd" value="save" />
      </form>
_HTML_;
   }

    
    
    
    
    
    // validate() makes sure something is entered in each field
    public function valid() {
        $this->form_errors = array();
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


    public function logAndDie(Exception $e) {
        print 'ERROR: ' . htmlentities($e->getMessage());
        if ($this->db && $this->db->inTransaction()) {
            $this->db->rollback();
        }
        exit();
    }
}

/*
  2015.06.22
  {{url}} http://dev1:8083/my_dev/pdo/tema/tema.php {{/url}}
  J:\awww\apl\dev1\my_dev\pdo\tema\tema.php
  J:\dev_web\htdocs\test\books\a01cookbook\tema.php

sqlite db: J:\dev_web\htdocs\test\books\a01cookbook\tema.sqlite

{{strong}}CREATE, VALIDATE, VIEW SELFJOIN TABLE{{/strong}} 

Promjene podataka programom J:\aplp\aplp\sqlitestudio\SQLiteStudio.exe

SELFJOIN TABLE :
   1. C INSERT frm data, 
   2. R DISPLAY tbl, row, 
   3. V VALIDATE, E set_exception_handler 
Not neccessarily here:
U UPDATE and D DELETE WITH J:\aplp\aplp\sqlitestudio\SQLiteStudio.exe

TEME (msgs-PORUKE I replays-ODGOVORI) SELFJOIN
----------------------------------------------------------------
5 KEYS: id,thread_id,parent_id,level,thread_pos
----------------------------------------------------------------
1 1 0 0 0   TEMA1 (thread1) by ss @ 2015-03-25 00:41 (99 bytes)
2 1 1 1 1     funkcije by ss @ 2015-03-25 00:42 (242 bytes)
3 1 2 2 2       funkcija save() by ss @ 2015-03-25 00:52 (1335 bytes)
6 1 2 2 3       funkcija frm_post() by ss @ 2015-03-25 19:29 (303 bytes) 

4 2 0 0 0   TEMA2 CRUD šifrarnika sqlite3 by ss ...

5 3 0 0 0   TEMA3 MAPE web servera by ss ...
______________________________________________________________
Otvoriti novu temu (nit, thread)
*/
