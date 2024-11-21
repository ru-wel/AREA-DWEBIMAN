<?php
include("../db_conn.php");
$pid = $_GET['id'];

if (isset($_GET['confirm']) && $_GET['confirm'] === 'true') {
    $sql = "DELETE FROM property WHERE pid = {$pid}";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $msg = "<p class='alert alert-success'>Property Deleted</p>";
        header("Location: admin_property_view.php?msg=$msg");
        exit;
    } else {
        $msg = "<p class='alert alert-warning'>Property Not Deleted</p>";
        header("Location: admin_property_view.php?msg=$msg");
        exit;
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>AREA | Delete Property</title>
    <?php require 'admin_header.php'; ?>

    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
        .confirmation-message {
            text-align: center;
        }
        
        .confirmation-message p {
            margin-bottom: 20px;
        }
        
        .confirmation-message .btn {
            margin-right: 10px;
        }
    </style>
		
</head>

<body>

    <?php if (isset($msg)) {
        echo $msg;
    } else { ?>
        <div class="confirmation-message">
            <p>Are you sure you want to delete this property?</p>
            <a href="admin_property_delete.php?id=<?php echo $pid; ?>&confirm=true" class="btn btn-danger">Delete</a>
            <a href="admin_property_view.php" class="btn btn-secondary">Cancel</a>
        </div>
    <?php } ?>

</body>

</html>