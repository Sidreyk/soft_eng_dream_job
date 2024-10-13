<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		body {
			font-family: "Arial";
		}
		input {
			font-size: 1.5em;
			height: 50px;
			width: 200px;
		}
		table, th, td {
		  border:1px solid black;
		}
	</style>
</head>
<body>
	<h1>Are you sure you want to delete this user?</h1>
	<?php $getUserById = getUserById($pdo, $_GET['user_id']); ?>
	<form action="core/handleForms.php?user_id=<?php echo $_GET['user_id']; ?>" method="POST">

			<p>Username: <?php echo $getUserById['username']; ?></p>
			<p>Password: <?php echo $getUserById['user_password']; ?></p>
			<p>First Name: <?php echo $getUserById['firstName']; ?></p>
			<p>Last Name: <?php echo $getUserById['lastName']; ?></p>
			<p>Age: <?php echo $getUserById['age']; ?></p>
			<p>Membership Type: <?php echo $getUserById['membershipType']; ?></p>
			<p>Membership Date Start: <?php echo $getUserById['membershipDateStart']; ?></p>

			<input type="submit" name="deleteUserBtn" value="Delete">
		</div>
	</form>
</body>
</html>