<!DOCTYPE html>
<html lang="fi">
<head>
    <link rel="icon" href="../Markoblog.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Home</title>
    <link rel="stylesheet" href="../CSS/Home.css">
</head>
<body>
<header>
    <h1>The Official <br> Super Marko Brothers <br> Blog site</h1>
    <div class="nav">
            <table>
                <tr>
                    <th>
                        <a class="nav-button" href="./Home.php">koti</a>
                    </th>
                    <th>
                        <a class="nav-button" href="./index.php">login</a>
                    </th>
                    <th>
                        <a class="nav-button" href="./newaccount.php">signup</a>
                    </th>
                </tr>
            </table>
        </div>
</header>
<main>
    <div class="blog">
        <?php
        // Database connection
        $servername = "localhost";
        $username = "root";
        $password = ""; 
        $dbname = "markoblog";

        $conn = new mysqli($servername, $username, $password, $dbname);


        // Fetch posts
        $sql_posts = "SELECT post.id, post.text, post.time, users.Name FROM post JOIN users ON post.postid = users.id ORDER BY post.time DESC";
        $result_posts = $conn->query($sql_posts);

        if ($result_posts->num_rows > 0) {
            while ($row_post = $result_posts->fetch_assoc()) {
                echo "<div class='post'>";
                echo "<h2>Kirjoittanut " . htmlspecialchars($row_post['Name']) . " aikaan </h2>";
                echo "<p>" . date("Y-m-d H:i:s", strtotime($row_post['time'])) . "<p>";
                echo "<p>" . htmlspecialchars($row_post['text']) . "</p>";

                // Fetch comments for the current post
                $post_id = $row_post['id'];
                $sql_comments = "SELECT comment.comment, comment.time, users.Name FROM comment JOIN users ON comment.postid = users.id WHERE comment.postid = $post_id ORDER BY comment.time ASC";
                $result_comments = $conn->query($sql_comments);

                if ($result_comments->num_rows > 0) {
                    while ($row_comment = $result_comments->fetch_assoc()) {
                        echo "<div class='comment'>";
                        echo "<p>Kommentoinut<strong> " . htmlspecialchars($row_comment['Name']) . "</strong> aikaan " . "<br>".date("Y-m-d H:i:s", strtotime($row_comment['time'])) . "</p>";
                        echo "<p>" . htmlspecialchars($row_comment['comment']) . "</p>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>No comments yet.</p>";
                }

                echo "</div>";
            }
        } else {
            echo "<p>No posts available.</p>";
        }

        $conn->close();
        ?>
    </div>
<main>
<footer>
    <p>Super Marko Blogin sinulle tarjoaa BurntPotatoGames.OY</p>
</footer>
</body>
</html>
