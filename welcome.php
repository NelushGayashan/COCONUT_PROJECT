<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to index page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}


?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome</title>
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"/>
    <!-- bootstrap5 dataTables css cdn -->
    <link rel="stylesheet"href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        body {font-family: "Times New Roman", Georgia, Serif;}
        h1, h2, h3, h4, h5, h6 {
        font-family: "Playfair Display";
        letter-spacing: 5px;
        }
    </style>
</head>
<body>
    <!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-padding w3-card" style="letter-spacing:4px;">
    <a href="index.php" class="w3-bar-item w3-button">Ceylon Coconut Foundation</a>
    <!-- Right-sided navbar links. Hide them on small screens -->
    <div class="w3-right w3-hide-small">
      <a href="#" class="w3-bar-item w3-button">Seed Company</a>
      <a href="harvesterHome.php" class="w3-bar-item w3-button">Harvester</a>
      <a href="ManusfacterHome.php" class="w3-bar-item w3-button">Manufacturer</a>
      <a href="logout.php" class="w3-bar-item w3-button">Logout</a>
    </div>
  </div>
</div>

    
    
    <div class="wrapper" style="margin-top:100px ; margin-bottom:50px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Add Seed Company Record</h2>
                    <p style=" margin-bottom:50px">Please add the input values and submit to update the record.</p>
                   <?php 

include "config.php";

  if (isset($_POST['submit'])) {

    $company_name = $_POST['company_name'];
    $lot_coordinates = $_POST['lot_coordinates'];

    $plant_brand = $_POST['plant_brand'];

    $certifiying_agency = $_POST['certifiying_agency'];

    $variety = $_POST['variety'];

    $sql = "INSERT INTO `seed_company`(`company_name`, `lot_coordinates`, `plant_brand`, `certifiying_agency`, `variety`) VALUES ('$company_name','$lot_coordinates','$plant_brand','$certifiying_agency','$variety')";

    $result = $conn->query($sql);

    if ($result == TRUE) {

      echo "New record created successfully.";

    }else{

      echo "Error:". $sql . "<br>". $conn->error;

    } 

    $conn->close(); 

  }

?>

<!DOCTYPE html>

<html>

<body>



<form action="" method="POST">

  <fieldset>

  

    Company Name:<br>

    <input type="text" name="company_name">

    <br>

    Location Coordinates:<br>

    <input type="text" name="lot_coordinates">

    <br>

    Plant Brand:<br>

    <input type="plant_brand" name="plant_brand">

    <br>

    Cert. Agency:<br>

    <input type="certifiying_agency" name="certifiying_agency">

    <br>

    Variety:<br>

    <input type="variety" name="variety">

    

    <br><br>

    <input type="submit" name="submit" value="submit">

  </fieldset>

</form>

</body>

</html>
                </div>
            </div>        
        </div>
    </div>
    
    
    <div class="wrapper" style="margin-top:50px ; margin-bottom:50px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <?php
                    // Include config file
                    require_once "./db/config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM seed_company";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Company Name</th>";
                                        echo "<th>Location Coordinates</th>";
                                        echo "<th>Plant Brand</th>";
                                        echo "<th>Certifying Agency</th>";
                                        echo "<th>Variety</th>";
                                        echo "<th>Actions</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['company_name'] . "</td>";
                                        echo "<td>" . $row['lot_coordinates'] . "</td>";
                                        echo "<td>" . $row['plant_brand'] . "</td>";
                                        echo "<td>" . $row['certifiying_agency'] . "</td>";
                                        echo "<td>" . $row['variety'] . "</td>";
                                        echo "<td>";
                                            echo '<a href="updateSeedCompany.php?id='. $row['id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                            echo '<a href="deleteSeedCompany.php?id='. $row['id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>        
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</body>
</html>