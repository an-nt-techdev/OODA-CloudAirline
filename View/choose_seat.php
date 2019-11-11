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
        <div class="w3-row">
            <div class="w3-col m6">    
            <div class="row"> 
                <script>
                    document.getElementById("result").innerHTML = localStorage.getItem("type");
                </script>
                <p id="result"><p>
					<div class="con-md-8" style="margin-left: 80px;">
                            <form class="form-inline" action="?booking=on&choose_seat=on&change=start" method="post">   
                                <div class="form-group" style="margin-left: -35px;">
                                    <span class="form-label"><b><i>From</b></i></span>
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
                                    <span class="form-label"><b><i>To</b></i></span>
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
                                    <span class="form-label"><b><i>Departing</b></i></span>
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
                                                //$gheBayList = $bkModel->loadGheBay($chuyenBayList[$i]->getId(), $VE->getNgayDi1());
                                                $lv = $bkModel->getLoaiVeById($VE->getLoaiVe());
                                                $price = ($VE->getNguoiLon()+($VE->getTreEm()/2))*1000*$lv->getPhanTram()*$chuyenBayList[$i]->getKhoangCach()/100;
                                                echo "<tr>";
                                                echo "<td>".$chuyenBayList[$i]->getIdMayBay()."</td>";
                                                echo "<td>".$chuyenBayList[$i]->getId()."</td>";
                                                echo "<td>".$chuyenBayList[$i]->getGioBay()."</td>";
                                                echo "<td>".$price."</td>";
                                                echo "<td><input type='button' onfocus='this.style.backgroundColor=".'"#4CAF50"'."'  onfocusout='this.style.backgroundColor=".'"rgb(221, 221, 221)"'."'onclick=showGheBay('".$chuyenBayList[$i]->getId()."','".$chuyenBayList[$i]->getIdMayBay()."','".$VE->getNgayDi1()."') value='Choose This'></td>";
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
					<div class="con-md-8" style="margin-left: 80px;">
                            <form class="form-inline" action="?booking=on&choose_seat=on&change=end" method="post">   
                                <div class="form-group" style="margin-left: -35px;">
                                    <span class="form-label"><b><i>From</b></i></span>
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
                                    <span class="form-label"><b><i>To</b></i></span>
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
                                    <span class="form-label"><b><i>Departing</b></i></span>
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
                                            if ($bkModel->CheckGheBay($chuyenBayList[$i]->getId(), $VE->getNgayDi2(), $VE->getNguoiLon(), $VE->getTreEm(), $VE->getLoaiVe()) == "true")
                                            {
                                                $gheBayList = $bkModel->loadGheBay($chuyenBayList[$i]->getId(), $VE->getNgayDi2());
                                                $lv = $bkModel->getLoaiVeById($VE->getLoaiVe());
                                                $price = ($VE->getNguoiLon()+($VE->getTreEm()/2))*1000*$lv->getPhanTram()*$chuyenBayList[$i]->getKhoangCach()/100;
                                                echo "<tr>";
                                                echo "<td>".$chuyenBayList[$i]->getIdMayBay()."</td>";
                                                echo "<td>".$chuyenBayList[$i]->getId()."</td>";
                                                echo "<td>".$chuyenBayList[$i]->getGioBay()."</td>";
                                                echo "<td>".$price."</td>";
                                                echo "<td><input type='button' onfocus='this.style.backgroundColor=".'"#4CAF50"'."'  onfocusout='this.style.backgroundColor=".'"rgb(221, 221, 221)"'."'onclick=showGheBay('".$chuyenBayList[$i]->getId()."','".$chuyenBayList[$i]->getIdMayBay()."','".$VE->getNgayDi2().",$gheBayList') value='Choose This'></td>";
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


                                    <?php }?>
                <!-- ============================== -->


			</div>
            <div class="w3-col m6" style="display:none" id ="col-show-list">
                <div class="booking-form">
                    <form id="formShowGhe" >
                        <h4 id="tit"></h4>
                        <h4 id="idChuyenBay" name="idChuyenBay"></h4>
                        <h4 id="ngayBay" name="ngayBay"></h4>
                        <div id ="thuong" style="text-align:center;padding:15px;margin-left:100px;margin-right:100px">
                        </div>
                        <div id ="thuongGia" style="text-align:center;padding:15px;margin-left:100px;margin-right:100px">
                        </div>
                        <div id ="tietKiem"style="text-align:center;padding:15px;margin-left:100px;margin-right:100px">
                        </div>
                    </form>
                </div>
            </div>  
            </div>
            </div>
		</div>
	</div>
