<?php

$username1 = "kuikb2 tauri";
$username2 = "test";
$fulltimenow = date("d.m.Y H:i:s");
$hournow = date("H:i");
$partofday = " lihtsalt aeg";
$weekdaynameset = ["esmaspäev", "teisipäev", "kolmapäev", "neljapäev", "reede", "laupäev", "pühapäev"];
  $monthnameset = ["jaanuar", "veebruar", "märts", "aprill", "mai", "juuni", "juuli", "august", "september", "oktoober", "november", "detsember"];
if($hournow < 6){
	$partofday = "uneaeg";	
}
if($hournow >= 06 and $hournow <= 08){
	$partofday = "aeg püstitõusmiseks";
}
if($hournow >= 8 and $hournow <= 23){
	$partofday = " aeg töötamiseks";
}
if($hournow >= 11 and $hournow < 12){
	$partofday = "aeg teha paus, otsi toitu vms";
}
if($hournow >= 18 and $hournow <= 20){
	$partofday = "aeg koju minekuks, aitab küll koolist tänaseks";
}
if($hournow >= 20 and $hournow <= 21){
	$partofday = "aeg õhtutoidu tegemiseks";
}

// see märk näitab kommentaari "//"
//vaatame semsetri kulgemist
$semesterstart = new DateTime ("2020-8-31");
$semesterend = new DateTime ("2020-12-13");
//selgitame välja nende vahe ehk erinevuse
$semesterduration = $semesterstart->diff($semesterend);
//leiame selle päevade arvuna
$semesterdurationdays = $semesterduration->format("%r%a");
//tänane päev
$today = new DateTime ("now");
//tänase ja semestri erinevus jne jne 
//kui aga päevade arv on miinuses siis näiteks: if($fromsemesterstartdays < 0){semester pole alanud}
//veelgi if ($semesteridurationdays > $semesterduration){"semester on läbi, naudi vaba aega."}
   
 //alates sellest tekstist kuni php lõpuni on kopeeritud õpetaja lehelt. 
 //vajab ise harjutamist.
 
   $today = new DateTime("now");
  //if($fromsemesterstartdays < 0){semester pole peale hakanud}
  $fromsemesterstart = $semesterstart->diff($today);
  //saime aja erinevuse objektina, seda niisama näidata ei saa
  $fromsemesterstartdays = $fromsemesterstart->format("%r%a");
  $semesterpercentage = 0;
  
  $semesterpercentage = 0;
    
  $semesterinfo = "Semester kulgeb vastavalt akadeemilisele kalendrile.";
if($semesterstart > $today){
	  $semesterinfo = "Semester pole veel peale hakanud!";
  }
  if($fromsemesterstartdays == 0){
	  $semesterinfo = "Semester algab täna!";
  }
  if($fromsemesterstartdays > 0 and $fromsemesterstartdays < $semesterdurationdays){
	  $semesterpercentage = ($fromsemesterstartdays / $semesterdurationdays) * 100;
	  $semesterinfo = "Semester on täies hoos, kestab juba " .$fromsemesterstartdays ." päeva, läbitud on " .round($semesterpercentage,3)  ."%.";
  }
  if($fromsemesterstartdays == $semesterdurationdays){
	  $semesterinfo = "Semester lõppeb täna!";
  }
  if($fromsemesterstartdays > $semesterdurationdays){
	  $semesterinfo = "Semester on läbi saanud!";
  }
  
?>

<!DOCTYPE html>
<html lang="et">
<head>
  <meta charset="utf-8">
  <title>Veebilehe <?php echo $username2;print("//kellaaeg:") ; echo $hournow; ?> </title>

</head>
<body>
  <h1>testi leht</h1>
  <p>See veebileht on loodud õppetöö käigus <?php echo $username1; ?> poolt ning ei sisalda mingit tõsiseltvõetavat sisu!</p>
  <p>uuesti</p>
  
  <p> see veebi leht on <a href="https://www.tlu.ee"> tähtis </a>  </p>
  
  <p> Palun vaadake juhendid yle. juhendeid on 3-4tk ja r22givad yksteisele vastu </p>
  
  <p> Lehe avamise hetkel oli kuupäev ja kellaaeg: <?php echo $fulltimenow; ?> </p>
  
  <p><?php echo " parajasti on " . $partofday ."."; ?> </p>
  <p><?php echo $semesterinfo; ?></p>
</body>
</html>

