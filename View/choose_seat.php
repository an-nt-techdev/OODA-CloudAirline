<!DOCTYPE html>
<html lang="en">

<head>

	<?php
		require_once SITE_ROOT."/View/Layout/loadCSS.php";
	?>

	<style>
		input::-webkit-outer-spin-button,
		input::-webkit-inner-spin-button {
			/* display: none; <- Crashes Chrome on hover */
			-webkit-appearance: none;
			margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
		}

		input[type=number] {
			-moz-appearance:textfield; /* Firefox */
		}	
	</style>

</head>

<body>
            <?php
                $VE = $bkModel->getVeById($_SESSION['id']);
            ?> 
	<div id="booking" class="section">
		<div class="section-center">
			<!-- <div class="container"> -->

            <!-- ============================== -->

            <div class="row"> 
                <script>
                    document.getElementById("result").innerHTML = localStorage.getItem("type");
                </script>
                <p id="result"><p>
					<div class="col-md-8 col-md-offset-1" style="margin-left: 80px;">
                            <form class="form-inline" action="?booking=on&choose_seat=on&change=start" method="post">   
                                <div class="form-group" style="margin-left: -35px;">
                                    <span class="form-label">From</span>
                                    <select class="form-control" name="from" required>
                                    <?php 
                                        for ($i=0; $i<15; $i++)
                                        {
                                            echo "<option id='".$sanBayList[$i]->getTenThanhPho()."' value='".$sanBayList[$i]->getTenThanhPho()."'".($sanBayList[$i]->getTenThanhPho()==$_POST['from']?"selected":"").">".$sanBayList[$i]->getTenThanhPho()."</option>";
                                        }
                                    ?>
                                    </select>
                                    <span class="select-arrow"></span>
                                </div>
                                <div class="form-group">
                                    <span class="form-label">To</span>
                                    <select class="form-control" name="to" required>
                                    <?php 
                                        for ($i=0; $i<15; $i++)
                                        {
                                            echo "<option id='".$sanBayList[$i]->getTenThanhPho()."' value='".$sanBayList[$i]->getTenThanhPho()."'".($sanBayList[$i]->getTenThanhPho()==$_POST['to']?"selected":"").">".$sanBayList[$i]->getTenThanhPho()."</option>";
                                        }
                                    ?>
                                    </select>
                                    <span class="select-arrow"></span>
                                </div>

                                <div class="form-group">
                                    <span class="form-label">Departing</span>
                                    <input class="form-control" name="start" type="date" value = "<?php echo $VE->getNgayDi1(); ?>" required style="width:130px; padding:6px;">
								</div>

                                <button type="submit" class="btn btn-success">Search</button>
                            </form>
                            <br>
                            <div class="booking-form" style="margin-left: 0px; padding-top: 25px;">
							<form class="formChuyenBay" action="" method="post" style="overflow:auto; height:160px;">
                            
								<table class="table">
                                    <thead style="position: relative;">
                                        <tr>
                                            <th>Plane's Name</th>
                                            <th>FLIGHT ID</th>
                                            <th>TIME</th>
                                            <th>PRICE</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                        <!-- <tr>
                                            <td>a</td>
                                            <td>b</td>
                                            <td>c</td>
                                            <td>d</td>
                                            <td><input type="checkbox"></td>
                                        </tr> -->
                                    <tbody>
                                        <?php
                                        
                                          for ($i=0; $i<sizeof($chuyenBayList); $i++)
                                        {
                                            if ($bkModel->CheckGheBay($chuyenBayList[$i]->getId(), $VE->getNgayDi1(), $VE->getNguoiLon(), $VE->getTreEm(), $VE->getLoaiVe()) == "true")
                                            {
                                                $lv = $bkModel->getLoaiVeById($VE->getLoaiVe());
                                                $price = ($VE->getNguoiLon()+($VE->getTreEm()/2))*1000*$lv->getPhanTram()*$chuyenBayList[$i]->getKhoangCach()/100;
                                                echo "<tr>";
                                                echo "<td>".$chuyenBayList[$i]->getIdMayBay()."</td>";
                                                echo "<td>".$chuyenBayList[$i]->getId()."</td>";
                                                echo "<td>".$chuyenBayList[$i]->getGioBay()."</td>";
                                                echo "<td>".$price."</td>";
                                                echo "<td><input type='button' onclick=AirBus302('".$chuyenBayList[$i]->getId()."','".$chuyenBayList[$i]->getIdMayBay()."') value='Choose This'></td>";
                                                echo "</tr>";
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
							</form>
						</div>
					</div>
				</div>

                <!-- =============================== -->

                <br><br>
                <?php
                    if ($VE->getKieuVe() == 1)
                    {
                        $chuyenBayList=$bkModel->getChuyenBayList($_POST['to'], $_POST['from']);
                        // echo $_POST['to'];
                        // echo $_POST['from'];
                ?>

                <div class="row">
					<div class="col-md-8 col-md-offset-1" style="margin-left: 80px;">
                            <form class="form-inline" action="?booking=on&choose_seat=on&change=end" method="post">   
                                <div class="form-group" style="margin-left: -35px;">
                                    <span class="form-label">From</span>
                                    <select class="form-control" name="to" required>
                                    <?php 
                                        for ($i=0; $i<15; $i++)
                                        {
                                            echo "<option id='".$sanBayList[$i]->getTenThanhPho()."' value='".$sanBayList[$i]->getTenThanhPho()."'".($sanBayList[$i]->getTenThanhPho()==$_POST['to']?"selected":"").">".$sanBayList[$i]->getTenThanhPho()."</option>";
                                        }
                                    ?>
                                    </select>
                                    <span class="select-arrow"></span>
                                </div>
                                <div class="form-group">
                                    <span class="form-label">To</span>
                                    <select class="form-control" name="from" required>
                                    <?php 
                                        for ($i=0; $i<15; $i++)
                                        {
                                            echo "<option id='".$sanBayList[$i]->getTenThanhPho()."' value='".$sanBayList[$i]->getTenThanhPho()."'".($sanBayList[$i]->getTenThanhPho()==$_POST['from']?"selected":"").">".$sanBayList[$i]->getTenThanhPho()."</option>";
                                        }
                                    ?>
                                    </select>
                                    <span class="select-arrow"></span>
                                </div>

                                <div class="form-group">
                                    <span class="form-label">Departing</span>
                                    <input class="form-control" name="end" type="date" value = "<?php echo $VE->getNgayDi2(); ?>" required style="width:130px; padding:6px;">
								</div>

                                <button type="submit" class="btn btn-success">Search</button>
                            </form>
                            <br>
                            <div class="booking-form" style="margin-left: 0px; padding-top: 25px;">
							<form class="formChuyenBay" id='formVe' action="" method="post" style="overflow:auto; height:160px;">
                            
								<table class="table">
                                    <thead style="position: relative;">
                                        <tr>
                                            <th>Plane's Name</th>
                                            <th>FLIGHT ID</th>
                                            <th>TIME</th>
                                            <th>PRICE</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                        <!-- <tr>
                                            <td>a</td>
                                            <td>b</td>
                                            <td>c</td>
                                            <td>d</td>
                                            <td><input type="checkbox"></td>
                                        </tr> -->
                                    <tbody>
                                        <?php
                                          for ($i=0; $i<sizeof($chuyenBayList); $i++)
                                        {
                                            if ($bkModel->CheckGheBay($chuyenBayList[$i]->getId(), $VE->getNgayDi1(), $VE->getNguoiLon(), $VE->getTreEm(), $VE->getLoaiVe()) == "true")
                                            {
                                                $lv = $bkModel->getLoaiVeById($VE->getLoaiVe());
                                                $price = ($VE->getNguoiLon()+($VE->getTreEm()/2))*1000*$lv->getPhanTram()*$chuyenBayList[$i]->getKhoangCach()/100;
                                                echo "<tr>";
                                                echo "<td>".$chuyenBayList[$i]->getIdMayBay()."</td>";
                                                echo "<td>".$chuyenBayList[$i]->getId()."</td>";
                                                echo "<td>".$chuyenBayList[$i]->getGioBay()."</td>";
                                                echo "<td>".$price."</td>";
                                                echo "<td><input type='button' onclick=AirBus302('".$chuyenBayList[$i]->getId()."','".$chuyenBayList[$i]->getIdMayBay()."') value='Choose This'></td>";
                                                echo "</tr>";
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
							</form>
                            <form action="" method="post">
                                        
                            </form>
						</div>
					</div>
				</div>


                                    <?php }?>
                <!-- ============================== -->


			</div>
		</div>
	</div>
</body>
<?php $cec ='wtf'?>
<script>
    function AirBus302(a,b){
        var c= <?php echo json_encode($cec)?>;
        alert("test php-js: "+a+" "+b+" "+c);
        document.getElementsByClassName("formChuyenBay").submit();
    }
</script>
<script type="text/javascript" src="View/Resources/js/script.js"></script>
<!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>