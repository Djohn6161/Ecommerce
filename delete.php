<?php
    $link=mysqli_connect("localhost", "root");
    mysqli_select_db($link,"ecommerce");
    $id=$_GET["id"];
    $q = "delete from games where id=$id";
    $q2 = "select * from games where id=$id";
    $query=mysqli_query($link,$q2);
    while($res=mysqli_fetch_array($query)){
        $img=$res["game_image"];
    }
    unlink($img);

    mysqli_query($link, $q);
?>
<script type="text/javascript">
    window.location="admin.php";
</script>