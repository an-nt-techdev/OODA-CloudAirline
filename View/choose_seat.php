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
	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-1">
        
                        <?php
                            $VE = $bkModel->getVe();
                        ?> 

                            <form class="form-inline" action="" method="post">   
                                <div class="form-group">
                                    <span class="form-label">From</span>
                                    <select class="form-control" name="from" required>
                                    <?php 
                                        for ($i=0; $i<15; $i++)
                                        {
                                            echo "<option id='".$sanBayList[$i]->getTenThanhPho()."' value='".$sanBayList[$i]->getTenThanhPho()."'>".$sanBayList[$i]->getTenThanhPho()."</option>";
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
                                            echo "<option id='".$sanBayList[$i]->getTenThanhPho()."' value='".$sanBayList[$i]->getTenThanhPho()."'>".$sanBayList[$i]->getTenThanhPho()."</option>";
                                        }
                                    ?>
                                    </select>
                                    <span class="select-arrow"></span>
                                </div>

                                <?php
                                    $_POST['from'] = $VE->getDiemDi();
                                    $_POST['to'] = $VE->getDiemDen();
                                ?>

                                <div class="form-group">
                                    <span class="form-label">Departing</span>
                                    <input class="form-control" name="start" type="date" required>
								</div>

                                <?php
                                    $_POST['start'] = $VE->getNgayDi1();
                                ?>

                                <button type="submit" class="btn btn-success">Search</button>
                            </form>
                            <br>
                            <div class="booking-form">
							<form action="" method="post">
								<table class="table">
                                    <thead>
                                        <tr>
                                            <th>Tên Máy Bay</th>
                                            <th>Chuyến Bay</th>
                                            <th>Giờ Bay</th>
                                            <th>Giá</th>
                                            <th>Select</th>
                                        </tr>
                                    </thead>
                                        <tr>
                                            <td>a</td>
                                            <td>b</td>
                                            <td>c</td>
                                            <td>d</td>
                                            <td><input type="checkbox"></td>
                                        </tr>
                                        <?php
                                            
                                        ?>
                                </table>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

<script type="text/javascript" src="View/Resources/js/script.js"></script>
<!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>