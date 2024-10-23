<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="description" content="Demonstrates CSS layout">
<meta name="keywords" content="HTML5, CSS layout">
<meta name="author" content="Group 2 | Nguyen Quoc Thang">
<title>CoffeeShop | Home</title>
<!-- References to external CSS files -->
<link href="styles/style.css" rel="stylesheet">
</head>
<body>
    <div class="login">
        <h3>Sign in</h3>
        <form method="post">
            <div class="input-field">
                <label for="name">User Name</label>
                <input id="name" type="text" name="name"  required placeholder="Please enter username"><br><br>
                <label for="password">Password</label>
                <input id="password" type="password" name="password"  required placeholder="Password"><br><br>
                <div class="submit">
                    <input type="submit" name="submit" value="Login">
                </div>
            </div>
        </form>
    </div>
    <!-- back to home page -->
    <div class="back">
        <a href="index.php">Back to Home</a>
    </div>
    <?php
    session_start();

    require_once("settings.php");

    function create_users_table($conn) {
        // SQL query to create the users table if it does not exist
        $create_query = "CREATE TABLE IF NOT EXISTS users (
            name VARCHAR(255) NOT NULL,
            password CHAR(60) NOT NULL
        );";

        // Create the users table
        if (mysqli_query($conn, $create_query)) {
            //echo "Users table created successfully.";
        } else {
            echo "Error creating users table: " . mysqli_error($conn);
        }

        // SQL query to check if the default manager user exists
        $check_query = "SELECT * FROM users WHERE name = 'admin'";
        $check_result = mysqli_query($conn, $check_query);

        // If admin user doesn't exist, insert the default manager user
        if (mysqli_num_rows($check_result) == 0) {
            $insert_query = "INSERT INTO users (name, password)
                VALUES ('admin', '" . md5('password') . "')";

            if (mysqli_query($conn, $insert_query)) {
                echo "Default admin user created successfully.";
            } else {
                echo "Error creating default admin user: " . mysqli_error($conn);
            }
        }
    }

    $conn = mysqli_connect($host, $user, $pwd, $sql_db);

    if (!$conn) {
        die("Connect fail: " . mysqli_connect_error());
    }

    create_users_table($conn);

    if (isset($_POST["submit"])) {
        $name = mysqli_real_escape_string($conn, $_POST["name"]);
        $password = mysqli_real_escape_string($conn, $_POST["password"]);
        $sql = "SELECT * FROM users WHERE name ='$name'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            if (md5($password) == $row['password']) {
                $_SESSION['name'] = $name;
                header("Location: manager.php");
                exit();
            } else {
                $errorMessage = "Wrong password";
            }
        } else {
            $errorMessage = "Wrong username";
        }
    }

    mysqli_close($conn);
    ?>



    <!-- Error message -->
    <div class="error-message">
        <?php if (isset($errorMessage)) echo $errorMessage; ?>
    </div>
</body>
