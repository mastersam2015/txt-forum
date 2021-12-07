<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<script type="text/javascript" src="jquery.js"></script>
<a href="index.php">powrot</a>
<br>


<form method="POST">

login:<input type="text" name="motyl"><br>
haslo:<input type="text" name="motyl2" ><br>

<input type="submit" value="loguj" >

</form>


<?php

$login=$_POST["motyl"];
$haslo=$_POST["motyl2"];



if(!empty($login)){
	
	$myfile=fopen("names.txt", "r");
	$tabela = fread($myfile,filesize("names.txt"));
	
	$tabela2 = explode("@", $tabela);
	
	
	foreach ($tabela2 as $key){
		
		$key2=explode("*", $key);
		
	if($key2[0]==$login){
		if($key2[1]==md5($haslo)){
		$przod=1;
		
		}
		
	}
	}
	
	if ($przod==1){
	
	setcookie("tort", $login, time() + 3600 * 24 * 7 * 4 * 12);
	header('Location: login.php?success=2');
	
	}else{
		
		echo "błąd";
	}	
	
	}
	
	
	
if($_GET["success"]==2){
	
	echo "zalogowano";
	
	
}
?>