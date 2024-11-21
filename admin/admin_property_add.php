<?php
session_start();
require("../db_conn.php");

$error = "";
$msg = "";

if (isset($_POST['add'])) {
    $title = $_POST['title'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // Error validation
    if (empty($title) || empty($location) || empty($description) || empty($price)) {
        $error = "Please fill in all the required fields.";
    } elseif (!is_numeric($price) || $price < 0) {
        $error = "Price must be a number and not less than 0.";
    } else {
        $images = array();

        for ($i = 1; $i <= 5; $i++) {
            $image = $_FILES['aimage' . $i]['name'];
            $temp_name = $_FILES['aimage' . $i]['tmp_name'];

            if (!empty($image)) {
                $img_ex = pathinfo($image, PATHINFO_EXTENSION);
                $img_ex_to_lc = strtolower($img_ex);
                $allowed_exs = array('jpg', 'jpeg', 'png');

                if (in_array($img_ex_to_lc, $allowed_exs)) {
                    move_uploaded_file($temp_name, "../images/property/$image");
                    $images[] = $image;
                } else {
                    $error = "Invalid file type for Image $i. Only JPG, JPEG, and PNG files are allowed.";
                    break;
                }
            } else {
                $error = "Please select Image $i.";
                break;
            }
        }

        if (empty($error)) {
            $stmt = $conn->prepare("INSERT INTO property (title, location, description, price, pimage1, pimage2, pimage3, pimage4, pimage5) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssssss", $title, $location, $description, $price, $images[0], $images[1], $images[2], $images[3], $images[4]);
            $result = $stmt->execute();

            if ($result) {
                $msg = "<p class='alert alert-success'>Property Inserted Successfully</p>";
                header('Location: admin_dashboard.php?msg=' . urlencode($msg));
                exit;
            } else {
                $error = "<p class='alert alert-warning'>Something went wrong. Please try again</p>";
                $error .= "<p>Error: " . mysqli_error($conn) . "</p>";
            }

            $stmt->close();
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
    
<head>
<title>AREA | Add Property</title>
</head>
<?php require 'admin_header.php'; ?>

<body>
    <!-- Page Wrapper -->
    <div class="page-wrapper">
                <div class="content container-fluid">
                
                    <!-- Page Header -->
                    <div class="page-header">
                        <div class="row">
                            <div class="col">
                                <h3 class="page-title">Property</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Property</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /Page Header -->
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Add Property Details</h4>
                                    <?php if (!empty($error)): ?>
                                        <div class="alert alert-danger" role="alert" style="text-transform:none">
                                            <?php echo $error; ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (!empty($msg)): ?>
                                        <div class="alert alert-success" role="alert">
                                            <?php echo $msg; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <form method="post" enctype="multipart/form-data">

                                    <div class="card-body">
                                        <h5 class="card-title">Property Details</h5>
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="form-group row">
                                                    <label class="col-lg-2 col-form-label">Title</label>
                                                    <div class="col-lg-9">
                                                        <input type="text" class="form-control" name="title" required placeholder="Enter Title" value="<?php echo isset($_POST['title']) ? $_POST['title'] : ''; ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-lg-2 col-form-label">Location</label>
                                                    <div class="col-lg-9">
                                                        <textarea class="tinymce form-control" name="location" rows="1" cols="5"><?php echo isset($_POST['location']) ? $_POST['location'] : ''; ?></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-lg-2 col-form-label">Description</label>
                                                    <div class="col-lg-9">
                                                        <textarea class="tinymce form-control" name="description" rows="10" cols="30"><?php echo isset($_POST['description']) ? $_POST['description'] : ''; ?></textarea>
                                                    </div>
                                                </div>   
                                                
                                                <div class="form-group row">
                                                    <label class="col-lg-2 col-form-label">Price</label>
                                                    <div class="col-lg-9">
                                                        <input type="text" class="form-control" name="price" required placeholder="Enter Price" value="<?php echo isset($_POST['price']) ? $_POST['price'] : ''; ?>">
                                                    </div>
                                                </div>   

                                            </div>
                                            
                                            <h4 class="card-title">Image & Status</h4>
                                            <br>
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    
                                                    <?php for ($i = 1; $i <= 5; $i++): ?>
                                                        <div class="form-group row">
                                                            <label class="col-lg-3 col-form-label">Image <?php echo $i; ?></label>
                                                            <div class="col-lg-9">
                                                                <input class="form-control" name="aimage<?php echo $i; ?>" type="file" required="">
                                                            </div>
                                                        </div>
                                                    <?php endfor; ?>

                                                </div>
                                            
                                            <hr>

                                            <input type="submit" value="Submit" class="btn btn-primary" name="add" style="margin-left:200px;">
                                        
                                        </div>
                                    </div>

                                </form>
                                                                                
                            </div>
                        </div>
                    </div>
                
                </div>          
    </div>
            <!-- /Main Wrapper -->
</body>

</html>