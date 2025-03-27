<?php
include 'db_connect.php';
include 'navbar.php';

function fetchUserById($conn, $id)
{
    $query = "SELECT * FROM users WHERE id = '$id'";
    $result = $conn->query($query);
    return ($result->num_rows > 0) ? $result->fetch_assoc() : null;
}

$user = null; // Initialize variable
$error_message = ""; // Initialize error message

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['fetch'])) {
        $id = $_POST['id'];
        $user = fetchUserById($conn, $id);
        if (!$user) {
            $error_message = "No user found with this ID.";
        }
    }

    if (isset($_POST['delete'])) {
        $id = $_POST['id'];
        $deleteQuery = "DELETE FROM users WHERE id = '$id'";
        if ($conn->query($deleteQuery) === TRUE) {
            echo '<div class="success-message">Record Deleted Successfully!</div>';
            echo '<script>
                    setTimeout(() => {
                        document.querySelector(".success-message").style.display = "none";
                    }, 3000);
                  </script>';
        } else {
            echo '<div class="error-message">Error deleting record!</div>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User</title>
    <link rel="stylesheet" href="assets/css/delete.css">
</head>
<body>

    <h1 style="text-align: center;">Delete User</h1>
    <div id="container">
        <form action="delete.php" method="POST">
            <label for="id">Enter User ID: </label>
            <input type="number" name="id" id="id" placeholder="Enter ID" required>
            <br><br>
            <button type="submit" name="fetch">Fetch Record</button>
        </form>

        <?php if (!empty($error_message)) { ?>
            <div class="error-message">
                <p><?php echo $error_message; ?></p>
            </div>
        <?php } ?>

        <?php
        if ($user) { ?>
            <div class="user-info">
                <p><strong>ID:</strong> <?php echo $user['id']; ?></p>
                <p><strong>Name:</strong> <?php echo $user['name']; ?></p>
                <p><strong>Email:</strong> <?php echo $user['email']; ?></p>

                <form action="delete.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                    <button type="submit" name="delete">Delete User</button>
                </form>
            </div>
        <?php } ?>

    </div>

</body>
</html>
