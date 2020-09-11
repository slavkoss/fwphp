<?php
/** 
* J:\awww\www\fwphp\glomodul\mkd\z_Mkd_OOP_NOT_NEEDED.php
*    ALSO FRAMEWORK IS NOT NEEDED
*
*/
namespace B12phpfw ;

class z_Mkd_OOP_NOT_NEEDED // or Config_mkd extends Config_allsites or Home_C extends Controller...
{
  public
      $keywords   = 'OOP, MVC, PHP, framework, flatfiles CMS, markdown, HTML'
    , $readme_showhtml_path, $readme_edit_path
    , $wsroot_path, $wsroot_url
    , $md_fle_url
    , $data = []
    , $modulglo_rel_path
    , $helpsw_url
    , $zbig_url
  ;



  public function __construct($module_towsroot)
  {
    $dir = __DIR__ ;

    $this->wsroot_path = $wsroot_path = str_replace('\\','/', realpath($module_towsroot)).'/' ; 
    $modul_rel_path = rtrim(ltrim(str_replace('\\','/', __DIR__ .'/'), $wsroot_path),'/') ;

    $this->readme_edit_path = "?edit={$wsroot_path}readme.md" ; 
    $this->readme_showhtml_path = "?showhtml={$wsroot_path}readme.md" ; 

    //http://dev1:8083/, http://sspc1:8083/
    $this->wsroot_url = $wsroot_url = 
        ( (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://' )
      . filter_var( $_SERVER['HTTP_HOST'] //URL_DOM AIN  .$_SERVER['REQUEST_URI']
          .'/', FILTER_SANITIZE_URL ) ;
    $module_url = $wsroot_url . $modul_rel_path .'/' ;

    //we have only one (eg glomodul) group of modules per subsite (eg fwphp) !!
    $subsite_dir       = 'fwphp' ; //basename(__DIR__) 
    $glomodul_dir      = 'glomodul' ; 
    $this->modulglo_rel_path = $subsite_dir.'/'.$glomodul_dir.'/' ;

    $help_sw_rel_path  = $this->modulglo_rel_path .'help_sw/' ;
    $this->test_rel_path     = $help_sw_rel_path . 'test/' ;
    $this->helpsw_url  = '/'.dirname($this->test_rel_path).'/' ;

    $this->zbig_url       = $wsroot_url .'zbig/';
    $zbig_path      = $wsroot_path .'zbig/'; 

      /* **********************************************************
      *  fill in  d a t a  a r r  = LIST OF  M K D or T X T  FILES
      ********************************************************** */

      // similar to lsweb module, 13 to 30 mili seconds
      $objects = new \RecursiveIteratorIterator(
           new \RecursiveDirectoryIterator($dir)
         , \RecursiveIteratorIterator::SELF_FIRST
      );
      $this->data[] .= '<ol>';
      $dirname_prev = '';
      foreach($objects as $name => $object)
      {
        $md_fle_path = 
          str_replace(DIRECTORY_SEPARATOR, '/', str_replace($dir.DIRECTORY_SEPARATOR, '', $name)) ;
                          //echo $md_fle_path. '<br />' ;
        $path_parts = pathinfo($md_fle_path) ; //stripos($md_fle_path, '.txt')
                          //echo '<pre>'.'$path_parts='; print_r($path_parts); echo '</pre>';
        $ext = isset($path_parts['extension']) ? $path_parts['extension'] : 'noext';
        if ($ext === 'txt' or $ext === 'md' or $ext === 'mkd')
        {

          $md_fle_path = str_replace(DIRECTORY_SEPARATOR, '/', $md_fle_path);
          if (dirname($md_fle_path) != dirname($dir))
          {
            $dirname = dirname($md_fle_path); // '\\'
            if ($dirname_prev == $dirname) {$this->data[] .= '<br />';} 
            else {
              $dirname_prev = $dirname ;
              $this->data[] .= '<br /><li></b>'.$dirname.'</b><br />';
            }
          }

          $flename = basename($md_fle_path);

          //also works $module_ url.
          $fle_edit_url = '?edit='.$md_fle_path ;
          $this->md_fle_url = $md_fle_url = '?showhtml='.$md_fle_path ; //see md2htm()

          $this->data[] .= 
          ' <a href="'.$fle_edit_url.'" '." title='$fle_edit_url = SimpleMDE edit'>$flename</a>";
          //
          $this->data[] .= " &nbsp; &nbsp; 
          <a href='$md_fle_url' title='$md_fle_url = Parsedown txt to html'> HTM</a>";

        }              //echo '<pre>'.'$object='; print_r($object); echo '</pre>';
      }
      $this->data[] .= '</li></ol>';  //echo in View
                        if ('0') { 
                        //if ($this->module_arr['dbg'] and !$this->module_arr['style']) { 
                        echo '<h2>STEP555 ' .', lin='. __LINE__ .' *** '.__FILE__ .' SAYS *** šđčćž</h2>';
                        //echo '<br />'.'$ctr_ ordno='.$ctr_ ordno .'=...' ;
                        echo '<br />'.'$md_fle_url='.$md_fle_url ;
                        //print '<br />$this->module_arr ='; echo '<pre>'; print_r($this->module_arr); echo '</pre>';
                          echo '<br /><br />';
                        }
                        //echo '<br />5555555555555555555 '. __FILE__ ;
       //e n d    LIST OF  M K D or T X T  FILES

  }

  //protected function Index() { }

  /**
  *    D I S P L A Y  P A G E   V I E V  code for  m k d  f o r m
  */
  public function edit($fle_to_edit_path)
  {
    $md_fle_url     = $this->md_fle_url ; //QS.'home/md2htm/'.$fle_to_edit_path;
    $frmaction_url_edit  = "?edit=$fle_to_edit_path" ; //QS.'home/edit/'.$fle_to_edit_path ;
    $frmaction_url_showhtml  = "?showhtml=$fle_to_edit_path" ; //QS.'home/edit/'.$fle_to_edit_path ;
                            if ('') 
                            { echo '<pre>'.__FILE__ .', lin='. __LINE__
                                .'<br />     <b>*** '.__METHOD__ .'  SAYS *** šđčćž</b>';
                            print '<br />$fle_ to_edit_path='; print_r($fle_to_edit_path);
                            print '<br />$frmaction_ url_edit='; print_r($frmaction_url_edit);
                            print '<br />$frmaction_ url_showhtml='; print_r($frmaction_url_showhtml);
                            print '<br />$fle_ md2htm_urlqry='; print_r($md_fle_url);
                            echo '</b></pre><br />'; }
           /*<!--
                    IS  R E A D  OR  U P D A T E  T X T  ?
          -->*/
          //m s g is better than echo '<pre>'.'$_REQUEST='; print_r($_REQUEST); echo '</pre>';
            if (isset($_POST['nameedtxtarea'])) {
              $mdcontent = $_POST['nameedtxtarea'];
              file_put_contents(
                 rtrim( str_replace('/',DIRECTORY_SEPARATOR, $fle_to_edit_path), DIRECTORY_SEPARATOR )
                , $mdcontent
              );
            } else { $mdcontent = file_get_contents($fle_to_edit_path); }  //$this->wsroot_path.
          ?>



          <!--   OUT  F O R M  FOR  Simple MDE  W Y S I W Y G  MARKDOWN EDITOR
                href="/vendor/simplemde/simplemde.min.css"
                parent::getconf('URLALLSITES_VENDOR')
                title="/vendor/simplemde/simplemde.min.css"
          -->
          <!DOCTYPE html><html lang="hr"><head>
             <title>EDMKD4 <?=basename($fle_to_edit_path)?></title>
          <link rel="stylesheet" type="text/css" href="/vendor/simplemde/simplemde.min.css">
          <link rel="stylesheet" type="text/css" href="/vendor/simplemde/highlight.min.js">
<!--script src="https://cdn.jsdelivr.net/highlight.js/latest/highlight.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/highlight.js/latest/styles/github.min.css"-->

                        <!-- W Y S I W Y G  markdown editor 11 kB css v1.11.2, 2016 year
                        or href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css"
                        
           //http://dev1:8083/fwphp/glomodul4/mkd/?Home/md2htm/J:/awww/www/readme.md 
                        -->
              </head><body>

              <form action="<?=$frmaction_url_edit?>" method="post" id="frmwysiwyg">
                <!--// $frm action_ url_ edit = '?edit=J:/awww/www/readme.md'  p>&nbsp; </p><p>&nbsp; </p-->
                <h3>
                  <label for="edtxtarea">WYSIWYG md editor SimpleMDE</label>

                  &nbsp; &nbsp;
                  <input type="submit" name="Save" value="Save"
                         title = "<?=$frmaction_url_edit?>"
                  > &nbsp;<?=basename($fle_to_edit_path)?>

                  &nbsp; &nbsp; 
                  <a href="<?=$frmaction_url_showhtml?>"
                     title="<?='ctrl+click '.$frmaction_url_showhtml?>" >HTML (Parsedown)
                  </a>

                  &nbsp; &nbsp;
                  <a href="<?='index.php'?>" title="<?='index.php'?>" >Home</a>
                </h3>

                <textarea name="nameedtxtarea" id="edtxtarea"><?=$mdcontent?></textarea>
              </form>




          <!--
                 A S S E T S  ( I N C L U D E S )
          https://github.com/sparksuite/simplemde-markdown-editor
          parent::getconf('URLALLSITES_VENDOR')
          -->
          <script src="/vendor/simplemde/simplemde.min.js"></script>
          <script type="text/javascript" src="/zinc/themes/bootstrap/js/jquery.min.js"></script>
          <!-- 269 kB js v1.11.2, 2016 year -->
          <!--script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script-->
          <script>
              /* shortcuts see https://github.com/sparksuite/simplemde-markdown-editor#keyboard-shortcuts
                  Shortcut	Action
                  Cmd-'	"toggleBlockquote"
                  Cmd-B	"toggleBold"
                  Cmd-E	"cleanBlock"
                  Cmd-H	"toggleHeadingSmaller"
                  Cmd-I	"toggleItalic"
                  Cmd-K	"drawLink"
                  Cmd-L	"toggleUnorderedList"
                  Cmd-P	"togglePreview"
                  Cmd-Alt-C	"toggleCodeBlock"
                  Cmd-Alt-I	"drawImage"
                  Cmd-Alt-L	"toggleOrderedList"
                  Shift-Cmd-H	"toggleHeadingBigger"
                  F9	"toggleSideBySide"
                  F11	"toggleFullScreen"
              */
            var simplemde = new SimpleMDE({
              element: document.getElementById("edtxtarea"),
              //forceSync: true, // immediately stored in original textarea
              placeholder: "Type here...",
              spellChecker: true,
              //status: true,
              shortcuts: {
                drawTable: "Cmd-Alt-T"
              },
              showIcons: ["code", "table"],
              autosave: {
                enabled: false,
                unique_id: "edtxtarea",
                // one second :
                delay: 1000,
              },
              //toolbar: true, //show 
              //toolbarTips: true, //show 
              toolbar: ["bold", "italic", "strikethrough"
                , "heading-1", "heading-2", "heading-3"
                , "|", "code", "quote", "unordered-list", "ordered-list"
                , "|", "link", "image", "table", "horizontal-rule"
                , "|", "preview", "fullscreen", "side-by-side"
                , "|", "clean-block", "guide"
                , "|", {
                  name: "custom",
                  action: function customFunction(editor){
                    //       Add your own code :
                    //var phpadd= '<?php echo 'aaaaaaaaaaa';?>'; alert(phpadd);
                    //document.write(' <?php echo 'aaaaaaaaaaa'; ?> ');
                      /*&nbsp; &nbsp;
                      <input type="submit" name="Save" value="Save"
                             title = "<?=$frmaction_url_edit?>"
                      > &nbsp;<?=basename($fle_to_edit_path)?>
                      */

                      //var mult = function(arg1, arg2) {
                      $.ajax({
                        //url: "webservice.php?action=mult&arg1="+arg1+"&arg2="+arg2
                        //url: "index.php?action=mult&arg1="+'<?=$frmaction_url_edit?>'+"&arg2="+'no arg2'
                        // $frm action_ url_ edit = '?edit=J:/awww/www/readme.md'
                        //works (see console.log): //url: "?action=xxx"
                        //url: "?action=<?=$frmaction_url_edit?>"
                        url: "index.php<?=$frmaction_url_edit?>"
                      }).done(function(data) {
                        console.log(data);
                      });
                    //} 
                    //on the php side, you'll have to check the action parameter in order to execute the propre function (basically a switch statement on the $_GET["action"] variable)

                  },
                  className: "fa fa-save",
                  title: "Save: index.php<?=$frmaction_url_edit?>",
                },
              ],
              /*{
                  name: "bold",
                  action: SimpleMDE.toggleBold,
                  className: "fa fa-bold",
                  title: "Bold",
                },
              */
              autofocus: true,
              indentWithTabs: false,
              blockStyles: {
                bold: "**", // ** or __. Defaults to **
                italic: "*", // * or _. Defaults to *
                code : "```" // ``` or ~~~. Defaults to ```
              },
              insertTexts: {
                horizontalRule: ["", "\n\n-----\n\n"],
                image: ["![](http://", ")"],
                link: ["[", "](http://)"],
                table: ["", "\n\n| Column 1 | Column 2 | Column 3 |\n| -------- | -------- | -------- |\n| Text     | Text      | Text     |\n\n"],
              },
              lineWrapping: true,
              //initialValue: "Hello world!",
              placeholder: "Type here...",
              /*previewRender: function(plainText) {
                return customMarkdownParser(plainText); // Returns HTML from a custom parser
              },
              previewRender: function(plainText, preview) { // Async method
                setTimeout(function(){
                  preview.innerHTML = customMarkdownParser(plainText);
                }, 250);

                return "Loading...";
              }, */
              promptURLs: false, //JS alert window appears asking for the link or image URL
              renderingConfig: {
                //singleLineBreaks: false, //parsing GFM single line breaks
                codeSyntaxHighlighting: true, // highlight using highlight.js
              },
              status: true, //show status bar
              status: ["autosave", "lines", "words", "cursor"], // Optional usage
              /* status: ["autosave", "lines", "words", "cursor", {
                className: "keystrokes",
                defaultValue: function(el) {
                  this.keystrokes = 0;
                  el.innerHTML = "0 Keystrokes";
                },
                onUpdate: function(el) {
                  el.innerHTML = ++this.keystrokes + " Keystrokes";
                }
              }], // Another optional usage, with a custom status bar item that counts keystrokes
              */
              styleSelectedText: false,
              tabSize: 2
              //
            });
          </script>



              </body></html>
          <?php
  } //e n d  f n  e d i t ()



    /**
    *  f n  m d 2 h t m ( ) :  P a r s e d o w n  displays .txt or .md or .mkd as html
    * http://dev1:8083/fwphp/www4/glomodul/mkd/?Home/md2htm/J:\awww\www/readme.md/
    * CALLED FROM 
    * CALLS (extern) Parsedown to display txt from content subfolder
    */
  public function md2htm($fle_to_displ_path)
  {
    //http://dev1:8083/fwphp/glomodul4/mkd/?Home/md2htm/J:/awww/www/readme.md
    //NEVER $_GET['fle']

    require_once $this->wsroot_path.'vendor/erusev/parsedown/Parsedown.php';

                         //$ a r r = $this->arr ;
                         //$ctr_ ordno = $this->ctr_ ordno ;
                         //$akcp1_ ordno = $this->akcp1_ ordno ;
    $md_fle_url  = $this->md_fle_url ;

    $fle_displ_url = '?edit='.$fle_to_displ_path .'/' ;

    $pdown = new \Parsedown; // Parsedown cls has no namespace
          //$parsedown->setSafeMode(true); //processing untrusted user-input
          //$parsedown->setMarkupEscaped(true); //escape HTM **in trusted input**
    ?>
    <!DOCTYPE html><html lang="hr"><head><title>HTMLofMKD</title>
      <link rel="stylesheet" type="text/css"
            href="/vendor/simplemde/simplemde.min.css">
      <!-- or href="<=$this->wsroot_url?>vendor/simplemde/simplemde.min.css"
      -->

          </head> <body>
    <?php
    //http://dev1:8083/fwphp/glomodul4/mkd/?Home/md2htm/J:/awww/www/readme.md
    echo $pdown->text(
      '<h3>'.'Markdown txt ' . $fle_to_displ_path .' Parsedown-ed to HTM. '
        . "[<a href='$fle_displ_url'"
           . ' title="SimpleMDE edit : '. ( isset($_GET['edit'])?rtrim($_GET['edit'],'/'):'' )
           .'"> <b>Edit file - here</b>
           </a>]'
                  .'&nbsp; &nbsp;<a href=\'index.php\' title=\'index.php\' >Home</a>'
           .'<br />(WYSIWYG md editor SimpleMDE or use some desktop markdown text editor).'
     .'</h3>'
    );
    echo $pdown->text(file_get_contents($fle_to_displ_path)) ;
    //Warning: file_get_contents(?home/md2htm/J:): failed to open stream

  } // E N D  f n  m d 2 h t m ( )




  private function dpl(&$urlqry_arr)
  {
     _CtrMain::dpl($urlqry_arr);
  } // E N D  f n  deploy_ dev_ to_ test ( )




} //e n d  c l s
