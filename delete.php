<!-- Delete a record -->

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

        <?php if(isset($user)) {?>
            <div class="user-info">
                <p><strong>ID:</strong><?php echo $user['id']; ?></p>
                <p><strong>Name:</strong><?php echo $user['name']; ?></p>
                <p><strong>Email:</strong><?php echo $user['email']; ?></p>

                <form method="post">
                    <input type="hidden" name="id" value="<?php $user['id']; ?>">
                    <button type="submit" name="delete">Delete User</button>
                </form>
            </div>
        <?php } ?>

    </div>

</body>
</html>


