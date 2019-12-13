<?php 
    require_once SITE_ROOT.'/Model/BookingModel.php';
    $p='home';
    $bkModel = new BookingModel();
    $idChuyenBay="";
    if($STRING!=""){
        $len=0;
        $pos1=strpos($STRING,',',0);
        $pos2=strpos($STRING,',',$pos1+1);
        $pos3=strpos($STRING,',',$pos2+1);
        //id chuyen bay
        $idChuyenBay=substr($STRING,0,$pos1);
        $len+=strlen($idChuyenBay);
        //id ve
        $idVe=substr($STRING,$pos1+2,$pos2-$pos1-3);
        $len=$len+strlen($idVe);
        //ngay bay
        $ngayBay=substr($STRING,$pos2+1,$pos3-$pos2-1);
        //list ghe
        $test="";
        $k=$pos3;
        $pos;
            for($i=$pos3+1;$i<strlen($STRING);$i++){
                $pos=strpos($STRING,',',$i);
                if($pos==false)
                {
                    $test=$test." ".substr($STRING,$i,strlen($STRING)-$i);
                    $bkModel->saveGheBay($idChuyenBay,$idVe,substr($STRING,$i,strlen($STRING)-$i),$ngayBay);
                    echo "<br>";
                    break;
                }
                else{
                    $test=substr($STRING,$i,$pos-$i)." ".$test;
                    $bkModel->saveGheBay($idChuyenBay,$idVe,substr($STRING,$i,$pos-$i),$ngayBay);
                    echo "<br>";
                    $i=$pos;
                }
            }
            
        }
    require_once SITE_ROOT.'/View/checkout.php';
    
?>