<?php

include 'auth.php';
date_default_timezone_set('Asia/Manila');

$isAvailable = true;
$pid = $_REQUEST['id'];
$sql_booked = "SELECT book_start, book_end FROM booking WHERE pid = ?";
$stmt_booked = $conn->prepare($sql_booked);
$stmt_booked->bind_param("i", $pid);
$stmt_booked->execute();
$result_booked = $stmt_booked->get_result();

$bookedDates = [];
while ($row_booked = $result_booked->fetch_assoc()) {
    $bookedDates[] = array(
        'start' => $row_booked['book_start'],
        'end' => $row_booked['book_end']
    );
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pid = $_REQUEST['id'];
    $guests = $_POST['guests'];
    $book_start = $_POST['book_start'];
    $book_end = $_POST['book_end'];

    if ($guests <= 0) {
        echo '<div class="alert alert-danger">Number of guests must be greater than 0.</div>';
        exit;
    }

    $start = new DateTime($book_start);
    $end = new DateTime($book_end);
    $interval = $start->diff($end);
    $days = $interval->days;

    $query = mysqli_query($conn, "SELECT price FROM property WHERE pid = $pid");
    $row = mysqli_fetch_row($query);
    $pricePerDay = $row[0];

    $totalPrice = $days * $pricePerDay;

    $time_booked = date('Y-m-d H:i:s');
    $is_booked = 1;

    $isAvailable = true;
    foreach ($bookedDates as $bookedDate) {
        $bookedStart = new DateTime($bookedDate['start']);
        $bookedEnd = new DateTime($bookedDate['end']);
        $requestedStart = new DateTime($book_start);
        $requestedEnd = new DateTime($book_end);

        if (($requestedStart >= $bookedStart && $requestedStart <= $bookedEnd) ||
            ($requestedEnd >= $bookedStart && $requestedEnd <= $bookedEnd) ||
            ($requestedStart <= $bookedStart && $requestedEnd >= $bookedEnd)) {
            $isAvailable = false;
            break;
        }
    }

    if ($isAvailable) {
        $sql_booking = "INSERT INTO booking (pid, uid, book_start, book_end, guests, totalprice, time_booked) 
                        VALUES ('$pid', '{$user['id']}', '$book_start', '$book_end', '$guests', '$totalPrice', '$time_booked')";

        $sql_property = "UPDATE property SET is_booked = '$is_booked' WHERE pid = '$pid'";

        if (mysqli_query($conn, $sql_booking) && mysqli_query($conn, $sql_property)) {
            header("Location: bookings.php");
            exit;
        } else {
            echo "Error: " . $sql_booking . "<br>" . mysqli_error($conn);
            echo "Error: " . $sql_property . "<br>" . mysqli_error($conn);
        }
    } else {
        echo '';
    }
}

