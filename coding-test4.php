<?php
$str = "BBGSHHHDBBBHHJJGGHHJGVV";


echo 'String yang ada "'.$str.'"<br/>';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	$jumlah = array();
	$huruf = array();
	foreach (count_chars($str, 1) as $strr => $value) {
	   echo 'Huruf '.chr($strr) . " Banyaknya $value" . "<br>";
	   $jumlah[] = $value;
	   $results[] = array('huruf'=>chr($strr),'jumlah' => $value);
	}
	
	
	$paling_banyak = max($jumlah);
	foreach($results as $result) {
		if($paling_banyak == $result['jumlah']) {
			echo 'Huruf paling banyak adalah '.$result['huruf'] .' berjumlah '.$paling_banyak;
		}
	}
	
	
}
 echo '<form action="" method="post" enctype="multipart/form-data">';
 
 echo '</form>';
