<?php

if(isset($_POST['fName']) && 
   isset($_POST['lName']) &&  
   isset($_POST['email']) &&
   isset($_POST['password']) &&
   isset($_POST['password_confirmation']) &&
   isset($_POST['phone'])){

    include "db_conn.php";

    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirmation = $_POST['password_confirmation'];
    $phone = $_POST['phone'];
    

    $data = "fName=" . $fName . "&lName=" . $lName . "&email=" . $email . "&password=" . $password . "&password_confirmation=" . $password_confirmation . "&phone=" . $phone;
    
    if (empty($fName)) {
    	$em = "First Name is required";
    	header("Location: signup.php?error=$em&$data");
	    exit;
    }else if(empty($lName)){
    	$em = "Last Name is required";
    	header("Location: signup.php?error=$em&$data");
	    exit;
    }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    	$em = "Valid email is required";
    	header("Location: signup.php?error=$em&$data");
	    exit;
    }else if(strlen($password) < 8){
    	$em = "Password must be at least 8 characters";
    	header("Location: signup.php?error=$em&$data");
	    exit;
    }else if(!preg_match("/[a-z]/", $password) || !preg_match("/[A-Z]/", $_POST["password"])){
    	$em = "Password must contain both uppercase and lowercase letters";
    	header("Location: signup.php?error=$em&$data");
	    exit;
    }else if(!preg_match("/[0-9]/", $password)){
    	$em = "Password must contain at least one number";
    	header("Location: signup.php?error=$em&$data");
	    exit;
    }else if($password !== $password_confirmation){
    	$em = "Passwords must match";
    	header("Location: signup.php?error=$em&$data");
	    exit;
    }else if(strlen($phone) !== 11){
    	$em = "Phone number must be exactly 11 digits";
    	header("Location: signup.php?error=$em&$data");
	    exit;
    }else{
        $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

        // $query = "SELECT * FROM user WHERE email = ?";
        // $stmt = $mysqli->prepare($query);
        // $stmt->bind_param("s", $email);
        // $stmt->execute();
        // $result = $stmt->get_result();

        $query = "SELECT * FROM user WHERE email = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $em = "Email already exists";
            header("Location: signup.php?error=$em&$data");
            exit;
        }

        if (isset($_FILES['profilePic']['name']) && !empty($_FILES['profilePic']['name'])) {
            $img_name = $_FILES['profilePic']['name'];
            $tmp_name = $_FILES['profilePic']['tmp_name'];
            $error = $_FILES['profilePic']['error'];

            if ($error === 0) {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_to_lc = strtolower($img_ex);

                $allowed_exs = array('jpg', 'jpeg', 'png');

                if (in_array($img_ex_to_lc, $allowed_exs)) {
                    $new_img_name = uniqid($_POST["lName"] . '_', true) . '.' . $img_ex_to_lc;
                    $img_upload_path = 'images/profiles/' . $new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);

                    $mysqli = require __DIR__ . "/db_conn.php";

                    $sql = "INSERT INTO user (fName, lName, email, password_hash, phone_num, profilePic)
                            VALUES (?, ?, ?, ?, ?, ?)";

                    $stmt = $conn->stmt_init();

                    if (!$stmt->prepare($sql)) {
                        die("SQL error: " . $mysqli->error);
                    }

                    $stmt->bind_param("ssssss",
                        $_POST["fName"],
                        $_POST["lName"],
                        $_POST["email"],
                        $password_hash,
                        $_POST["phone"],
                        $new_img_name);

                    $stmt->execute();                
                    header("Location: signup.php?success=Your account has been created successfully!");
                    exit;            
                    
                }else {
                    $em = "You can't upload files of this type";
                    header("Location: signup.php?error=$em&$data");
                    exit;
                }
            }else {
                $em = "unknown error occurred!";
                header("Location: signup.php?error=$em&$data");
                exit;
                }
        }else {
            $mysqli = require __DIR__ . "/db_conn.php";

            $sql = "INSERT INTO user (fName, lName, email, password_hash, phone_num)
                    VALUES (?, ?, ?, ?, ?)";

            $stmt = $conn->stmt_init();

            if (!$stmt->prepare($sql)) {
                die("SQL error: " . $mysqli->error);
            }
                $stmt->bind_param("sssss",
                    $_POST["fName"],
                    $_POST["lName"],
                    $_POST["email"],
                    $password_hash,
                    $_POST["phone"]);

                $stmt->execute();  
                header("Location: signup.php?success=Your account has been created successfully!");
                exit;
        }
    }
}
                  

