<?php
  /**
  *    D I S P L A Y  P A G E   V I E V  code for  m k d  f o r m
  */
//http://sspc2:8083/fwphp/glomodul/mkd/index.php?i/edit/path/001_MDcheatsheet.txt
//http://sspc2:8083/fwphp/glomodul/mkd/index.php?i/edit/path/001_MDcheatsheet.txt\
//http://sspc2:8083/fwphp/glomodul/mkd/index.php?i/edit/path/01\001_config_ssl_tls\hosts.txt

$frmaction_url_edit  = '?i/edit/path/'. $fle_to_edit_path ; //"?edit=$fle_ to_edit_path"

//http://sspc2:8083/fwphp/glomodul/mkd/?i/showhtml/path/J:\awww\www\\readme.md
//$frmaction_ url_showhtml  = '?i/showhtml/path/'. str_replace('/','\\', $fle_ to_edit_path) ;
$frmaction_url_showhtml  = '?i/showhtml/path/'. $fle_to_edit_path ;
//"?showhtml=$fle_ to_edit_path" ;
                            if ('') 
                            { echo '<pre>'.__FILE__ .', lin='. __LINE__
                                .'<br />     <b>*** '.__METHOD__ .'  SAYS *** šđčćž</b>';
                            print '<br />$fle_ to_edit_path='; print_r($fle_to_edit_path);
                            print '<br />$frmaction_ url_edit='; print_r($frmaction_url_edit);
                            print '<br />$frmaction_ url_showhtml='; print_r($frmaction_url_showhtml);
                            //print '<br />$fle_ md2htm_urlqry='; print_r($md_fle_url);
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
            } else { $mdcontent = file_get_contents($fle_to_edit_path); } 
          ?>



          <!--   OUT  F O R M  FOR  Simple MDE  W Y S I W Y G  MARKDOWN EDITOR
                href="/vendor/simplemde/simplemde.min.css"
                parent::getconf('URLALLSITES_VENDOR')
                title="/vendor/simplemde/simplemde.min.css"
                EDMKD4
          -->
          <!DOCTYPE html><html lang="hr"><head>
             <title>ED <?=basename($fle_to_edit_path)?></title>
          <link rel="stylesheet" type="text/css" href="/vendor/simplemde/simplemde.min.css">
          <!--link rel="stylesheet" type="text/css" href="/vendor/simplemde/highlight.min.js"-->
