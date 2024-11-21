<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    require __DIR__ . "\db_conn.php";
    
    $sql = "SELECT * FROM user WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_POST["email"]);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $user = $result->fetch_assoc();
    
    if ($user && password_verify($_POST["password"], $user["password_hash"])) {
        session_start();
        session_regenerate_id();
        $_SESSION["user_id"] = $user["id"];
        header("Location: index.php");
        exit;
    } else {
        $is_invalid = true;
    }
}

?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AREA | About</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>

<body>

    <header class="header">

        <a href="index.php" class="logo">AREA</a>

        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="rentals.php">Rentals</a>

        </nav>

        <div id="menu-btn" class="fas fa-bars">

        </div>

    </header>

    <div class="limiter">

		<div class="container-login100" style="background-image: url('images/home-slide-3.jpg');">

			<div class="wrap-login100">

				<form class="login100-form validate-form" method="post" enctype="multipart/form-data">

					<span class="login100-form-logo">
						<i class="zmdi zmdi-home"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>

                    <?php if(isset($_GET['error'])){ ?>
                        <div class="alert alert-danger" role="alert">
                        <?php echo $_GET['error']; ?>
                        </div>
                    <?php } ?>

					<div class="wrap-input100 validate-input" data-validate = "Enter email">
						<input class="input100" type="email" name="email" id="email" placeholder="Email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>" style="text-transform:none">
						<span class="focus-input100" data-placeholder="&#x2709;"></span>
                        
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" id="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

                    <?php if ($is_invalid): ?>
                        <div class="alert alert-danger" role="alert">
                            Incorrect email or password. Please try again.
                        </div>
                    <?php endif; ?>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

				</form>

			</div>

		</div>

	</div>
	
	<!-- <div id="dropDownSelect1"></div> -->

    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="js/script.js"></script>

</body>

</html>

