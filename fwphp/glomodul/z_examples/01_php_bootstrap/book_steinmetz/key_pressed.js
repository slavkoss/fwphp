
// J:\awww\apl\zinc\key_pressed.js
// J:\awww\apl\dev1\oraed\enter_tab_emul\key_pressed.js

  function jsmsg(t1,t2,t3,t4,t5,t6,txt_srvgen) {
    //document.getElementById('div_srvgen').innerHTML = txt_srvgen;
    alert(t1+"\n"+t2+"\n"+t3+"\n"+t4+"\n"+t5+"\n"+t6+"\n"+txt_srvgen);
    //alert('aaaaaa');
  }
  
  function jsmsgyn(vmsg, vurl) {
    var okay = confirm(vmsg);
    if (okay) {
       //return true; // User clicked OK
       //window.location.href=curpg+'?rrgo='+pgrr1;
       window.location.href=vurl;
    } else {
       //return false; // User clicked Cancel
       //window.location.href=''; // endless loop
       window.location.href='?cmd=tbl'; // refresh SPA
   }
   //use of confirmation dialogs to verify that the user wants to leave  current page - by watching for an unload event:
   //window.onunload = function() {
   //  return confirm('Zatvoriti stranicu ?');
   //}
  }

  
       // var popupLinks = document.getElementsByClassName(‘popup’);
       // var links = document.getElementsByTagName(‘a’);
       //  var trs = document.getElementsByTagName(‘tr’);
       // document.getElementsByTagName(‘head’)[0].appendChild(script);
       //var elements = document.getElementsByName(fldname);
       
