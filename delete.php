<?php
    include("connect.php");
    $id = $_GET['id'];
    $q = "delete from grocerydb where Id = $id ";
    mysqli_query($con,$q);    
?>