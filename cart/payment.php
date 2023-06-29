<!DOCTYPE html>
<html>
<head>
	<title>Payment</title>
	<link rel="stylesheet" type="text/css" href="../mystyles/cart.css">
</head>
<body>
	<section>
		<div>
			<h1 align=center>Payment</h1>
			<form action="process_payment.php" method="post">
				<label for="name">Name:</label>
				<input type="text" id="name" name="name" required><br>

				<label for="address">Address:</label>
				<input type="text" id="address" name="address" required><br>

				<label for="phone">Phone:</label>
				<input type="text" id="phone" name="phone" required><br>

				<input type="submit" value="Confirm Payment" name="confirm_payment">
			</form>
		</div>
	</section>
</body>
</html>
