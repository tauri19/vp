<?php
$database = "if20_Karl_reim_1";
//andmebaasist filmide lugemise funktsioon

function readfilms($choice) {
$conn = new mysqli($GLOBALS["serverhost"], $GLOBALS["serverusername"], $GLOBALS["serverpassword"], $GLOBALS["database"]);
if($choice == 0){
	$stmt = $conn->prepare("SELECT * FROM film");
} else {
	$stmt = $conn->prepare("SELECT * FROM film");
}


$stmt->bind_result($titlefromdb, $yearfromdb, $durationfromdb, $genrefromdb, $studiofromdb, $directorfromdb);
$stmt->execute ();
$filmhtml = "\t <ol> \n";
while($stmt->fetch()){
	$filmhtml .= "\t \t <li>" .$titlefromdb ."\n";
	$filmhtml .= "\t \t \t 	<ul> \n";
	$filmhtml .= "\t \t \t \t <li>Aasta: " . $yearfromdb . "</li> \n";
	$filmhtml .= "\t \t \t \t <li>Kestvus: " . $durationfromdb .  " minutit</li> \n";
	$filmhtml .= "\t \t \t \t <li>Žanr: " . $genrefromdb . "</li> \n";
	$filmhtml .= "\t \t \t \t <li>Tootja: " . $studiofromdb . "</li> \n";
	$filmhtml .= "\t \t \t \t <li>Lavastaja: " . $directorfromdb . "</li> \n";
	$filmhtml .= "\t \t \t 	</ul> \n";
	$filmhtml .= "\t \t	</li> \n";
	
}
$filmhtml .= "\t </ol> \n";
$stmt->close();
$conn->close();

return $filmhtml;

	
} //readfilms lõppeb


//salvestan sisestatud filmiinfot andmebaasist

function storefilminfo($title, $year, $duration, $genre, $studio, $director){
$conn = new mysqli($GLOBALS["serverhost"], $GLOBALS["serverusername"], $GLOBALS["serverpassword"], $GLOBALS["database"]);
$stmt = $conn->prepare("INSERT INTO film(pealkiri, aasta, kestus, zanr, tootja, lavastaja)VALUES (?,?,?,?,?,?)");
echo $conn->error;
//echo php sees on ainult AJUTINE märge ja läheb lehe ülesse, kui leht valmis tuleks see normaalselt html sisse panna
$stmt->bind_param("siisss", $title, $year, $duration, $genre, $studio, $director);
//siisss ehk string, integer, integer, string, string, string, ehk tekst,nr,nr,tekst,tekst,tekst. Järjekord peab olema sama kui SQL järjekord. 
//if($stmt->execute()
//	$success = 1;


$stmt->close();
$conn->close();

//return


}//storeinfo lõppeb

?>