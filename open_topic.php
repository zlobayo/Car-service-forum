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
        <button class="btn" onclick="location.href = 'logout.php';">Logout</button><br><br>
        <?php
        if (isset($_POST['open'])) {
            $topic_id = $_POST['topic_id'];

            $mysqli->real_query("SELECT topic_name FROM forum_topics WHERE forum_topics.topic_id = $topic_id");

            $result = $mysqli->use_result();

            if (!$result) {
                echo "<br/>No results found!";
            } else {
                while ($row = $result->fetch_assoc()) {

                    $topic_name = $row['topic_name'];
                }
            }
            ?>
            <table class="forum-table">
                <tr class="forum-tr">
                    <th class="forum-th" colspan="2"><?php echo "Topic name: $topic_name"; ?></th>
                    <th class="forum-th" id="post_date">Date:</th>
                </tr>
                <?php
                $mysqli->real_query("SELECT forum_topics.topic_name, forum_topics.topic_id, forum_topics.topic_by, forum_posts.post_text, forum_posts.post_date, forum_posts.post_by,  
                user.username FROM forum_topics INNER JOIN forum_posts ON forum_topics.topic_id = forum_posts.topic_id INNER JOIN user ON forum_posts.post_by = user.id WHERE forum_topics.topic_id = $topic_id");

                $rs = $mysqli->use_result();

                if (!$rs) {
                    echo "<br/>No results found!";
                } else {
                    while ($row = $rs->fetch_assoc()) {

                        $topic_name = $row['topic_name'];
                        $topic_by = $row['topic_by'];
                        $topic_id = $row['topic_id'];
                        $post_text = $row['post_text'];
                        $post_date = $row['post_date'];
                        $post_by = $row['post_by'];
                        $post_by_username = $row['username'];
                        ?>
                        <tr class="forum-tr">
                            <td class="forum-td" id="post_by_username"><?php echo $post_by_username ?></td>
                            <td class="forum-td"><?php echo $post_text ?></td>
                            <td class="forum-td" id="post_date"><?php echo $post_date ?></td>
                        </tr>
                        <?php
                    }
                }
            }
            ?>
        </table>
        <h4>Post a reply:</h4>
        <form action="new_post.php" method="post">
            Text <input type="text" name="reply_text">
            <input type="hidden" name= "topic_id" value="<?php echo $topic_id ?>">
            <input type="submit" class="btn" name="post_reply" value="Submit">
        </form>
        <br>
        <p>
            <button class="btn" onclick="location.href = 'forum-index.php';">Back to forum index</button>
        </p>
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
                font-family: sans-serif;
                padding: 10px;
            }
            th {
                background-color: #193A7A;
                color: aliceblue;
                column-span: all;
            }
            td {
                background-color: #E6E6E6;
            }
            #post_by_username {
                background-color: gold;
            }
            #post_date {
                font-size: small;
                
            }
        </style>
    </head>
    <body>

        <?php
        if (isset($_POST['open'])) {
            $topic_id = $_POST['topic_id'];

            $mysqli->real_query("SELECT topic_name FROM forum_topics WHERE forum_topics.topic_id = $topic_id");

            $result = $mysqli->use_result();

            if (!$result) {
                echo "<br/>No results found!";
            } else {
                while ($row = $result->fetch_assoc()) {

                    $topic_name = $row['topic_name'];
                }
            }
            ?>
            <table>
                <tr>
                    <th colspan="2"><?php echo "Topic name: $topic_name"; ?></th>
                    <th id="post_date">Date:</th>
                </tr>
                <?php
                $mysqli->real_query("SELECT forum_topics.topic_name, forum_topics.topic_id, forum_topics.topic_by, forum_posts.post_text, forum_posts.post_date, forum_posts.post_by,  
                user.username FROM forum_topics INNER JOIN forum_posts ON forum_topics.topic_id = forum_posts.topic_id INNER JOIN user ON forum_posts.post_by = user.id WHERE forum_topics.topic_id = $topic_id");

                $rs = $mysqli->use_result();

                if (!$rs) {
                    echo "<br/>No results found!";
                } else {
                    while ($row = $rs->fetch_assoc()) {

                        $topic_name = $row['topic_name'];
                        $topic_by = $row['topic_by'];
                        $topic_id = $row['topic_id'];
                        $post_text = $row['post_text'];
                        $post_date = $row['post_date'];
                        $post_by = $row['post_by'];
                        $post_by_username = $row['username'];
                        ?>
                        <tr>
                            <td id="post_by_username"><?php echo $post_by_username ?></td>
                            <td><?php echo $post_text ?></td>
                            <td id="post_date"><?php echo $post_date ?></td>
                        </tr>
                        <?php
                    }
                }
            }
            ?>
        </table>
        <br/>Post a reply:
        <form action="new_post.php" method="post">
            Text <input type="text" name="reply_text"><br/>
            <input type="hidden" name= "topic_id" value="<?php echo $topic_id ?>">
            <input type="submit" name="post_reply" value="Post">
        </form>

        <p>
            <button onclick="location.href = 'forum-index.php';">Back to forum index</button>
        </p>

        <button onclick="location.href = 'service-index.php';">Back to start page</button>
    </body>
</html>
>>>>>>> origin/master
