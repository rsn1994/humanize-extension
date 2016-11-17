
var images = document.getElementsByTagName('img'); 

for(var i = 0; i < images.length; i++) {
 if(images[i].alt==="")
{
var str=images[i].src
url = "http://www.humanize.gq/postHandler.php?";
url += "data=" + str;
url += "&";
var xhr = new XMLHttpRequest();
 xhr.open("GET", url, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 ) {
console.log(JSON.parse(this.responseText));
console.log(url);
                 /*  var id=images[i].id;
                  document.getElementById(id).alt=JSON.parse(this.responseText);*/
            }
        }
        xhr.send();
}
   
}
