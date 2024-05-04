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
$result = mysqli_query($mysqli, "SELECT * FROM harvester ORDER BY id DESC");
?>

<html>
<head>    
    <title>View Harvester Details</title>
</head>

<body>
        
    
    
            <div class="wrapper" style="margin-top:100px ; margin-bottom:50px ; margin-left:50px">
            <h1 style="margin-top:100px ; margin-bottom:50px ; margin-left:50px ; color:black">View Harvester Details</h1>
            <div class="container-fluid">
            <div class="row">
            <div class="col-md-12">
            <h6><a href="add.php">Add New Detail</a><br/><br/></h6>
            
    <table style='font-family: Arial, Helvetica, sans-serif;'id="example" class="table table-striped table-bordered" style="width:100%" >

    <tr>
        <th>Harvester ID</th> <th>Harvester EA</th> <th>Location</th> <th>Location ID</th> <th>Location Attribute</th> <th>Variety</th> <th>Yield</th> <th>Harvest Date</th>  <th>Chemical Application</th> <th>Date Sold</th> <th>Manufacturer EA</th> <th>Company Farmer ID</th> <th>Actions</th>
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$user_data['id']."</td>";
        echo "<td>".$user_data['harvester_ea']."</td>";
        echo "<td>".$user_data['lot_coordinates']."</td>";    
        echo "<td>".$user_data['lot_id']."</td>";   
        echo "<td>".$user_data['lot_attribute']."</td>";   
        echo "<td>".$user_data['variety']."</td>"; 
        echo "<td>".$user_data['yield']."</td>"; 
        echo "<td>".$user_data['harvester_date']."</td>"; 
        echo "<td>".$user_data['chemical_application']."</td>"; 
        echo "<td>".$user_data['date_sold']."</td>"; 
        echo "<td>".$user_data['manufactuer_ea']."</td>"; 
        echo "<td>".$user_data['company_famer_id']."</td>"; 
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
