<?php
require_once('styles.php');
?>
<html>
<head>
	<title>Add Seed Company Details</title>
</head>

<body>
    <img align=”right" style="margin-top:0px ; margin-bottom:0px ; margin-left:920px" src="1.jpg"  class="w3-round w3-image w3-opacity-min" alt="Table Setting" width="600" height="750">
    
            <div class="wrapper" style="margin-top:-850px ; margin-bottom:50px ; margin-left:50px">
            <h1 style="margin-top:100px ; margin-bottom:50px ; margin-left:50px ; color:black">Add Seed Company Details</h1>
            <div class="container-fluid">
            <div class="row">
            <div class="col-md-12">
                <h6><a href="index.php">View Seed Company Details</a></h6><br>
	

	<form style="margin-left:100px ;" action="add.php" method="post" name="form1">
		<table width="25%" border="0"style='font-family: Arial, Helvetica, sans-serif;'>
			
			<tr> 
				<td>Company Name</td>
				<td><input type="text" name="company_name" required></td>
			</tr>
			<tr> 
				<td>Location</td>
				<td><input type="text" name="lot_coordinates" required></td>
			</tr>
                        <tr> 
				<td>Plant Brand</td>
				<td><input type="text" name="plant_brand" required></td>
			</tr>
                        <tr> 
				<td>Cert. Agency</td>
				<td><input type="text" name="certifiying_agency" required></td>
			</tr>
                         <tr> 
				<td>Variety</td>
				<td><input type="text" name="variety" required></td>
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
		
		$company_name = $_POST['company_name'];
		$lot_coordinates = $_POST['lot_coordinates'];
                $plant_brand = $_POST['plant_brand'];
                $certifiying_agency = $_POST['certifiying_agency'];
                $variety = $_POST['variety'];
                
		
		// include database connection file
		include_once("config.php");
				
		// Insert user data into table
		$result = mysqli_query($mysqli, "INSERT INTO seed_company(company_name,lot_coordinates,plant_brand,certifiying_agency,variety) VALUES('$company_name','$lot_coordinates','$plant_brand','$certifiying_agency','$variety')");
		
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
