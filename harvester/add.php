<?php
require_once('styles.php');
?>
<html>
<head>
	<title>Add Harvester Details</title>
</head>

<body>
    <img align=”right" style="margin-top:0px ; margin-bottom:0px ; margin-left:920px" src="1.jpg"  class="w3-round w3-image w3-opacity-min" alt="Table Setting" width="600" height="750">
    
            <div class="wrapper" style="margin-top:-1050px ; margin-bottom:50px ; margin-left:50px">
            <h1 style="margin-top:100px ; margin-bottom:50px ; margin-left:50px ; color:black">Add Harvester Details</h1>
            <div class="container-fluid">
            <div class="row">
            <div class="col-md-12">
                <h6><a href="index.php">View Harvester Details</a></h6><br>
	

	<form style="margin-left:100px ;" action="add.php" method="post" name="form1">
		<table style='font-family: Arial, Helvetica, sans-serif;'width="25%" border="0">
			
			<tr> 
				<td>Harvester EA</td>
				<td><input type="text" name="harvester_ea" required></td>
			</tr>
			<tr> 
				<td>Location</td>
				<td><input type="text" name="lot_coordinates" required></td>
			</tr>
                        <tr> 
				<td>Location ID</td>
				<td><input type="text" name="lot_id" required></td>
			</tr>
                        <tr> 
				<td>Location Attribute</td>
				<td><input type="text" name="lot_attribute" required></td>
			</tr>
                        <tr> 
				<td>Variety</td>
				<td><input type="text" name="variety" required></td>
			</tr>
                        <tr> 
				<td>Yield</td>
				<td><input type="text" name="yield" required></td>
			</tr>
                        <tr> 
				<td>Harvest Date</td>
				<td><input type="Date" name="harvester_date" required></td>
			</tr>
                        <tr> 
				<td>Chemical Application</td>
				<td><input type="text" name="chemical_application" required></td>
			</tr>
                         <tr> 
				<td>Date Sold</td>
				<td><input type="date" name="date_sold" required></td>
			</tr>
                        <tr> 
				<td>Manufacturer EA</td>
				<td><input type="text" name="manufactuer_ea" required></td>
			</tr>
                        <tr> 
				<td>Company Farmer ID</td>
				<td><input type="text" name="company_famer_id" required></td>
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
		
		$harvester_ea = $_POST['harvester_ea'];
		$lot_coordinates = $_POST['lot_coordinates'];
                $lot_id = $_POST['lot_id'];
                $lot_attribute = $_POST['lot_attribute'];
                $variety = $_POST['variety'];
                $yield = $_POST['yield'];
                $harvester_date = $_POST['harvester_date'];
		$chemical_application = $_POST['chemical_application'];
                $date_sold = $_POST['date_sold'];
		$manufactuer_ea = $_POST['manufactuer_ea'];
                $company_famer_id = $_POST['company_famer_id'];
                
		// include database connection file
		include_once("config.php");
				
		// Insert user data into table
		$result = mysqli_query($mysqli, "INSERT INTO harvester(harvester_ea,lot_coordinates,lot_id,lot_attribute,variety,yield,harvester_date,chemical_application,date_sold,manufactuer_ea,company_famer_id) VALUES('$harvester_ea','$lot_coordinates','$lot_id','$lot_attribute','$variety','$yield','$harvester_date','$chemical_application','$date_sold','$manufactuer_ea','$company_famer_id')");
		
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
