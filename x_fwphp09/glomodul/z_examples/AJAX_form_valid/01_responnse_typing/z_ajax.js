/* SOURCE: https://github.com/furkansenturk/Javascript-Ajax/ */
function ajax(e)
{
    //var current_text = '1st param'+ '|' + document.getElementById('user_text').value + '|';
    var v_req_obj = new XMLHttpRequest(); // var http =

    v_req_obj.onreadystatechange = function() {
        if ( v_req_obj.readyState == 4 && v_req_obj.status == 200 ) {
            var response = v_req_obj.responseText ;
            //document.getElementById('server_response').value = response ;
            return(response);
        }
    };
     
    //"http://dev1:8083/fwphp/glomodul/z_examples/AJAX_form_valid/01_responnse_typing/server2.php"
    v_req_obj.open( "POST", e.url, true );
    v_req_obj.setRequestHeader( "Content-type", "application/x-www-form-urlencoded" );
    v_req_obj.send("user_text=" + e.data) ;     


   /*


    function updateText() 
    {
                                //alert('--fn update Text SAID');
        // POST Method for AJAX using Javascript
        var current_text = '1st param'+ '|' + document.getElementById('user_text').value + '|';

        document.getElementById("server_response").innerHTML = ajax({
            url     : "http://dev1:8083/fwphp/glomodul/z_examples/AJAX_form_valid/01_responnse_typing/server2.php",
            method  : "POST",
            data    : current_text //{"p1":"1st param", "p2":p2}
            //response    : function(e){
            //    document.getElementById("server_response").innerHTML = e;
            //}
        });

    } // e n d  f n  update Text


   if( null==e.method
          ? e.method="POST"
          : 0==e.method.length&&(e.method="POST")
            , e.method=e.method.toUpperCase(), e.contentType
       ||(e.contentType="application/x-www-form-urlencoded")
         ,"object"==typeof e.data
     )
  {
    d="";
    for(var t in e.data)
        "object"!=typeof e.data[t]&&(d+=t+"="+e.data[t]+"&");
        e.data=d.substr(0,d.length-1)
  } 

  b=new XMLHttpRequest,
  b.onreadystatechange=function(){
       4===this.readyState
       && (
            e.XMLHttpRequest&&0!=e.XMLHttpRequest.length&&e.XMLHttpRequest(this)
          , 200===this.status
            &&(
                s=this.responseText,e.response
                &&0!=e.response.length
                &&(e.responseType
                &&"JSON"==e.responseType.toUpperCase()
                &&(s=JSON.parse(s)),e.response(s))
            )
       )
  }
  , "GET"==e.method && (e.url+="?"+e.data,e.data="")
  , b.open(e.method,e.url,!0)
  , b.setRequestHeader("Content-type",e.contentType)
  , b.send(e.data)
  */
}
