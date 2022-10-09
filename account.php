<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
if($_SESSION["username"] == "Admin"){
    header('location:admin.php');
    exit;
}
include "config.php";
$userid = $_SESSION["id"];

?>
 
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>RCV PROJECT - Account</title>
        <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&family=Sawarabi+Gothic&display=swap" rel="stylesheet">
       <style>
           .smallB{
                padding: 10px;
                text-align: center;
                font-size: 100%;
            }
            body{
                color: #ffa500;
            }
            .grid, td, th {
                border: solid orange 1px;
                border-collapse: collapse;
            }
            .icon{
                border-radius: 8px;
                display: block;
                margin-left: auto;
                margin-right: auto;
                width: 100%;
            }
        </style>
    </head>
    <body style="background: radial-gradient(#614385,#516395);">
    <div class="header">
        <div class="container">
            <!----navigation------>
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
                        <li><a href="reset-password.php" class="btn btn-warning">Reset Your Password</a></li>
                        <li> <a href="account.php" id="our-location" class="btn" ><?php echo htmlspecialchars($_SESSION["username"])."/Cart";   ?></a></li>
                        <li> <a href="logout.php" id="our-location" class="btn" >Log Out</a></li>
                    </ul>
                </nav>
                <img src="images/menu.png" class="menu-icon" onclick="menutoggle()" alt="">
            </div>
            <!----HEADER------>
                <center>
                <div class="box">
                    <h1 style="color: #ffa500;">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b> Here You Can Manage your Cart.</h1>    
                    <br>
                        <table class="tcenter">
                            <tr class="grid"><th colspan="8" align="center" class="smallB"><h1>MY CART</h1></tr>
                                <tr class="grid">
                                    <th colspan="" align="center" class="smallB">
                                        
                                    </th>
                                    <th class="smallB"><h2>Name</h2></th>
                                    <th class="smallB"><h2>Price</h2></th>
                                    <th class="smallB"><h2>Quantity</h2></th>
                                    <th class="smallB"><h2>Total Price</h2></th>
                                    <th class="smallB"><h2>Status</h2></th>
                                    <th class="smallB"><h2>Operation</h2></th>
                                </tr>
                        <?php
                            $q = "select * from cart, games where cart.games_id = games.id and user_id=$userid";
                            $query=mysqli_query($link,$q);

                            while($res=mysqli_fetch_array($query)){
                                if($res['Progress']==1){

                                
                            ?>
                                <tr class="grid">
                                    <td colspan="" align="center" class="smallB">
                                        <img class="game icon" src="<?php echo $res["game_image"]?>" alt="GAME">
                                    </td>
                                    
                                    <td class="smallB"><h2><?php echo $res["Game_name"]?></h2></td>
                                    <td class="smallB"><h3><?php echo $res["game_price"]?></h3></td>
                                    <td class="smallB"><h3><?php echo $res["quantity"]?></h3></td>
                                    <td class="smallB"><h3><?php echo $res["total_price"]?></h3></td>
                                    <td class="smallB"><h3><?php echo $res["Progress"]==0 ? "Complete":"In Progress"?></h3></td>
                                    <td class="smallB"><a class="btn" href="cart_edit.php?id=<?php echo $res["Cart_id"]?>" style='' >EDIT</a><br><a class="btn"href="deleteC.php?id=<?php echo$res["Cart_id"]?>">CANCEL</a></td>
                                </tr>
                                <?php 
                                }                               
                            }?>
                        </table>
                        <br><br>
                        <table class="tcenter">
                            <tr class="grid"><th colspan="8" align="center" class="smallB"><h1>HISTORY</h1></tr>
                                <tr class="grid">
                                    <th colspan="" align="center" class="smallB">
                                        
                                    </th>
                                    <th class="smallB"><h2>Name</h2></th>
                                    <th class="smallB"><h2>Price</h2></th>
                                    <th class="smallB"><h2>Quantity</h2></th>
                                    <th class="smallB"><h2>Total Price</h2></th>
                                    <th class="smallB"><h2>Status</h2></th>
                                    <th class="smallB"><h2>Operation</h2></th>
                                </tr>
                        <?php
                            $q = "select * from cart, games where cart.games_id = games.id and user_id=$userid";
                            $query=mysqli_query($link,$q);

                            while($res=mysqli_fetch_array($query)){
                                if($res['Progress']==0){

                                
                            ?>
                                <tr class="grid">
                                    <td colspan="" align="center" class="smallB">
                                        <img class="game icon" src="<?php echo $res["game_image"]?>" alt="GAME">
                                    </td>
                                    
                                    <td class="smallB"><h2><?php echo $res["Game_name"]?></h2></td>
                                    <td class="smallB"><h3><?php echo $res["game_price"]?></h3></td>
                                    <td class="smallB"><h3><?php echo $res["quantity"]?></h3></td>
                                    <td class="smallB"><h3><?php echo $res["total_price"]?></h3></td>
                                    <td class="smallB"><h3><?php echo $res["Progress"]==0 ? "Complete":"In Progress"?></h3></td>
                                    <td class="smallB"><a class="btn" href="cart_edit.php?id=<?php echo $res["Cart_id"]?>" style='' >EDIT</a><br><a class="btn"href="deleteC.php?id=<?php echo$res["Cart_id"]?>">CANCEL</a></td>
                                </tr>
                                <?php 
                                }                               
                            }?>
                        </table>
                        <a href="index.php" class="btn btn-warning">BROWSE MORE</a>
                        
                </div>
                
               </center>
                
                
                
        </div>
    </div>
        <script>
            //for the navbar whenever the screen resolution is small
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