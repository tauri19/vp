<?php
 //var_dump($_POST);
 require("../../../../config.php");
 require("fnc_film.php");
 

$username1 = "kuikb2 tauri";
$fulltimenow = date("d.m.Y H:i:s");
$hournow = date("H:i");
$partofday = " lihtsalt aeg";
$weekdaynameset = ["esmaspäev", "teisipäev", "kolmapäev", "neljapäev", "reede", "laupäev", "pühapäev"];
$monthnameset = ["jaanuar", "veebruar", "märts", "aprill", "mai", "juuni", "juuli", "august", "september", "oktoober", "november", "detsember"];
//echo $weekdaynameset[1];
  $weekdaynow = date("N");
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
 


 $allfiles = scandir("vp_pics/");
  //echo $allfiles;
  //var_dump ($allfiles);
  $picfiles = array_slice($allfiles, 2);
  //var_dump ($picfiles);
  $imghtml = "";
  $piccount = count($picfiles);
  //$i = $i + 1;
  //$i ++;
  //$i += 3;
  
 for($i = 0;$i < $piccount;$i ++){
	  //<img src="../img/pildifail" alt="tekst">
	 $imghtml .= '<img src="vp_pics/' .$picfiles[$i] . ' " alt="tallinna ülikool" >';
 }
  
  /* for($i = 0;$i < $piccount; $i ++){
	  //<img src="../img/pildifail" alt="tekst">
	  $imghtml .= '<img src="../vp_pics/' .$picfiles[$i] .'" alt="Tallinna Ülikool">';
  } */
  //$randompicnum = mt_rand(0,($piccount - 1));
  //$imghtml = '<img src="../vp_pics/' .$picfiles[$randompicnum] .'" alt="Tallinna Ülikool">';
  $imghtml = '<img src="vp_pics/' .$picfiles[mt_rand(0,($piccount - 1))] .'" alt="tallinna Ülikool">';





require("header.php");
?>



  <h1 style="color:#00BFFF";>TEST LEHT</h1> <img src= "https://raw.githubusercontent.com/Veebiprogrammeerimine-2020/ryhm-2/master/img/vp_logo_small.png" "width="256" heigh"128" title="banner" alt="lipp" >
  
  
  <?php //teine variant kuidas pilti lisada veebilehele 
  // <img src="../img/vp_banner.png" alt="veebiprog tunni"> 
  //sellisel juhul peab pilt olemas olema Winscp programmis ja vastavas kaustas tund3/img/fail
  //selle pärast on need 2 punkti enne img kausta.
  ?>
  <p>See veebileht on loodud õppetöö käigus <?php echo $username1; ?> poolt ning ei sisalda mingit tõsiseltvõetavat sisu!</p>
  <p>uuesti</p>
  
  <p> see veebi leht on <a href="https://www.tlu.ee"> tähtis </a>  </p>
  
 
  
  <p> Lehe avamise hetkel oli nädalapäev ja kuupäev ja kellaaeg: <?php echo $weekdaynameset[$weekdaynow - 1]. "," . $fulltimenow; ?> . </p>
  
  <p><?php echo " parajasti on " . $partofday ."."; ?> </p>
  <p><?php echo $semesterinfo; ?></p>
  <p><?php echo "praegu on " . $weekdaynameset[$weekdaynow - 1] . "." ; ?></p>
  <img src="../img/vp_banner.png" alt="veebiprog tunni lipp">

  <hr>
  <?php echo $imghtml; ?>
  <hr>
  <form method="POST">
  <ul>
  <li><a href="ideed.php">Idee sisestus</a></li>
  <li><a href="list.php">Idee list</a></li>
  <li><a href="filmlist.php">Filmid</a></li>
  </ul>
  <?php // ul tähendab unnumbered list. selle listi sisu tekst tuleb "p" asemel "li"?>
  
  
</body>
</html>

