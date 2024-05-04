<?php
require_once('styles.php');
/**
* Simple PHP CRUD Script
* Developed by TutorialsClass.com
* URL:  http://tutorialsclass.com/code/php-simple-crud-application
**/

// Create database connection using config file
include_once("config.php");
$result = mysqli_query($mysqli, "SELECT * FROM manufactuer ORDER BY id DESC");
// Fetch all users data from database
?>

<html>
<head>    
    <title>View Manufacturer Details</title>
</head>

<body>
        
    
    
            <div class="wrapper" style="margin-top:100px ; margin-bottom:50px ; margin-left:50px">
            <h1 style="margin-top:100px ; margin-bottom:50px ; margin-left:50px ; color:black">View Manufacturer Details</h1>
            <div class="container-fluid">
            <div class="row">
            <div class="col-md-12">
            <h6><a href="add.php">Add New Detail</a><br/><br/></h6>
            
    <table id="example" class="table table-striped table-bordered" style='font-family: Arial, Helvetica, sans-serif;width:100%'>

    <tr>
        <th>Manufacturer ID</th> <th>Manufacturer EA</th> <th>Shipment Date</th> <th>Shipment Credentials</th> <th>Grain Type</th> <th>Purchase Date</th> <th>Variety</th> <th>Quantity</th> <th>Date Sold</th>  <th>Manufacturer Date</th> <th>Product ID</th> <th>Product Name</th> <th>Weight</th> <th>Manufacturer Name</th> <th>Actions</th>
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$user_data['id']."</td>";
        echo "<td>".$user_data['manufactuer_ea']."</td>";
        echo "<td>".$user_data['shipment_date']."</td>";    
        echo "<td>".$user_data['shipment_credentials']."</td>";   
        echo "<td>".$user_data['grain_type']."</td>";   
        echo "<td>".$user_data['purchese_date']."</td>"; 
        echo "<td>".$user_data['variety']."</td>"; 
        echo "<td>".$user_data['quentity']."</td>"; 
        echo "<td>".$user_data['date_sold']."</td>"; 
        echo "<td>".$user_data['manufactuer_date']."</td>"; 
        echo "<td>".$user_data['product_id']."</td>"; 
        echo "<td>".$user_data['product_name']."</td>"; 
        echo "<td>".$user_data['weight']."</td>"; 
        echo "<td>".$user_data['manufactuer_name']."</td>"; 
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
