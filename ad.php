<!DOCTYPE html>
<html>
<head>
  <title>Ioe</title>
<meta charset="utf-8"/>
  </head>
<body>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
  <script src="https://www.gstatic.com/firebasejs/5.9.3/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.0.0/firebase-database.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.9.3/firebase-firestore.js"></script>
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyDR1zhZCfcnACcsuOLGzzqrqUAIo93d19c",
    authDomain: "adars-7329f.firebaseapp.com",
    databaseURL: "https://adars-7329f.firebaseio.com",
    projectId: "adars-7329f",
    storageBucket: "adars-7329f.appspot.com",
    messagingSenderId: "959140462497"
  };
  firebase.initializeApp(config);
</script>
<?php
 $page = $_SERVER['PHP_SELF'];
$sec = "20";
header("Refresh: $sec; url=$page"); ?>
<?php
<?php
function curl_get_contents($url)
{
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  $data = curl_exec($ch);
  curl_close($ch);
  return $data;
}
$url='http://exam.ioe.edu.np';
$todate=date('Y');
$string_file=curl_get_contents($url);
$ioe = array();
preg_match('!<a href="\/Images\/NotificationsFile\/(.*?)">.*?<\/a>!',$string_file,$match);
$ioe['link'] = $match[1];
preg_match('!<td><a href="\/Images\/NotificationsFile\/.*?">(.*?)<\/a><\/td>!',$string_file,$match);
$ioe['title'] = $match[1];
?>
<script>
var bool = "<?php echo $ioe['link'] ?>";
var title ="<?php echo $ioe['title'] ?>";
var db =firebase.firestore();
db.collection("links").doc("ioe")
    .onSnapshot(function(doc) {
         var bool2 = doc.data();
         myfun(bool2.name,bool2.name2);
});
function myfun(ad,xy)
{
if(bool==ad)
{
console.log("same");
}else {
db.collection("links").doc("ioe").set({
    name: bool,
    name2: title
  })
.then(function() {
    console.log("Document written : ");
})
.catch(function(error) {
    console.error("Error adding document: ", error);
});
}
}
</script>
</body>
</html>
