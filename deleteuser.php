<?php
    include "config.php";
    $id=$_GET["id"];
    $q = "delete from users where id=$id";
    mysqli_query($link, $q);
?>
<script type="text/javascript">
    window.location="admin.php";
</script>