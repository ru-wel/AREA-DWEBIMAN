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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AREA | Bookings</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> -->
    <style>
        .details {
            text-align: center;
            margin-top: 20px;
            font-size: 24px;
            color: #333;
        }
        .table-container {
            max-width: 60%; 
            margin: 0 auto;
            overflow-x: auto; 
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            overflow-x: auto; 
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            font-size: 18px;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        tbody tr:hover {
            background-color: #f2f2f2;
        }

        .no-bookings {
            text-align: center;
            margin-top: 20px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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
    
    <h1 class="details">Booking Details</h1>

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

    <?php include 'footer.php'; ?>

</body>

</html>