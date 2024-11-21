<?php 

include 'auth.php';

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Profile</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <?php if ($user) { ?>

    <div class="d-flex justify-content-center align-items-center vh-100">
        
        <form class="shadow w-450 p-3" 
              action="edit_process.php" 
              method="post"
              enctype="multipart/form-data">

            <h4 class="display-4  fs-1">Edit Profile</h4><br>
            <!-- error -->
            <?php if(isset($_GET['error'])){ ?>
            <div class="alert alert-danger" role="alert" style="text-tranform:none">
              <?php echo $_GET['error']; ?>
            </div>
            <?php } ?>
            
            <!-- success -->
            <?php if(isset($_GET['success'])){ ?>
            <div class="alert alert-success" role="alert">
              <?php echo $_GET['success']; ?>
            </div>
            <?php } ?>
          <div class="mb-3">
            <label class="form-label">First Name</label>
            <input type="text" 
                   class="form-control"
                   name="fName"
                   value="<?php echo $user['fName']?>">
          </div>

          <div class="mb-3">
            <label class="form-label">Last Name</label>
            <input type="text" 
                   class="form-control"
                   name="lName"
                   value="<?php echo $user['lName']?>">
          </div>

          <div class="mb-3">
            <label class="form-label">Email (not editable)</label>
            <p class="form-control" style="text-transform:lowercase"><?php echo $user['email']?></p>
          </div>

          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" 
                   class="form-control"
                   name="newpassword"
                   value=""
                   style="text-transform:none">
          </div>

          <div class="mb-3">
            <label class="form-label">Repeat Password</label>
            <input type="password" 
                   class="form-control"
                   name="newpassword_confirmation"
                   value=""
                   style="text-transform:none">
          </div>

          <div class="mb-3">
            <label class="form-label">Profile Picture</label>
            <input type="file" 
                   class="form-control"
                   name="profilePic">
            <img src="images/profiles/<?=$user['profilePic']?>"
                 class="rounded-circle"
                 style="width: 70px">
            <input type="text"
                   hidden="hidden" 
                   name="old_pp"
                   value="<?=$user['profilePic']?>" >
          </div>

          <div class="mb-3">
            <label class="form-label">Phone Number</label>
            <input type="text" 
                   class="form-control"
                   name="phone"
                   value="<?=$user['phone_num']?>">
          </div>
          
          <button type="submit" class="btn btn-primary">Update</button>
          <span class=""><a href="profile.php" class="btn" style="color: var(--white)">Profile</a></span>
          <!-- <a href="profile.php" class="link-secondary">Profile</a> -->
        </form>
    </div>
    <?php }else{ 
        header("Location: index.php");
        exit;

    } ?>
</body>
</html>
