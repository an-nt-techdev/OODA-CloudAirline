<?php 
    $p='home';
    $idChuyenBay="";
    // Bay đi
    if($STRING!=""){
        $len=0;
        $pos1=strpos($STRING,',',0);
        $pos2=strpos($STRING,',',$pos1+1);
        $pos3=strpos($STRING,',',$pos2+1);
        //id chuyen bay
        $idChuyenBay=substr($STRING,0,$pos1);
        //id ve
        $idVe=substr($STRING,$pos1+2,$pos2-$pos1-3);
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
        // Bay về nếu có
        $IdChuyenBay="";
        if($STRING2!=""){
            $Pos1=strpos($STRING2,',',0);
            $Pos2=strpos($STRING2,',',$Pos1+1);
            $Pos3=strpos($STRING2,',',$Pos2+1);
            //id chuyen bay
            $IdChuyenBay=substr($STRING2,0,$Pos1);
            //id ve
            $IdVe=substr($STRING2,$Pos1+2,$Pos2-$Pos1-3);
            //ngay bay
            $NgayBay=substr($STRING2,$Pos2+1,$Pos3-$Pos2-1);
            //list ghe
            $Test="";
            $Pos;
                for($i=$Pos3+1;$i<strlen($STRING2);$i++){
                    $Pos=strpos($STRING2,',',$i);
                    if($Pos==false)
                    {
                        $Test=$Test." ".substr($STRING2,$i,strlen($STRING2)-$i);
                        $bkModel->saveGheBay($IdChuyenBay,$IdVe,substr($STRING2,$i,strlen($STRING2)-$i),$NgayBay);
                        echo "<br>";
                        break;
                    }
                    else{
                        $Test=substr($STRING2,$i,$Pos-$i)." ".$Test;
                        $bkModel->saveGheBay($IdChuyenBay,$IdVe,substr($STRING2,$i,$Pos-$i),$NgayBay);
                        echo "<br>";
                        $i=$Pos;
                    }
                }
                
            }
    require_once SITE_ROOT.'/View/checkout.php';
    
?>