</body>
<?php $cec ='wtf';

$a = $bkModel->getLoaiMayBayByTen("Airbus A320");
$b = $bkModel->getLoaiMayBayByTen("Airbus A380");
$c = $bkModel->getLoaiMayBayByTen("Boeing 777");


?>
<script>
    function myFunction() {
        document.getElementById("focus").style.backgroundColor = "red";
        }
    // hàm gọi vẽ ghế theo chuyen
    function showGheBay(idChuyenBay, idMayBay, ngayBay, gheBayList){
        document.getElementById("col-show-list").style.display = "initial";
        removeChild();
        var thuong="",thuongGia="",tietKiem="",loaiMayBay="", arrGheBay = json_encode(gheBayList[0]->getGhe());
        if(idMayBay.search("A320")!=-1){
            loaiMayBay=<?php echo json_encode($a->getTen())?>;
            thuong=<?php echo json_encode($a->getGheThuong())?>;
            thuongGia=<?php echo json_encode($a->getGheThuongGia())?>;
            tietKiem=<?php echo json_encode($a->getGheTietKiem())?>;
        }
        else if(idMayBay.search("A380")!=-1){
            loaiMayBay=<?php echo json_encode($b->getTen())?>;
            thuong=<?php echo json_encode($b->getGheThuong())?>;
            thuongGia=<?php echo json_encode($b->getGheThuongGia())?>;
            tietKiem=<?php echo json_encode($b->getGheTietKiem())?>;
        }
        else {
            loaiMayBay=<?php echo json_encode($c->getTen())?>;
            thuong=<?php echo json_encode($c->getGheThuong())?>;
            thuongGia=<?php echo json_encode($c->getGheThuongGia())?>;
            tietKiem=<?php echo json_encode($c->getGheTietKiem())?>;
        }
        document.getElementById("tit").innerHTML="Type: "+loaiMayBay+" - Planes'Name: "+arrGheBay;
        document.getElementById("idChuyenBay").innerHTML="FlightID: "+idChuyenBay;
        document.getElementById("ngayBay").innerHTML="Date: "+ngayBay;

        createGhe(thuong, thuongGia, tietKiem, idChuyenBay, ngayBay);

        document.getElementsByClassName("formChuyenBay").submit();
    }
    
    // hàm vẽ ghế
    function createGhe(thuong, thuongGia, tietKiem, idChuyenBay, ngayBay){
        var j=0;
        for(var i = 1 ; i<=thuong;i++){
            j++;
            var button = document.createElement("button");
            button.innerHTML = j;
            

            button.style.background = "<?php  echo 'red'; ?>";
            

            button.style.margin = "3px";
            button.style.borderRadius = "10px";
            button.style.border ="2px solid #555555";
            // 2. Append somewhere
            var body = document.getElementById("thuong");
            body.appendChild(button);
        }
        for(var i =0;i<thuongGia;i++){
            j++;
            var button = document.createElement("button");
            button.style.background='#27db0b';
            button.innerHTML = j;
            button.style.margin = "3px";
            button.style.width = '70px';
            button.style.height = '30px';
            button.style.borderRadius = "15px";
            button.style.border="2px solid #555555";
            // 2. Append somewhere
            var body = document.getElementById("thuongGia");
            body.appendChild(button);
        }
        for(var i =0;i<tietKiem;i++){
            var button = document.createElement("button");
            j++;
            button.innerHTML = j;
            button.style.background='#0c83fa';
            button.style.margin = "3px";
            button.style.width = '50px';
            button.style.border="2px solid #555555";
            // 2. Append somewhere
            var body = document.getElementById("tietKiem");
            body.appendChild(button);
        }
    }
    // hàm reset Show Ghế - nếu ko sẽ bị chồng
    function removeChild(){
        const parent1 = document.getElementById("thuong");
        while (parent1.firstChild) {
            parent1.firstChild.remove();
        }
        const parent2 = document.getElementById("thuongGia");
        while (parent2.firstChild) {
            parent2.firstChild.remove();
        }
        const parent3 = document.getElementById("tietKiem");
        while (parent3.firstChild) {
            parent3.firstChild.remove();
        }
    }
</script>
<script type="text/javascript" src="View/Resources/js/script.js"></script>
<!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>