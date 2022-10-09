<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
	header('location:login.php');
    exit;
}
if($_SESSION["username"] == "Admin"){
    header('location:admin.php');
    exit;
}
include "config.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>RCV PROJECT - Home</title>
        <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&family=Sawarabi+Gothic&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="header">
            <div class="container">
                <!-------NAVIGATION------->
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
                            <li><a href="#game">Games</a></li>
                            <li><a href="#developer">Developers</a></li>
                            <li><a href="#about">About</a></li>
                            <li> <a href="account.php" id="our-location" class="btn" ><?php echo htmlspecialchars($_SESSION["username"])."/Cart";?></a></li>
                            <li> <a href="logout.php" id="our-location" class="btn" >Log Out</a></li>
                        </ul>
                    </nav>
                    <img src="images/menu.png" class="menu-icon" onclick="menutoggle()" alt="">
                </div>
                <!-----HEADER----->
                <div class="row">
                    <div class="col-2">
                        <h1>Download Games Now!<br> For An Affordable Price!</h1>
                        <p>"Avoid the crowd. Do Your own thingking independently. Be the chess player not the chess piece."
                        </p>
                        <a href="#game" class="btn">Explore Now &#8594;</a>
                    </div>
                    <div class="col-2">
                        <img src="img/Background.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
        <!------GAMES STARTS------>
        <div class="categories"id="game">
            <div class="small-container">
                <h2 class="title">Games</h2>
                <?php
                        $q = "select * from games";
                        $query=mysqli_query($link,$q);
                        $i = 4;
                            while($res=mysqli_fetch_array($query)){
                                $x = $i % 4;
                                if($x==0){
                                    echo "<div class='row'>";
                                    $j = $i +4;
                                }
                                $i++;
                                ?>
                                <div class="col-4">
                                
                                    <img class="game" src="<?php echo $res["game_image"]?>" alt="">
                                    <h4 class="iconic"><?php echo $res["Game_name"]?></h4>
                                    <div class="rating" >
                                        <i class="fa">&#9734;</i>
                                        <span class="fa"style="display: inline-block;"><?php echo $res["Rating"]?></span>
                                    </div>
                                    <span style="display: inline-block;" class="iconic"> <b>P<?php echo $res["game_price"]?>.00 </b></span>
                                    <a href="cart.php?id=<?php echo$res["id"]?>" id="our-location" class="btn" ><?php echo "Add to Cart";?></a>
                                </div>
                    <?php   if($i==$j)
                                echo "</div>";
                                } 
                    ?>
            </div>
        </div>
        
        <!------DEVELOPERS START------>
        <div class="developer" id="developer">
            <div class="small-container">
                <h2 class="title">Developers</h2>
                <div class="row">
                    <div class="col-4">
                        <img src="img/Don.jpg" alt="">
                        <h3>Don John Daryl Curativo</h3>
                        <p>Team Leader</p>  
                    </div>
                    <div class="col-4">
                        <img src="img/romero.jpg" alt="">
                        <h3>Jojilyn Romero</h3>
                        <p>Senior Developer</p>  
                    </div>
                    <div class="col-4">
                        <img src="img/eichelle.jpg" alt="">
                        <h3>Eichelle Vicente</h3>
                        <p>Junior Developer</p>  
                    </div>
                </div>
            </div>
        </div>
        <br> <br>
        <!------About------->
        <div class="about" id="about">
            <div class="small-container">
                <h2 class="title">About</h2>
                <h3> We Exist to inspire the World to Play <br><br>
                        Welcome to CVPO PC GAMES STORE. CVPO is an online store for 
                        PC GAMES in digital interactive entertainment. CVPO delivers
                        games, content and online services for Internet-connected
                        consoles, mobile devices and personal computers. We're
                        dedicated to giving you the very best of PC GAMES, 
                        with a focus on giving its players unique and amazing
                        experiences. Founded in 2021 by CVPO TEAM. 
                        <br>
                        We hope you enjoy our products as much as we enjoy 
                        offering them to you. If you have any questions 
                        or comments, please don't hesitate to contact us. 


                  </h3>
            </div>
        </div>
        <br>
        
        <!------js for toogle Menu------->
        <script>
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