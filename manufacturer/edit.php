<?php
require_once('styles.php');

// include database connection file
include_once("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{               
                $id = $_POST['id'];
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
		
	// update user data
	$result = mysqli_query($mysqli, "UPDATE manufactuer SET manufactuer_ea='$manufactuer_ea',shipment_date='$shipment_date',shipment_credentials='$shipment_credentials',grain_type='$grain_type',purchese_date='$purchese_date',variety='$variety',quentity='$quentity',date_sold='$date_sold',manufactuer_date='$manufactuer_date',product_id='$product_id',product_name='$product_name',weight='$weight',manufactuer_name='$manufactuer_name' WHERE id=$id");
	
	// Redirect to homepage to display updated user in list
	header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM manufactuer WHERE id=$id");

while($user_data = mysqli_fetch_array($result))
{
                $manufactuer_ea = $user_data['manufactuer_ea'];
		$shipment_date = $user_data['shipment_date'];
                $shipment_credentials = $user_data['shipment_credentials'];
                $grain_type = $user_data['grain_type'];
                $purchese_date = $user_data['purchese_date'];
                $variety = $user_data['variety'];
                $quentity = $user_data['quentity'];
		$date_sold = $user_data['date_sold'];
                $manufactuer_date = $user_data['manufactuer_date'];
                $product_id = $user_data['product_id'];
		$product_name = $user_data['product_name'];
                $weight = $user_data['weight'];
                $manufactuer_name = $user_data['manufactuer_name'];
}
?>
<html>
<head>	
	<title>Edit Manufacturer Data</title>
</head>

<body>
        <img align=”right" style="margin-top:0px ; margin-bottom:0px ; margin-left:920px" src="1.jpg"  class="w3-round  w3-opacity-min" alt="Table Setting" width="600" height="1080">
    
            <div class="wrapper" style="margin-top:-1050px ; margin-bottom:50px ; margin-left:50px">
            <h1 style="margin-top:100px ; margin-bottom:50px ; margin-left:50px ; color:black">Edit Manufacturer Details</h1>
            <div class="container-fluid">
            <div class="row">
            <div class="col-md-12">
                <h6><a href="index.php">View Manufacturer Details</a></h6><br>

	
	<form style="margin-left:100px ;" name="update_user" method="post" action="edit.php">
		<table style='font-family: Arial, Helvetica, sans-serif; ' width="25%" border="0">
			<tr> 
				<td>Manufacturer EA</td>
				<td><input type="text" name="manufactuer_ea" required value=<?php echo $manufactuer_ea;?>></td>
			</tr>
			<tr> 
				<td>Shipment Date</td>
				<td><input type="date" name="shipment_date" required value=<?php echo $shipment_date;?>></td>
			</tr>
			<tr> 
				<td>Shipment Credentials</td>
				<td><input type="text" name="shipment_credentials" required value=<?php echo $shipment_credentials;?>></td>
			</tr>
                        <tr> 
				<td>Grain Type</td>
				<td><input type="text" name="grain_type" required value=<?php echo $grain_type;?>></td>
			</tr>
                        <tr> 
				<td>Purchase Date</td>
				<td><input type="date" name="purchese_date" required required value=<?php echo $purchese_date;?>></td>
			</tr>
                        <tr> 
				<td>Variety</td>
				<td><input type="text" name="variety" required value=<?php echo $variety;?>></td>
			</tr>
                        <tr> 
				<td>Quantity</td>
				<td><input type="number" name="quentity" required value=<?php echo $quentity;?>></td>
			</tr>
                        <tr> 
				<td>Date Sold</td>
				<td><input type="date" name="date_sold" required value=<?php echo $date_sold;?>></td>
			</tr>
                         <tr> 
				<td>Manufacturer Date</td>
				<td><input type="date" name="manufactuer_date" required value=<?php echo $manufactuer_date;?>></td>
			</tr>
                        <tr> 
				<td>Product ID</td>
				<td><input type="text" name="product_id" required value=<?php echo $product_id;?>></td>
			</tr>
                        <tr> 
				<td>Product name</td>
				<td><input type="text" name="product_name" required value=<?php echo $product_name;?>></td>
			</tr>
                        <tr> 
				<td>Weight</td>
				<td><input type="text" name="weight" required value=<?php echo $weight;?>></td>
			</tr>
                        <tr> 
				<td>Manufacturer Name</td>
				<td><input type="text" name="manufactuer_name" required value=<?php echo $manufactuer_name;?>></td>
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

