<?php
require "connect.php"
header("Content-Type: application/javascript");
header('Access-Control-Allow-Origin: *'); 
if(isset($_GET["data"])) {
    $url[]=$_GET["data"];
      }
$arrlength = count($url);

for($x = 0; $x < $arrlength; $x++) {
    $sql = "SELECT * FROM info WHERE url='$url[$x]'";
$result = $conn->query($sql);
if(isset($result)){

$postid = $result.postid;
login();
$altr[$x]=comment(postid);
}
else
{
login();
$newpostid=postphoto($url[$x]);
$sql = "INSERT INTO info (url, postid)
VALUES ('$url[$x]', '$newpostid')";
$conn->query($sql);
$altr[$x]="";
}

}
echo json_encode("$altr");
<script>
        window.fbAsyncInit = function() {
                FB.init({
                appId: '352671538404366',
                status: true,
                cookie: true,
                xfbml: true
            });
        };

        // Load the SDK asynchronously
        (function(d){
        var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement('script'); js.id = id; js.async = true;
        js.src = "//connect.facebook.net/en_US/all.js";
        ref.parentNode.insertBefore(js, ref);
        }(document));

function login() {
            FB.login(function(response) {

            // handle the response
            console.log("Response goes here!");

            }, {scope: 'publish_pages' });
}

function postphoto(url);{
  FB.api('/1493608767521631/photos', 'post', { url:'url', message:'what is this', access_token:'EAAFAwL3E3A4BAEn0aBk6YNUJ14xXi4W6upQuCpguZC4t6bs7dqU7iNOOImbdA7T4OmAA9D6mPwvuUxkGrZCNC8sRyN5ILrL61pWYlfgfeqBgVL2r5lWoCqEXR1Y7dZAzZCpep4QLzqbMcJkzH37b2rkZCWNxSaYnCAe6i69nKBwZDZD' },
    function(res) {
id=res.post_id;
alert('ok: ' + id);
return(id); }
  )
}

function comment(){
          
var like=0;
var mesalt="";
  FB.api('1493608767521631_1822311127984725?fields=comments', {access_token:'EAAFAwL3E3A4BAEn0aBk6YNUJ14xXi4W6upQuCpguZC4t6bs7dqU7iNOOImbdA7T4OmAA9D6mPwvuUxkGrZCNC8sRyN5ILrL61pWYlfgfeqBgVL2r5lWoCqEXR1Y7dZAzZCpep4QLzqbMcJkzH37b2rkZCWNxSaYnCAe6i69nKBwZDZD'},
function(res) {
 
                for (i in res.comments.data)
                 {
                   FB.api('/'+res.comments.data[i].id+'?fields=like_count',                 {access_token:'EAAFAwL3E3A4BAEn0aBk6YNUJ14xXi4W6upQuCpguZC4t6bs7dqU7iNOOImbdA7T4OmAA9D6mPwvuUxkGrZCNC8sRyN5ILrL61pWYlfgfeqBgVL2r5lWoCqEXR1Y7dZAzZCpep4QLzqbMcJkzH37b2rkZCWNxSaYnCAe6i69nKBwZDZD'},
    function(resp)   { 

                           if(resp.like_count>=like)
                             {
                               like=resp.like_count;
                               mesalt=resp.id;
                               FB.api('/'+mesalt, {access_token:'EAAFAwL3E3A4BAEn0aBk6YNUJ14xXi4W6upQuCpguZC4t6bs7dqU7iNOOImbdA7T4OmAA9D6mPwvuUxkGrZCNC8sRyN5ILrL61pWYlfgfeqBgVL2r5lWoCqEXR1Y7dZAzZCpep4QLzqbMcJkzH37b2rkZCWNxSaYnCAe6i69nKBwZDZD'},
                    function(respnd) {

                     console.log(respnd.message);
                            return(respnd.message);


                                      });
                                
                                   
                               } 


                      });
                   }
                
                 
                    
            });
}

        </script>
?>
