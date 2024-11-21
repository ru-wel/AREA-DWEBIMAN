<?php

    include("../auth.php");
    if ($user_admin_status == 0){
        header("Location: ../index.php");
        exit();
    }

?>

<!DOCTYPE html>
<html lang="en">
    
<head>
<title>AREA | Admin Dashboard</title>
</head>

<?php require 'admin_header.php'; ?>
    
<body>

    <div class="page-wrapper">
			
        <div class="content container-fluid">
                
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Welcome Admin!</h3>
                        <p><a href="../index.php">Home</a></p>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">Admin Dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <!-- /Page Header -->
            <?php if (!empty($msg)): ?>
                <div class="alert alert-success"><?php echo $msg; ?></div>
            <?php endif; ?>

            <div class="col-xl-3 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon bg-info">
											<i class="fe fe-home"></i>
										</span>
										
									</div>
									<div class="dash-widget-info">
										
									<h3><?php $sql = "SELECT * FROM user";
										$query = $conn->query($sql);
                						echo "$query->num_rows";?></h3>
										
										<h6 class="text-muted">Users</h6>
										<div class="progress progress-sm">
											<div class="progress-bar bg-info w-100"></div>
										</div>
                                        <a href="admin_user_view.php"><button style="margin:15px">View Users</button></a>
									</div>
								</div>
							</div>
						</div>

            <div class="col-xl-3 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon bg-info">
											<i class="fe fe-home"></i>
										</span>
										
									</div>
									<div class="dash-widget-info">
										
									<h3><?php $sql = "SELECT * FROM property";
										$query = $conn->query($sql);
                						echo "$query->num_rows";?></h3>
										
										<h6 class="text-muted">Properties</h6>
										<div class="progress progress-sm">
											<div class="progress-bar bg-info w-100"></div>
										</div>

                                        <a href="admin_property_add.php"><button style="margin:15px">Add Properties</button></a>
                                        <a href="admin_property_view.php"><button style="margin:15px">View Properties</button></a>
									</div>
								</div>
							</div>
						</div>

                        <div class="col-xl-3 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon bg-info">
											<i class="fe fe-home"></i>
										</span>
										
									</div>
									<div class="dash-widget-info">
										
									<h3><?php $sql = "SELECT * FROM booking";
										$query = $conn->query($sql);
                						echo "$query->num_rows";?></h3>
										
										<h6 class="text-muted">Bookings</h6>
										<div class="progress progress-sm">
											<div class="progress-bar bg-info w-100"></div>
										</div>
                                        <a href="admin_booking_view.php"><button style="margin:15px">View Bookings</button></a>
									</div>
								</div>
							</div>
						</div>            
</body>
</html>
