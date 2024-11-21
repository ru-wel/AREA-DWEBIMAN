<?php  

include 'auth.php';
// session_start();

// if (isset($_SESSION["id"])) {
//     $mysqli = require __DIR__ . "/db_conn2.php";
    
//     $sql = "SELECT * FROM user WHERE id = ?";
            
//     $stmt = $mysqli->prepare($sql);
//     $stmt->bind_param("i", $_SESSION["id"]);
//     $stmt->execute();

//     $result = $stmt->get_result();
    
//     $user = $result->fetch_assoc();
// }

// session_start();

// $user = false;

// if (isset($_SESSION["user_id"])) {
//     $mysqli = require __DIR__ . "/db_conn.php";

//     $sql = "SELECT * FROM user WHERE id = ?";
//     $stmt = $conn->prepare($sql);
//     $stmt->bind_param("i", $_SESSION["user_id"]);
//     $stmt->execute();
//     $result = $stmt->get_result();
    
//     if ($result->num_rows == 1) {
//         $user = $result->fetch_assoc();
//     } 
//     // else {
//     //     $user = false;
//     // }
// }

// if (isset($_POST['fName']) && isset($_POST['lName'])) {

//     $fName = $_POST['fName'];
//     $lName = $_POST['lName'];
//     $old_pp = $_POST['old_pp'];
//     $id = $_SESSION['user_id'];

//     if (empty($fName)) {
//         $em = "Full name is required";
//         header("Location: edit.php?error=$em");
//         exit;
//     } elseif (empty($lName)) {
//         $em = "User name is required";
//         header("Location: edit.php?error=$em");
//         exit;
//     } else {

//         if (isset($_FILES['profilePic']['name']) && !empty($_FILES['profilePic']['name'])) {
//             $img_name = $_FILES['profilePic']['name'];
//             $tmp_name = $_FILES['profilePic']['tmp_name'];
//             $error = $_FILES['profilePic']['error'];

//             if ($error === 0) {
//                 $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
//                 $img_ex_to_lc = strtolower($img_ex);

//                 $allowed_exs = array('jpg', 'jpeg', 'png');
//                 if (in_array($img_ex_to_lc, $allowed_exs)) {
//                     // $new_img_name = uniqid($_SESSION["fName"] . '_', true) . '.' . $img_ex_to_lc;
//                     $new_img_name = uniqid($lName . '_', true) . '.' . $img_ex_to_lc;
//                     $img_upload_path = 'images/profiles/' . $new_img_name;
                    
//                     // Delete old profile pic
//                     $old_pp_des = 'images/profiles/$old_pp';
//                     if (file_exists($old_pp_des)) {
//                         unlink($old_pp_des);
//                     }

//                     move_uploaded_file($tmp_name, $img_upload_path);

//                     // Update the Database
//                     $sql = "UPDATE user SET fName=?, lName=?, profilePic=? WHERE id=?";
//                     $stmt = $conn->prepare($sql);
//                     $stmt->bind_param("sssi", $fName, $lName, $new_img_name, $id);
//                     $stmt->execute();

//                     $_SESSION['fName'] = $fName;
//                     header("Location: edit.php?success=Your account has been updated successfully");
//                     exit;
//                 } else {
//                     $em = "You can't upload files of this type";
//                     header("Location: edit.php?error=$em&$data");
//                     exit;
//                 }
//             } else {
//                 $em = "Unknown error occurred!";
//                 header("Location: edit.php?error=$em&$data");
//                 exit;
//             }
//         } else {
//             $sql = "UPDATE user SET fName=?, lName=? WHERE id=?";
//             $stmt = $conn->prepare($sql);
//             $stmt->bind_param("ssi", $fName, $lName, $id);
//             $stmt->execute();

