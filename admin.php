<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
	header('location:login.php');
    exit;
}
include "config.php";
if($_SESSION["username"] != "Admin"){
    header('location:logout.php');
    exit;
}
$Gname_err = "";
$Grating_err = "";
$Gdescrip_err = "";
$Gprice_err = "";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>RCV PROJECT - ADMIN</title>
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
            .grid{
                border: solid 1px;
                border-collapse: collapse;
                margin-left: auto;
                margin-right: auto;

                
            }
            .smallB{
                padding: 10px;
                text-align: center;
                font-size: 100%;
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
                            <li><a href="#game">Manage Games</a></li>
                            <li><a href="#Carts">Manage Cart</a></li>
                            <li><a href="#Users">Manage Users</a></li>
                            <li> <a href="reset-password.php" id="our-location" class="btn" ><?php echo htmlspecialchars($_SESSION["username"]);   ?></a></li>
                            <li> <a href="logout.php" id="our-location" class="btn" >Log Out</a></li>
                        </ul>
                    </nav>
                    <img src="images/menu.png" class="menu-icon" onclick="menutoggle()" alt="">
                </div>
                <!-------ADD GAME------>
                <div class="lab" id="addgame">
                    <h2 ><b>ADD NEW GAME</b></h2>
                    <br>
                    <p >Please fill all the information</p>
                    <br>
                    
                    <form name="form1" action="" method="post" enctype="multipart/form-data">
                        <table>
                            <tr>
                                <td>Game Name</td>
                                <td><input class="inp" style="color:black;" type="text" id="Gname" name="Gname"></td>
                            </tr>
                            <span><?php echo $Gname_err?></span>
                            <tr>
                                <td>Game Price</td>
                                <td><input class="inp" style="color:black;" type="number" id="Gprice" name="Gprice"></td>
                            </tr>
                            <tr>
                                <td>Game Description</td>
                                <td><input  class="inp" style="color:black;" type="text" id="description" name="description"></td>
                            </tr>
                            <tr>
                                <td>Game Rating</td>
                                <td><input  class="inp" style="color:black;" type="number" id="rating" name="rating"></td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center" ><input class="btn" type="submit" name="submit1"value="UPLOAD"></td>
                            </tr>
                            <tr>
                                <td>Game Image</td>
                                <td><input  type="file" id="Gimg" name="Gimg"></td>
                            </tr>
                        </table>
                    </form>
                    <?php
                        if(isset($_POST['submit1'])){
                            if(empty($_POST["Gname"])){
                                $Gname_err = "Please enter Game Name";
                            }
                            else{
                                $Gname = $_POST["Gname"];
                            }
                            if(empty($_POST["Gprice"])){
                                $Gprice_err = "Please enter Game Price";
                            }
                            else{
                                $Gprice = $_POST["Gprice"];
                            }
                            if(empty($_POST["description"])){
                                $Gdescrip_err = "Please enter Game Description";
                            }
                            else{
                                $Gdescrip = $_POST["description"];
                            }
                            if(empty($_POST["rating"])){
                                $Grating_err = "Please enter Game Rating";
                            }
                            else{
                                $Grating = $_POST["rating"];
                            }
                            if((empty($Gname_err) && empty($Gprice_err)) && (empty($Gdescrip_err) && empty($Grating_err))){
                                $v1=rand(1111,9999);
                                $v2=rand(1111,9999);
                                $v3=$v1.$v2;
                                $v3=md5($v3);
                                $fnm=$_FILES["Gimg"]["name"];
                                $dst="./Uploadedimg/".$v3.$fnm;
                                $dst1="./Uploadedimg/".$v3.$fnm;
                                move_uploaded_file($_FILES["Gimg"]["tmp_name"],$dst);
                                mysqli_query($link,"insert into games values('','$_POST[Gname]', '$dst1', $_POST[Gprice], '$_POST[description]', $_POST[rating])");
                            }
                        }
                    ?>
                </div>
            </div>
            <br>
        </div>
        <br>
                <!----MANAGE game----->
        <div class="categories"id="game">
            <div class="small-container">
                <h2 class="title">MANAGE GAME</h2>
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
                                    <a class="btn"href="edit.php?id=<?php echo$res["id"]?>">EDIT</a>
                                    <img class="game" src="<?php echo $res["game_image"]?>" alt="">
                                    <h4 class="iconic"><?php echo $res["Game_name"]?></h4>
                                    <div class="rating" >
                                        <i class="fa">&#9734;</i>
                                        <span class="fa"style="display: inline-block;"><?php echo $res["Rating"]?></span>
                                    </div>
                                    <span style="display: inline-block;" class="iconic"> P<?php echo $res["game_price"]?>.00 </span>
                                    <br>
                                    <a class="btn"href="delete.php?id=<?php echo$res["id"]?>">DELETE</a>
                                </div>
                    <?php   if($i==$j)
                                echo "</div>";
                                } 
                    ?>
            
            </div>
        </div>
        <!------Manage Carts------>
        <div class="" id="Carts">
            <div class="categories"id="Carts">
                <div class="big-container">
                    <h2 class="title">Manage Carts</h2>
                    <br>
                        <table class="tcenter grid">
                            <tr class="grid"><th colspan="7" align="center" class="smallB"><h1 style="margin-left:15%">MY CART</h1></tr>
                                <tr>
                                    <th colspan="" align="center" class="smallB">
                                    <h2>Image</h2>
                                    </th>
                                    <th class="smallB"><h2>User Name</h2></th>
                                    <th class="smallB"><h2>Game Name</h2></th>
                                    <th class="smallB"><h2>Price</h2></th>
                                    <th class="smallB"><h2>Quantity</h2></th>
                                    <th class="smallB"><h2>Total Price</h2></th>
                                    <th class="smallB"><h2>Progress</h2></th>
                                    <th class="smallB"><h2>Manual</h2></th>
                                </tr>
                        <?php
                            $q = "select * from cart, games, users where cart.games_id = games.id and cart.user_id = users.id";
                            $query=mysqli_query($link,$q);

                            while($res=mysqli_fetch_array($query)){
                            ?>
                                <tr class="grid">
                                    <td colspan="" align="center" class="smallB">
                                        <img class="game icon" src="<?php echo $res["game_image"]?>" alt="GAME">
                                    </td>
                                    <td class="smallB"><h2><?php echo $res["username"]?></h2></td>
                                    <td class="smallB"><h2><?php echo $res["Game_name"]?></h2></td>
                                    <td class="smallB"><h3><?php echo $res["game_price"]?></h3></td>
                                    <td class="smallB"><h3><?php echo $res["quantity"]?></h3></td>
                                    <td class="smallB"><h3><?php echo $res["total_price"]?></h3></td>
                                    <td class="smallB"><h3><?php echo $res["Progress"]==0 ? "Complete":"In Progress"?></h3></td>
                                    <td class="smallB"><a class="btn" href="Admin_cartedit.php?id=<?php echo $res["Cart_id"]?>" style=''>EDIT</a><br><a class="btn"href="deletebyA.php?id=<?php echo$res["Cart_id"]?>">DELETE</a></td>
                                </tr>
                                <?php                                
                            }?>
                        </table>
                </div>
            </div>
        </div>
        <br>
        <div class="" id="Users">
            <div class="categories"id="Users">
                <div class="small-container">
                <h2 class="title">Manage Users</h2>
                <br>
                    <table class="tcenter grid">
                        <tr class="grid"><th colspan="2" align="center" class="smallB"><h1>USERS</h1></tr>
                        <tr>
                            <th colspan="" align="center" class="smallB">
                            <h2>USERNAME</h2>
                            </th>
                            <th class="smallB" style="width:65%">
                            <h2>Manual</h2>
                            </th>
                        </tr>
                    <?php
                        $q = "select * from users ";
                        $query=mysqli_query($link,$q);

                        while($res=mysqli_fetch_array($query)){
                            if($res["username"]=="Admin"){

                            }
                            else{
                        ?>
                            <tr class="grid">
                                <td colspan="" align="center" class="smallB">
                                    <h2><?php echo $res["username"]?></h2>
                                </td>
                                <td class="smallB"><a class="btn"href="deleteuser.php?id=<?php echo$res["id"]?>">DELETE</a></td>
                            </tr>
                            <?php   }                             
                        }?>
                    </table>
                </div>
            </div>
        </div>
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
        <br>
    </body>
</html>