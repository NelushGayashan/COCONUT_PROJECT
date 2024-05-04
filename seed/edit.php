<?php
include_once('styles.php');
// include database connection file
include_once("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$company_name=$_POST['company_name'];
	$lot_coordinates=$_POST['lot_coordinates'];
	$plant_brand=$_POST['plant_brand'];
        $certifiying_agency=$_POST['certifiying_agency'];
        $variety=$_POST['variety'];
		
	// update user data
	$result = mysqli_query($mysqli, "UPDATE seed_company SET company_name='$company_name',plant_brand='$plant_brand',lot_coordinates='$lot_coordinates' ,certifiying_agency='$certifiying_agency',variety='$variety' WHERE id=$id");
	
	// Redirect to homepage to display updated user in list
	header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM seed_company WHERE id=$id");

while($user_data = mysqli_fetch_array($result))
{
	$company_name = $user_data['company_name'];
	$plant_brand = $user_data['plant_brand'];
	$lot_coordinates = $user_data['lot_coordinates'];
        $certifiying_agency=$user_data['certifiying_agency'];
        $variety=$user_data['variety'];
}
?>
<html>
<head>	
	<title>Edit Seed Company Data</title>
</head>

<body>
        <img align=”right" style="margin-top:0px ; margin-bottom:0px ; margin-left:920px" src="1.jpg"  class="w3-round w3-image w3-opacity-min" alt="Table Setting" width="600" height="750">
    
            <div class="wrapper" style="margin-top:-850px ; margin-bottom:50px ; margin-left:50px">
            <h1 style="margin-top:100px ; margin-bottom:50px ; margin-left:50px ; color:black">Edit Seed Company Details</h1>
            <div class="container-fluid">
            <div class="row">
            <div class="col-md-12">
                <h6><a href="index.php">View Seed Company Details</a></h6><br>

	
	<form style="margin-left:100px ;" name="update_user" method="post" action="edit.php">
		<table style='font-family: Arial, Helvetica, sans-serif;'width="25%" border="0">
			<tr> 
				<td>Company Name</td>
				<td><input type="text" name="company_name" required value=<?php echo $company_name;?>></td>
			</tr>
			<tr> 
				<td>Location</td>
				<td><input type="text" name="lot_coordinates" required value=<?php echo $lot_coordinates;?>></td>
			</tr>
			<tr> 
				<td>Plant Brand</td>
				<td><input type="text" name="plant_brand" required value=<?php echo $plant_brand;?>></td>
			</tr>
                        <tr> 
				<td>Cert. Agency</td>
				<td><input type="text" name="certifiying_agency" required value=<?php echo $certifiying_agency;?>></td>
			</tr>
                        <tr> 
				<td>Variety</td>
				<td><input type="text" name="variety" required value=<?php echo $variety;?>></td>
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

