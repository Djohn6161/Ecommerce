<?php
    include "config.php";
    $id=$_GET["id"];
    $q = "delete from Cart where cart_id=$id";
    mysqli_query($link, $q);
?>
<script type="text/javascript">
    window.location="account.php";
</script>