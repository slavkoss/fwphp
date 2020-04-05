<?php
//J:\awww\apl\dev1\04knjige\kalendar\kal\inc\home.php
//declare(strict_types=1); // php 7
/**
 *    MAIN C O N T R O L L E R  (T A B L E  C R U D)
 */
class Home extends Dbkoncls
{
    /**
     * $_from_ymd from which the calendar should be built
     * string in format YYYY-MM-DD HH:MM:SS ee 'Y-m-d H:i:s'
     * @var string the date to use for the calendar
     */
    private $_from_ymd;
    /**
     * $_m1 month for which the calendar is being built
     * @var int the month being used
     */
    private $_m1;

    /**
     * $_y1 The year from which the month's start day is selected
     * @var int the year being used
     */
    private $_y1;

    /**
     * $_daysInMonth number of days in the month being used
     * @var int the number of days in the month
     */
    private $_daysInMonth;

    /**
     * $_startDay index of the day of the week the month starts on (0-6)
     * @var int the day of the week the month starts on
     */
    private $_startDay;




   /**
     * Creates a database object and stores relevant data
     *
     * Upon instantiation, this class accepts a database object
     * that, if not null, is stored in the object's private $_db
     * property. If null, a new PDO object is created and stored
     * instead.
     *
     * Additional info is gathered and stored in this method,
     * including the month from which the calendar is to be built,
     * how many days are in said month, what day the month starts
     * on, and what day it is currently.
     *
     * @param object $db a database object
     * @param string $useDate the date to use to build the calendar
     * @return void
     */
    //public function __construct($db=NULL, $p_from_ymd=NULL)
    public function __construct($p_from_ymd=NULL)
    {
        // Call parent constructor to get or create db object
        parent::__construct(); //parent::__construct($db);

        if ( isset($p_from_ymd) ) { $this->_from_ymd = $p_from_ymd;
        } else { $this->_from_ymd = date('Y-m-d H:i:s'); }

        $ts = strtotime($this->_from_ymd); //timestamp from string
        $this->_m1 = (int)date('m', $ts);
        $this->_y1 = (int)date('Y', $ts);

        /*
         * Determine how many days are in the month
         */
        $this->_daysInMonth = cal_days_in_month(
                CAL_GREGORIAN,
                $this->_m1,
                $this->_y1
            );

        /*
         * Determine what weekday the month starts on
         */
        $ts = mktime(0, 0, 0, $this->_m1, 1, $this->_y1);
        $this->_m1week1d1 = date('w', $ts);
    }


    /**
     * Generates markup to display administrative links
     * @return string markup to display the administrative links
     */
    private function _DisplayLinks()
    {
        // IF USER IS LOGGED IN, DISPLAY ADMIN CONTROLS
        //      = R O W  C R E A T E  L I N K S
        if ( isset($_SESSION['user']) )
        {
          //return ADMIN_OPTIONS <form action="inc/router.php" method="post">  PATHMODUL_REL
          ?>
          <form action="?odjava" method="post">
              <div>
                  <!--a href="<=PATHMODUL_REL>/?i=cre_upd" class="admin"-->
                  <a href="?loadscript/cre_upd" class="admin">
                     <span style="color:green; background:yellow;">+</span> Unos retka</a>
                  
                  <a href="?loadscript/help" class="admin">Help</a>

                  <input type="hidden" name="token" value="<?=$_SESSION['token']?>" />
                  <input type="hidden" name="action" value="logout" />

                  <input type="submit" value="Odjava" class="logout" />
              </div>
          </form>
          <?php //ADMIN_OPTIONS;  font-size:1.4em;
          // e n d  a d m i n  l i n k s <a href="user_login_frm.php">Prijava</a>
        } else { //return    PATHMODUL_REL  /?i=user_login_frm">Prijava</a>
        ?>
          <a href="?loadscript/user_login_frm">Prijava</a>
<?php //ADMIN_OPTIONS;
        } 
    } // e n d  f n


