<?php //establish connection to server
	if ($_SERVER['REQUEST_METHOD'] === 'POST')
	{
		$username = htmlspecialchars(trim($_POST['username']));
		$password = htmlspecialchars(trim($_POST['password']));
		$email = htmlspecialchars(trim($_POST['email']));

		// validation
		if (empty($username) || strlen($username) <= 2  || strlen($username) > 20)
		echo "Invalid Username (Username must be between 4-20 characters)";

		else if (empty($password) || strlen($password) <= 4)
		echo "Invalid Password (Password must be more than 4 characters)";

		else if (empty($email) || $email != filter_var($email, FILTER_VALIDATE_EMAIL)) {
		echo "Invalid Email (Email must follow the following format : example@gmail.com)";
			
		}

		else
			{
				// Create connection
				//          (address of database, database username, database password, name of database )
				$conn = new mysqli('localhost', 'root', '', 'uecs2094_website');
				
				// Check connection
				if ($conn->connect_error)
				{
					die ("Connection failed: " . $conn->connect_error);
				}
				
				// adding data entry into database
				$sql = "INSERT INTO users VALUES ('0', '$username', '$password', '$email')";

				if ($conn->query($sql) === TRUE) 
				{
					echo "User has registered succesfully";
					header('Location: index.php');
				} 
				else 
					{
						echo "Error : " .$sql. "<br>" . $conn->error;
					}
				$conn->close();
			}
	}
?>
</body>
</html>