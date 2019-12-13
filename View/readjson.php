<?php
$arrayy=json_decode($_POST['arrayy'],true);
foreach($arrayy as $v){
    print_r($v['ghe']);
}

?>