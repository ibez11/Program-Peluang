<?php
 function combination_number($k,$n){
    $n = intval($n);
    $k = intval($k);
    if ($k > $n){
        return 0;
    } elseif ($n == $k) {
        return 1;
    } else {
        if ($k >= $n - $k){
            $l = $k+1;
            for ($i = $l+1 ; $i <= $n ; $i++)
                $l *= $i;
            $m = 1;
            for ($i = 2 ; $i <= $n-$k ; $i++)
                $m *= $i;
        } else {
            $l = ($n-$k) + 1;
            for ($i = $l+1 ; $i <= $n ; $i++)
                $l *= $i;
            $m = 1;
            for ($i = 2 ; $i <= $k ; $i++)
                $m *= $i;            
        }
    }
    return $l/$m;
}
 function array_combination($le, $set){

    $lk = combination_number($le, count($set));
    $ret = array_fill(0, $lk, array_fill(0, $le, '') );

    $temp = array();
    for ($i = 0 ; $i < $le ; $i++)
        $temp[$i] = $i;

    $ret[0] = $temp;

    for ($i = 1 ; $i < $lk ; $i++){
        if ($temp[$le-1] != count($set)-1){
            $temp[$le-1]++;
        } else {
            $od = -1;
            for ($j = $le-2 ; $j >= 0 ; $j--)
                if ($temp[$j]+1 != $temp[$j+1]){
                    $od = $j;
                    break;
                }
            if ($od == -1)
                break;
            $temp[$od]++;
            for ($j = $od+1 ; $j < $le ; $j++)    
                $temp[$j] = $temp[$od]+$j-$od;
        }
        $ret[$i] = $temp;
    }
    for ($i = 0 ; $i < $lk ; $i++)
        for ($j = 0 ; $j < $le ; $j++)
            $ret[$i][$j] = $set[$ret[$i][$j]];   

    return $ret;
}
$value_set = array("A","B","C","D","E","F");
if($_SERVER['REQUEST_METHOD'] == 'POST') {
	if((int)$_POST['peluang'] <= (int)count($value_set) ){
		if($_POST['peluang']){
			$f = array_combination($_POST['peluang'], $value_set);
		} else {
			$f = 'Input gagal';
		}
	} else {
		$f = 'Max only value set '.count($value_set);
	}
	print_r(json_encode($f));
}
 
 echo '<form action="" method="post" enctype="multipart/form-data">';
 echo '<input id="peluang" name="peluang"value="'.(isset($_POST['peluang']) ? $_POST['peluang'] : 0 ).'" />';
 echo '<input type="submit" name="submit" />';
 echo '</form>';
