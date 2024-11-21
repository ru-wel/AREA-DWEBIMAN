<?php

include 'db_conn.php';
include 'auth.php';

?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AREA | About</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">

    <style>
        .property-details {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            margin: 40px auto;
            max-width: 1200px; 
            padding: 30px;
        }

        .property-details .image-container {
            position: relative;
            height: 400px;
            overflow: hidden;
            border-radius: 12px;
            margin-bottom: 20px;
        }

        .property-details .image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 12px;
        }

        .property-details h2 {
            font-size: 28px;
            margin-bottom: 10px;
        }

        .property-details .location {
            font-size: 16px;
            color: #717171;
            margin-bottom: 20px;
        }

        .property-details .description {
            font-size: 16px;
            color: #484848;
            margin-bottom: 20px;
        }

        .property-details .price {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .property-details .availability-status {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .available {
            color: #1ed760;
        }

        .booked {
            color: #ff5a5f;
        }
        .photo-grid {
            display: grid;
            grid-template-columns: 2fr repeat(2, 1fr);
            grid-template-rows: repeat(2, 1fr);
            grid-gap: 10px;
            padding: 10px;
        }

        .photo-grid-item {
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            display: flex;
        }

        .photo-grid-item img {
            max-width: 100%;
            max-height: 100%;
            object-fit: cover;
            border-radius: 8px;
        }

        .photo-item:first-child {
            grid-row: span 2;
            grid-column: span 1;
        }

        .grid-item:nth-child(n+2):not(:first-child) {
            grid-row: span 1;
        }

        .photo-grid-item:hover img {
            transform: scale(1.1);
        }

        
        .photo-grid-item:first-child {
            grid-column: 1 / 2;
            grid-row: 1 / 3;
        }

    </style>

</head>

<body>

    <?php include "header.php"; ?>

    <?php
        include 'db_conn.php';

        if (isset($_GET['title'])) {
            $title = $_GET['title'];

            $sql = "SELECT * FROM property WHERE title = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $title);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();

                $pid = $row['pid'];
                $title = $row['title'];
                $location = $row['location'];
                $description = $row['description'];
                $price = $row['price'];
                $image = $row['pimage1'];
                $image2 = $row['pimage2'];
                $image3 = $row['pimage3'];
                $image4 = $row['pimage4'];
                $image5 = $row['pimage5'];
                $isAvailable = $row['is_booked'];
                $formattedPrice = number_format($price);

                echo '<div class="property-details">';
                    echo '<div class="photo-grid">';
                        echo '<div class="photo-grid-item">';
                            echo '<img src="images/property/' . $image . '" alt="Image 1">';
                        echo '</div>';
                        echo '<div class="photo-grid-item">';
                            echo '<img src="images/property/' . $image2 . '" alt="Image 1">';
                        echo '</div>';
                        echo '<div class="photo-grid-item">';
                            echo '<img src="images/property/' . $image3 . '" alt="Image 1">';
                        echo '</div>';
                        echo '<div class="photo-grid-item">';
                            echo '<img src="images/property/' . $image4 . '" alt="Image 1">';
                        echo '</div>';
                        echo '<div class="photo-grid-item">';
                            echo '<img src="images/property/' . $image5 . '" alt="Image 1">';
                        echo '</div>';
                    echo '</div>';
                    echo '<h2>' . $title . '</h2>';
                    echo '<p class="location"><strong>Location:</strong> ' . $location . '</p>';
                    echo '<p class="description"><strong>Description:</strong> ' . nl2br($description) . '</p>';
                    echo '<p class="price">₱' . $formattedPrice . '</p>';

                    if ($isAvailable == 0) {
                        echo '<div class="availability-status available">Available</div>';
                    } else {
                        echo '<div class="availability-status booked">Booked</div>';
                    }

                    $sql_booked_dates = "SELECT book_start, book_end FROM booking WHERE pid = ?";
                    $stmt_booked_dates = $conn->prepare($sql_booked_dates);
                    $stmt_booked_dates->bind_param("i", $pid);
                    $stmt_booked_dates->execute();
                    $result_booked_dates = $stmt_booked_dates->get_result();

                    if ($result_booked_dates->num_rows > 0) {
                        echo '<div class="booked-dates">';
                        echo '<h3>Booked Dates:</h3>';
                        while ($row_booked_dates = $result_booked_dates->fetch_assoc()) {
                            echo '<p style="text-transform:none">' . $row_booked_dates['book_start'] . ' to ' . $row_booked_dates['book_end'] . '</p>';
                        }
                        echo '</div>';
                    }
                    echo '<a href="book.php?id=' .$pid . '" class="btn">Book Now</a>';
                echo '</div>';
            } else {
                echo '<p>No listing found.</p>';
            }
        } else {
            echo '<p>Invalid request.</p>';
        }

        mysqli_close($conn);
    ?>

    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="js/script.js"></script>

</body>

</html>