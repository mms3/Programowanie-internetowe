/* encoding="UTF-8" */

var obj = null;
var wsk = 0;

function init(){
   obj = document.getElementById('animatedobject');
   obj.style.left = '0px';
   animate();
}

function animate(){
   if (parseInt(obj.style.left) == 0)
      wsk = 0;
   if (parseInt(obj.style.left) == document.getElementById('field').offsetWidth - document.getElementById('animatedobject').offsetWidth)
      wsk = 1;

   if (wsk == 0){
      obj.style.left = parseInt(obj.style.left)+1+'px';
   } else {
      obj.style.left = parseInt(obj.style.left)-1+'px';
   }
   setTimeout(animate, 10);
}

window.onload = init;

function postS() {
   if (window.XMLHttpRequest) { // Mozilla, Safari, Opera ...
      http_request = new XMLHttpRequest();
      if (http_request.overrideMimeType)
                http_request.overrideMimeType('text/xml');
   } else if (window.ActiveXObject) { // IE
      http_request = new ActiveXObject("Microsoft.XMLHTTP");
   }
   
   http_request.onreadystatechange = function() {
      if (http_request.readyState == 4 && http_request.status == 200)
         document.getElementById("response").innerHTML = http_request.responseText;
   };
   http_request.open("POST", "test.php", false);
   http_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
   http_request.send("sync=Synchronicznie");
}

function postA() {
   if (window.XMLHttpRequest) { // Mozilla, Safari, Opera ...
      http_request = new XMLHttpRequest();
      if (http_request.overrideMimeType)
         http_request.overrideMimeType('text/xml');
   } else if (window.ActiveXObject) { // IE
      http_request = new ActiveXObject("Microsoft.XMLHTTP");
   } 

   http_request.onreadystatechange = function() {
      if (http_request.readyState == 4 && http_request.status == 200)
         document.getElementById("response").innerHTML = http_request.responseText;
   };
   http_request.open("POST", "test.php", true);
   http_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
   http_request.send("sync=Asynchronicznie");
}

function getS() {
   if (window.XMLHttpRequest) { // Mozilla, Safari, Opera ...
      http_request = new XMLHttpRequest();
      if (http_request.overrideMimeType)
         http_request.overrideMimeType('text/xml');
   } else if (window.ActiveXObject) { // IE
      http_request = new ActiveXObject("Microsoft.XMLHTTP");
   } 

   http_request.onreadystatechange = function() {
      if (http_request.readyState == 4 && http_request.status == 200)
         document.getElementById("response").innerHTML = http_request.responseText;
   };
   http_request.open("GET", "test.php?sync=Synchronicznie", false);
   http_request.send();
}
 
function getA() {
   if (window.XMLHttpRequest) { // Mozilla, Safari, Opera ...
      http_request = new XMLHttpRequest();
      if (http_request.overrideMimeType)
         http_request.overrideMimeType('text/xml');
   } else if (window.ActiveXObject) { // IE
      http_request = new ActiveXObject("Microsoft.XMLHTTP");
   } 
 
    http_request = new XMLHttpRequest();
    http_request.onreadystatechange = function() {
       if (http_request.readyState == 4 && http_request.status == 200)
            document.getElementById("response").innerHTML = http_request.responseText;
    };
    http_request.open("GET", "test.php?sync=Asynchronicznie", true);
    http_request.send();
}
 
function fun(text) {
   if (window.XMLHttpRequest) { // Mozilla, Safari, Opera ...
      http_request = new XMLHttpRequest();
      if (http_request.overrideMimeType)
         http_request.overrideMimeType('text/xml');
   } else if (window.ActiveXObject) { // IE
      http_request = new ActiveXObject("Microsoft.XMLHTTP");
   } 
 
    http_request = new XMLHttpRequest();
    http_request.onreadystatechange = function() {
       if (http_request.readyState == 4 && http_request.status == 200)
            document.getElementById("baza").innerHTML = http_request.responseText;
    };
    http_request.open("GET", "data.php?login="+text, true);
    http_request.send();
}