<!--script src="https://cdn.jsdelivr.net/highlight.js/latest/highlight.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/highlight.js/latest/styles/github.min.css"-->

                        <!-- W Y S I W Y G  markdown editor 11 kB css v1.11.2, 2016 year
                        or href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css"
                        
           //http://dev1:8083/fwphp/glomodul4/mkd/?Home/md2htm/J:/awww/www/readme.md 
                        -->
              </head><body>

              <form action="<?=$frmaction_url_edit?>" method="post" 
                    name="frmwysiwyg" id="frmwysiwyg"
              >
                <h3>
                  <!--
                  <label for="edtxtarea">WYSIWYG md editor SimpleMDE</label>

                  &nbsp; &nbsp;
                  <input type="submit" name="Save" value="Save"
                         title = "<=$frmaction_url_edit?>"
                  > &nbsp;<=basename($fle_to_edit_path)?>

                  &nbsp; &nbsp; 
                  <a href="<=$frmaction_url_showhtml?>"
                     title="<='ctrl+click '.$frmaction_url_showhtml?>" >HTML (Parsedown)
                  </a>

                  &nbsp; &nbsp;
                  <a href="<='index.php'?>" title="<='index.php'?>" >Home</a>
                -->
                </h3>

                  <input type="hidden" id="edithid_id" name="edithid" 
                         value="<?='?edit='.$fle_to_edit_path?>">
                <textarea name="nameedtxtarea" id="edtxtarea"><?=$mdcontent?></textarea>
              </form>




          <!--
                 A S S E T S  ( I N C L U D E S )
          https://github.com/sparksuite/simplemde-markdown-editor
          parent::getconf('URLALLSITES_VENDOR')
          -->
          <script src="/vendor/simplemde/simplemde.min.js"></script>
          <!--script type="text/javascript" 
                     src="/z inc/themes/bootstrap/js/jquery.min.js"></script-->
          <!-- 269 kB js v1.11.2, 2016 year -->
          <!--script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script-->
          <script>
              /* shortcuts see https://github.com/sparksuite/simplemde-markdown-editor#keyboard-shortcuts
                  Shortcut     Action
                  Cmd-'       "toggleBlockquote"
                  Cmd-B       "toggleBold"
                  Cmd-E       "cleanBlock"
                  Cmd-H       "toggleHeadingSmaller"
                  Cmd-I       "toggleItalic"
                  Cmd-K       "drawLink"
                  Cmd-L       "toggleUnorderedList"
                  Cmd-P       "togglePreview"
                  Cmd-Alt-C   "toggleCodeBlock"
                  Cmd-Alt-I   "drawImage"
                  Cmd-Alt-L   "toggleOrderedList"
                  Shift-Cmd-H "toggleHeadingBigger"
                  F9          "toggleSideBySide"
                  F11         "toggleFullScreen"
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
              toolbar: [
                {
                    //
                    name: "gohome",
                    action: function gohomeFunction(editor){
                       window.location.href = '?gohome';
                    },
                    className: "fa fa-home",
                    title: "Mkd module Home: window.location.href = '?gohome';",
                }
                , {
                    //
                    name: "gohomemain",
                    action: function gohomemainFunction(editor){
                       window.location.href = '/';
                    },
                    className: "fa fa-home",
                    title: "Site Home: window.location.href = '/';",
                } 
                , "bold", "italic", "strikethrough"
                , "heading-1", "heading-2", "heading-3"
                , "|", "code", "quote", "unordered-list", "ordered-list"
                , "|", "link", "image", "table", "horizontal-rule"
                , "|", "preview", "side-by-side"
                , "|", "clean-block", "guide"
                , "|"
                , {
                    // http://dev1:8083/fwphp/glomodul/mkd/?showhtml=J:/awww/www/readme.md
                    name: "showhtml",
                    action: function showhtmlFunction(editor){
                       window.location.href = 
                         '<?=str_replace('\\','\\\\',$frmaction_url_showhtml)?>';
                    },
                    className: "fa fa-eye no-disable", // fa fa-list
                    title: 'Show html: <?=str_replace('\\','\\\\',$frmaction_url_showhtml)?>',
                }
                , "fullscreen"
                , {
                    // 
                    name: "savemd",
                    action: function savemdFunction(editor){
                      //window.location.href = '<?=$frmaction_url_edit?>';
                      var form = document.forms.frmwysiwyg;
                      form.submit(); //see (***1)
                    },
                    className: "fa fa-save",
                    title: "Save: index.php<?=$frmaction_url_edit?>",
                }



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
                return c ustomMarkdownParser(plainText); // Returns HTML from a c ustom parser
              },
              previewRender: function(plainText, preview) { // Async method
                setTimeout(function(){
                  preview.innerHTML = c ustomMarkdownParser(plainText);
                }, 250);

                return "Loading...";
              }, */
              promptURLs: false, //JS alert window appears asking for the link or image URL
              renderingConfig: {
                //singleLineBreaks: false, //parsing GFM single line breaks
                codeSyntaxHighlighting: true, // highlight using highlight.js
              },
              //status: true, //show status bar
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
              }], // Another optional usage, with a c ustom status bar item that counts keystrokes
              */
              styleSelectedText: false,
              tabSize: 2
              //
            });
          </script>



              </body></html>
          
<!-- //  } //e n d  f n  e d i t ()
                    //(***1)
                    //var phpadd= '<php echo 'aaaaaaaaaaa';?>'; alert(phpadd);
                    //document.write(' <php echo 'aaaaaaaaaaa'; ?> ');
                            /*&nbsp; &nbsp;
                            <input type="submit" name="Save" value="Save"
                                   title = "<=$frmaction_url_edit?>"
                            > &nbsp;<=basename($fle_to_edit_path)?>
                            */
                      /*$.ajax({
                        //works (see console.log): url: "?akcija=<=$frmaction_url_edit?>"
                        //url: "index.php<=$frmaction_url_edit?>" //url: "?action=<=$frmaction_url_edit?>"
                      }).done(function(data) {
                        console.log(data);
                      }); */
                      //on the php side, you'll have to check the a ction parameter in order to execute the propre function (basically a switch statement on the $_GET["a ction"] variable)
-->
