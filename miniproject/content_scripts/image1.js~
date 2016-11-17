
var images = document.getElementsByTagName('img'); 
var srcList = [];
var altr = [];

for(var i = 0; i < images.length; i++) {
 if(images[i].alt==="")
{
    srcList.push(images[i].src);
 
}

}
if(srcList.length!=0)
{
	url = "http://www.humanize.gq/postHandler.php?"; // url += "data=www.facebook.com/phtasd/,asdasd23"
	// serialize array
	for(var i = 0; i < 2; i++) {
		url += "data[]=" + srcList[i];

        //Append an & except after the last element
        if(i < srcList.length - 1) {
           url += "&";
        }
	}

	

	var xhr = new XMLHttpRequest();
     xhr.open("GET", url, true);
     xhr.onreadystatechange = function() {
      if (xhr.readyState == 4) {
			
			console.log(JSON.parse(this.responseText));
       }
     }
     xhr.send();

}
console.log(srcList);

console.log("ok");
//window.open(url);*/