$pid = $_REQUEST['id'];
$query = mysqli_query($conn, "SELECT * FROM property WHERE pid = $pid");
$row = mysqli_fetch_row($query);
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AREA | Booking</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/dashboard/bootstrap.min.css">
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

    <!-- <style>
        .booking2 {
            padding: 20px;
            background-color: #f8f9fa;
        }

        .booking2 .heading-title {
            margin-bottom: 20px;
            text-align: center;
        }

        .booking2 .form-group {
            margin-bottom: 20px;
        }

        .booking2 label {
            font-weight: bold;
        }

        .booking2 input[type="text"],
        .booking2 input[type="email"],
        .booking2 input[type="number"],
        .booking2 input[type="date"],
        .booking2 select {
            width: 100%;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        .booking2 button {
            padding: 10px 20px;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }

        .booking2 button:hover {
            background-color: #0056b3;
        }

        @media (min-width: 768px) {
            .booking2 .form-row {
                display: flex;
            }

            .booking2 .form-group {
                flex: 1;
                margin-right: 10px;
            }

            .booking2 .form-group:last-child {
                margin-right: 0;
            }
        }

    </style> -->

</head>

<body>

    <?php include "header.php"; ?>

    <div class="heading" style="background:url(images/header-bg-3.webp) no-repeat">
        <h1>Booking</h1>
    </div>

    <div class="limiter">

        <?php
            $pid = $_REQUEST['id'];
            $query = mysqli_query($conn,"select * from property where pid = $pid");
            $row = mysqli_fetch_row($query);
													
        ?>

		<div class="container-login100-2" style="background-image: url('images/home-slide-3.webp');">

			<div class="wrap-login100-2">

				<form class="login100-form validate-form" method="post" enctype="multipart/form-data">

					<span class="login100-form-title p-b-34 p-t-27">
						book your stay
					</span>

                    <?php if (!$isAvailable): ?>
                        <div class="alert alert-danger">Property is already booked during the selected dates.</div>
                    <?php endif; ?>

                    <div class="input-box">
                        <div class="wrap-input100 validate-input">
                            <input class="input100" type="text" placeholder="<?php echo $user['fName'] . ' ' . $user['lName']; ?>" readonly>
                            <span class="focus-input100" data-placeholder="&#xf207;"></span>
                        </div>
                    </div>

                    <div class="input-box">
                        <div class="wrap-input100 validate-input">
                            <input class="input100" type="email" style="text-transform:none" placeholder="<?php echo $user['email']; ?>" readonly>
                            <span class="focus-input100" data-placeholder="&#x2709;"></span>
                        </div>
                    </div>

                    <div class="input-box">
                        <div class="wrap-input100 validate-input">
                            <input class="input100" type="number" placeholder="<?php echo $user['phone_num']; ?>" readonly>
                            <span class="focus-input100" data-placeholder="&#x1f57b;"></span>
                        </div>
                    </div>

                    <div class="input-box">
                        <div class="wrap-input100 validate-input">
                            <input class="input100" type="text" placeholder="<?php echo $row['1']; ?>" readonly>
                            <span class="focus-input100" data-placeholder="&#x2302;"></span>
                        </div>
                    </div>

                    <div class="input-box">        
                        <div class="wrap-input100 validate-input">
                            <input class="input100" type="text" placeholder="<?php echo '₱' . number_format($row['4']); ?>" readonly>
                            <span class="focus-input100" data-placeholder="&#x1F5A9;"></span>
                        </div>
                    </div>

                    <div class="input-box">  
                        <div class="wrap-input100 validate-input">
                            <input class="input100" type="number" name="guests" placeholder="number of guests">
                            <span class="focus-input100" data-placeholder="&#xf207;"></span>
                        </div>
                    </div>

                    <div class="input-box">  
                        <div class="wrap-input100 validate-input">
                            <label for="book_start" class="label-input100">Check-in Date</label>
                            <input class="input100" type="date" name="book_start" id="book_start" onchange="calculateNights()">
                            <span class="focus-input100" data-placeholder=""></span>
                        </div>
                    </div>

                    <div class="input-box">  
                        <div class="wrap-input100 validate-input">
                            <label for="book_end" class="label-input100">Check-out Date</label>
                            <input class="input100" type="date" name="book_end" id="book_end" onchange="calculateNights()">
                            <span class="focus-input100" data-placeholder=""></span>
                        </div>
                    </div>

                    <div class="input-box">  
                        <div class="wrap-input100 validate-input">
                            <label for="nights" class="label-input100">Number of Days</label>
                            <input class="input100" type="text" name="nights" id="nights" readonly>
                            <span class="focus-input100" data-placeholder=""></span>
                        </div>
                    </div>

                    <div class="input-box">  
                        <div class="wrap-input100 validate-input">
                            <label for="total-price" class="label-input100">Total Price</label>
                            <input class="input100" type="text" name="totalprice" id="total-price" readonly>
                            <span class="focus-input100" data-placeholder=""></span>
                        </div>
                    </div>

					<div class="container-login100-form-btn">
                        <input type="submit" value="submit" class="login100-form-btn" name="send">
					</div>
                    
				</form>

			</div>

		</div>

	</div>

    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="js/script.js"></script>
    <script>
        function calculateNights() {
            const startDateStr = document.getElementById('book_start').value;
            const endDateStr = document.getElementById('book_end').value;

            if (startDateStr && endDateStr) {
                const start = new Date(startDateStr);
                const end = new Date(endDateStr);
                const timeDiff = Math.abs(end.getTime() - start.getTime());
                const daysCount = Math.ceil(timeDiff / (1000 * 3600 * 24));
                const pricePerNight = parseFloat('<?php echo $row[4]; ?>');
                const totalPrice = daysCount * pricePerNight;

                document.getElementById('nights').value = daysCount;
                document.getElementById('total-price').value = '₱' + totalPrice.toFixed(2);
                document.getElementById('nights-display').textContent = `Number of days: ${daysCount}`;
            } else {
                document.getElementById('nights').value = '';
                document.getElementById('total-price').value = '';
                document.getElementById('nights-display').textContent = '';
            }
        }
    </script>

</body>

</html>