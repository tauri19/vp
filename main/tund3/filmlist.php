<?php 
require("../../../../config.php");
require("fnc_film.php");

$inputerror = "";
$filmhtml = "";
//kas vajutati salvestus nuppu
if(isset($_POST["filmsubmit"])){
	if(empty($_POST["titleinput"]) or empty($_POST["genreinput"]) or empty($_POST(["studioinput"])) or empty ($_POST["directorinput"]))
		$inputerror .= "Osa sisestamata";
}
if($_POST["yearinput"] < 1900) {
	$inputerror = "Kontrolli aasta aega";
}



if($storeinfo == 1){
	$filmhtml = readfilms(1);
} else { 
	$filmhtml = "<p>Filmiinfo salvestamine ebaõnnestus</p>";
}

require("header.php");
?>


  

 <img src="../img/vp_banner.png" alt="veebiprog tunni lipp">
  
  <p><a href="testleht.php">Avalehele</a></p>
  <form method="POST">
    <label>filmilist</label>
	<label for="titleinput">Tiitel</label>
	<input type="text" name="titleinput" id="titleinput" ="Filmi nimi">
	<br>
	<label for="yearinput">Avalikustamise aasta</label>
	<input type="number" name="yearinput" id="yearinput" ="Filmi avalikustamine">
	<br>
	<label for="durationinput">Kestvus aeg</label>
	<input type="number" name="durationinput" id="durationinput" ="Filmi pikkus">
	<br>
	<label for="genreinput">Žanr</label>
	<input type="text" name="genreinput" id="genreinput" ="Filmi zanr">
	<br>
	<label for="studioinput">Stuudio</label>
	<input type="text" name="studioninput" id="studioinput" ="Filmi looja">
	<br>
	<label for="directorinput">Lavastaja</label>
	<input type="text" name="directorinput" id="directorinput" ="Filmi lavastaja">
	<br>
 

 
  
  
  </form>
 
  <hr>

<?php 
echo readfilms(1);  
  ?>

</body>
</html>