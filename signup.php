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

        <a href="index.php" class="logo" >AREA</a>

        <a href="rentals.php" class="pts">Places to Stay</a>

        <nav class="navbar">

            <?php if (isset($user)): ?>
                
                <p class="" style="display: inline-block; text-align: center;"><a href="profile.php" >Hello, <?= htmlspecialchars($user["fName"]) ?></a></p>
                <a href="bookings.php">Bookings</a>

                <?php
                    if(!isset($_SESSION['admin']) || $_SESSION['admin'] != 1) {
                        ?> <?php
                    } else { ?>
                        <span class=""><a href="admin/admin_dashboard.php" class="btn" style="color: var(--white)">Dashboard</a></span>
                        <?php
                    }
                ?>
                
                <span class=""><a href="logout.php" class="btn" style="color: var(--white)">Logout</a></span>
                
            <?php else: ?>
                
                <span class=""><a href="signup.php" class="btn-a" style="color: var(--black)">Register</a></span>
                <span class=""><a href="login.php" class="btn" style="color: var(--white)">Sign In</a></span>
            
            <?php endif; ?>

        </nav>

        <div id="menu-btn" class="fas fa-bars">

        </div>

    </header>

    <div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100">

				<form class="login100-form validate-form" action="signup_process.php" method="post">

					<span class="login100-form-logo">
						<i class="zmdi zmdi-home"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						create your account
					</span>

                    <?php if(isset($_GET['error'])){ ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $_GET['error']; ?>
                            </div>
                        <?php } ?>

                    <?php if(isset($_GET['success'])){ ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $_GET['success']; ?>
                        </div>
                    <?php } ?>

					<div class="wrap-input100 validate-input" data-validate = "Enter first name">
						<input class="input100" type="text" name="fName" placeholder="First Name" value="<?php echo (isset($_GET['fName'])) ? $_GET['fName'] : ""; ?>">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter last name">
						<input class="input100" type="text" name="lName" placeholder="Last Name" value="<?php echo (isset($_GET['lName'])) ? $_GET['lName'] : ""; ?>">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

                    <div class="wrap-input100 validate-input" data-validate = "Enter email" style="text-transform:none">
						<input class="input100" type="email" name="email" placeholder="Email" value="<?php echo (isset($_GET['email'])) ? $_GET['email'] : ""; ?>">
						<span class="focus-input100" data-placeholder="&#x2709;"></span>
					</div>  
                    
                    <div class="wrap-input100 validate-input" data-validate = "Enter password" style="text-transform:none">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

                    <div class="wrap-input100 validate-input" data-validate = "Re enter password" style="text-transform:none">
						<input class="input100" type="password" name="password_confirmation" placeholder="Repeat Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

                    <div class="wrap-input100 validate-input" data-validate = "Enter phone number">
						<input class="input100" type="text" name="phone" placeholder="Phone Number" value="<?php echo (isset($_GET['phone'])) ? $_GET['phone'] : ""; ?>">
						<span class="focus-input100" data-placeholder="&#x1f57b;"></span>
					</div>

                    <div class="inputBox">
                        <span class="input100">Profile Picture:</span>
                        <div class="wrap-input100">
                            <input type="file" name="profilePic" class="input100">
                        </div>
                    </div>

					<div class="container-login100-form-btn-2">
                        <input type="submit" value="Sign Up" class="login100-form-btn" name="send">
                        <button class="login100-form-btn">
                            <a href="login.php">Login</a>
						</button>
					</div>

				</form>

			</div>
            
		</div>

	</div>

    <?php include 'footer.php'; ?>
    
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="js/script.js"></script>

</body>

</html>