<!DOCTYPE html>
<html lang="fi">
<head>
    <link rel="icon" href="Markoblog.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Home</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .post {
            border: 1px solid #ccc;
            border-left: 3px solid #ccc;
            margin: 20px 0;
            padding: 10px;
            border-radius: 5px;
        }
        .comment {
            margin-left: 20px;
            border-left: 2px solid #ddd;
            padding-left: 10px;
            border-radius: 5px;
            background-color: rgb(250,250,250);
        }
    </style>
</head>
<body>

<h1>The Official Super Marko Brothers Blog site</h1>
<div>
        <table>
            <tr>
                <th>
                    <a href="#">koti</a>
                </th>
                <th>
                    <a href="##">login</a>
                </th>
                <th>
                    <a href="###">signup</a>
                </th>
            </tr>
        </table>
    </div>
<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = ""; // Change this according to your setup
$dbname = "markoblog";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch posts
$sql_posts = "SELECT post.id, post.text, post.time, users.Name FROM post JOIN users ON post.postid = users.id ORDER BY post.time DESC";
$result_posts = $conn->query($sql_posts);

if ($result_posts->num_rows > 0) {
    while ($row_post = $result_posts->fetch_assoc()) {
        echo "<div class='post'>";
        echo "<h2>Kirjoittanut " . htmlspecialchars($row_post['Name']) . " aikaan " . date("Y-m-d H:i:s", strtotime($row_post['time'])) . "</h2>";
        echo "<p>" . htmlspecialchars($row_post['text']) . "</p>";

        // Fetch comments for the current post
        $post_id = $row_post['id'];
        $sql_comments = "SELECT comment.comment, comment.time, users.Name FROM comment JOIN users ON comment.postid = users.id WHERE comment.postid = $post_id ORDER BY comment.time ASC";
        $result_comments = $conn->query($sql_comments);

        if ($result_comments->num_rows > 0) {
            while ($row_comment = $result_comments->fetch_assoc()) {
                echo "<div class='comment'>";
                echo "<p>Kommentoinut<strong> " . htmlspecialchars($row_comment['Name']) . "</strong> aikaan " . date("Y-m-d H:i:s", strtotime($row_comment['time'])) . "</p>";
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

</body>
</html>
