<?php
if (!isset($_SESSION)) {
    session_start();
}
include_once './DBconnect.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Car service home page</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>
        <div class="container">
            <h2>Car service home page</h2>
            <form method="post">
                Username: <input type="text" name="username"><br/>
                Password: <input type="password" name="password"><br/><br/>
                <input type="submit" class="btn" value="Login" name="login">
                <input type="submit" class="btn" value="Register user" name="register_user">
                <input type="submit" class="btn" value="Register employee" name="register_employee">
                <input type="submit" class="btn" value="Register admin" name="register_admin">
            </form>
            <?php
            if (isset($_POST['register_user'])) {
                header('Location: register_user.php');
            }

            if (isset($_POST['register_employee'])) {
                header('Location: register_employee.php');
            }
            if (isset($_POST['register_admin'])) {
                header('Location: register_admin.php');
            }

            if (isset($_POST['login'])) {
                $username_input = htmlentities($_POST['username']);
                $password_input = htmlentities($_POST['password']);

                $username = "'$username_input'";
                $password = "'$password_input'";

                $sql_user = "SELECT id, name, username, password, position FROM user WHERE username = $username AND password = $password";

                $rs_user = $mysqli->query($sql_user);

                if ($rs_user->num_rows !== 0) {
                    if ($mysqli->query($sql_user) === false) {
                        trigger_error('Wrong SQL: ' . $sql_user . ' Error: ' . $mysqli->error, E_USER_ERROR);
                    } else {
                        while ($row = $rs_user->fetch_assoc()) {
                            echo " Logged user:<br/>";
                            echo " Name = " . $row['name'] . "<br/>";
                            echo " Username = " . $row['username'] . "<br/>";
                            $position = $row['position'];

                            if ($position == 'user') {
                                $_SESSION['user'] = $username_input;
                                header('Location: user_page.php');
                            }
                            if ($position == 'employee') {
                                $_SESSION['user'] = $username_input;
                                header('Location: employee_page.php');
                            }
                            if ($position == 'admin') {
                                $_SESSION['user'] = $username_input;
                                header('Location: admin_page.php');
                            }
                        }
                    }
                } else {
                    echo "<br/>Wrong username/password";
                }
            }
            ?>
        </div>
    </body>
</html>
