<?php

include 'auth.php';

?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AREA | Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <?php include "header.php"; ?>

    <section class="home">

        <div class="swiper home-slider">

            <div class="swiper-wrapper">

                <div class="swiper-slide slide" style="background:url(images/home-slide-1.webp) no-repeat"> 

                    <div class="content">
                        <span>explore, discover, travel</span>
                        <h3>Your Home Away From Home</h3>
                        <a href="rentals.php" class="btn">discover more</a>
                    </div>

                </div>

                <div class="swiper-slide slide" style="background:url(images/home-slide-2.webp) no-repeat">

                    <div class="content">
                        <span>explore, discover, travel</span>
                        <h3>discover new places</h3>
                        <a href="rentals.php" class="btn">discover more</a>
                    </div>

                </div>

                <div class="swiper-slide slide" style="background:url(images/home-slide-3.webp) no-repeat">

                    <div class="content">
                        <span>explore, discover, travel</span>
                        <h3>make your tour worthwhile</h3>
                        <a href="rentals.php" class="btn">discover more</a>
                    </div>

                </div>

            </div>

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>

        </div>

    </section>

    <section class="wwrnt">
    <h1 class="heading-title-2">TOP RENTALS</h1>
    <div class="container">
                
        <?php
        include 'db_conn.php';
        $sql = "SELECT * FROM property LIMIT 5";
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
                    echo '<p class="description"><strong>Description:</strong> ' . nl2br($description) . '</p>';
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
    </section>

    <section class="wwo">
        <div class="row">
            <h1 class="section-head">What We Offer</h1>
        </div>
        <div class="row">
            <div class="column">
                <div class="card">
                    <div class="icon-wrapper">
                        <i class="fas fa-house-laptop"></i>
                    </div>
                    <h3>FLEXIBLE BOOKING</h3>
                    <p>At our AREA rental service, we pride ourselves on offering flexible booking options designed to suit your convenience. Whether you're planning a weekend getaway or an extended stay, our flexible booking system allows you to easily adjust your dates to fit your needs.</p>
                </div>
            </div>

            <div class="column">
                <div class="card">
                    <div class="icon-wrapper">
                        <i class="fas fa-city"></i>
                    </div>
                    <h3>DIVERSE ACCOMODATIONS</h3>
                    <p>We provide a range of accommodations, including cozy cabins nestled in scenic landscapes and charming bungalows with modern amenities. Our curated selection ensures unforgettable stays, whether you're seeking a rustic retreat or a unique Rentals experienc</p>
                </div>
            </div>

            <div class="column">
                <div class="card">
                    <div class="icon-wrapper">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3>CURATED EXPERIENCES</h3>
                    <p>Experience luxury and comfort like never before with our curated house rental services. Our meticulously selected properties offer a blend of style, elegance, and convenience, ensuring a truly unforgettable stay. Immerse yourself in a world of sophistication and relaxation, where every detail is specialized to exceed your expectations.
