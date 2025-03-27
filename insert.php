<!-- Insert new records -->
<?php include 'navbar.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Users</title>
    <link rel="stylesheet" href="assets/css/insert.css">
</head>

<body>
    <h1 style="text-align: center;">Insert New Users</h1>

    <div id="container">
        <form action="insert.php" method="POST">
            <label for="name">Enter Name: </label>
            <input type="text" name="name" id="name" placeholder="Enter name" required>
            <br><br>
            <label for="email">Enter Email: </label>
            <input type="email" name="email" id="email" placeholder="Enter email" required>
            <br><br>
            <button type="submit">Add User</button>
        </form>
        <a class="view-btn" href="index.php">View Records</a>
    </div>
</body>
</html>

<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"]; 
    $email = $_POST["email"]; 

    $query = "INSERT INTO users(name, email) VALUES ('$name','$email')";
    if ($conn->query($query) === TRUE) {
        echo '<div class="success-message">User Inserted Successfully!</div>';
        echo '<script>
                setTimeout(() => {
                    document.querySelector(".success-message").style.display = "none";
                }, 3000);
              </script>';
    } else {
        echo '<div class="error-message">Error: ' . $query . '<br>' . $conn->error . '</div>';
    }
}
?>
