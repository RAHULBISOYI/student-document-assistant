<?php //in the php the scpe of tyhe global variable ill be out side of the not inside the function
echo "lets learn<br>"; 

$b=90;
function prin(){
    echo "my self rahul<br>";
    global $b;
    echo  $b+890;
}
function printv() {     
    $a = 78;     
    echo " the value of your variable is $a"; 
} 
prin();
printv(); 
echo "<br>";
echo var_dump($GLOBALS["b"]);
?>
