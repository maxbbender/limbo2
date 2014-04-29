<?php 
	if ($_SERVER['REQUEST_METHOD'] == 'GET'){
		$fname = '';
		$lname = '';
		$email = '';
		$phone = NULL;
		$item = array(
			'name' => '',
			'color' => '',
			'make' => '',
			'model' => '',
			'size' => '',
			'info' => ''
		);
		$location = '';
	}else if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$item = array(
			'name' => $_POST['name'],
			'color' => $_POST['color'],
			'make' => $_POST['make'],
			'model' => $_POST['model'],
			'size' => $_POST['size'],
			'info' => $_POST['info']
		);
		$location = $_POST['location'];
	}
	
	$submittype = findType();
	
	/*if ($submittype != NULL){
		echo '<form action="' . $submittype . '" method="POST" enctype="multipart/form-data">';
		echo '<h3>Contact Information</h3>';
		echo '<table>';
		echo '<tr><td>First Name:</td><td><input type="text" name="fname" value="' . $fname . '" placeholder="John"></td></tr>';
		echo '<tr><td>Last Name:</td><td><input type="text" name="lname" value="' . $lname . '" placeholder="Smith"></td></tr>';
		echo '<tr><td>Email Address:</td><td><input type="email" name="email" value="' . $email . '" placeholder="jsmith@example.com"></td></tr>';
		echo '<tr><td>Phone Number :</td><td><input type="tel" name="phone" value="' . $phone . '"></td></tr>';
		echo '</table>';
		echo '<br><h3>Item Description</h3>';
		echo '<table>';
		echo '<tr><td>What is the item:</td><td><input type="text" name="name" value="' . $item['name'] . '"></td></tr>';
		echo '<tr><td>Color:</td><td><input type="color" name="color" value="' . $item['color'] . '"></td></tr>';
		echo '<tr><td>Make:</td><td><input type="text" name="make" value="' . $item['make'] . '"></td></tr>';
		echo '<tr><td>Model:</td><td><input type="text" name="model" value="' . $item['model'] . '"></td></tr>';
		echo '<tr><td>Size:</td><td><input type="text" name="size" value="' . $item['size'] . '"></td></tr>';
		echo '</table><br>';
		include '/includes/location.php';
		//echo '<label for="picture">Picture:</label>';
		//echo '<input type="file" name="picture" id="file"><br>';
		echo '<br>Additional Information: <br><textarea rows="4" cols="50" name="info" placeholder="Example: It has scratch on the bottom left."></textarea><br>';
		echo '<input type="submit" value="Submit">';
		echo '</form>';
	}else{
		echo '<span style="color:red">There was an error. This form can only be accessed by the found and lost pages</span>';
	}
	*/
	if ($submittype != NULL){
		echo '
			<form action="'.$submittype.'" method="post">
				<fieldset>
					<legend>Contact Information</legend>
					<div class="row">
						<div class="large-6 columns">
							<label>First Name
								<input type="text" name="fname" placeholder="First Name">
							</label>
						</div>
						<div class="large-6 columns">
							<label>Last Name
								<input type="text" name="lname" placeholder="Last Name">
							</label>
						</div>
					</div>
					<div class="row">
						<div class="large-6 columns">
							<label>Email
								<input type="email" name="email" placeholder="jsmith@example.com">
							</label>
						</div>
						<div class="large-6 columns">
							<label>Phone Number
								<input type="text" name="phone" placeholder="Phone Number">
							</label>
						</div>
					</div>
				</fieldset>
				<fieldset>
					<legend>Item Information</legend>
					<div class="row">
						<div class="large-4 columns">
							<label>Item Name
								<input type="text" name="name" placeholder="Item Name">
							</label>
						</div>
						<div class="large-4 columns">
							<label>Item Color
								<input type="color" name="color" placeholder="#FFFFF">
							</label>
						</div>
						<div class="large-4 columns">
							<label>Location
								' . include 'includes/location.php' . '
							</label>
						</div>
					</div>
					<div class="row">
						<div class="large-4 columns">
							<label>Make
								<input type="text" name="make" placeholder="Make">
							</label>
						</div>
						<div class="large-4 columns">
							<label>Model
								<input type="text" name="model" placeholder="Model">
							</label>
						</div>
						<div class="large-4 columns">
							<label>Size
								<input type="text" name="size" placeholder="Size">
							</label>
						</div>
					</div>
					<div class="row>
						<div class="large-12 columns>
							<label>Date Found/Lost
								<input type="date" name="date">
							</label>
					<div class="row>
						<div class="large-12 columns>
							<lable>More Information
								<textarea name="info" placeholder="More Information">
							</label>
						</div>
					</div>
				</fieldset>
			</form>
		';
	function findType(){
		if ($_SERVER['PHP_SELF'] == '/limbo2/lost.php'){
			$type = 'submitlost.php';
		}else if ($_SERVER['PHP_SELF'] == '/limbo2/found.php'){
			$type = 'submitfound.php';
		}else{
			$type = NULL;
		}
		return $type;
	}
?>