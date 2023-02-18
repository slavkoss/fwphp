var output = document.getElementById('output');
window.onload = jData;
function submitData(fdata) {
    var xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        console.log(xhttp.responseText);
        jData();
    }
    xhttp.open(fdata.method, fdata.action, true);
    xhttp.send(new FormData(fdata));
    //console.log(fdata.method);
    return false;
}
function jData() {
    var ajaxhttp = new XMLHttpRequest();
    var url = "json.php";
    ajaxhttp.open("GET", url, true);
    ajaxhttp.setRequestHeader("content-type", "application/json");

    ajaxhttp.onreadystatechange = function () {
        output.innerHTML = "";
        if (ajaxhttp.readyState == 4 && ajaxhttp.status == 200) {
            var jcontent = JSON.parse(ajaxhttp.responseText);
            for (var myObj in jcontent) {
                output.innerHTML += '<div>' + jcontent[myObj].firstName + ' ' + jcontent[myObj].lastName + ' ' + jcontent[myObj].age + '</div>';
            }
        }
    }
    ajaxhttp.send();
}