<?php
require_once 'core/dbConfig.php';
require_once 'core/models.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seed's Internet Cafe</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h3>Welcome to Seed's Internet Cafe!</h3>
    <p>Please enter user's info to register an account:</p>
    <form action="core/handleForms.php" method="POST">
        <p>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required>
        </p>
        <p>
            <label for="user_password">Password:</label>
            <input type="password" name="user_password" id="user_password" required>
        </p>
        <p>
            <label for="firstName">First Name:</label>
            <input type="text" name="firstName" id="firstName" required>
        </p>
        <p>
            <label for="lastName">Last Name:</label>
            <input type="text" name="lastName" id="lastName" required>
        </p>
        <p>
            <label for="age">Age:</label>
            <input type="number" name="age" id="age" min="1" required>
        </p>
        <p> 
            <label for="membershipType">Membership Type:</label>
            <select name="membershipType" id="membershipType" required>
                <option value="">--Select Type--</option>
                <option value="Regular">Regular</option>
                <option value="Premium">Premium</option>
            </select>
        </p>
        <p>
            <label for="membershipDateStart">Membership Date Start:</label>
            <input type="date" name="membershipDateStart" id="membershipDateStart" required>
        </p>
        <p>
            <button type="submit" name="register">Register</button>
        </p>
    </form>

    <h3>Customer Accounts Record</h3>
    <table> 
        <tr>
            <th>User ID</th>
            <th>Username</th>
            <th>Password</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Age</th>
            <th>Membership Type</th>
            <th>Membership Date Start</th>
            <th>Actions</th>
        </tr>
        <?php
        // Corrected function call and variable naming
        $allUserAccounts = seeAllUserAccounts($pdo);
        if (!empty($allUserAccounts)) {
            foreach ($allUserAccounts as $row) {
        ?>
        <tr>
            <td><?php echo ($row['user_id']); ?></td>
            <td><?php echo ($row['username']); ?></td>
            <td><?php echo ($row['user_password']); ?></td>
            <td><?php echo ($row['firstName']); ?></td>
            <td><?php echo ($row['lastName']); ?></td>
            <td><?php echo ($row['age']); ?></td>
            <td><?php echo ($row['membershipType']); ?></td>
            <td><?php echo ($row['membershipDateStart']); ?></td>
            <td class="action-links">
                <a href="edituser.php?user_id=<?php echo urlencode($row['user_id']); ?>">Edit</a>
                <a href="deleteuser.php?user_id=<?php echo urlencode($row['user_id']); ?>" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
            </td>
        </tr>
        <?php
            }
        } else {
            ?>
            <tr>
                <td colspan="8">No Records Found!</td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
