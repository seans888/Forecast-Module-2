<?php
hitung();
function hitung(){
    $dataset=array(120,125,129,124,130);
    $alpha=1/count($dataset);
    $alpha=round($alpha,1);
    $s1=array();
    $s2=array();
    $a=array();
    $b=array();
    foreach ($dataset as $index => $data) {
        if($index==0){
            $s1[$index]=$data;
            $s2[$index]=$data;
        }else{
            $s1[$index]=$alpha*$data+(1-$alpha)*$s1[$index-1];
            $s2[$index]=$alpha*$s1[$index]+(1-$alpha)*$s2[$index-1];
        }
        $a[$index]=2*$s1[$index]-$s2[$index];
        $b[$index]=($alpha/(1-$alpha))*($s1[$index]-$s2[$index]);

    }

    echo "<table border='1'>";
    echo "<tr><td>Week</td><td>Demand</td><td>Alpha</td><td>S't</td><td>S''t</td><td>a</td><td>b</td></tr>";
    for($i=0;$i<count($dataset);$i++){
        echo "<tr>";
        echo "<td>".($i+1)."</td>";
        echo "<td>".$dataset[$i]."</td>";
        echo "<td>".$alpha."</td>";
        echo "<td>".$s1[$i]."</td>";
        echo "<td>".$s2[$i]."</td>";
        echo "<td>".$a[$i]."</td>";
        echo "<td>".$b[$i]."</td>";
        echo "</tr>";
    }
    echo "<tr><td colspan='5'>Forecasting week-".(count($dataset)+1)."</td>";
    echo "<td colspan='2'>".($a[count($dataset)-1]+$b[count($dataset)-1])."</td></tr>";
    echo "</table>";
}


?>