    /**
     * Confirms that an event should be deleted and does so
     *
     * Upon clicking the button to delete an event, this
     * generates a confirmation box. If the user confirms,
     * this deletes the event from the database and sends the
     * user back out to the main calendar view. If the user
     * decides not to delete the event, they're sent back to
     * the main calendar view without deleting anything.
     *
     * @param int $id the event ID
     * @return mixed the form if confirming, void or error if deleting
     */
    public function rowDelFrm($id)
    {
        if ( empty($id) ) { return NULL; }
        // Make sure the ID is an integer
        $id = preg_replace('/[^0-9]/', '', $id);

        /*
         * If the confirmation form was submitted and the form
         * has a valid token, check the form submission
         */
        if ( isset($_POST['rdel'])
                and $_POST['token']==$_SESSION['token'] )
        {
            // If deletion is confirmed, remove r o w  from t b l
            if ( $_POST['rdel']=="OBRISATI" )
            {
              $sql="DELETE FROM `events` WHERE `event_id`=:id LIMIT 1";
                try
                {
                    $stmt = $this->db->prepare($sql);
                    $stmt->bindParam(
                          ":id",
                          $id,
                          PDO::PARAM_INT
                        );
                    $stmt->execute();
                    $stmt->closeCursor();
                    echo '<h2>header(...2</h2>'; //header('Location: ./');
                    return;
                }
                catch ( Exception $e )
                { return $e->getMessage(); }
          }

          // If not confirmed, send user to main view
          else {
            echo '<h2>header(...3</h2>'; //header('Location: ./');
            return;
          }
        }

        /*
         * If the confirmation form hasn't been submitted, display it
         */
        $event = $this->_loadRowById($id);
        // If no object is returned, return to the main view
        if ( !is_object($event) ) {
           echo '<h2>header(...4</h2>'; //header('Location: ./');
           }

        //return CONFIRM_DELETE ?>
<form action="del.php" method="post">
    <h2>
        Obrisati "<?=$event->title?>" ?
    </h2>
    <p>Ovo brisanje <strong>NE MOŽETE PONIŠTITI !</strong></p>
    <p>
        <input type="submit" name="rdel" value="OBRISATI" />
        <input type="submit" name="rdel" value="ODUSTATI" />
        <input type="hidden" name="event_id" value="<?=$event->id?>" />
        <input type="hidden" name="token" value="<?=$_SESSION[token]?>" />
    </p>
</form>
<?php //CONFIRM_DELETE;
    }

    /**
     * Validates a date string
     *
     * @param string $date the date string to validate
     * @return bool TRUE on success, FALSE on failure
     */
    private function _valid($date)
    {
        /*
         * Define a regex pattern to check the date format
         */
        $pattern = '/^(\d{4}(-\d{2}){2} (\d{2})(:\d{2}){2})$/';

        /*
         * If a match is found, return TRUE. FALSE otherwise.
         */
        return preg_match($pattern, $date)==1 ? TRUE : FALSE;
    }

    /**
     * Loads event(s) info into an array
     *
     * @param int $id an optional event ID to filter results
     * @return array an array of events from the database
     */
    private function _loadRows($id=NULL)
    {
        $sql = "SELECT
                    `event_id`, `event_title`, `event_summary`, `event_desc`,
                    `event_start`, `event_end`
                FROM `events`";

        /*
         * If an event ID is supplied, add a WHERE clause
         * so only that event is returned
         */
        if ( !empty($id) )
        {
            $sql .= "WHERE `event_id`=:id LIMIT 1";
        }

        /*
         * Otherwise, load all events for the month in use
         */
        else
        {
            /*
             * Find the first and last days of the month
             */
            $start_ts = mktime(0, 0, 0, $this->_m1, 1, $this->_y1);
            $end_ts = mktime(23, 59, 59, $this->_m1+1, 0, $this->_y1);
            $start_date = date('Y-m-d H:i:s', $start_ts);
            $end_date = date('Y-m-d H:i:s', $end_ts);

            /*
             * Filter events to only those happening in the
             * currently selected month
             */
            $sql .= "WHERE `event_start`
                        BETWEEN '$start_date'
                        AND '$end_date'
                    ORDER BY `event_start`";
        }

        try
        {
            $stmt = $this->db->prepare($sql);

            /*
             * Bind the parameter if an ID was passed
             */
            if ( !empty($id) )
            {
                $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            }

            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();

            return $results;
        }
        catch ( Exception $e )
        {
            die ( $e->getMessage() );
        }
    }


    /**
     * Loads all  r o w s  for the month into an array
     * @return array r o w s
     */
    private function _loadRowsOrganize()
    {
        // Load events array
        $rows = $this->_loadRows();
        // organize r o w s by month day on which they occur
        $rows2 = array();
        foreach ( $rows as $row ) {
            $day = date('j', strtotime($row['event_start']));
            try
            { $rows2[$day][] = new MsgCls($row); }
            catch ( Exception $e )
            {   die ( $e->getMessage() ); }
        }
        return $rows2;
    }