</p>
                </div>
            </div>

            <div class="column">
                <div class="card">
                    <div class="icon-wrapper">
                        <i class="fas fa-phone-volume"></i>
                    </div>
                    <h3>24/7 SUPPORT</h3>
                    <p>Our 24/7 support service for AREA ensures that you have round-the-clock assistance for any issues or queries related to your booking property. Whether it's technical support, booking inquiries, or assistance for guests during their stay, our dedicated team is available at all times to provide prompt and reliable support. </p>
                </div>
            </div>

            <div class="column">
                <div class="card">
                    <div class="icon-wrapper">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                    <h3>SECURE PAYMENTS</h3>
                    <p>We provide a comprehensive solution for secure payments, ensuring peace of mind for both property owners and tenants in the realm of AREA. Our resilient system protects transactions, fostering trust and reliability in every aspect of the booking process on our platform.</p>
                </div>
            </div>

            
        </div>
    </section>
	<!-- END WHAT WE DO -->

    <!-- START WHY CHOOSE US -->
       

    <section class="about" id="about">
        <div class="container2">

          <figure class="about-banner">
            <img class = "img-why" src ="images/why-choose-us.webp" alt="Why Choose Us" id="tv">
          </figure>

          <div class="about-content">

            <!-- <p class="section-subtitle">About Us</p> -->

            <h2 class="h2 section-title">Why Choose AREA?</h2>

            <p class="about-text">
            Choose AREA for a curated travel experience tailored to your preferences, supported by local expertise and a commitment to quality, ensuring a seamless and memorable adventure.
            </p>

            <ul class="about-list">

              <li class="about-item">
                <div class="about-item-icon">
                    <i class="fa-solid fa-handshake-simple"></i>
                </div>

                <p class="about-item-text">Personalized Service</p>
              </li>

              <li class="about-item">
                <div class="about-item-icon">
                    <i class="fa-solid fa-house-circle-check"></i>
                </div>

                <p class="about-item-text">Quality Assurance</p>
              </li>

              <li class="about-item">
                <div class="about-item-icon">
                    <i class="fa-solid fa-map-location-dot"></i>
                </div>

                <p class="about-item-text">Local Expertise</p>
              </li>

              <li class="about-item">
                <div class="about-item-icon">
                    <i class="fa-solid fa-people-arrows"></i>
                </div>

                <p class="about-item-text">Community Engagement</p>
              </li>

              <li class="about-item">
                <div class="about-item-icon">
                    <i class="fa-solid fa-user-plus"></i>
                </div>

                <p class="about-item-text">Seamless Experience</p>
              </li>

            </ul>

            <p class="callout">
            "Home is not a place; it's a feeling of belonging and adventure waiting to be explored."
            </p>

          </div>

        </div>
      </section>
    <!-- END WHY CHOOSE US -->

    <!-- START OF REVIEWS -->
            <section class = "Rev-sec">
        <h1 class = "rev">-  Our Happy Clients -</h1>

        <!-- Clients Review Section -->
        <div class="reviewSection">

            <!-- Clients Review-1 Section Starts from Here  -->
            <div class="reviewItem">
                <div class="top">
                    <div class="clientImage">
                        <img src="./client.png" alt="">
                        <h2>Mina Miles</h2>
                    </div>
                    <ul>
                        <li><i class="fa-solid fa-star"></i></li>
                        <li><i class="fa-solid fa-star"></i></li>
                        <li><i class="fa-solid fa-star"></i></li>
                        <li><i class="fa-regular fa-star"></i></li>
                        <li><i class="fa-regular fa-star"></i></li>
                    </ul>
                </div>
                <article>
                    <p class="review">"Choosing AREA for my vacation  was the best decision! The seamless booking
                        process, amazing accommodations, and attentive service made my staycation truly enjoyable."
                    </p>
                    <p>Jan 01, 2023</p>
                </article>
            </div>

            <!-- Clients Review-2 Section Starts from Here  -->
            <div class="reviewItem">
                <div class="top">
                    <div class="clientImage">
                        <img src="./client.png" alt="">
                        <h2>James Sam</h2>
                    </div>
                    <ul>
                        <li><i class="fa-solid fa-star"></i></li>
                        <li><i class="fa-solid fa-star"></i></li>
                        <li><i class="fa-solid fa-star"></i></li>
                        <li><i class="fa-solid fa-star"></i></li>
                        <li><i class="fa-regular fa-star"></i></li>
                    </ul>
                </div>
                <article>
                    <p class="review">"AREA exceeded my expectations! From the beautiful accommodations to the excellent
                        customer support, I couldn't have asked for a better experience. Highly recommended!"
                    </p>
                    <p>Feb 15, 2023</p>
                </article>
            </div>

            <!-- Clients Review-3 Section Starts from Here  -->
            <div class="reviewItem">
                <div class="top">
                    <div class="clientImage">
                        <img src="./client.png" alt="">
                        <h2>Avi Meritt</h2>
                    </div>
                    <ul>
                        <li><i class="fa-solid fa-star"></i></li>
                        <li><i class="fa-solid fa-star"></i></li>
                        <li><i class="fa-solid fa-star"></i></li>
                        <li><i class="fa-solid fa-star"></i></li>
                        <li><i class="fa-solid fa-star"></i></li>
                    </ul>
                </div>
                <article>
                    <p class="review">"AREA made my vacation memorable! The attention to detail in every aspect of my
                        booking, from the location to the amenities, was exceptional. I'll definitely be back!"
                    </p>
                    <p>Mar 22, 2023</p>
                </article>
            </div>

            <!-- Additional Clients Review Section Starts from Here  -->
            <div class="reviewItem">
                <div class="top">
                    <div class="clientImage">
                        <img src="./client.png" alt="">
                        <h2>Tian Sam</h2>
                    </div>
                    <ul>
                        <li><i class="fa-solid fa-star"></i></li>
                        <li><i class="fa-solid fa-star"></i></li>
                        <li><i class="fa-solid fa-star"></i></li>
                        <li><i class="fa-solid fa-star"></i></li>
                        <li><i class="fa-solid fa-star"></i></li>
                    </ul>
                </div>
                <article>
                    <p class="review">"I had an amazing experience with AREA! The variety of options and ease of booking
                        made my vacation planning stress-free. I highly recommend AREA to anyone looking for a fantastic
                        staycation or vacation rental!"
                    </p>
                    <p>Apr 10, 2023</p>
                </article>
            </div>
        </div>
            </section>
    <!-- END OF REVIEWS -->

                </div>
            </section>

    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="js/script.js"></script>

</body>

</html>

