<?php 

include 'auth.php';

$sql = "SELECT b.*, p.title, p.price 
       FROM booking b
       JOIN property p ON b.pid = p.pid
       WHERE b.uid = '{$user['id']}'
       ORDER BY b.time_booked DESC";

$result = mysqli_query($conn, $sql);

if (!$result) {
    echo "Error: " . mysqli_error($conn);
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AREA | Profile</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
        .details {
            text-align: center;
            margin-top: 20px;
            font-size: 24px;
            color: #333;
        }
        .table-container {
            max-width: 100%;
            overflow-x: auto; 
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow-x: auto;
        }

        th, td {
            padding: 12px;
            text-align: left;
            font-size: 16px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: #fff;
            font-weight: 600;
            text-transform: uppercase;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tbody tr:hover {
            background-color: #e5e5e5;
        }

        .no-bookings {
            text-align: center;
            margin-top: 20px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .no-bookings p {
            margin: 0;
            color: #555;
        }

        @media screen and (max-width: 768px) {
            th, td {
                padding: 10px;
            }
            .details {
                font-size: 20px;
            }
        }

        @media screen and (max-width: 576px) {
            th, td {
                font-size: 14px;
                padding: 8px;
            }
            .details {
                font-size: 18px;
            }
        }
</style>
</head>

<body>

    <?php include "header.php"; ?>

    <div class="profile-container">

        <div class="profile-card">
            <?php if ($user) { ?>
            <div class="d-flex justify-content-center align-items-center vh-100">
                <div class="shadow w-350 p-3 text-center">
                    <img src="images/profiles/<?=$user['profilePic']?>"
                        class="img-fluid rounded-circle">
                    <h3 class="display-4 "><?=$user['fName'] . ' ' . $user['lName']?></h3>
                    <a href="edit.php" class="btn btn-primary">
                        Edit Profile
                    </a>
                </div>
            </div>
            <?php }else { 
            header("Location: login.php");
            exit;
            } ?>
        </div>
    
        <div class="booking-details">
            <h1 class="details">Booking Details</h1>

            <div>

                <?php
                if (mysqli_num_rows($result) > 0) {
                ?>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Booking ID</th>
                                <th>Property Name</th>
                                <th>Check-in</th>
                                <th>Check-out</th>
                                <th>Guests</th>
                                <th>Total Price</th>
                                <th>Booking Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['bid'] . "</td>";
                                echo "<td>" . $row['title'] . "</td>";
                                echo "<td>" . $row['book_start'] . "</td>";
                                echo "<td>" . $row['book_end'] . "</td>";
                                echo "<td>" . $row['guests'] . "</td>";
                                echo "<td>₱" . $row['totalprice'] . "</td>";
                                echo "<td>" . $row['time_booked'] . "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <?php
                } else {
                ?>
                <div class="no-bookings">
                    <p>You have not made any bookings yet.</p>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="js/script.js"></script>

</body>
</html>