    /**
     * Returns a single r o w object
     *
     * @param int $id an r o w ID
     * @return object the r o w object
     */
    private function _loadRowById($id)
    {
        if ( empty($id) ) { return NULL; }
        // Load  r o w
        $event = $this->_loadRows($id);
        // Return  r o w  object
        if ( isset($event[0]) ) {return new MsgCls($event[0]);}
        else { return NULL; }
    }


    /**
     * Returns HTML markup to display the calendar and events
     *
     * Using the information stored in class properties, the
     * events for the given month are loaded, the calendar is
     * generated, and the whole thing is returned as valid markup.
     *
     * @return string the calendar HTML markup
     */
    public function outMonth()
    {
        /*
         * Determine the calendar month and create an array of
         * weekday abbreviations to label the calendar columns
         */
        $cal_month = date('F Y', strtotime($this->_from_ymd));
        $cal_id = date('Y-m', strtotime($this->_from_ymd));

                  if ('1') {  //if ($module_arr['dbg']) {
                    echo '<h2>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: '.'B E G I N </h2>' ; 
                  echo '<pre>';
                  echo '<b>$_daysInMonth</b>='; print_r($this->_daysInMonth); 
                  echo '<br /><b>$_m1week1d1</b>='; print_r($this->_m1week1d1); 
                  echo '<br /><b>$_m1       </b>='; print_r($this->_m1       ); 
                  echo '<br /><b>$_y1       </b>='; print_r($this->_y1       ); 
                  //echo '<b>URLMODUL_CSS</b>='; print_r(URLMODUL_CSS); 
                  //echo '<b>$this->ctrakcpar_arr</b>='; print_r($this->ctrakcpar_arr); 
                  echo '</pre><br />'; 
                  //echo '<br /><span style="color: violet; font-size: large; font-weight: bold;">Loading script of cls $nsclsname='.$nsclsname.'</span>'
                  }

        $WEEKDAYS = array('Nedjelja', 'Mon', 'Utorak', 'Wed', 'Četvrtak', 'Fri', 'Subota');
        //define('WEEKDAYS', array('Nedjelja', 'Mon', 'Utorak', 'Wed', 'Četvrtak', 'Fri', 'Subota')); // php 7

        /*
         * Add a header to the calendar markup
         */
        $html = "\n\t<h2 id=\"month-$cal_id\">$cal_month</h2>";
        for ( $d=0, $labels=NULL; $d<7; ++$d )
        {
            $labels .= "\n\t\t<li>" . $WEEKDAYS[$d] . "</li>";
            //$labels .= "\n\t\t<li>" . WEEKDAYS[$d] . "</li>"; // php 7
        }
        $html .= "\n\t<ul class=\"weekdays\">"
            . $labels . "\n\t</ul>";

        $events = $this->_loadRowsOrganize();

         // Create  t a b l e  markup
        $html .= "\n\t<ul>"; // Start a new unordered list
        for ( $i=1, $c=1, $t=date('j'), $m=date('m'), $y=date('Y');
                $c<=$this->_daysInMonth; ++$i )
        {
            /*
             * Apply a "fill" class to the boxes occurring before
             * the first of the month
             */
            $class = $i<=$this->_m1week1d1 ? "fill" : NULL;

            /*
             * Add a "today" class if the current date matches
             * the current date
             */
            if ( $c==$t && $m==$this->_m1 && $y==$this->_y1 )
            {
                $class = "today";
            }

            /*
             * Build the opening and closing list item tags
             */
            $ls = sprintf("\n\t\t<li class=\"%s\">", $class);
            $le = "\n\t\t</li>";
            $event_info = NULL;

            /*
             * Add the day of the month to identify the calendar box
             */
            if ( $this->_m1week1d1<$i && $this->_daysInMonth>=$c)
            {
                /*
                 * Format events data
                 */
                if ( isset($events[$c]) )
                {
                    foreach ( $events[$c] as $event )
                    {
              //$link='<a href="'.PATHMODUL_REL.'?i=read&event_id='.$event->id.'">'. $event->title.'</a>';
              $link='<a href=?loadscript/read/event_id/'.$event->id.'">'. $event->title.'</a>';
                        $event_info .= "\n\t\t\t$link";
                    }
                }

                $date = sprintf("\n\t\t\t<strong>%02d</strong>",$c++);
            }
            else { $date="&nbsp;"; }

            /*
             * If the current day is a Saturday, wrap to the next row
             */
            $wrap = $i!=0 && $i%7==0 ? "\n\t</ul>\n\t<ul>" : NULL;

            /*
             * Assemble the pieces into a finished item
             */
            $html .= $ls . $date . $event_info . $le . $wrap;
        }

        /*
         * Add filler to finish out the last week
         */
        while ( $i%7!=1 )
        {
            $html .= "\n\t\t<li class=\"fill\">&nbsp;</li>";
            ++$i;
        }

        // Close final unordered list
        $html .= "\n\t</ul>\n\n";
        // If logged in or not , display admin R o w C r e a t e links
        $admin = $this->_DisplayLinks();
        // Return markup for output
        return $admin. ' '.$html;
    }

