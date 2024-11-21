<?php
session_start();
require("../db_conn.php");

$error = "";
$msg = "";

if (isset($_POST['add'])) {
    $pid = $_REQUEST['id'];
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
                // No file uploaded, retain the existing image
                $images[] = $_POST['old_image' . $i];
            }
        }

        if (empty($error)) {
            $sql = "UPDATE property SET title = ?, location = ?, description = ?, price = ?, pimage1 = ?, pimage2 = ?, pimage3 = ?, pimage4 = ?, pimage5 = ?";
            $params = array($title, $location, $description, $price, $images[0], $images[1], $images[2], $images[3], $images[4]);
            $sql .= " WHERE pid = ?";
            $params[] = $pid;

            $stmt = mysqli_prepare($conn, $sql);
            $stmt->bind_param(str_repeat('s', count($params)), ...$params);
            $result = $stmt->execute();

            if ($result) {
                $msg = "Property Updated";
            } else {
                $msg = "Property Not Updated";
            }

            header("Location: admin_property_view.php?msg=" . urlencode($msg));
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<title>AREA | Edit Property</title>
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
                            <h4 class="card-title">Update Property Details</h4>
                            <?php if (!empty($error)) : ?>
                                <div class="alert alert-danger" role="alert" style="text-transform:none">
                                    <?php echo $error; ?>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($msg)) : ?>
                                <div class="alert alert-success" role="alert">
                                    <?php echo $msg; ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <?php

                        $pid = $_REQUEST['id'];
                        $query = mysqli_query($conn, "select * from property where pid='$pid'");
                        while ($row = mysqli_fetch_array($query)) {
                        ?>

                            <form method="post" enctype="multipart/form-data">

                                <div class="card-body">
                                    <h5 class="card-title">Property Details</h5>
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label">Title</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="title" required value="<?php echo $row['title']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label">Location</label>
                                                <div class="col-lg-9">
                                                    <textarea class="tinymce form-control" name="location" rows="1" cols="5"><?php echo $row['location']; ?></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label">Description</label>
                                                <div class="col-lg-9">
                                                    <textarea class="tinymce form-control" name="description" rows="10" cols="30"><?php echo $row['description']; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label">Price</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="price" required value="<?php echo $row['price']; ?>">
                                                </div>
                                            </div>

                                        </div>

                                        <h4 class="card-title">Image & Status</h4>
                                        <br>
                                        <div class="row">
                                            <div class="col-xl-12">

                                                <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label">Image <?php echo $i; ?></label>
                                                        <div class="col-lg-9">
                                                            <input class="form-control" name="aimage<?php echo $i; ?>" type="file">
                                                            <input type="hidden" name="old_image<?php echo $i; ?>" value="<?php echo $row['pimage' . $i]; ?>">
                                                            <img src="../images/property/<?php echo $row['pimage' . $i]; ?>" alt="pimage" height="150" width="180">
                                                        </div>
                                                    </div>
                                                <?php endfor; ?>

                                            </div>

                                            <hr>

                                            <input type="submit" value="Submit" class="btn btn-primary" name="add" style="margin-left:200px;">

                                        </div>
                                    </div>

                            </form>

                        <?php
                        }
                        ?>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /Main Wrapper -->
</body>

</html>