<header class="header">

        <a href="index.php" class="logo" >AREA</a>

        <a href="rentals.php" class="pts">Places to Stay</a>

        <nav class="navbar">

            <?php if ($user): ?>
                
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