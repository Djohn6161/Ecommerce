<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, otherwise redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate new password
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Please enter the new password.";     
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $new_password_err = "Password must have atleast 6 characters.";
    } else{
        $new_password = trim($_POST["new_password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm the password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
        
    // Check input errors before updating the database
    if(empty($new_password_err) && empty($confirm_password_err)){
        // Prepare an update statement
        $sql = "UPDATE users SET password = ? WHERE id = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);
            
            // Set parameters
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Password updated successfully. Destroy the session, and redirect to login page
                session_destroy();
                header("location: login.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>RCV PROJECT - Reset Password</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&family=Sawarabi+Gothic&display=swap" rel="stylesheet">
    </head>
    <body style="background: radial-gradient(#614385,#516395);">
        <div class="header">
            <div class="container">
                <div class="navbar">
                    <div class="logo">
                        <div class="row" style="margin-top: 40px;">
                                <img src="img/logo.jpg" alt="" width="60px">
                                <p style="margin: 0px 0px 0px 10px;">RCV PROJECT</p>
                                </div>   
                        </div>
                    <nav>
                        <ul id="MenuItems">
                            <li><a href="index.php">Home</a></li>
                            <li> <a href="account.php" id="our-location" class="btn" ><?php echo htmlspecialchars($_SESSION["username"]);   ?></a></li>
                            <li> <a href="logout.php" id="our-location" class="btn" >Log Out</a></li>
                        </ul>
                    </nav>
                    <img src="images/menu.png" class="menu-icon" onclick="menutoggle()" alt="">
                </div>
                <div class="lab">
                    <h2> <b>Reset Password</b></h2>
                    <p>Please fill out this form to reset your password.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
                        <div class="form-group">
                            <label>New Password</label>
                            <input type="password" id="new_password" name="new_password" class="form-control <?php echo (!empty($new_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $new_password; ?>">
                            <span class="invalid-feedback"><?php echo $new_password_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" id="confirm_password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>">
                            <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                        </div>
                        <div class="form-group">
                            <div class="row" style="margin-top: 40px;">
                              <input type="submit" class="btn" id="b2n" name="b2n" value="Submit">
                              <a class="btn" id="b2n" name="b2n" href="account.php">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>    
            </div>    
        </div>    
    </body>
</html>