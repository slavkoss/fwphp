var http = createRequestObject();
var objectId = '';


function createRequestObject(htmlObjectId){
    var obj;
    var browser = navigator.appName;
    
    objectId = htmlObjectId;
    
    if(browser == "Microsoft Internet Explorer"){
        obj = new ActiveXObject("Microsoft.XMLHTTP");
    }
    else{
        obj = new XMLHttpRequest();
        //https://www.kirupa.com/html5/making_http_requests_js.htm
        //obj.open('GET', "https://ipinfo.io/json", true);
    }
    return obj;    
}

function sendReq(serverFileName, variableNames, variableValues) {
  var paramString = '';
  
  variableNames = variableNames.split(',');
  variableValues = variableValues.split(',');
  
  for(i=0; i<variableNames.length; i++) {
    paramString += variableNames[i]+'='+variableValues[i]+'&';
  }
  paramString = paramString.substring(0, (paramString.length-1));
      
  if (paramString.length == 0) {
       http.open('get', serverFileName);
       //http.open('post', serverFileName);
  }
  else {
    //http.open('get', serverFileName+'?'+paramString);
    http.open('post', serverFileName, true); // true=asynchronous
  }
    http.onreadystatechange = handleResponse;
    //http.send(null);      //Sends the request to the server (used for GET)
           //xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
           //xhttp.send("fname=Henry&lname=Ford");
    http.send(paramString); //Sends the request to the server (used for POST)
}

function handleResponse() {
  
  if(http.readyState == 4){
    responseText = http.responseText;
    document.getElementById(objectId).innerHTML = responseText;
    }
}