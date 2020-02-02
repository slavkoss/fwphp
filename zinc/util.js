function jsmsgyn(p_todo, p_url) {
  var ret;
  var r = confirm(p_todo);
  if (r == true) { 
     ret = '1';
     if (p_url) { location.href=p_url; }
  } else { ret = '0'; }
  //The button you pressed is displayed in the result window.
  //document.getElementById("demo").innerHTML = ret;
  return ret ;
}