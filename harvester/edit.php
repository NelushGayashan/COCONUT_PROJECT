<?php
include_once('styles.php');
// include database connection file
include_once("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{               
                $id = $_POST['id'];
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
		
	// update user data
	$result = mysqli_query($mysqli, "UPDATE harvester SET harvester_ea='$harvester_ea',lot_coordinates='$lot_coordinates',lot_id='$lot_id',lot_attribute='$lot_attribute',variety='$variety',yield='$yield',harvester_date='$harvester_date',chemical_application='$chemical_application',date_sold='$date_sold',manufactuer_ea='$manufactuer_ea',company_famer_id='$company_famer_id' WHERE id=$id");
	
	// Redirect to homepage to display updated user in list
	header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM harvester WHERE id=$id");

while($user_data = mysqli_fetch_array($result))
{
                $harvester_ea = $user_data['harvester_ea'];
		$lot_coordinates = $user_data['lot_coordinates'];
                $lot_id = $user_data['lot_id'];
                $lot_attribute = $user_data['lot_attribute'];
                $variety = $user_data['variety'];
                $yield = $user_data['yield'];
                $harvester_date = $user_data['harvester_date'];
		$chemical_application = $user_data['chemical_application'];
                $date_sold = $user_data['date_sold'];
		$manufactuer_ea = $user_data['manufactuer_ea'];
                $company_famer_id = $user_data['company_famer_id'];
}
?>
<html>
<head>	
	<title>Edit Harvester Data</title>
</head>

<body>
        <img align=”right" style="margin-top:0px ; margin-bottom:0px ; margin-left:920px" src="1.jpg"  class="w3-round w3-image w3-opacity-min" alt="Table Setting" width="600" height="750">
    
            <div class="wrapper" style="margin-top:-1050px ; margin-bottom:50px ; margin-left:50px">
            <h1 style="margin-top:100px ; margin-bottom:50px ; margin-left:50px ; color:black">Edit Harvester Details</h1>
            <div class="container-fluid">
            <div class="row">
            <div class="col-md-12">
                <h6><a href="index.php">View Harvester Details</a></h6><br>

	
	<form style="margin-left:100px ;" name="update_user" method="post" action="edit.php">
		<table style='font-family: Arial, Helvetica, sans-serif;'width="25%" border="0">
			<tr> 
				<td>Harvester EA</td>
				<td><input type="text" name="harvester_ea" required value=<?php echo $harvester_ea;?>></td>
			</tr>
			<tr> 
				<td>Location</td>
				<td><input type="text" name="lot_coordinates" required value=<?php echo $lot_coordinates;?>></td>
			</tr>
			<tr> 
				<td>Location ID</td>
				<td><input type="text" name="lot_id" required value=<?php echo $lot_id;?>></td>
			</tr>
                        <tr> 
				<td>Location Attribute</td>
				<td><input type="text" name="lot_attribute" required value=<?php echo $lot_attribute;?>></td>
			</tr>
                        <tr> 
				<td>Variety</td>
				<td><input type="text" name="variety" required value=<?php echo $variety;?>></td>
			</tr>
                        <tr> 
				<td>Yield</td>
				<td><input type="text" name="yield" required value=<?php echo $yield;?>></td>
			</tr>
                        <tr> 
				<td>Harvest Date</td>
				<td><input type="Date" name="harvester_date" required value=<?php echo $harvester_date;?>></td>
			</tr>
                        <tr> 
				<td>Chemical Application</td>
				<td><input type="text" name="chemical_application" required value=<?php echo $chemical_application;?>></td>
			</tr>
                         <tr> 
				<td>Date Sold</td>
				<td><input type="date" name="date_sold" required value=<?php echo $date_sold;?>></td>
			</tr>
                        <tr> 
				<td>Manufacturer EA</td>
				<td><input type="text" name="manufactuer_ea" required value=<?php echo $manufactuer_ea;?>></td>
			</tr>
                        <tr> 
				<td>Company Farmer ID</td>
				<td><input type="text" name="company_famer_id" required value=<?php echo $company_famer_id;?>></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
        </div>
                </div>
                </div>
                </div>
</body>
</html>

