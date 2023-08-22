<?php
    include("connect.php");
  
    if (isset($_POST['btn'])) {
        $date=$_POST['idate'];
        $q="SELECT * FROM grocerydb WHERE Date='$date'";
        $query=mysqli_query($con,$q);
    } 
    else {
        $q= "SELECT * FROM grocerydb";
        $query=mysqli_query($con,$q);
    }
?>
  
<html>
  
<head>
    <meta http-equiv="Content-Type" 
        content="text/html; charset=UTF-8">
  
    <title>Lista Zakupów</title>
  
    <link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  
    <link rel="stylesheet" 
        href="css/style.css">
</head>
  
<body>
    <div class="container mt-5">
          
        <!-- top -->
        <div class="row">
            <div class="col-lg-8">
                <h1>Lista zakupów</h1>
                <a href="add.php">Dodaj produkt</a>
            </div>
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-8">
                          
                        <!-- Filtrowanie -->
                        <form method="post" action="">
                            <input type="date" 
                                class="form-control" 
                                name="idate">
                          
                            <div class="col-lg-4" 
                                method="post">
                                <input type="submit" 
                                class="btn btn-danger float-right" 
                                name="btn" value="filter">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
  
        <!-- Karty Produktów -->
        <div class="row mt-4">
            <?php
                while ($qq=mysqli_fetch_array($query)) 
                {
            ?>
  
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo $qq['Item_name']; ?>
                        </h5>
                        <h6 class="card-subtitle mb-2 text-muted">
                            <?php echo 
                            $qq['Item_Quantity']; ?>
                        </h6>
                        <?php
                        if($qq['Item_status'] == 0) {
                        ?>
                        <p class="text-info">OCZEKUJE</p>
  
                        <?php
                        } else if($qq['Item_status'] == 1) {
                        ?>
                        <p class="text-success">KUPIONE</p>
  
                        <?php } else { ?>
                        <p class="text-danger">NIEDOSTĘPNE</p>
  
                        <?php } ?>
                        <a href=
                        "delete.php?id=<?php echo $qq['Id']; ?>" 
                            class="card-link">
                            Usuń
                        </a>
                        <a href=
                        "update.php?id=<?php echo $qq['Id']; ?>" 
                            class="card-link">
                            Zmień
                        </a>
                    </div>
                </div><br>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
</body>
  
</html>