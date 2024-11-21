<?php

include 'auth.php';

?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AREA | Rentals</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <section class = "rent-sec">

    <?php include "header.php"; ?>

    <div class="heading" style="background:url(images/header-bg-2.jpg) no-repeat">
        <h1>PLACES TO STAY</h1>
    </div>

    <div style="display:block">
            <h1 class="heading-title">aesthetic favorites</h1>
    </div>            

    <div class="container">

        <?php
        include 'db_conn.php';

        $sql = "SELECT * FROM property WHERE pid = 3";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $title = $row['title'];
            $location = $row['location'];
            $description = $row['description'];
            $price = $row['price'];
            $image = $row['pimage1'];
            $isAvailable = $row['is_booked'];
            $formattedPrice = number_format($price);

            echo '<div class="listing">';
                echo '<img src="images/property/' . $image . '" alt="Property Image">';
                echo '<div class="listing-details">';
                    echo '<h2 class="title"><a style="color: black;" href="about.php?title='. $title .'">'. $title .'</a></h2>';
                    echo '<p class="location">'. $location .'</p>';
                    echo '<p class="description"><strong>Description:</strong> ' . nl2br($description) . '</p>';
                    echo '<p class="price">₱' . $formattedPrice .'</p>';
                    if ($isAvailable == 0) {
                        echo '<div class="availability-status available">Available</div>';
                    } else {
                        echo '<div class="availability-status booked">Booked</div>';
                    }
                echo '</div>';
            echo '</div>';
        }

        $sql = "SELECT * FROM property WHERE pid = 10";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $title = $row['title'];
            $location = $row['location'];
            $description = $row['description'];
            $price = $row['price'];
            $image = $row['pimage1'];
            $isAvailable = $row['is_booked'];
            $formattedPrice = number_format($price);

            echo '<div class="listing">';
                echo '<img src="images/property/' . $image . '" alt="Property Image">';
                echo '<div class="listing-details">';
                    echo '<h2 class="title"><a style="color: black;" href="about.php?title='. $title .'">'. $title .'</a></h2>';
                    echo '<p class="location">'. $location .'</p>';
                    echo '<p class="description"><strong>Description:</strong> ' . nl2br($description) . '</p>';
                    echo '<p class="price">₱' . $formattedPrice .'</p>';
                    if ($isAvailable == 0) {
                        echo '<div class="availability-status available">Available</div>';
                    } else {
                        echo '<div class="availability-status booked">Booked</div>';
                    }
                echo '</div>';
            echo '</div>';
        }

        $sql = "SELECT * FROM property WHERE pid = 12";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $title = $row['title'];
            $location = $row['location'];
            $description = $row['description'];
            $price = $row['price'];
            $image = $row['pimage1'];
            $isAvailable = $row['is_booked'];
            $formattedPrice = number_format($price);

            echo '<div class="listing">';
                echo '<img src="images/property/' . $image . '" alt="Property Image">';
                echo '<div class="listing-details">';
                    echo '<h2 class="title"><a style="color: black;" href="about.php?title='. $title .'">'. $title .'</a></h2>';
                    echo '<p class="location">'. $location .'</p>';
                    echo '<p class="description"><strong>Description:</strong> ' . nl2br($description) . '</p>';
                    echo '<p class="price">₱' . $formattedPrice .'</p>';
                    if ($isAvailable == 0) {
                        echo '<div class="availability-status available">Available</div>';
                    } else {
                        echo '<div class="availability-status booked">Booked</div>';
                    }
                echo '</div>';
            echo '</div>';
        }
        ?>
    </div>

    <div style="display:block">
            <h1 class="heading-title">affordable picks</h1>
    </div>            

    <div class="container">

        <?php
        include 'db_conn.php';
        $sql = "SELECT * FROM property WHERE pid = 9";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $title = $row['title'];
            $location = $row['location'];
            $description = $row['description'];
            $price = $row['price'];
            $image = $row['pimage1'];
            $isAvailable = $row['is_booked'];
            $formattedPrice = number_format($price);

            echo '<div class="listing">';
                echo '<img src="images/property/' . $image . '" alt="Property Image">';
                echo '<div class="listing-details">';
                    echo '<h2 class="title"><a style="color: black;" href="about.php?title='. $title .'">'. $title .'</a></h2>';
                    echo '<p class="location">'. $location .'</p>';
                    echo '<p class="description"><strong>Description:</strong> ' . nl2br($description) . '</p>';
                    echo '<p class="price">₱' . $formattedPrice .'</p>';
                    if ($isAvailable == 0) {
                        echo '<div class="availability-status available">Available</div>';
                    } else {
                        echo '<div class="availability-status booked">Booked</div>';
                    }
                echo '</div>';
            echo '</div>';
        }

        $sql = "SELECT * FROM property WHERE pid = 11";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $title = $row['title'];
            $location = $row['location'];
            $description = $row['description'];
            $price = $row['price'];
            $image = $row['pimage1'];
            $isAvailable = $row['is_booked'];
            $formattedPrice = number_format($price);

            echo '<div class="listing">';
                echo '<img src="images/property/' . $image . '" alt="Property Image">';
                echo '<div class="listing-details">';
                    echo '<h2 class="title"><a style="color: black;" href="about.php?title='. $title .'">'. $title .'</a></h2>';
                    echo '<p class="location">'. $location .'</p>';
                    echo '<p class="description"><strong>Description:</strong> ' . nl2br($description) . '</p>';
                    echo '<p class="price">₱' . $formattedPrice .'</p>';
                    if ($isAvailable == 0) {
                        echo '<div class="availability-status available">Available</div>';
                    } else {
                        echo '<div class="availability-status booked">Booked</div>';
                    }
                echo '</div>';
            echo '</div>';
        }

        $sql = "SELECT * FROM property WHERE pid = 13";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $title = $row['title'];
            $location = $row['location'];
            $description = $row['description'];
            $price = $row['price'];
            $image = $row['pimage1'];
            $isAvailable = $row['is_booked'];
            $formattedPrice = number_format($price);

            echo '<div class="listing">';
                echo '<img src="images/property/' . $image . '" alt="Property Image">';
                echo '<div class="listing-details">';
                    echo '<h2 class="title"><a style="color: black;" href="about.php?title='. $title .'">'. $title .'</a></h2>';
                    echo '<p class="location">'. $location .'</p>';
                    echo '<p class="description"><strong>Description:</strong> ' . nl2br($description) . '</p>';
                    echo '<p class="price">₱' . $formattedPrice .'</p>';
                    if ($isAvailable == 0) {
                        echo '<div class="availability-status available">Available</div>';
                    } else {
                        echo '<div class="availability-status booked">Booked</div>';
                    }
                echo '</div>';
            echo '</div>';
        }
        ?>
    </div>

    <div style="display:block">
            <h1 class="heading-title">family-friendly</h1>
    </div>            

    <div class="container">

        <?php
        include 'db_conn.php';
        $sql = "SELECT * FROM property WHERE pid = 2";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $title = $row['title'];
            $location = $row['location'];
            $description = $row['description'];
            $price = $row['price'];
            $image = $row['pimage1'];
            $isAvailable = $row['is_booked'];
            $formattedPrice = number_format($price);

            echo '<div class="listing">';
                echo '<img src="images/property/' . $image . '" alt="Property Image">';
                echo '<div class="listing-details">';
                    echo '<h2 class="title"><a style="color: black;" href="about.php?title='. $title .'">'. $title .'</a></h2>';
                    echo '<p class="location">'. $location .'</p>';
                    echo '<p class="description"><strong>Description:</strong> ' . nl2br($description) . '</p>';
                    echo '<p class="price">₱' . $formattedPrice .'</p>';
                    if ($isAvailable == 0) {
                        echo '<div class="availability-status available">Available</div>';
                    } else {
                        echo '<div class="availability-status booked">Booked</div>';
                    }
                echo '</div>';
            echo '</div>';
        }

        $sql = "SELECT * FROM property WHERE pid = 5";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $title = $row['title'];
            $location = $row['location'];
            $description = $row['description'];
            $price = $row['price'];
            $image = $row['pimage1'];
            $isAvailable = $row['is_booked'];
            $formattedPrice = number_format($price);

            echo '<div class="listing">';
                echo '<img src="images/property/' . $image . '" alt="Property Image">';
                echo '<div class="listing-details">';
                    echo '<h2 class="title"><a style="color: black;" href="about.php?title='. $title .'">'. $title .'</a></h2>';
                    echo '<p class="location">'. $location .'</p>';
                    echo '<p class="description"><strong>Description:</strong> ' . nl2br($description) . '</p>';
                    echo '<p class="price">₱' . $formattedPrice .'</p>';
                    if ($isAvailable == 0) {
                        echo '<div class="availability-status available">Available</div>';
                    } else {
                        echo '<div class="availability-status booked">Booked</div>';
                    }
                echo '</div>';
            echo '</div>';
        }

        $sql = "SELECT * FROM property WHERE pid = 15";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $title = $row['title'];
            $location = $row['location'];
            $description = $row['description'];
            $price = $row['price'];
            $image = $row['pimage1'];
            $isAvailable = $row['is_booked'];
            $formattedPrice = number_format($price);

            echo '<div class="listing">';
                echo '<img src="images/property/' . $image . '" alt="Property Image">';
                echo '<div class="listing-details">';
                    echo '<h2 class="title"><a style="color: black;" href="about.php?title='. $title .'">'. $title .'</a></h2>';
                    echo '<p class="location">'. $location .'</p>';
                    echo '<p class="description"><strong>Description:</strong> ' . nl2br($description) . '</p>';
                    echo '<p class="price">₱' . $formattedPrice .'</p>';
                    if ($isAvailable == 0) {
                        echo '<div class="availability-status available">Available</div>';
                    } else {
                        echo '<div class="availability-status booked">Booked</div>';
                    }
                echo '</div>';
            echo '</div>';
        }
        ?>
    </div>

    <div style="display:block">
            <h1 class="heading-title">long stay</h1>
    </div>            

    <div class="container">

        <?php
        include 'db_conn.php';
        $sql = "SELECT * FROM property WHERE pid = 1";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $title = $row['title'];
            $location = $row['location'];
            $description = $row['description'];
            $price = $row['price'];
            $image = $row['pimage1'];
            $isAvailable = $row['is_booked'];
            $formattedPrice = number_format($price);

            echo '<div class="listing">';
                echo '<img src="images/property/' . $image . '" alt="Property Image">';
                echo '<div class="listing-details">';
                    echo '<h2 class="title"><a style="color: black;" href="about.php?title='. $title .'">'. $title .'</a></h2>';
                    echo '<p class="location">'. $location .'</p>';
                    echo '<p class="description"><strong>Description:</strong> ' . nl2br($description) . '</p>';
                    echo '<p class="price">₱' . $formattedPrice .'</p>';
                    if ($isAvailable == 0) {
                        echo '<div class="availability-status available">Available</div>';
                    } else {
                        echo '<div class="availability-status booked">Booked</div>';
                    }
                echo '</div>';
            echo '</div>';
        }

        $sql = "SELECT * FROM property WHERE pid = 4";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $title = $row['title'];
            $location = $row['location'];
            $description = $row['description'];
            $price = $row['price'];
            $image = $row['pimage1'];
            $isAvailable = $row['is_booked'];
            $formattedPrice = number_format($price);

            echo '<div class="listing">';
                echo '<img src="images/property/' . $image . '" alt="Property Image">';
                echo '<div class="listing-details">';
                    echo '<h2 class="title"><a style="color: black;" href="about.php?title='. $title .'">'. $title .'</a></h2>';
                    echo '<p class="location">'. $location .'</p>';
                    echo '<p class="description"><strong>Description:</strong> ' . nl2br($description) . '</p>';
                    echo '<p class="price">₱' . $formattedPrice .'</p>';
                    if ($isAvailable == 0) {
                        echo '<div class="availability-status available">Available</div>';
                    } else {
                        echo '<div class="availability-status booked">Booked</div>';
                    }
                echo '</div>';
            echo '</div>';
        }

        $sql = "SELECT * FROM property WHERE pid = 8";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $title = $row['title'];
            $location = $row['location'];
            $description = $row['description'];
            $price = $row['price'];
            $image = $row['pimage1'];
            $isAvailable = $row['is_booked'];
            $formattedPrice = number_format($price);

            echo '<div class="listing">';
                echo '<img src="images/property/' . $image . '" alt="Property Image">';
                echo '<div class="listing-details">';
                    echo '<h2 class="title"><a style="color: black;" href="about.php?title='. $title .'">'. $title .'</a></h2>';
                    echo '<p class="location">'. $location .'</p>';
                    echo '<p class="description"><strong>Description:</strong> ' . nl2br($description) . '</p>';
                    echo '<p class="price">₱' . $formattedPrice .'</p>';
                    if ($isAvailable == 0) {
                        echo '<div class="availability-status available">Available</div>';
                    } else {
                        echo '<div class="availability-status booked">Booked</div>';
                    }
                echo '</div>';
            echo '</div>';
        }
        ?>
    </div>

    <div style="display:block">
            <h1 class="heading-title">most booked</h1>
    </div>            

    <div class="container">

        <?php
        include 'db_conn.php';
        $sql = "SELECT * FROM property WHERE pid = 6";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $title = $row['title'];
            $location = $row['location'];
            $description = $row['description'];
            $price = $row['price'];
            $image = $row['pimage1'];
            $isAvailable = $row['is_booked'];
            $formattedPrice = number_format($price);

            echo '<div class="listing">';
                echo '<img src="images/property/' . $image . '" alt="Property Image">';
                echo '<div class="listing-details">';
                    echo '<h2 class="title"><a style="color: black;" href="about.php?title='. $title .'">'. $title .'</a></h2>';
                    echo '<p class="location">'. $location .'</p>';
                    echo '<p class="description"><strong>Description:</strong> ' . nl2br($description) . '</p>';
                    echo '<p class="price">₱' . $formattedPrice .'</p>';
                    if ($isAvailable == 0) {
                        echo '<div class="availability-status available">Available</div>';
                    } else {
                        echo '<div class="availability-status booked">Booked</div>';
                    }
                echo '</div>';
            echo '</div>';
        }

        $sql = "SELECT * FROM property WHERE pid = 7";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $title = $row['title'];
            $location = $row['location'];
            $description = $row['description'];
            $price = $row['price'];
            $image = $row['pimage1'];
            $isAvailable = $row['is_booked'];
            $formattedPrice = number_format($price);

            echo '<div class="listing">';
                echo '<img src="images/property/' . $image . '" alt="Property Image">';
                echo '<div class="listing-details">';
                    echo '<h2 class="title"><a style="color: black;" href="about.php?title='. $title .'">'. $title .'</a></h2>';
                    echo '<p class="location">'. $location .'</p>';
                    echo '<p class="description"><strong>Description:</strong> ' . nl2br($description) . '</p>';
                    echo '<p class="price">₱' . $formattedPrice .'</p>';
                    if ($isAvailable == 0) {
                        echo '<div class="availability-status available">Available</div>';
                    } else {
                        echo '<div class="availability-status booked">Booked</div>';
                    }
                echo '</div>';
            echo '</div>';
        }

        $sql = "SELECT * FROM property WHERE pid = 14";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $title = $row['title'];
            $location = $row['location'];
            $description = $row['description'];
            $price = $row['price'];
            $image = $row['pimage1'];
            $isAvailable = $row['is_booked'];
            $formattedPrice = number_format($price);

            echo '<div class="listing">';
                echo '<img src="images/property/' . $image . '" alt="Property Image">';
                echo '<div class="listing-details">';
                    echo '<h2 class="title"><a style="color: black;" href="about.php?title='. $title .'">'. $title .'</a></h2>';
                    echo '<p class="location">'. $location .'</p>';
                    echo '<p class="description"><strong>Description:</strong> ' . nl2br($description) . '</p>';
                    echo '<p class="price">₱' . $formattedPrice .'</p>';
                    if ($isAvailable == 0) {
                        echo '<div class="availability-status available">Available</div>';
                    } else {
                        echo '<div class="availability-status booked">Booked</div>';
                    }
                echo '</div>';
            echo '</div>';
        }
        ?>
    </div>

    <div style="display:block">
            <h1 class="heading-title">all listings</h1>
    </div>  

    <div class="container">

        <?php
        include 'db_conn.php';
        $sql = "SELECT * FROM property";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
            $title = $row['title'];
            $location = $row['location'];
            $description = $row['description'];
            $price = $row['price'];
            $image = $row['pimage1'];

            $formattedPrice = number_format($price);

            echo '<div class="listing">';
                echo '<img src="images/property/' . $image . '" alt="Property Image">';
                echo '<div class="listing-details">';
                    echo '<h2 class="title"><a style="color: black;" href="about.php?title='. $title .'">'. $title .'</a></h2>';
                    echo '<p class="location">'. $location .'</p>';
                    echo '<p class="description">'. $description .'</p>';
                    echo '<p class="price">₱' . $formattedPrice .'</p>';
                echo '</div>';
            echo '</div>';
            }
        } else {
            echo '<p>No properties found.</p>';
        }
        mysqli_close($conn);
        ?>
    </div>

    </section class = "rent-sec">

    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="js/script.js"></script>

</body>

</html>