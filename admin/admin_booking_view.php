<?php
session_start();
require("../db_conn.php");

if (isset($_GET['msg']) && $_GET['msg'] === 'success') {
    $successMsg = "Property has been successfully edited.";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
<title>AREA | View Bookings</title>
</head>

<?php require 'admin_header.php'; ?>
    <body>
	
		<!-- Main Wrapper -->
		
		
			<!-- Header -->
			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">

					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Bookings</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
									<li class="breadcrumb-item active">Bookings</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="header-title mt-0 mb-4">Bookings View</h4>

										<?php if (isset($_GET['msg'])): ?>
											<div class="alert alert-success"><?php echo $_GET['msg']; ?></div>
										<?php endif; ?>
										
                                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Booking ID</th>
                                                    <th>User</th>
                                                    <th>Property</th>
                                                    <th>Book Start</th>
                                                    <th>Book End</th>
                                                    <th>Guests</th>
                                                    <th>Total Price</th>
                                                    <th>Time Booked</th>
                                                   
                                                </tr>
                                            </thead>
                                        
                                        
                                            <tbody>
												<?php
													
													$query = mysqli_query($conn, "SELECT booking.bid, user.fName, user.lName, property.title, booking.book_start, booking.book_end, booking.guests, booking.totalprice, booking.time_booked 
                                                                                    FROM booking
                                                                                    JOIN user ON booking.uid = user.id
                                                                                    JOIN property ON booking.pid = property.pid");
                                                    while ($row = mysqli_fetch_assoc($query)) {
												?>
											
                                                <tr>
                                                    <td><?php echo $row['bid']; ?></td>
                                                    <td><?php echo $row['fName'] . ' ' . $row['lName']; ?></td>
                                                    <td><?php echo $row['title']; ?></td>
                                                    <td><?php echo $row['book_start']; ?></td>
                                                    <td><?php echo $row['book_end']; ?></td>
                                                    <td><?php echo $row['guests']; ?></td>
                                                    <td><?php echo $row['totalprice']; ?></td>
                                                    <td><?php echo $row['time_booked']; ?></td>
                                                </tr>
                                               <?php
												} 
												?>
                                            </tbody>
                                        </table>
                                        
                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                        </div>
                        <!-- end row-->
					
				</div>			
			</div>
			<!-- /Main Wrapper -->

		
		<!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JS -->
        <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		
		<!-- Datatables JS -->
		<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
		<script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
		<script src="assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
		
		<script src="assets/plugins/datatables/dataTables.select.min.js"></script>
		
		<script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
		<script src="assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
		<script src="assets/plugins/datatables/buttons.html5.min.js"></script>
		<script src="assets/plugins/datatables/buttons.flash.min.js"></script>
		<script src="assets/plugins/datatables/buttons.print.min.js"></script>
		
		<!-- Custom JS -->
		<script  src="assets/js/script.js"></script>
		
    </body>
</html>
