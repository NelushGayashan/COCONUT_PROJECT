<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to index page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

// Include config file
require_once "./db/config.php";
 
// Define variables and initialize with empty values
$name = $address = $salary = "";
$name_err = $address_err = $salary_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }
    
    // Validate address
    $input_address = trim($_POST["address"]);
    if(empty($input_address)){
        $address_err = "Please enter an address.";     
    } else{
        $address = $input_address;
    }
    
    // Validate salary
    $input_salary = trim($_POST["salary"]);
    if(empty($input_salary)){
        $salary_err = "Please enter the salary amount.";     
    } elseif(!ctype_digit($input_salary)){
        $salary_err = "Please enter a positive integer value.";
    } else{
        $salary = $input_salary;
    }
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($address_err) && empty($salary_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO employees (name, address, salary) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_name, $param_address, $param_salary);
            
            // Set parameters
            $param_name = $name;
            $param_address = $address;
            $param_salary = $salary;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: welcome.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome</title>
    <link rel="stylesheet" href="./styles/style.css">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <div class="mainContainer">
        <div class="navBar">
            <div class="logo">
            <h3><a href="#">Trust Coconut</a></h3>
            </div>
            <div class="navigations">
            <a href="welcome.php">Seed Company</a>
            <a href="harvesterHome.php">Harvester</a>
            <a href="#">Manusfacter</a>
            </div>
            <div class="signUpDiv">
                <p><b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></p>
                <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
            </div>
        </div>
    </div>
    <div>
        <!-- <h1>Welcome to main page</h1> -->
        <div class="row g-3 p-2">
            <div class="col">
                <input type="text" class="form-control" placeholder="Manufactuer Ea" aria-label="First name">
            </div>
            <div class="col">
                <input type="date" class="form-control" placeholder="shipment_date" aria-label="Last name">
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="Shipment Credentials" aria-label="Last name">
            </div>
        </div>
        <div class="row g-3 p-2">
            <div class="col">
                <input type="text" class="form-control" placeholder="Grain Type" aria-label="Last name">
            </div>
            <div class="col">
                <input type="date" class="form-control" placeholder="Purchese Date" aria-label="First name">
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="Variety" aria-label="First name">
            </div>
            <div class="col">
                <input type="date" class="form-control" placeholder="Quentity" aria-label="First name">
            </div>
        </div>
        <div class="row g-3 p-2">
            <div class="col">
                <input type="date" class="form-control" placeholder="Date Sold" aria-label="Last name">
            </div>
            <div class="col">
                <input type="date" class="form-control" placeholder="Manufactuer Date" aria-label="First name">
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="Product Id" aria-label="First name">
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="Product Name" aria-label="First name">
            </div>
        </div>
        <div class="row g-3 p-2">
            <div class="col">
                <input type="text" class="form-control" placeholder="Weight" aria-label="Last name">
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="Manufactuer Name" aria-label="First name">
            </div>
        </div>
        <div class="btn-group p-4" role="group" aria-label="Basic mixed styles example">
            <button type="button" class="btn btn-primary">Save</button>
        </div>
    </div>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <?php
                    // Include config file
                    require_once "./db/config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM employees";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Manusfacter Ea</th>";
                                        echo "<th>Shipment Date</th>";
                                        echo "<th>Shipment Credentials</th>";
                                        echo "<th>Grain Type</th>";
                                        echo "<th>Purchese Date</th>";
                                        echo "<th>Variety</th>";
                                        echo "<th>Quentity</th>";
                                        echo "<th>Date Sold</th>";
                                        echo "<th>Manufactuer Date</th>";
                                        echo "<th>Product Id</th>";
                                        echo "<th>Product Name</th>";
                                        echo "<th>Weight</th>";
                                        echo "<th>Manufactuer Name</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . 'lorem' . "</td>";
                                        echo "<td>" . '2022-11-03' . "</td>";
                                        echo "<td>" . 'lorem' . "</td>";
                                        echo "<td>" . 'lorem' . "</td>";
                                        echo "<td>" . '2022-11-03' . "</td>";
                                        echo "<td>" . 'lorem' . "</td>";
                                        echo "<td>" . 'lorem' . "</td>";
                                        echo "<td>" . '2022-11-05' . "</td>";
                                        echo "<td>" . '2022-11-03' . "</td>";
                                        echo "<td>" . 'P001' . "</td>";
                                        echo "<td>" . 'lorem' . "</td>";
                                        echo "<td>" . '1kg' . "</td>";
                                        echo "<td>" . 'lorem' . "</td>";
                                        echo "<td>";
                                            echo '<a href="updateManusfacter.php?id='. $row['id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                            echo '<a href="deleteManusfacter.php?id='. $row['id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
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