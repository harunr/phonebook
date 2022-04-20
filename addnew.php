<?php 



require_once('inc/db_connect.php');



// Update 



if (isset($_POST['submit'])) {

    $name  = $_POST['name'];

    $phone  = $_POST['phone'];

    $email  = $_POST['email'];

    $address  = $_POST['address'];

    $uploadDir = 'https://staging.webtricker.com/phonebook/img/uploaded/';



    $update_contact_query = "INSERT INTO contact SET name = '$name', phone = '$phone' , email = '$email',address = '$address'";



    if (!empty($_FILES['image']['name'])) {

        $tempFile   = $_FILES['image']['tmp_name'];

        $file_extention = explode('.', $_FILES['image']['name']);

        $file_name_new = uniqid('',true). '.' .end($file_extention);

        $uploadDir  = $_SERVER['DOCUMENT_ROOT'] . $uploadDir;

        $targetFile = $uploadDir . $file_name_new;

        move_uploaded_file($tempFile, $targetFile);

        $update_contact_query = "INSERT INTO contact SET name = '$name', phone = '$phone' , email = '$email', address = '$address' , imagename = '$file_name_new'";

    }



    if (!empty($name) || !empty($phone)) {

        if (mysqli_query($con,$update_contact_query)) {

            header('Location: https://staging.webtricker.com/phonebook');

        } else {

            echo "<p class='text-center bg-danger'>Error</p>";

        }

    }

}

?>





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

	<div class="container text-center">

		<div class="row">

			<div class="head_page col-md-12">

				<h2>Add New Contact</h2>

			</div>

		</div>

	</div>

	

	<div class="container">

		<div class="row">

			<form action="" method="post" class="col-md-12"  enctype="multipart/form-data">

				<div class="sigle-input col-md-12">

					<label class="col-md-3">Name: *</label>

					<input class="col-md-8" type="text" name="name" placeholder="Md Tofael Ahmed">

				</div>

				<div class="sigle-input col-md-12">

					<label class="col-md-3">Phone No: *</label>

					<input class="col-md-8" type="text" name="phone" placeholder="01724376407">

				</div>

				<div class="sigle-input col-md-12">

					<label class="col-md-3">Email: </label>

					<input class="col-md-8" type="email" name="email" placeholder="demo@gmail.com">

				</div>

				<div class="sigle-input col-md-12">

					<label class="col-md-3">Address: </label>

					<input class="col-md-8" type="text" name="address" placeholder="Dhaka , Jamalpur">

				</div>

				<div class="sigle-input col-md-12">

					<label class="col-md-3">Image: </label>

					<input type="file" name="image" class="col-md-8">

				</div>

				<div class="sigle-input col-md-12 text-center submit-data">

					<input class="col-md-2" type="submit" name="submit" value="Save">

				</div>

			</form>

		</div>

	</div>

	



	



	<!-- Footer Part -->

	<div class="container text-center "> <!--  fixed-bottom -->

		<dir class="row">

			<div class="col-md-12 footer">

				<p class="col-md-12">Application Developed By <a href="#">Md Tofael Ahmed</a></p>

			</div>

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

