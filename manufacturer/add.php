<?php
require_once('styles.php');
?>
<html>
<head>
	<title>Add Manufacturer Details</title>
</head>

<body>
    <img align=”right" style="margin-top:0px ; margin-bottom:0px ; margin-left:920px" src="1.jpg"  class="w3-round  w3-opacity-min" alt="Table Setting" width="600" height="1080">
    
            <div class="wrapper" style="margin-top:-1050px ; margin-bottom:50px ; margin-left:50px">
            <h1 style="margin-top:100px ; margin-bottom:50px ; margin-left:50px ; color:black">Add Manufacturer Details</h1>
            <div class="container-fluid">
            <div class="row">
            <div class="col-md-12">
                <h6><a href="index.php">View Manufacturer Details</a></h6><br>
	

	<form style="margin-left:100px ;" action="add.php" method="post" name="form1">
		<table width="25%" border="0"style='font-family: Arial, Helvetica, sans-serif;'>
			
			<tr> 
				<td>Manufacturer EA</td>
				<td><input type="text" name="manufactuer_ea" required></td>
			</tr>
			<tr> 
				<td>Shipment Date</td>
				<td><input type="date" name="shipment_date" required></td>
			</tr>
                        <tr> 
				<td>Shipment Credentials</td>
				<td><input type="text" name="shipment_credentials" required></td>
			</tr>
                        <tr> 
				<td>Grain Type</td>
				<td><input type="text" name="grain_type" required></td>
			</tr>
                        <tr> 
				<td>Purchase Date</td>
				<td><input type="date" name="purchese_date" required></td>
			</tr>
                        <tr> 
				<td>Variety</td>
				<td><input type="text" name="variety" required></td>
			</tr>
                        <tr> 
				<td>Quantity</td>
				<td><input type="number" name="quentity" required></td>
			</tr>
                        <tr> 
				<td>Date Sold</td>
				<td><input type="date" name="date_sold" required></td>
			</tr>
                         <tr> 
				<td>Manufacturer Date</td>
				<td><input type="date" name="manufactuer_date" required></td>
			</tr>
                        <tr> 
				<td>Product ID</td>
				<td><input type="text" name="product_id" required></td>
			</tr>
                        <tr> 
				<td>Product Name</td>
				<td><input type="text" name="product_name" required></td>
			</tr>
                        <tr> 
				<td>Weight</td>
				<td><input type="text" name="weight" required></td>
			</tr>
                        <tr> 
				<td>Manufacturer Name</td>
				<td><input type="text" name="manufactuer_name" required></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>
	
	<?php

	// Check If form submitted, insert form data into users table.
	if(isset($_POST['Submit'])) {
		
		$manufactuer_ea = $_POST['manufactuer_ea'];
		$shipment_date = $_POST['shipment_date'];
                $shipment_credentials = $_POST['shipment_credentials'];
                $grain_type = $_POST['grain_type'];
                $purchese_date = $_POST['purchese_date'];
                $variety = $_POST['variety'];
                $quentity = $_POST['quentity'];
		$date_sold = $_POST['date_sold'];
                $manufactuer_date = $_POST['manufactuer_date'];
                $product_id = $_POST['product_id'];
		$product_name = $_POST['product_name'];
                $weight = $_POST['weight'];
                $manufactuer_name = $_POST['manufactuer_name'];
                
		// include database connection file
		include_once("config.php");
				
		// Insert user data into table
		$result = mysqli_query($mysqli, "INSERT INTO manufactuer(manufactuer_ea,shipment_date,shipment_credentials,grain_type,purchese_date,variety,quentity,date_sold,manufactuer_date,product_name,weight) VALUES('$manufactuer_ea','$shipment_date','$shipment_credentials','$grain_type','$purchese_date','$variety','$quentity','$date_sold','$date_sold','$manufactuer_ea','$weight')");
		
		// Show message when user added
		echo "Details added successfully. <a href='index.php'>View Details</a>";
	}
	?>
        </div>
                </div>
                </div>
                </div>
</body>
</body>
</html>
