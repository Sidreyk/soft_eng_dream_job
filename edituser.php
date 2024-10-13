<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<?php $getUserById = getUserById($pdo, $_GET['user_id']); ?>
	<form action="core/handleForms.php?user_id=<?php echo $_GET['user_id']; ?>" method="POST">
		<p>
			<label for="username">Username</label> 
			<input type="text" name="username" value="<?php echo $getUserById['username']; ?>">
		</p>
		<p>
			<label for="user_password">Password</label> 
			<input type="text" name="user_password" value="<?php echo $getUserById['user_password']; ?>">
		</p>
		<p>
			<label for="firstName">First Name</label>
			<input type="text" name="firstName" value="<?php echo $getUserById['firstName']; ?>">
		</p>
		<p>
			<label for="lastName">Last Name</label>
			<input type="text" name="lastName" value="<?php echo $getUserById['lastName']; ?>">
		</p>
		<p>
			<label for="age">Age</label>
			<input type="text" name="age" value="<?php echo $getUserById['age']; ?>">
		</p>
		<p>
		<label for="membershipType">Membership Type:</label>
            <select name="membershipType" id="membershipType" required>
                <option value="">--Select Type--</option>
                <option value="Regular">Regular</option>
                <option value="Premium">Premium</option>
            </select>
		<p>
			<label for="membershipDateStart">Membership Date Start</label>
			<input type="text" name="membershipDateStart" value="<?php echo $getUserById['membershipDateStart']; ?>">

			<input type="submit" name="editUserBtn">
		</p>
	</form>
</body>
</html>
