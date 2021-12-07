<?php
error_reporting(0);
ob_start();
$nikcookie=$_COOKIE["tort"];

$permission=0;

				$myfile=fopen("permissions.txt", "r");
	$last = fread($myfile,filesize("permissions.txt"));
	
$prawa = explode("@", $last);

foreach ($prawa as $key){
	//echo "<script>alert('".$nikcookie."-".$key."');</script>";
	if ($key==$nikcookie and !empty($key) ){
		$permission = 1;
		//echo "<script>alert('".$permission."');</script>";
		
		
	}
}




?><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width">
<script type="text/javascript" src="jquery.js"></script>

<style>
#drop_file_zone {
	color:000000;
    background-color: #EEE;
    border: #999 5px dashed;
    width: 290px;
    height: 200px;
    padding: 8px;
    font-size: 18px;
}
#drag_upload_file {
  width:50%;
  margin:0 auto;
}
#drag_upload_file p {
  text-align: center;
}
#drag_upload_file #selectfile {
  display: none;
}


@font-face {
  font-family:"Berlin";
  src: url("Berlin.ttf") format("truetype");
}

body {
	font-family:Berlin;
	font-size:24px;
	color:ffffff;
text-shadow: 0 -1px 4px #FFF, 0 -2px 10px #ff0, 0 -10px 20px #ff8000, 0 -18px 40px #F00;
background: #606060;

}