//             header("Location: edit.php?success=Your account has been updated successfully");
//             exit;
//         }
//     }
// } else {
//     header("Location: edit.php?error=error");
//     exit;
// }

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newPassword = $_POST["newpassword"];
    $confirmPassword = $_POST["newpassword_confirmation"];
    $old_pp = $_POST["old_pp"];

    $error = "";

    // Validate input fields
    if (!empty($newPassword) && $newPassword !== $confirmPassword) {
        $error = "Passwords do not match.";
    } else if (!empty($newPassword) && strlen($newPassword) < 8) {
        $error = "Password must be at least 8 characters.";
    } else if (!empty($newPassword) && !preg_match("/[a-z]/", $newPassword)) {
        $error = "Password must contain at least one lowercase letter.";
    } else if (!empty($newPassword) && !preg_match("/[A-Z]/", $newPassword)) {
        $error = "Password must contain at least one uppercase letter.";
    } else if (!empty($newPassword) && !preg_match("/[0-9]/", $newPassword)) {
        $error = "Password must contain at least one number.";
    } else if (!empty($newPassword) && password_verify($newPassword, $user["password_hash"])) {
        $error = "New password must be different from the current password.";
    } else if (empty($newPassword) && empty($_POST["fName"]) && empty($_POST["lName"]) && empty($_POST["phone"]) && empty($_FILES['pp']['name'])) {
        $error = "Please fill in at least one field to update.";
    }

    // If there are no errors, update the user's information
    if (empty($error)) {
        $mysqli = require __DIR__ . "/db_conn.php";
        $sql = "UPDATE user SET ";

        // Update the password if a new password is provided
        if (!empty($newPassword)) {
            // Hash the new password
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $sql .= "password_hash = ?, ";
        }

        // Update the fName field if it is not empty
        if (!empty($_POST["fName"])) {
            $sql .= "fName = ?, ";
        }

        // Update the lName field if it is not empty
        if (!empty($_POST["lName"])) {
            $sql .= "lName = ?, ";
        }

        // Update the phone field if it is not empty
        if (!empty($_POST["phone"])) {
            $sql .= "phone_num = ?, ";
        }

        $sql = rtrim($sql, ", ");

        $sql .= " WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $paramTypes = "";
        $paramValues = [];

        // Bind the parameters based on the provided values
        if (!empty($newPassword)) {
            $paramTypes .= "s";
            $paramValues[] = $hashedPassword;
        }

        if (!empty($_POST["fName"])) {
            $paramTypes .= "s";
            $paramValues[] = $_POST["fName"];
        }

        if (!empty($_POST["lName"])) {
            $paramTypes .= "s";
            $paramValues[] = $_POST["lName"];
        }

        if (!empty($_POST["phone"])) {
            $paramTypes .= "s";
            $paramValues[] = $_POST["phone"];
        }

        $paramTypes .= "i";
        $paramValues[] = $_SESSION["user_id"];

        // Bind the parameters dynamically
        $stmt->bind_param($paramTypes, ...$paramValues);

        if ($stmt->execute()) {
            // If the update was successful, check if a new profile picture was uploaded
            if (isset($_FILES['profilePic']['name']) && !empty($_FILES['profilePic']['name'])) {
                $img_name = $_FILES['profilePic']['name'];
                $tmp_name = $_FILES['profilePic']['tmp_name'];
                $error = $_FILES['profilePic']['error'];

                if ($error === 0) {
                    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                    $img_ex_to_lc = strtolower($img_ex);

                    $allowed_exs = array('jpg', 'jpeg', 'png');
                    if (in_array($img_ex_to_lc, $allowed_exs)) {
                        $new_img_name = uniqid($_POST["lName"] . '_' , true).'.'.$img_ex_to_lc;
                        $img_upload_path = 'images/profiles/'.$new_img_name;

                        // Delete old profile pic
                        $old_pp_des = "images/profiles/$old_pp";
                        if ($old_pp !== 'default.jpg' && file_exists($old_pp_des) && !unlink($old_pp_des)) {
                            $error = "Failed to delete old profile picture.";
                        } else {
                            // Move the uploaded profile picture to the upload directory
                            if (move_uploaded_file($tmp_name, $img_upload_path)) {
                                // Update the profile picture field in the database
                                $update_pp_sql = "UPDATE user SET profilePic = ? WHERE id = ?";
                                $update_pp_stmt = $conn->prepare($update_pp_sql);
                                $update_pp_stmt->bind_param("si", $new_img_name, $_SESSION["user_id"]);

                                if ($update_pp_stmt->execute()) {
                                    // If the profile picture update was successful, redirect to the profile page with a success message
                                    header("Location: edit.php?success=Profile updated successfully.");
                                    exit;
                                } else {
                                    // If there was an error with the database query, redirect to the edit page with an error message
                                    header("Location: edit.php?error=An error occurred while updating the profile picture. Please try again later.");
                                    exit;
                                }
                            } else {
                                $error = "Failed to upload profile picture.";
                            }
                        }
                    } else {
                        $error = "Invalid file type. Only JPG, JPEG, and PNG files are allowed.";
                    }
                } else {
                    $error = "An error occurred while uploading the profile picture.";
                }
            } else {
                // If no profile picture was uploaded, redirect to the profile page with a success message
                header("Location: edit.php?success=Profile updated successfully.");
                exit;
            }
        } else {
            // If there was an error with the database query, redirect to the edit page with an error message
            header("Location: edit.php?error=An error occurred. Please try again later.");
            exit;
        }
    } else {
        // If there are errors, redirect to the edit page with the error message
        header("Location: edit.php?error=$error");
        exit;
    }
} else {
    // If the form was not submitted, redirect to the edit page
    header("Location: edit.php");
    exit;
}
