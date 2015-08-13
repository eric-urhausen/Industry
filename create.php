<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	
</head>
<body>
	<form method="post" enctype="multipart/form-data">
		<div class="inner-container">
			<div class="field">
				<label for="email">Email</label>
				<input id="email" class="field-input" name="email" required/>
			</div>
			<div class="field">
				<label for="name">Name</label>
				<input id="name" class="field-input" name="name" required />
			</div>
			<div class="field">
				<label for="image">Image</label>
				<input id="image" type="file" class="field-input" name="image" required />
			</div>
			<div class="field">
				<label for="zip-code">Zip</label>
				<input id="zip-code" class="field-input" name="zip-code" required />
			</div>
			<div class="field">
				<label for="city">City</label>
				<input id="city" class="field-input" name="city" required />
			</div>
			<div class="field">
				<label for="state">State</label>
				<input id="state" class="field-input" name="state" required />
			</div>
			<input type="submit" id="submit-btn" name="submit" value="Submit">
		</div>
	</form>
	<!-- JavaScript at the bottom for fast page loading -->
	<script src="js/jquery-1.9.1.min.js"></script>
</body>
</html>
<?php
    if(isset($_POST['submit']))
    {
        if(getimagesize($_FILES['image']['tmp_name']) == FALSE)
        {
            echo "Please select an image.";
        }
        else
        {
            $image= addslashes($_FILES['image']['tmp_name']);
            $image= file_get_contents($image);
            $image= base64_encode($image);
            $city = $_REQUEST["city"];
			$email = $_REQUEST["email"];
			$name = $_REQUEST["name"];
			$slug = str_replace(' ', '.', $name);;
			$state = $_REQUEST["state"];
			$zip = $_REQUEST["zip-code"];
            saveProfile($image,$city,$email,$name,$slug,$state,$zip);
        }
    }
    function saveProfile($image,$city,$email,$name,$slug,$state,$zip)
    {
       
        $result=mysql_query("INSERT INTO data (`image`,`city`,`email`,`name`,`slug`,`state`,`zip`) VALUES ('$image','$city','$email','$name','$slug','$state','$zip')");
        if($result)
        {
            echo "<br/>Image uploaded.";
        }
        else
        {
            echo "<br/>Image not uploaded.";
        }
    }
?>