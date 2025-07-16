<?php
//echo"hello dunia";
//$arr=array('this','is','GIET');
//echo $arr[0] ;
//Associatative arrya


/*$arr=array('rahul' =>'black','sankar'=>'white');
echo $arr['rahul'];
foreach($arr as $key => $value){
    echo "<br>favrite color is $key is $value";
}*/


//multi dimensional arrya
$mu=array(
    array(1,2,3,4),
    array(4,5,6,7),
    array(7,8,9,0)
);
for ($i =0;$i<count($mu);$i++){
    for($j=0;$j<count($mu[$i]);$j++){
        echo $mu[$i][$j];
        echo ""; 

    }
    echo"<br>";
}
?>