<?php

$username1 = "kuikb2 tauri";
$username2 = "test";
$fulltimenow = date("d.m.Y H:i:s");
$hournow = date("H:i");
$partofday = " lihtsalt aeg";
if($hournow < 7){
	$partofday = "uneaeg";	
}
if($hournow >= 8 and $hournow <= 23){
	$partofday = " aeg töötamiseks";
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
  <p>See veebileht on loodud õppetöö kaigus <?php echo $username1; ?> poolt ning ei sisalda mingit tõsiseltvõetavat sisu!</p>
  <p>uuesti</p>
  
  <p> see veebi leht on <a href="https://www.tlu.ee"> tähtis </a>  </p>
  
  <p> see j2rgnev tekst p2rineb yhikast kodut88ga seoses ning pean t6dema, et siiani j6udmine, et seda teksti kirjutada v6ttis ~2H.... </p>
  
  <p> Oleme ausad. see on SEE ON 2H LIIGA PALJU! </p>
  
  <p> Palun vaadake juhendid yle. juhendeid on 3-4tk ja r22givad yksteisele vastu </p>
  
  <p> Lehe avamise hetkel oli kuupäev ja kellaaeg: <?php echo $fulltimenow; ?> </p>
  
  <p><?php echo " parajasti on " . $partofday ."."; ?> </p>
</body>
</html>

