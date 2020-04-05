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
       var fldid      = field[0].id; // var elements = document.getElementsByName( 'yourname' ); var id = elements[0].getAttribute( 'id' );  or elements[0].id
       var fldnext    = '0';
       var fldcount   = fldids.length;
       var fldlast    = fldcount - 1 ;
       
      msg('1. fldname=',fldname,'fldcount=',fldcount,'fldlast=',fldlast,'fldid') ;
      for ( var ii = 0; ii < fldcount; ii++) {
          msg('2. fldname=',fldname,'ii=',ii,'fldids[ii]=',fldids[ii],'') ;
      
        if (fldname == fldids[ii]) {
           // 1. all before last jump on NEXT :
           if (ii < fldlast) {fldnext = fldids[++ii]; break; }
           // 2. last jumps on FIRST:
           else { fldnext = fldids[0]; break; }
        } // e n d  f o u n d  cur.fld.name  i n  f o r m  f l d s  a r r 
      } // e n d  through f l d s
       
               // ***UNCOMMENT THIS FOR TESTING*** :
               //document.write('<hr />JS SAYS:<br/>'  +'fldname='+fldname+'<br/>'+' nxtfldname='+nxtfldname+'<hr/>' 
               //);
      if (fldnext) document.getElementById(fldnext).focus(); 
      return false; // ignore keypressed
    //
    } 
    else {
       // keypressed is ***not enter key*** :
       return true; // standard browser processing of keypressed
    }
  } // e n d  f n  my Key Action