    /**
     * Displays  r o w
     * @param int $id the r o w  ID
     * @return string basic markup to display  r o w
     */
    public function rowRead($id)
    {
        if ( empty($id) ) { return NULL; }
        // Make sure the ID is an integer
        $id = preg_replace('/[^0-9]/', '', $id);
        $event = $this->_loadRowById($id);
        // Generate strings for the date, start, and end time
        $ts = strtotime($event->start);
        $date = date('F d, Y', $ts);
        $start = date('g:ia', $ts);
        $end = date('g:ia', strtotime($event->end));
        // Load admin options (links) if the user is logged in
        $adminlinks = $this->_adminRowRUDLinks($id);
        // Generate and return markup (html)
        return "$adminlinks <h2>$event->title</h2>"
            . "\n\t<p class=\"dates\">$date, $start&mdash;$end</p>"
            . "\n\t<p>$event->description</p>";
    }

    /**
     * Generates a FORM TO EDIT OR CREATE  R O W S
     *
     * @return string the HTML markup for the editing form
     */
    public function RowCUfrm()
    {
        if ( isset($_POST['event_id']) )
        { // Force integer type to sanitize data
          $id = (int)$_POST['event_id'];
        } else { $id = NULL; }

        $submit = "Spremi novi redak"; // submit button text

        // If no ID is passed, start with an empty event object.
        $event = new MsgCls();
        // Otherwise load  r o w  associated to ID
        if ( !empty($id)) {
            $event = $this->_loadRowById($id);
            //If no object is returned, return NULL
            if ( !is_object($event) ) { return NULL; }
            $submit = "Spremi promjene retka";
        }

        // Build markup    <form action="inc/router.php" method="post">
        //return FORM_MARKUP /?l oginusr  ?>
    <!--form action="<=PATHMODUL_REL>/" method="post"-->
    <form action="?creupdmsg" method="post">
      <fieldset>
      <!--legend>$submit</legend-->
      <input type="submit" name="event_submit" value="<?=$submit?>" /> ili <a href="./">Odustati</a>

      <label for="event_title">Naslov</label>
      <input type="text" name="event_title" id="event_title" value="<?=$event->title?>" />

      <label for="event_summary">Sažetak</label>
      <input type="text" name="event_summary" id="event_summary" value="<?=$event->summary?>" />

      <label for="event_start">Početak gggg-mm-dd hh:mm:ss, npr 2018-12-17 15:01:01</label>
      <input type="text" name="event_start" id="event_start" value="<?=$event->start?>" />

      <label for="event_end">Završetak gggg-mm-dd hh:mm:ss</label>
      <input type="text" name="event_end" id="event_end" value="<?=$event->end?>" />

      <label for="event_description">Opis</label>
      <textarea name="event_description" id="event_description"><?=$event->description?></textarea>

        <input type="hidden" name="event_id" value="<?=$event->id?>" />
        <input type="hidden" name="token" value="<?=$_SESSION['token']?>" />
        <input type="hidden" name="action" value="creupdmsg" />
      </fieldset>
    </form>
<?php //FORM_MARKUP;
    }

