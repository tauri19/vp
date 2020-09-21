<?php
  //var_dump($_POST);
  require("../../../../config.php");
  $database = "if20_tauri_2";
 if(isset($_POST["ideasubmit"]) and !empty($_POST["ideainput"])){
	//loome andmebaasiga ühenduse, selleks ka database = minuga
	$conn=new mysqli($serverhost, $serverusername, $serverpassword, $database);
	//valmistan ette sql käsu, andmete kirjutamiseks
	$stmt = $conn->prepare("INSERT INTO myideas (idea) VALUES (?)");
	echo $conn->error;
	//i = integer (int), d = decimal (float), s = string (ehk tekst)
	$stmt->bind_param("s", $_POST["ideainput"]);
	$stmt->execute();
	$stmt->close();
	$conn->close();
	
	//stmt statement
	//conn prepare vahele tuleb kirjutada SQL keeles
	//SQL on andmebaaside kasutamise keel 
 }
  
  require("header.php");
?>

  <img src="../img/vp_banner.png" alt="veebiprog tunni lipp">
  
  <p><a href="testleht.php">Avalehele</a></p>
  <form method="POST">
    <label>Kirjutage oma esimene pähe tulev mõte!</label>
	<input type="text" name="ideainput" placeholder="mõttekoht">
	<input type="submit" name="ideasubmit" value="Saade mõte teele!">
  </form>
  <hr>

</body>
</html>