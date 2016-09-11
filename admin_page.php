<<<<<<< HEAD
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
        <title></title>
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>
        <button onclick="location.href = 'logout.php';">Logout</button><br/>
        <p> Profile page of admin <?php echo $_SESSION['user']; ?></p>
        <p>Change user data: <br/>
        <form action="changeUserData.php" method="post">
            First name: <input type="text" name="fname"><br/>
            Last name: <input type="text" name="lname"><br/>
            New password: <input type="password" name="pass"><br/>
            Repeat new password: <input type="password" name="rep_pass"><br/>
            <input type="submit" value="Save" name="change_data">
        </form>
    </p>     

    <button onclick="location.href = 'forum-index.php';">Forum</button><br/><br/>
    <button onclick="location.href = 'service-index.php';">Back to start page</button>

</body>
</html>
=======
<?php session_start(); ?>
<?php include_once './DBconnect.php'; ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <p> Profile page of admin <?php echo $_SESSION['user']; ?></p>
        <?php
        ?>

        <p>Change user data: <br/>
        <form action="changeUserData.php" method="post">
            First name: <input type="text" name="fname"><br/>
            Last name: <input type="text" name="lname"><br/>
            New password: <input type="password" name="pass"><br/>
            Repeat new password: <input type="password" name="rep_pass"><br/>
            <input type="submit" value="Save" name="change_data">
        </form>
    </p>     

    <button onclick="location.href = 'forum-index.php';">Forum</button><br/><br/>
    <button onclick="location.href = 'service-index.php';">Back to start page</button>

</body>
</html>
>>>>>>> origin/master