a            { text-decoration: none; font-size: 24px; font-family: 'Berlin';color: #00aa00;

color: #ffffff;}
A:hover      { text-decoration: none; color: #ff0000; font-size: 24px; font-family: 'Berlin';

}

td {
	
		font-family:Berlin;
	font-size:24px;
	color:ffffff;
text-shadow: 0 -1px 4px #FFF, 0 -2px 10px #ff0, 0 -10px 20px #ff8000, 0 -18px 40px #F00;
background: #000000;
}

.aaa{
	
	border: 5px dashed #A40000;
	
}

.ooo{
	
	background: #606060;
	
}

</style>
<body bgcolor="000000">

<table width="600" align="center" class="ooo"><tr><td class="ooo">

<img src="logo.png">

<div id="wgrywacz" style='position: absolute;width:600;height:100%;background-color:000000;opacity: 1;display:none'>
<div align="center">

<br><br><br>

<div id="drop_file_zone" ondrop="upload_file(event)" ondragover="return false">
    <div id="drag_upload_file">
        <p>upuść plik tu</p>
        <p>albo</p>
        <p><input type="button" value="wybierz plik" onclick="file_explorer();" /></p>
		<div id="progress" style="background-color:ff0000;height:10;width:5;"></div>
		<br><input type="button" onclick="$('#wgrywacz').hide();" value="zamknij">
		
        <input type="file" id="selectfile" />
    </div>
</div>
<div id="cialo"></div>

</div>
</div>
<?php if (!empty($nikcookie)){echo "witaj ".$nikcookie; }?><br><br>
<a href="register.php"> rejestracja </a>  <a href="login.php"> logowanie </a> <a href="index.php?wyloguj=1">wyloguj</a>
<br><br>
<?php
function kto(){ 

if ($_SERVER['HTTP_X_FORWARDED_FOR']) { 
    $kto = $_SERVER['HTTP_X_FORWARDED_FOR']; 
} 
else { 
  $kto = $_SERVER['REMOTE_ADDR']; 
} 

return $kto; 
}
//------------------------------------------drzewko

$path    = 'top';
$files = scandir($path);
$i=0;
$co=$_GET["co"];
$co2=$_GET["co2"];
if(empty($co) and empty($co2)){
if (file_exists($path)) {
/*
foreach ($files as $key){
$i++;

$key2 = explode("@", $key);

	$pom=str_replace(".txt","",$key2[1]);
	
			if($i>2){
		//echo "link do czatu ".$pom."<br>";
		echo "<a href='index.php?co=".$pom."'>".$key2[0]."</a><br>";
			}
		
	//var_dump($key);
	
}
*/

$licxz=0;
foreach ($files as $key){
	$licz++;
}

for($i=0;$i<$licz;$i++){
	for($j=0;$j<$licz;$j++){
		$key = explode("@", $files[$i]);
		$key2 = explode("@", $files[$j]);
		if($key[1]<$key2[1]){
			//echo "<script>alert(".$key[0].");</script>";
			$pom=$files[$i];
			$files[$i]=$files[$j];
			$files[$j]=$pom;
		
			
		}
		
		
	}
	
}

foreach ($files as $key){
$i++;
	//echo $pom."<br>6666666666";
$key2 = explode("@", $key);

	$pom=str_replace(".txt","",$key2[2]);

			if($pom!="last" and $pom!="." and $pom!=".." and $key2[0] != "." and $key2[0] != ".." and $key2[0] != "last"){
				
				$sciezka = "tmp/".$pom."/last.txt";
					$myfile=fopen($sciezka, "r");
	$last = fread($myfile,filesize($sciezka));
				
				
				
		//echo "link do czatu ".$pom."<br>";
		echo "<table class='aaa'><tr><td><table width='600'><tr><td width='70%'><a href='index.php?co=".$pom."'>".$key2[0]."</a></td><td> ostatni: ".$last."  </td></tr></table></td></tr></table><br>";
			}
		
	//var_dump($key);
	
}

//--------------------------dodaj
if($permission==1){

echo "<br><br>dodaj<br><br>";

echo "<form method='POST'>";

echo "<input type='hidden' id='wiele2' name='wiele2'>";

echo "<input type='text' name='dodajd'>";

echo "
<input type='submit' value='ok'>

</form><br><br>";



//---------------------edycja
$i=0;

echo "<form method='POST'>";

echo "<input type='hidden' name='wiele' id='wiele'><br>";

$max=0;

$max2=0;

//-------------------wyjasnienie
echo "<input type='text'  value='nazwa'>";


echo "<input type='text' value='kolejnosc'>";

echo "<input type='text'  value='id'>";

//echo "<input type='text'  value='sciezka'>";



//-------------------------------
foreach ($files as $key){
$i++;
	//echo $pom."<br>6666666666";
$key2 = explode("@", $key);

echo "<input type='text' name='a".$i."' value='".$key2[0]."'>";


echo "<input type='text' name='b".$i."' value='".$key2[1]."'>";
$pom=str_replace(".txt","",$key2[2]);
echo "<input type='text' name='c".$i."' value='".$pom."'>";
$pom2="top/".$key2[0]."@".$key2[1]."@".$key2[2];
echo "<input type='hidden' name='d".$i."' value='".$pom2."'>";

if($max<$pom){
	
	$max=$pom;
	
	
}


echo "<a href='index.php?deld=".$pom2."&ajdi=".$pom."'>X</a>";

echo "<br>";
}
$max=$max+1;
echo "<script>$('#wiele').val(".$max.");</script>";

echo "<script>$('#wiele2').val(".$max.");</script>";


echo "
<input type='submit' value='zapis'> 

</form>";

//var_dump($files);

}
}
}
//------------------------tematy
if(empty($co2) and !empty($co)){
	if(!empty($nikcookie)){
	echo "
	
	<form method='POST'>
	
	dodaj temat <input type='text' name='dtemat'>
	<input type='hidden' name='dco' value='".$co."'>
	 <input type='submit' value='dodaj'>
	
	</form>
	
	
	
	";
	
	}else{
		
		echo "zaloguj sie by dodawac<br>";
		
	}
	
if(is_numeric($co)){	
	$path    = "tmp/".$co;
$files = scandir($path);
$i=0;

if (file_exists($path)) {
	
	

	$myfile=fopen($path, "r");
	$ksiega = fread($myfile,"1000");
	//echo "<script>alert('".$path."');</script>";
	$pierwszy =  explode("@", $ksiega);
	
	$pierwsza=0;
	foreach ($pierwszy as $key){
		
		if($pierwsza==0){
		
$lasttable=explode("*", $key);

$ostatninik=$lasttable[1];	
			
		}
		
		$pierwsza++;
	}
	$pierwsza=0;
	
foreach ($files as $key){
$i++;
	$pom=str_replace(".txt","",$key);
	
	//--------------------------------------------ostaytni user
	$scie=$path."/".$key;
	$myfile=fopen($scie, "r");
	$ksiega = fread($myfile,"1000");
	//echo "<script>alert('".$path."');</script>";
	$pierwszy =  explode("@", $ksiega);
	
	$pierwsza=0;
	foreach ($pierwszy as $key2){
		
		if($pierwsza==0){
		
$lasttable=explode("*", $key2);

$ostatninik=$lasttable[2];	
			
		}
		
		$pierwsza++;
	}
	
	
	//----------------------------------------------
			if($i>2 and $pom != "last"){
		//echo "link do czatu ".$pom."<br>";
		echo "<table class='aaa'><tr><td><table width='600'><tr><td width='70%'> <a href='index.php?co2=".$key."&co=".$co."'>".$pom."</a></td><td> ostatni: ".$ostatninik."</td></tr></table></td></tr></table><br>";
		if($permission==1){
			
			echo "<a href='index.php?delfile=".$pom."&co=".$co."'>X</a>";
		}
		
		//echo "<br>";
			}
		
	//var_dump($key);
	
	
	
	
	
	
	
}
}

	
}
}

//--------------------------------ksiega
if(!empty($co2)){
	
	$now_date = date('Y-m-d H:i:s', time());
	if(is_numeric($co)){
	$sciezka="tmp/".$_GET["co"]."/".$_GET["co2"];
	
	if(!empty($nikcookie)){
	//ksiega
	echo "<form method='POST'>
	
	<a href='index.php'>powrót</a><br>
	<input type='hidden' name='ip' value='".kto()."'>
	
	<input type='hidden' name='nik' value='".$nikcookie."'>
	
	<input type='hidden' name='id' id='id' value=''>
	
	<input type='hidden' name='sciezka'  value='".$sciezka."'>
	
	
	<textarea id='arena' name='tresc' rows='4' cols='50'></textarea>
	<br>
	<textarea  id='obrazki' name='obrazki' style='display:none;'></textarea>
	
	<input type='hidden' name='co' value='".$co."'>
	
	<input type='hidden' name='co2' value='".$co2."'>
	
	<input type='hidden' name='czas' value='".$now_date."'>

	
	<input type='submit' value='wyślij'>
	
	
	</form>
	
	
	
	";
		echo "<br><br><span onclick='$(\"#wgrywacz\").show();'>wgraj</span><br><br>";
	}else{
		
		echo "zaloguj sie by dodawac";
	}
	

	
	
	
	//echo "<span onclick='$(\"#obrazki\").show();'>klik</span>";
	
	
	if (file_exists($sciezka)) {
	$myfile=fopen($sciezka, "r");
	$ksiega = fread($myfile,filesize($sciezka));
	
	$tabela = explode("@", $ksiega);
	$liczid=0;
	$idik=0;
	foreach ($tabela as $key){
		$liczid++;
		$cialo=explode("*", $key);
		
	
	echo "<table class='aaa'><tr><td><table width='600'><tr><td width='20%'>".$cialo[2]."<br>".$cialo[4]."</td><td>".$cialo[3]."</td></tr></table></td></tr></table>";
	
	if ($permission==1){
		
		echo "<a href='index.php?delco=".$cialo[0]."&sciezka=".$sciezka."&co=".$co."&co2=".$co2."'>X</a>";
		
	}
	//var_dump($cialo);
	echo "<hr>";
	
	if($idik<$cialo[0] and is_numeric($cialo[0]) ){
		
		$idik=$cialo[0];
		
		
	}
	$pom2=$idik;
	
	}
	$pom2=$pom2+1;
	
	echo "<script>$('#id').val('".$pom2."');</script>";
	
}
}
}

?>
</td></tr></table>

<script>

   var bar = $('.bar');
    var percent = $('.percent');
    var status = $('#status');


var fileobj;
function upload_file(e) {
    e.preventDefault();
    fileobj = e.dataTransfer.files[0];
    ajax_file_upload(fileobj);
}
  
function file_explorer() {
    document.getElementById('selectfile').click();
    document.getElementById('selectfile').onchange = function() {
        fileobj = document.getElementById('selectfile').files[0];
        ajax_file_upload(fileobj);
    };
}
  
function ajax_file_upload(file_obj) {
    if(file_obj != undefined) {
        var form_data = new FormData();                  
        form_data.append('file', file_obj);
        var xhttp = new XMLHttpRequest();
		
		
		
xhttp.onreadystatechange = function () {

    if (xhttp.status) {

        if (xhttp.status == 200 && (xhttp.readyState == 4)){
            //To do tasks if any, when upload is completed
        }
    }
}
xhttp.upload.addEventListener("progress", function (event) {

    var percent = (event.loaded / event.total) * 100;
    //**percent** variable can be used for modifying the length of your progress bar.
    //console.log(percent);
	$("#progress").css("width",percent);

});

		
		
		
		
		
        xhttp.open("POST", "ajax.php", true);
        xhttp.onload = function(event) {
			
			
			
		

    var percent = (event.loaded / event.total) * 100;
    //**percent** variable can be used for modifying the length of your progress bar.
    //console.log(percent);
	
	


			
            oOutput = document.querySelector('.img-content');
            if (xhttp.status == 200) {
                //$("#cialo").html($("#cialo").html()+"<br>"+this.responseText +"<br>");
				alert(this.responseText + " wgrany");
				var pom=this.responseText;
				$('#obrazki').html($('#obrazki').html() + ' <a href="uploads/' + this.responseText + '"><img src="uploads/' + this.responseText + '" width="150"><br>' + this.responseText + '</a><br>');
            } else {
                oOutput.innerHTML = "Error " + xhttp.status + " occurred when trying to upload your file.";
            }
        }
 
        xhttp.send(form_data);
    }
}




</script>


<?php

$id=$_POST["id"];
$ip=$_POST["ip"];
$nik=$_POST["nik"];
$sciezka=$_POST["sciezka"];
$tresc=$_POST["tresc"];
$obrazki=$_POST["obrazki"];
$co=$_POST["co"];
$co2=$_POST["co2"];
$czas=$_POST["czas"];

if(!empty($tresc)){
	
	$myfile=fopen($sciezka, "r");
	$ksiega = fread($myfile,filesize($sciezka));
	
	
	
	$tresc=htmlspecialchars($tresc);
	
	//$tresc=htmlentities($tresc);
	
	$tresc=nl2br($tresc);
	
	$tresc=str_replace("@", "-", $tresc);
	$tresc=str_replace("*", "-", $tresc);
//
//htmlspecialchars(
//htmlentities(
	$tresc=$tresc."<br>".$obrazki;
	
	
	
	$noweDane=$id."*".$ip."*".$nik."*".$tresc."*".$czas."@";
	
	$noweDane=$noweDane.$ksiega;
	
	$fp = fopen($sciezka, "w");


fputs($fp, $noweDane);


fclose($fp);
$sci="tmp/".$co."/last.txt";
$fp = fopen($sci, "w+");
$noweDane=$nikcookie;

fputs($fp, $noweDane);


fclose($fp);

	header('Location: index.php?co='.$co.'&co2='.$co2);
}

if($_GET["wyloguj"]==1){
	
	setcookie("tort", $nikcooke, time() - 3600 * 24 * 7 * 4 * 12);
	
	header('Location: index.php');
}


$dtemat=$_POST["dtemat"];
$dco=$_POST["dco"];
$path="/tmp/".$dco."/".$dtemat.".txt";
if(!empty($dtemat)){
	
	$path="tmp/".$dco."/".$dtemat.".txt";
	$fp = fopen($path, "w+");

	$noweDane="dane";
		
fputs($fp, $noweDane);
fclose($fp);
header('Location: index.php?co='.$dco);
}
//echo $dtemat;




$delco=$_GET["delco"];
$sciezka=$_GET["sciezka"];
$co=$_GET["co"];
$co2=$_GET["co2"];
if(!empty($delco)){
	
	
	$myfile=fopen($sciezka, "r");
	$ksiega = fread($myfile,filesize($sciezka));
		$tabela = explode("@", $ksiega);
	foreach ($tabela as $key){
		
		
		$tabela2=explode("*", $key);
		//echo "<script>alert('".$tabela2[0]."');</script>";
		
			//echo "<script>alert('".$tabela2[0]."');</script>";
			if ($tabela2[0]==$delco){
				
				
				$dokasacji=$tabela2[0]."*".$tabela2[1]."*".$tabela2[2]."*".$tabela2[3]."*".$tabela2[4]."@";
	

	
	
	$ksiega = str_replace($dokasacji,"",$ksiega);
				
				
				$fp = fopen($sciezka, "w");


fputs($fp, $ksiega);


fclose($fp);
echo "<script>alert('".$dokasacji."');</script>";
header('Location: index.php?co='.$co.'&co2='.$co2);
				
			}
		
		
		
	}
	
	
}
$delfile=$_GET["delfile"];
$co=$_GET["co"];
if(!empty($delfile)){
	$path="tmp/".$co."/".$delfile.".txt";
	
	unlink($path);
	
	header('Location: index.php?co='.$co);
}




//-----------------------------------------------top
$wiele=$_POST["wiele"];
if(!empty($wiele)){
	
	for($i=0;$i<=$wiele;$i++){

	$pom="top/".$_POST["a".$i]."@".$_POST["b".$i]."@".$_POST["c".$i].".txt";
	
	$pom2=$_POST["d".$i];
	
	
	rename($pom2, $pom);
	
	
		echo $i."<br>";
	}
	
	
	
	header('Location: index.php');
	
}

function deleteDirectory($dirPath) {
    if (is_dir($dirPath)) {
        $objects = scandir($dirPath);
        foreach ($objects as $object) {
            if ($object != "." && $object !="..") {
                if (filetype($dirPath . DIRECTORY_SEPARATOR . $object) == "dir") {
                    deleteDirectory($dirPath . DIRECTORY_SEPARATOR . $object);
                } else {
                    unlink($dirPath . DIRECTORY_SEPARATOR . $object);
                }
            }
        }
    reset($objects);
    rmdir($dirPath);
    }
}
$deld=$_GET["deld"];
$ajdi=$_GET["ajdi"];
if(!empty($deld)){
	$dirPath="tmp/".$ajdi;
	
	unlink($deld);
	
	 deleteDirectory($dirPath);
	
	header('Location: index.php');
	
	//echo "<script>alert('".$ajdi."');</script>";
	
	
}

$dodajd=$_POST["dodajd"];
$wiele2=$_POST["wiele2"];
if (!empty($dodajd)){
	
	$path="top/".$dodajd."@".$wiele2."@".$wiele2.".txt";
	
	$fp = fopen($path, "w+");


fputs($fp, "lol");


fclose($fp);

$path2="tmp/".$wiele2;
mkdir($path2, 0777);
		header('Location: index.php');
}
?>


