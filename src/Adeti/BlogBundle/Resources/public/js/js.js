


var el = document.getElementById("Inscription");
//var st="onClick='javascript:setzone();event.stopPropagation();return false;' ";
//var unst="onClick='javascript:unsetzone();event.stopPropagation();return false;' ";


var zonemail=el.innerHTML;

//if ! $get['form']:




function setzone()
{
el = document.getElementById("contact");
var actionlink=document.createElement('span');
 actionlink.innerHTML="<a id 'actionlink' href='#' >replier ce cadre</a>";
el.innerHTML=zonemail;

//var form=document.createElement('span');
//form.innerHTML=zonemail;
el = document.getElementById("contact");
//el.removeEventListener("click", function(){setzone()}, false);
//actionlink.setAttribute("onClick","javascript:unsetzone(this);return false;");
setTimeout(function(){actionlink.setAttribute("onclick","javascript:unsetzone();return true;");//el.insertBefore(form,el.lastChild);
el.insertBefore(actionlink,el.firstChild);},100);
//actionlink.addEventListener("click", function(){unsetzone();return false;}, true);
;}

function unsetzone()
{ 
el = document.getElementById("Contact");

var actionlink=document.createElement('span');
actionlink.innerHTML="<a  id='actionlink' href='#' >poster un commentaire et/ou s'inscrire</a>";

//alert();
//el.removeEventListener("click", function(){unsetzone()}, false);


el.innerHTML="";
setTimeout(function(){actionlink.setAttribute("onclick","javascript:setzone();return true;");
el.insertBefore(actionlink,el.firstChild);
},100);
//el.addEventListener("click", function(){setzone();return false;}, true);
//setTimeout(function(){el.setAttribute("onclick","javascript:setzone(this);return false;");;},1000);
}
 function on()
{ alert('form on!'); }
 function off()
{ alert('form off!'); }



//if(isset($_POST['do']))
//echo  "setzone();";
//else
//echo  "unsetzone();";
document.include = function (url) {
 if ('undefined' == typeof(url)) return false;
 var p,rnd;
 if (document.all){
   // For IE, create an ActiveX Object instance
   p = new ActiveXObject("Microsoft.XMLHTTP");
 }
 else {
   // For mozilla, create an instance of XMLHttpRequest.
   p = new XMLHttpRequest();
 }
 // Prevent browsers from caching the included page
 // by appending a random  number (optional)
 //rnd = Math.random().toString().substring(2);
 //url = url.indexOf('?')>-1 ? url+'&rnd='+rnd : url+'?rnd='+rnd;
 // Open the url and write out the response
 p.open("GET",url,false);
 p.send(null);
var bod=document.getElementById('bodp')
 bod.innerHTML=p.responseText;
return true;}


 function setpagezone(url,id)
 { /*ex setpagezone:
  var pagezone=document.getElementById("bodp");
    stringtoloadinbodp="<object style='height:100%;width:100%;' type='text/html' data='"+pagetoshow+"'></object>";

    pagezone.innerHTML=stringtoloadinbodp;
    document.getElementById("console").innerText=stringtoloadinbodp;*/
 var xhr_object = null;
 var position = id;
 if(window.XMLHttpRequest) xhr_object = new XMLHttpRequest();
 else
 if (window.ActiveXObject) xhr_object = new ActiveXObject("Microsoft.XMLHTTP");

 // On ouvre la requete vers la page dÃ©sirÃ©e
 xhr_object.open("GET", url, true);
 xhr_object.onreadystatechange = function(){
 if ( xhr_object.readyState == 4 )
 { // j'affiche dans la DIV spÃ©cifiÃ©es le contenu retournÃ© par le fichier
 top.document.getElementById(position).innerHTML = xhr_object.responseText;
 }
 }
 // dans le cas du get
 xhr_object.send(null);
 }
function deleteplayerzone(){
 var playerzone=document.getElementById("plzn");

    //alert(stringtoloadinplayerzone+'\n');
    playerzone.innerHTML="DIASPORA RECORDS LABEL OPEN TO ALL";
}

function checkscript()

{
var __u=document.wkf__.luguser_;
var __p=document.wkf__.lugpwd_;
setpagezone("wiki/api.php?action=login&amp;lgname="+__u+"&amp;lgpassword="+__p,"wikiform");
return false;
} 

function PostObjectToUri(uri, obj) {
    "use strict";

    var json, form, input;

    json = JSON.stringify(obj);

    form = document.createElement("form");
    form.method = "post";
    form.action = uri;
    input = document.createElement("input");
    input.setAttribute("name", "json");
    input.setAttribute("value", json);
    form.appendChild(input);
    document.body.appendChild(form);
    form.submit();
};

/*
var fond=document.createElement('div')
fond.display="block";
fond.style.backgroundColor='red';
fond.setAttribute('width','1000px');
//fond.style.zIndex='5';
var bodybalise=document.getElementById('bodp');
//bodybalise.innerHTML=fond;
bodybalise.appendChild(fond);*/

