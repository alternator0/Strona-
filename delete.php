<?php
    include("connect.php");
    $id = $_GET['id'];
    $q = "DELETE FROM grocerydb WHERE Id = $id ";
    mysqli_query($con,$q);    
    header('location:index.php');
?>