//        var curpg = '$curpg' ; // basename apl.page
//        var pgrr1 = $pgrr1 ; // first ord.nr. of b l o c k r o w
//        var rrpg  = $rrpg ;  // r o w s  prr  p a g e
//        var rrtbl = $rrtbl ; // r o w s  in  t b l
//        //var showform = '$showform' ; // '0' or '1'
//        //var idval = '$idval' ; 
//        //var fldids = ['box0','box1','box2','box3','box4'] ; 
//        var fldids = $gofldids ;  
//        var numfldids_inrow = $numgofldids_inrow ;       
       
  function myKeyAct(field, evt)
  {
    // call from input fld: onkeydown="return myKeyAct(this, event);"
    //switch (evt.keyCode)
    //{
    //    case 13  // ENTER   
    if (    evt.keyCode === 13 
         || evt.keyCode === 40  // DOWN ARROW 
         || evt.keyCode === 38  // UP ARROW 
    )
    {
// TESTING: this m s g s  &  shift+ctrl+j in chrome or FFox :
//jsmsg('1. pressed enter fldid='+document.getElementsByName(fldname)[0].id
//,'fldcount='+fldcount,'fldlast='+fldlast,'fldname='+fldname,'','',''
//,'','','','','',''
//) ;

       // **********************************************
       // keypressed is enter key :
       //     *** goto next/first form field ***
       // **********************************************
       if (evt.preventDefault) evt.preventDefault();
       else if (evt.stopPropagation) evt.stopPropagation();
       else evt.returnValue = false;

       var fldname    = field.name; //var fieldid = field.id;
       var elements = document.getElementsByName('box');
            //var fldid = elements[0].getAttribute( 'id' ) or:
       //allways box0 : var fldid      = elements[0].id ; //field[0].id; // not working
       var fldid      = field.id ; //field[0].id; // not working
// TESTING: this m s g s  &  shift+ctrl+j in chrome or FFox :
//jsmsg('1. pressed enter fldid='+fldid) ;
       var fldcount   = elements.length;
       var fldlast    = fldcount - 1 ;
       var fldidnext    = 'box0';
// TESTING: this m s g s  &  shift+ctrl+j in chrome or FFox :
if ('') jsmsg('1. pressed enter'
                 ,'fldname=' +fldname
                 ,'fldid='   +fldid
                 ,'fldlast=' +fldlast
                 ,'fldcount='+fldcount
                 ,'evt.keyCode='+evt.keyCode
                 ,'',''
);
      for ( var ii = 0; ii < fldcount; ii++) {
//jsmsg('2.1 in loop pressed enter fldid='+fldid,'ii='+ii,'fldids[ii]='+fldids[ii],'','','','');

        if (fldid == fldids[ii]) {
           
           if (evt.keyCode === 13) { // ENTER
           // 1. all before last jump on NEXT :
           if (ii < fldlast) {fldidnext = fldids[++ii]; break; }
           // 2. last jumps on FIRST:
           else { fldidnext = fldids[0]; break; }
           } // e n d  ENTER
           
           else if (evt.keyCode === 40) { // DOWN ARROW
           if ((ii + numfldids_inrow) <= fldlast) {
                fldidnext = fldids[ii + numfldids_inrow]; break; }
           // 2. if on last stays  on last :
           else { fldidnext = fldids[fldlast]; break; }
           } // e n d  DOWN ARROW
           
           else if (evt.keyCode === 38) { // UP ARROW
           if ((ii - numfldids_inrow) >= 0) {
                fldidnext = fldids[ii - numfldids_inrow]; break; }
           // 2. if on firsrt stays  on first :
           else { fldidnext = fldids[0]; break; }
           } // e n d  UP ARROW
        } // e n d  f o u n d  cur.fld.name  i n  f o r m  f l d s  a r r
      } // e n d  through f l d s

               // **********************************************
               // ***UNCOMMENT THIS FOR TESTING*** :
               //jsmsg('JS SAYS: '+'fldname='+fldname+'<br/>'+' nxtfldname='+nxtfldname+');
               //document.write('<hr />JS SAYS:<br/>'  +'fldname='+fldname+'<br/>'+' nxtfldname='+nxtfldname+'<hr/>'
               //);
               // **********************************************

      if (fldidnext) {
         var fldnamenext = document.getElementById(fldidnext);
//jsmsg('3. //fldid='+fldid,'fldidnext='+fldidnext,'fldnamenext.name='+fldnamenext.name,'','','','');
         fldnamenext.focus();
      }
      return false; // ignore keypressed
    //
    }
      //break;
      // **********************************************
      // KEYPRESSED IS ***NOT ENTER KEY 13***
      // **********************************************
      // STANDARD PROCESS. OF KEYPRESSED :
      else if (evt.keyCode === 116) return true; // F5=REPEAT COMMAND  
      else if (evt.keyCode === 35) return true; // END
      else if (evt.keyCode === 36) return true; // HOME
      else if (evt.keyCode === 40) return true; // DOWN ARROW
      else if (evt.keyCode === 38) return true; // UP ARROW
      else if (evt.keyCode === 37) return true; // LEFT ARROW
      else if (evt.keyCode === 39) return true; // RIGHT ARROW
      else if (evt.keyCode === 8) return true; // BACKSPACE
      else if (evt.keyCode === 46) return true; // DEL
      else if (evt.keyCode === 9) return true; // TAB 
      else if (evt.keyCode === 18) return true; // CTRL 
      else if (evt.keyCode === 18) return true; // ALT 
      else if (evt.keyCode === 91) return true; // WINKEY 
      //
      else if (evt.keyCode === 121) { // F10 = SAVE 
        // not url call but js commit like php button !!! :
        //window.location.href=curpg+'?cmd=save&ID='+idval; 
        // empty forma - ok for c r e, not ok za u p d :
        //window.location.href=curpg+'?showform&cmd=save'; 
      }
      else if (evt.keyCode === 119) { // F8 = REFRESH 
        window.location.href=curpg+'?rrgo='+pgrr1;
      }
      else if (evt.keyCode === 117) { // F6  a d d  record
                                // ee show/hide form
        //window.location.href = curpg + '?cmd=add';
        window.location.href=curpg+'?showform&cmd=rrgo='+pgrr1; 
                // F6 = c r e a t e  r e c o r d
        return false; // ignore keypressed
      }
 
      // ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
      // J A V A S C R I P T  P A G I N A T I O N :
      else if (evt.keyCode === 33) { // PG UP
        pgrrnew = pgrr1*1 - rrpg*1;
        rrgo = (pgrrnew > 0) ? pgrrnew : pgrr1;
         window.location.href=curpg+'?rrgo='+rrgo; // ?cmd=gopgup'
        return false; // ignore keypressed
      }
      else if (evt.keyCode === 34) { // PG DOWN
        pgrrnew = pgrr1*1 + rrpg*1;
        rrgo = (pgrrnew > rrtbl) ? pgrr1 : pgrrnew;
//jsmsg('2.2 in loop pressed pg down pgrr1='+pgrr1,'rrpg='+rrpg,'rrtbl='+rrtbl,'rrgo='+rrgo,'','','');
        window.location.href = curpg + '?rrgo='+rrgo;
        return false; // ignore keypressed
      }
      // e n d  J S  P A G I N A T I O N 
      
      else if (evt.keyCode === 112) { // F1 help
jsmsg('Na unesivom podatku su omogućene TIPKE NAŠEG PROGRAMA (umjesto standardnih browserovih tipki):\nF6=dodaj redak, PageDown, Up za retke tablice, F10=spremi, F8=učitaj stranicu, backspace=briši ulijevo...\nF5=PONOVI PRETHODNU AKCIJU, F8=učitaj stranicu'
, '\nKlik na prazan dio stranice onemogućava naše tipke pa su omogućene STANDARDNE BROWSEROVE TIPKE: F5=PONOVI PRETHODNU AKCIJU, backspace=prethodna stranica, shift+backspace=sljedeća stranica, PageDown, Up za pomicanje stranice, F11=ukloniti ibrowserove menije.'
, '','','','','') ;
        return false; // standard browser processing of keypressed
      }
    //default:
    else
    {
jsmsg('--fn myKeyAct: evt.keyCode='+evt.keyCode
   , ' field.name='+field.name
   , ' field.id='+field.id
   //, ' elements[0].id='+document.getElementsByName(field.name)[0].id
   , '', '', '', '') ;

      return true; // standard browser processing of keypressed
      //break;
    }
    //} // e n d  s w i t c h  k e y
  } // e n d  f n  my Key Action