    /**
     * Validates the form and saves/edits the event
     *
     * @return mixed TRUE on success, an error message on failure
     */
    public function processRowCUfrm()
    {
      //         C R E  O R  U P D  R O W
        if ( $_POST['action'] != 'creupdmsg' )
           {return "Nepoznata akcija {$_POST['action']}";}
 
        // Escape data from the form
        $title   = htmlentities($_POST['event_title'], ENT_QUOTES);
        $summary = htmlentities($_POST['event_summary'], ENT_QUOTES);
        $desc    = htmlentities($_POST['event_description'], ENT_QUOTES);
        $start   = htmlentities($_POST['event_start'], ENT_QUOTES);
        $end     = htmlentities($_POST['event_end'], ENT_QUOTES);
        /*
         * If the start or end dates aren't in a valid format, exit
         * the script with an error
         */
        if ( !$this->_valid($start) or !$this->_valid($end) )
        {return "Invalid format datuma! Upišite gggg-mm-dd hh:mm:ss";}
        /*
         * If no r o w ID passed, create a new r o w
         */
        if ( empty($_POST['event_id']) )
        {
            $id = 'insnewrow';
            $sql = "INSERT INTO `events`
                        (`event_title`, `event_summary`, `event_desc`, `event_start`,
                            `event_end`)
                    VALUES (:title, :summary, :description, :start, :end)";
        }
        /*
         * Update the event if it's being edited
         */
        else
        {
            /*
             * Cast the event ID as an integer for security
             */
            $id = (int)$_POST['event_id'];
            $sql = "UPDATE `events`
                    SET
                        `event_title`  =:title,
                        `event_summary`=:summary,
                        `event_desc`   =:description,
                        `event_start`  =:start,
                        `event_end`    =:end
                    WHERE `event_id`   =$id";
        }
        /*
         * Execute the create or edit query after binding the data
         */
        try
        {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":title",       $title, PDO::PARAM_STR);
            $stmt->bindParam(":summary",     $summary, PDO::PARAM_STR);
            $stmt->bindParam(":description", $desc, PDO::PARAM_STR);
            $stmt->bindParam(":start",       $start, PDO::PARAM_STR);
            $stmt->bindParam(":end",         $end, PDO::PARAM_STR);
            $stmt->execute();
            $stmt->closeCursor();

            /*
             * Returns the ID of the event
             */
            if ($id == 'insnewrow') return 'Šifra novog retka='.$this->db->lastInsertId(); else return 'Šifra promjenjenog retka='.$id;
        }
        catch ( Exception $e )
        {
            return $e->getMessage();
        }
    }


    /**
     * Generates edit and delete options for a given event ID
     *
     * @param int $id the event ID to generate options for
     * @return string the markup for the edit/delete options
     */
    private function _adminRowRUDLinks($id)
    {
        // R O W  R e a d, U p d, D e l  L I N K S  <form action="cre_upd.php" method="post">
        if ( isset($_SESSION['user']) )
        {
            //return ADMIN_OPTIONS ?>
          <div class="admin-options">
            <form action="<?=PATHMODUL_REL?>/?i=cre_upd" method="post">
              <p>
                <input type="submit" name="rfrm" value="Promjeniti" />
                <input type="hidden" name="event_id" value="<?=$id?>" />
              </p>
            </form>


            <form action="del.php" method="post">
              <p>
                <input type="submit" name="rdel" value="OBRISATI" />
                <input type="hidden" name="event_id" value="<?=$id?>" />
                <input type="hidden" name="token" value="<?=$_SESSION['token']?>" />
              </p>
            </form>
          </div><!-- end admin-options -->
<?php //ADMIN_OPTIONS;
        } else { return NULL; }
    } // e n d  f n
/**
 * J:\awww\www\fwphp\glomodul4\user_post_kalendar_fmb\kalendar\inc\home.php (12 hits)
 * Line 59:     public f unction __construct($db=NULL, $p_from_ymd=NULL)

 * Line 100:     public f unction rowDelFrm($id)

 * Line 166:     private f unction _valid($date)

 * Line 185:     private f unction _loadRows($id=NULL)
 * Line 253:     private f unction _loadRowsOrganize()
 * Line 276:     private f unction _loadRowById($id)

 * Line 296:     public f unction outMonth()

 * Line 406:     public f unction rowRead($id)
 * Line 430:     public f unction row Cre Upd()

 * Line 480:     public f unction process Form()

 * Line 554:     private f unction _DisplayLinks()
 * Line 584:     private f unction _adminRowRUDLinks($id)
 */
} // e n d  c l a s s  C a l e n d a r

?>