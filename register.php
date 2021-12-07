<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<script type="text/javascript" src="jquery.js"></script>


<script>
function sprawdz(){
	
	if ($("#motyl3").val() != $("#motyl2").val()){
		
		alert("rozne hasla");
		
		//alert($("#motyl3").val());
		
		//alert($("#motyl2").val());
		
		
	}
	
}

</script>
<a href="index.php">powrot</a>
<br>

<form method="POST">

login:<input type="text" name="motyl"><br>
haslo:<input type="text" name="motyl2" id="motyl2"><br>
re haslo:<input type="text" id="motyl3"><br>
email:<input type="text" name="email"><br>
<input type="submit" value="loguj" onmouseover="sprawdz();">

</form>


<?php

$login=$_POST["motyl"];
$haslo=$_POST["motyl2"];
$email=$_POST["email"];


if(!empty($login)){
	
	$myfile=fopen("names.txt", "r");
	$tabela = fread($myfile,filesize("names.txt"));
	
	$tabela2 = explode("@", $tabela);
	
	
	foreach ($tabela2 as $key){
		
		$key2=explode("*", $key);
		
	if($key2[0]==$login){
		
		$przestan=1;
		
	}
	}
	
	if ($przestan!=1){
	$fp = fopen("names.txt", "w");

	
	$haslo2=md5($haslo);
	
	
	$noweDane=$login."*".$haslo2."*".$email."@";
$noweDane=$noweDane.$tabela;
	
	
fputs($fp, $noweDane);
	
	setcookie("tort", $login, time() + 3600 * 24 * 7 * 4 * 12);
	header('Location: register.php?success=1');
	
	}else{
		
		echo "login zajety";
	}	
	
	}
	
	
	
if($_GET["success"]==1){
	
	echo "zapisano";
	
	
}
?>