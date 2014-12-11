<?php require_once("../includes/db_connection.php"); ?>
<?php
 if(!isset($layout_context)){
 $layout_context = "public";
 }
 $sql = "SELECT *
		FROM logo
		ORDER BY id DESC
		LIMIT 1";
$hasil = mysqli_query($koneksi, $sql);
$baris = mysqli_fetch_assoc($hasil);
?>
<html>
	<head>
		<title>untitled</title>
		<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
		<script>tinymce.init({selector:'textarea'});</script>
		<script language="JavaScript1.2">
var bgimages=new Array()
bgimages[0]="1.jpg"
bgimages[1]="2.jpg"
bgimages[2]="3.jpg"

//preload images
var pathToImg=new Array()
for (i=0;i<bgimages.length;i++){
pathToImg[i]=new Image()
pathToImg[i].src=bgimages[i]
}

var inc=-1

function bgSlide(){
if (inc<bgimages.length-1)
inc++
else
inc=0
document.body.background=pathToImg[inc].src
}

if (document.all||document.getElementById)
window.onload=new Function('setInterval("bgSlide()",3000)')

</script>
		<link href="stylesheets/public.css" media="all" rel="stylesheet" type="text/css"/>
	</head>
	<body background="http://localhost/CSS-StevenDugganEvents/public/3.jpg">
		<div id="bungkusheader">
		<div id="bungkuslogo">
		<img src="<?php echo $baris["gambar"];?>"/>
		<img src="<?php echo $baris["gambar"];?>" style="width="176px"; height="176px"/>
		</div>
		<div id="header">
			<p style="text-align:right;font-size:12px;"><img src="images/icoMail.png" align="right">Email Us	: info@cssevent.com</p>
			<br><p style="text-align:right;font-size:12px;margin-top:-40px;"><img src="images/icoPhone.png" align="right">Call Us		: +62 (21)630-4444</p>
			<br><p style="text-align:center;font-size:12px;margin-top:-45px;">CREATIVITY AT ITS BEST<img src="images/star.png"></p>
			<br><p style="text-align:center;font-size:12px;margin-top:-40px;">ONE TO REMEMBER!! MANY THANKS TO CHARLIE, STEVEN, SUHENDRIE AND HIS TEAM<img src="images/star.png"></p>
			<br><p style="margin-top:-95px;"><a href="admin.php">CSS~EVENTS</a></p>
			<br><p style="margin-top:-85px;font-size:14px;">THE ART OF EVENTS</a></p>
		</div>
		</div>