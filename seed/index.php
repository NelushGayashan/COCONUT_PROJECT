<?php
require_once('styles.php');
/**
* Simple PHP CRUD Script
* Developed by TutorialsClass.com
* URL:  http://tutorialsclass.com/code/php-simple-crud-application
**/

// Create database connection using config file
include_once("config.php");

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM seed_company ORDER BY id DESC");
?>

<html>
<head>    
    <title>View Seed Company Details</title>
</head>

<body>
        
    
    
            <div class="wrapper" style="margin-top:100px ; margin-bottom:50px ; margin-left:50px">
            <h1 style="margin-top:100px ; margin-bottom:50px ; margin-left:50px ; color:black">View Seed Company Details</h1>
            <div class="container-fluid">
            <div class="row">
            <div class="col-md-12">
            <h6><a href="add.php">Add New Detail</a><br/><br/></h6>
            
    <table style='font-family: Arial, Helvetica, sans-serif;'id="example" class="table table-striped table-bordered" style="width:100%" >

    <tr>
        <th>Company farmer ID</th> <th>Company Name</th> <th>Location</th> <th>Brand of the Plant</th> <th>Cert. Agency</th> <th>Variety</th> <th>Actions</th>
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$user_data['id']."</td>";
        echo "<td>".$user_data['company_name']."</td>";
        echo "<td>".$user_data['lot_coordinates']."</td>";    
        echo "<td>".$user_data['plant_brand']."</td>";   
        echo "<td>".$user_data['certifiying_agency']."</td>";   
        echo "<td>".$user_data['variety']."</td>"; 
        echo "<td><a href='edit.php?id=$user_data[id]'>Edit</a> | <a href='delete.php?id=$user_data[id]'>Delete</a></td></tr>";        
    }
    ?>
    </table>

                </div>
                </div>
                </div>
                </div>
</body>
</html>
