<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
	header("location:login.php");
    exit;
}

include "config.php";
$userid = $_SESSION["id"];
$progress=1;
    $id = $_GET["id"];
    $q = "select * from cart, games where cart.games_id = games.id and cart_id=$id";

    


$query=mysqli_query($link,$q);
while($res=mysqli_fetch_array($query)){
    $game_name = $res["Game_name"];
    $game_price = $res["game_price"];
    $game_img = $res["game_image"];
}
?>
 
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>RCV PROJECT - Cart</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&family=Sawarabi+Gothic&display=swap" rel="stylesheet">
        <style>
            .tcenter {
                margin-left: auto; 
                margin-right: auto;
            }
            .center {
                display: block;
                margin-left: auto;
                margin-right: auto;
                width: 100%;
            }
            .smallB{
                padding: 10px;
            }
        </style>
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
                            <li> <a href="account.php" id="our-location" class="btn" ><?php echo htmlspecialchars($_SESSION["username"])."/Cart";   ?></a></li>
                            <li> <a href="logout.php" id="our-location" class="btn" >Log Out</a></li>
                        </ul>
                    </nav>
                    <img src="images/menu.png" class="menu-icon" onclick="menutoggle()" alt="">
                </div>
                <div class="lab" id="addgame" style="margin:auto">
                    <h2 ><b>EDIT CART</b></h2>
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
                                    <img class="game center" src="<?php echo $game_img?>" alt="GAME">
                                </td>
                            </tr>
                            <tr>
                                <td>Game Name</td>
                                <td class="smallB"><span class="inp" style="color:black;" id="Gname" name="Gname"><?php echo $game_name;?></span></td>
                            </tr>
                            <tr>
                                <td>Game Price</td>
                                <td class="smallB"><span class="inp" style="color:black;" id="Gprice" name="Gprice"><?php echo $game_price;?></span></td>
                            </tr>
                            <tr>
                                <td>Quantity</td>
                                <td><input  class="inp" style="color:black;" type="number" id="Gquantity" name="Gquantity" value="<?php ?>"></td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center" ><input class="btn" type="submit" name="submit1" id="submit1"value="edit"></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
            <br>    
        </div>
        
        <?php
            if(isset($_POST['submit1'])){
                $total_price = $game_price*$_POST['Gquantity'];
                mysqli_query($link,"update cart set quantity=$_POST[Gquantity] where cart_id=$id"); 
        ?>
        <script type='text/javascript'>
        window.location='account.php'
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