// J:\awww\apl\dev1\oraed\enter_tab_emul\key_pressed.js
  //var fldids = new Array('box1','box2','box3');
  
    function msg(t1,t2,t3,t4,t5,t6,txt_srvgen) { 
       //document.getElementById('div_srvgen').innerHTML = txt_srvgen; 
       alert(t1+"\n"+t2+"\n"+t3+"\n"+t4+"\n"+t5+"\n"+t6+"\n"+txt_srvgen); 
    } 

  function myKeyAct(field, evt) 
  {
    if (evt.keyCode === 13) {
       // keypressed is ***enter key : goto next/first form field*** :
       if (evt.preventDefault) evt.preventDefault(); 
       else if (evt.stopPropagation) evt.stopPropagation(); 
       else evt.returnValue = false;

       var fldname    = field.name; //var fieldid = field.id;
            var elements = document.getElementsByName( fldname ); 
            //var fldid = elements[0].getAttribute( 'id' ) or:
       var fldid      = elements[0].id ; //field[0].id; // not working
       var fldidnext    = '0';
       var fldcount   = fldids.length;
       var fldlast    = fldcount - 1 ;
// TESTING: this m s g s  &  shift+ctrl+j in chrome or FF :
//msg('1. fldid='+fldid,'fldcount='+fldcount,'fldlast='+fldlast,'fldname='+fldname,'','','') ;
      for ( var ii = 0; ii < fldcount; ii++) {
//msg('2. fldid='+fldid,'ii='+ii,'fldids[ii]='+fldids[ii],'','','','');
      
        if (fldid == fldids[ii]) {
           // 1. all before last jump on NEXT :
           if (ii < fldlast) {fldidnext = fldids[++ii]; break; }
           // 2. last jumps on FIRST:
           else { fldidnext = fldids[0]; break; }
        } // e n d  f o u n d  cur.fld.name  i n  f o r m  f l d s  a r r 
      } // e n d  through f l d s
               // ***UNCOMMENT THIS FOR TESTING*** :
               //document.write('<hr />JS SAYS:<br/>'  +'fldname='+fldname+'<br/>'+' nxtfldname='+nxtfldname+'<hr/>' 
               //);
      if (fldidnext) {
         var fldnamenext = document.getElementById(fldidnext);
//msg('3. fldid='+fldid,'fldidnext='+fldidnext,'fldnamenext.name='+fldnamenext.name,'','','','');
         fldnamenext.focus(); 
      }
      return false; // ignore keypressed
    //
    } 
    else {
       // keypressed is ***not enter key*** :
       return true; // standard browser processing of keypressed
    }
  } // e n d  f n  my Key Action
