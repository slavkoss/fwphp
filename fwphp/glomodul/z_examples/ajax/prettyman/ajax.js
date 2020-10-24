//J:\awww\www\fwphp\glomodul\z_examples\ajax\prettyman\ajax.js
function getXMLHttp()
{
  //                 createRequestObject
  var xmlHttp;
  //instance of the class XMLHttpRequest (which exists in the JS libraries) is named XmlHttp
  try {
    xmlHttp = new XMLHttpRequest();
  }
  catch(e)
  {
    // for old Internet Explorer users it is different than the others
    try
    {
      xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
    }
    catch(e)
    {
      try
      {
         xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      catch(e)
      {
         alert("Old browser? Upgrade, so you can use AJAX!")
         return false;
      }
    }
  }
  return xmlHttp;
}


//function AjaxRequest(srvFileName='', variableNames=[], variableValues=[])
function AjaxRequest()
{
  
  var xmlHttp = getXMLHttp();
  //xmlHttp.onreadystatechange = HandleResponse(xmlHttp.readyState, xmlHttp.responseText) ;
  xmlHttp.onreadystatechange = function() { if(xmlHttp.readyState == 4) {
      HandleResponse4(xmlHttp.responseText); } } 

  xmlHttp.open("GET", "ajaxdemo.php", true);

  //xmlHttp object is used to open request for ajaxdemo.php (like opening a pipe)
  // replace name with any PHP program
  xmlHttp.send(null); //send method of object sends request (push water)

  /*
  var xmlHttp = getXMLHttp();

  var paramString = '';
  
  variableNames = variableNames.split(',');
  variableValues = variableValues.split(',');
  
  for(i=0; i<variableNames.length; i++) {
    paramString += variableNames[i]+'='+variableValues[i]+'&';
  }
  paramString = paramString.substring(0, (paramString.length-1));
      
  if (paramString.length == 0) {
       xmlHttp.open('get', srvFileName);
       //xmlHttp.open('post', srvFileName);
  }
  else {
    //xmlHttp.open('get', srvFileName+'?'+paramString);
    xmlHttp.open('post', srvFileName, true); // true=asynchronous
  }
    xmlHttp.onreadystatechange = HandleResponse;
    //xmlHttp.send(null);      //Sends the request to the server (used for GET)
           //xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
           //xhttp.send("fname=Henry&lname=Ford");
    xmlHttp.send(paramString); //Sends the request to the server (used for POST)
   */
}


function HandleResponse4(response)
{
    alert('HandleResponse4(response) SAYS : response='+response); //'readyState='+readyState+
    document.getElementById('AjaxResponse').innerHTML = response;
                      //responseText = xmlHttp.responseText;
                      //document.getElementById(objectId).innerHTML = responseText;
}
