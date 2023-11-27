<?php

$arr=[5, 4, 6, 9, 10];
$total_sum=array_add($arr);
$total_itm=count($arr);
$avarage=$total_sum/$total_itm;



foreach($arr as $item)
{

    if($item>$avarage)
    echo $item;
}

  ?>