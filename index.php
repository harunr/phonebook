<!DOCTYPE html>

<html>

<head>

	<title>Online Phone Book</title>

	 <meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="dist/bootstrap/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>

	<!-- Header Area -->

	<div class="container text-center">

		<div class="row">

			<div class="header col-md-12">

				<a href="index.php"><h1>Online Phone Book</h1></a>

			</div>

		</div>

	</div>
<?php

    

    require_once('inc/db_connect.php');

    

    if(isset($_GET['order'])){

        $order = $_GET['order'];

    }else{

        $order = 'phone';

    }

    

    if(isset($_GET['sort'])){

        $sort = $_GET['sort'];

    }else{

         $sort = 'ASC';

    }

    

    $show_query = "SELECT * FROM contact ORDER BY $order $sort";

    $result = mysqli_query($con, $show_query );

    /*while($row = mysqli_fetch_assoc($result)){

        $contacts[] = $row;

    }*/

    $serial_no = 0;

    if(isset($_POST['add_button'])){
	header("Location: https://staging.webtricker.com/phonebook/addnew.php");
	exit;
	

    }

    



?>



	<!-- Input Part -->

	<div class="container text-center">

		<div class="row">

			<div class="input_area col-md-12">

				<form method="post" action="">

					<button type="submit" name="add_button">Add New</button>

				</form>

			</div>

		</div>

	</div>






	<!-- Show Data -->

	<div class="container text-center">

		<div class="row">

			<div class="show_data_area col-md-12">

			<?php 

                

                 if ($result->num_rows> 0) {

                $sort == 'DESC' ? $sort = 'ASC' : $sort = 'DESC';  

                ?>

				<table class="table col-md-12">

					<tr class="success">

						<td>#</td>

						<td><a href="?order=name&&sort=<?php echo($sort);?>">Name</a></td>

						<td><a href="?order=phone&&sort=<?php echo($sort);?>">Phone</a></td>

						<td>Action</td>

					</tr>

                <?php  while ($rows = $result->fetch_assoc()){ $serial_no++; ?>

					<tr>

						<td><?php echo $serial_no; ?></td>

						<td><?php echo $rows['name']; ?></td>

						<td><a href="tel:<?php echo $rows['phone']; ?>"><?php echo $rows['phone']; ?></a></td>

						<td><a class="btn btn-success" href="showdetails.php?id=<?php echo $rows['id']; ?>">Show Details</a></td>

					</tr>

                <?php } ?>			

				</table>

				<?php } else{?>

				<p>No records returned</p>

				<?php }?>

			</div>

		</div>

	</div>

	<!-- Footer Part -->

	<div class="container text-center">

		<dir class="row">

			<dir class="col-md-12 footer">

				<p class="col-md-12">Application Developed By <a href="#">Md Tofael Ahmed</a></p>

			</dir>

		</dir>

	</div>



	<div class="fixedicon">

        <a href="https://www.facebook.com/webtricker" target="_blank"><img src="img/fb.png" alt="Facebook"/></a>

    </div>



	<script src="js/jquery-1.12.0.min.js"></script>

	<script src="js/scrolltop.js"></script>

	<script src="dist/bootstrap/bootstrap.min.js"></script>

</body>

</html>

