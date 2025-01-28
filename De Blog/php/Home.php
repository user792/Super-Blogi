<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "markoblog";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: signin.php");
    exit;
}

// Get logged-in user's information0
$logged_in_user = $_SESSION['username'];

// Handle post submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['new_post'])) {
    $post_text = $conn->real_escape_string($_POST['new_post']);
    $user_id = $_SESSION['user_id'];
    $time = date('Y-m-d H:i:s');

    // Insert the post into the database
    $sql_add_post = "INSERT INTO post (text, id, time) VALUES ('$post_text', $user_id, '$time')";
    if ($conn->query($sql_add_post)) {
        header("Location: Home.php"); // Redirect to avoid re-submission
        exit;
    } else {
        echo "<p>Error adding post: " . $conn->error . "</p>";
    }
}

// Handle comment submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['comment_text'], $_POST['post_id'])) {
    $comment_text = $conn->real_escape_string($_POST['comment_text']);
    $post_id = (int)$_POST['post_id'];
    $user_id = $_SESSION['user_id'];
    $time = date('Y-m-d H:i:s');

    // Insert the comment into the database
    $sql_add_comment = "INSERT INTO comment (comment, postid, id, time) VALUES ('$comment_text', $post_id, $user_id, '$time')";
    if ($conn->query($sql_add_comment)) {
        header("Location: Home.php"); // Redirect to avoid re-submission
        exit;
    } else {
        echo "<p>Error adding comment: " . $conn->error . "</p>";
    }
}

// Fetch all posts
$sql_fetch_posts = "SELECT post.id AS post_id, post.text, post.time, users.Name
                    FROM post
                    JOIN users ON post.id = users.id
                    ORDER BY post.time DESC";
$result_posts = $conn->query($sql_fetch_posts);
?>
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
    <p>Logged in as: <strong><?= htmlspecialchars($logged_in_user) ?></strong></p>
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
    <?php if ($result_posts->num_rows > 0): ?>
        <?php while ($post = $result_posts->fetch_assoc()): ?>
            <div>
                <div class="pc">
                    <h2 class="post-head">Post by <?= htmlspecialchars($post['Name']) ?> at <?= date("Y-m-d H:i:s", strtotime($post['time'])) ?></h2>
                    <p class="post-text"><?= htmlspecialchars($post['text']) ?></p>

                    <!-- Display Comments for the Post -->
                    <h3>Comments</h3>
                    <?php
                    $post_id = $post['post_id'];
                    $sql_fetch_comments = "SELECT comment.comment, comment.time, users.Name
                                        FROM comment
                                        JOIN users ON comment.id = users.id
                                        WHERE comment.postid = $post_id
                                        ORDER BY comment.time ASC";
                    $result_comments = $conn->query($sql_fetch_comments);
                    ?>
                    <?php if ($result_comments->num_rows > 0): ?>
                        <ul class="commentsection">
                            <?php while ($comment = $result_comments->fetch_assoc()): ?>
                                <li class="comment">
                                    <strong><?= htmlspecialchars($comment['Name']) ?></strong>
                                    at <?= date("Y-m-d H:i:s", strtotime($comment['time'])) ?>: 
                                    <?= htmlspecialchars($comment['comment']) ?>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    <?php else: ?>
                        <p>No comments yet.</p>
                    <?php endif; ?>

                    <!-- Add a Comment -->
                    <form method="post" action="Home.php">
                        <textarea name="comment_text" placeholder="Write your comment here..." required></textarea><br>
                        <input type="hidden" name="post_id" value="<?= $post_id ?>">
                        <button type="submit">Add Comment</button>
                    </form>
                </div>
            </div>
            <hr>
        <?php endwhile; ?>
    <?php else: ?>
        <p>No posts available.</p>
    <?php endif; ?>
    </div>
<main>
<footer>
    <p>Super Marko Blogin sinulle tarjoaa BurntPotatoGames.OY</p>
</footer>
</body>
</html>
