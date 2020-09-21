


<?php
  //var_dump($_POST);
  require("../../../../config.php");
  $database = "if20_tauri_2";
    
   //loen nüüd andmebaasist infot 
 //! märk tähendab eitust. nagu ka pythonis != on not equal to
$ideahtml= "";
$conn=new mysqli($serverhost, $serverusername, $serverpassword, $database);
$stmt= $conn->prepare("SELECT idea FROM myideas");
//seon tulemuse muutajaga. kuna tulemuste arvu ei ole teada siis tuleb sellega arvestada.
$stmt->bind_result($ideafromdb);
//fromdb ehk from database 
$stmt->execute();
while($stmt->fetch()){
	$ideahtml .= "<p>". $ideafromdb . "</p>";
}
  $stmt->close();
  $conn->close();
 
  require("header.php");
 
?>

  <img src="../img/vp_banner.png" alt="Veebiprogrammeerimise kursuse logo">
  
  <p><a href="testleht.php">Avalehele</a></p>
  <?php echo $ideahtml; ?>