<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
	header('location:login.php');
    exit;
}
include "config.php";
$id=$_GET["id"];
$q = "select * from games where id=$id";
$query=mysqli_query($link,$q);
while($res=mysqli_fetch_array($query)){
    $game_name = $res["Game_name"];
    $game_price = $res["game_price"];;
    $game_img = $res["game_image"];;
    $game_description = $res["Description"];
    $game_rating = $res["Rating"];
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>RCV PROJECT - EDIT</title>
        <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&family=Sawarabi+Gothic&display=swap" rel="stylesheet">
        <style>
            .menu{
                display: block;
                background-color: rgb(226, 226, 226);
                width: 460px;
                padding: 20px; 
                border: 1px solid;
                border-radius: 2%;
                box-shadow: 0 0 20px 0px rgba(0,0,0,0.1);
                margin: auto;
                color: #ff523b;
            }
            .tcenter {
                margin-left: auto; 
                margin-right: auto;
            }
            .center {
                display: block;
                margin-left: auto;
                margin-right: auto;
                width: 50%;
            }
            
        </style>
    </head>
    <body >
        <div class="header">
            <div class="container">
                <div class="navbar">
                    <div class="logo">
                        <div class="row" style="margin-top: 40px;">
                        <img src="img/logo.jpg" alt="" width="60px">
                        <p style="margin-left: 10px;">RCV PROJECT</p>
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
                <!-------ADD GAME------>
                <div class="lab" id="addgame">
                    <h2 ><b>EDIT GAME</b></h2>
                    <br>
                    <p >Please fill all the information</p>
                    <br>
                    <?php 
                    if(!empty($login_err)){
                        echo '<div class="alert alert-danger">' . $login_err . '</div>';
                    }        
                    ?>
                    <form name="form1" action="" method="post" enctype="multipart/form-data">
                        <table class="tcenter">
                            <tr>
                                <td colspan="2" align="center">
                                    <img class="game" src="<?php echo $game_img?>" alt="GAME">
                                </td>
                            </tr>
                            <tr>
                                <td>Game Name</td>
                                <td><input class="inp" style="color:black;" type="text" id="Gname" name="Gname" value="<?php echo $game_name;?>" ></td>
                            </tr>
                            <tr>
                                <td>Game Price</td>
                                <td><input class="inp" style="color:black;" type="text" id="Gprice" name="Gprice" value="<?php echo $game_price;?>" ></td>
                            </tr>
                            <tr>
                                <td>Game Description</td>
                                <td><input class="inp" style="color:black;" type="text" id="description" name="description" value="<?php echo $game_description;?>" ></td>
                            </tr>
                            <tr>
                                <td>Game Rating</td>
                                <td><input  class="inp" style="color:black;" type="number" id="rating" name="rating" value="<?php echo $game_rating;?>"></td>
                            </tr>
                            <tr>
                                <td>Game Image</td>
                                <td><input  type="file" id="Gimg" name="Gimg"></td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center" ><input style="display:;" class="btn" type="submit" name="submit1"value="EDIT"></td>
                            </tr>
                        </table>
                    </form>
                    
                </div>
            </div>
            <br>

        </div>
        <?php
        if(isset($_POST['submit1'])){
            $fnm=$_FILES["Gimg"]["name"];

            if($fnm==""){
                mysqli_query($link,"update games set Rating='$_POST[rating]', Game_name='$_POST[Gname]', game_price='$_POST[Gprice]', Description='$_POST[description]' where id=$id");
            }
            else{
                    $v1=rand(1111,9999);
                    $v2=rand(1111,9999);
                    $v3=$v1.$v2;
                    $v3=md5($v3);
                    $fnm=$_FILES["Gimg"]["name"];
                    $dst="./Uploadedimg/".$v3.$fnm;
                    $dst1="./Uploadedimg/".$v3.$fnm;
                    move_uploaded_file($_FILES["Gimg"]["tmp_name"],$dst);
                    mysqli_query($link,"update games set game_image='$dst1', Game_name='$_POST[Gname]', game_price='$_POST[Gprice]' where id=$id");

            }
        ?>
        <script type='text/javascript'>
            window.location='admin.php'
            </script>
            <?php
        }?>
            <script type='text/javascript'>
            var MenuItems = document.getElementById("MenuItems");

            MenuItems.style.maxHeight = "0px";

            function menutoggle(){
                if(MenuItems.style.maxHeight = "200px"){
                    MenuItems.style.maxHeight = "200px";
                }
                else{
                    MenuItems.style.maxHeight = "0px";
                }
            }
        </script>
    </body>
</html>