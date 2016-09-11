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
        <div class="container">
        <button onclick="location.href='logout.php';" class="btn">Logout</button><br/>
            <p>Profile page of user <?php echo $_SESSION['user']; ?></p>
            <p>Search employee by salary: 
            <form action="search_employee.php" method="post">
                Salary: <input type="text" name="salary">
                <input type="submit" class="btn" name="search" value="Search">
            </form>
        </p>
        <p>
        <table class="cars-table">
            <tr class="cars-tr">
                <th class="cars-th" colspan="3">MY CARS</th>
            </tr>
            <tr>
                <th class="cars-th">Brand</th>
                <th class="cars-th">Model</th>
                <th class="cars-th">Production year</th>
            </tr>
            <?php
            $current_user = $_SESSION['user'];
            $username = "'$current_user'";

            $sql = "SELECT car.brand, car.model, car.production_year FROM car INNER JOIN user ON car.user_id = user.id WHERE username = $username";

            $rs = $mysqli->query($sql);

            if ($rs->num_rows === 0) {
                //   echo "<br><br>No results found!";
            } else {
                while ($row = $rs->fetch_assoc()) {
                    ?>
                    <tr>
                        <td class="cars-td"><?php echo $row['brand']; ?></td>
                        <td class="cars-td"><?php echo $row['model']; ?></td>
                        <td class="cars-td"><?php echo $row['production_year']; ?></td>
                    </tr>            
                    <?php
                }
            }
            ?>
        </table>
    </p>

    <p>Add car:
    <form action="add_car.php" method="post">
        Brand: <input type="text" name="brand"><br/>
        Model: <input type="text" name="model"><br/>
        Production year: <input type="text" name="production_year"><br/>
        <input type="submit" class="btn" name="submit" value="Save">
    </form>
</p>   

<button class="btn" onclick="location.href = 'forum-index.php';">Forum</button><br/><br/>
</div>
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
        <style>
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
                font-family: serif;
                padding: 6px;
            }
            th {
                background-color: lightsalmon;
                color: black;
            }
            td {
                background-color: mistyrose;
            }
        </style>
    </head>
    <body>
        <p> Profile page of user <?php echo $_SESSION['user']; ?></p>
        <br>
        <p>Search employee by salary: 
        <form action="search_employee.php" method="post">
            Salary: <input type="text" name="salary">
            <input type="submit" name="search" value="Search">
        </form>
    </p>
    <p>
    <table>
        <tr>
            <th colspan="3">MY CARS</th>
        </tr>
        <tr>
            <th>Brand</th>
            <th>Model</th>
            <th>Production year</th>
        </tr>
        <?php
        $current_user = $_SESSION['user'];
        $username = "'$current_user'";

        $sql = "SELECT car.brand, car.model, car.production_year FROM car INNER JOIN user ON car.user_id = user.id WHERE username = $username";

        $rs = $mysqli->query($sql);

        if ($rs->num_rows === 0) {
            echo "<br><br>No results found!";
        } else {
            while ($row = $rs->fetch_assoc()) {
                ?>
        <tr>
            <td><?php echo $row['brand']; ?></td>
            <td><?php echo $row['model']; ?></td>
            <td><?php echo $row['production_year']; ?></td>
        </tr>            
                <?php
            }
        }
        ?>
    </table>
</p>

<p>Add car:
<form action="add_car.php" method="post">
    Brand: <input type="text" name="brand"><br/>
    Model: <input type="text" name="model"><br/>
    Production year: <input type="text" name="production_year"><br/>
    <input type="submit" name="submit" value="Save">
</form>
</p>   

<button onclick="location.href = 'forum-index.php';">Forum</button><br/><br/>
<button onclick="location.href = 'service-index.php';">Back to start page</button>

</body>
</html>
>>>>>>> origin/master
