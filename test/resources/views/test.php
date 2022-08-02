<?php

include ('maytinh.php');



$objmaytinh = new maytinh();



$your_output = $objmaytinh->sum(2,3);
$Expected_Output = 5;
if ($your_output == $Expected_Output) {
   echo 'passed <br />' ;
}else {
    echo 'failed <br />' ;

}


$your_output = $objmaytinh->sum(2,3);
$Expected_Output = 6;
if ($your_output == $Expected_Output) {
   echo 'passed <br />' ;
}else {
    echo 'failed <br />' ;

}
// return $c;