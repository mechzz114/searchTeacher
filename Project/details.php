<!DOCTYPE html>
<html>
<head>
    <title>University Details</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/stylemenu.css">
</head>
<body>

<?php
require 'admin/dbcon.php';
?>

<header class="banner">
    <img src="images/logo.svg">
    <div class="panel panel-nav">
        <center>
            <div class="dropdown"><button class="dropbtn"><a href="home1.php"><b>HOME</b></a></button></div>
            <div class="dropdown"><button class="dropbtn"><a href="admin/index1.html"><b>Login</b></a></button></div>

            <div class="dropdown"><button class="dropbtn"><a href="contactus.php"><b>Contact Us</b></a></button></div>
        </center>
    </div>
</header>

<main>
    <center>
    <h1>Exploring the Future of Education</h1>
    <p><i>Published by University Insight</i></p>
    <div style="width:70%; text-align:left;">
        <p>Universities are at the forefront of innovation, research, and shaping tomorrow’s leaders. With the evolution of digital learning, AI-assisted teaching, and international collaborations, the academic world is experiencing a paradigm shift.</p>

        <p>Institutions are integrating technology, sustainability, and community engagement in new ways to prepare students not just for jobs, but for creating a meaningful impact in the world.</p>

        <p>What do you think about the role of universities in 2030? Share your thoughts below.</p>
    </div>

    <hr style="width:70%;">

    <h2>Leave a Comment</h2>
    <form method="POST" action="">
        <table width="60%" border="0" cellpadding="10">
            <tr>
                <td>Name (optional):</td>
                <td><input type="text" name="cname"></td>
            </tr>
            <tr>
                <td>Comment:</td>
                <td><textarea name="cmessage" rows="5" cols="50" required></textarea></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="submit_comment" value="Post Comment">
                </td>
            </tr>
        </table>
    </form>

<?php
// Handle form submission
if (isset($_POST['submit_comment'])) {
    $cname = mysqli_real_escape_string($conn, $_POST['cname']);
    $cmessage = mysqli_real_escape_string($conn, $_POST['cmessage']);

    // Use 'Anonymous' if name is empty
    if (empty($cname)) {
        $cname = "Anonymous";
    }

    $sql = "INSERT INTO tblcomments_FL12733 (cname, cmessage, capproved)
            VALUES ('$cname', '$cmessage', 0)";

    if ($conn->query($sql) === TRUE) {
        echo "<p style='color:green;'>Your comment has been submitted for review.</p>";
    } else {
        echo "<p style='color:red;'>Error: " . $conn->error . "</p>";
    }
}
?>

    <hr style="width:70%;">
    <h2>Comments</h2>
    <div style="width:70%; text-align:left;">

<?php
$sql = "SELECT cname, cdate, cmessage FROM tblcomments_FL12733 
        WHERE capproved = 1 ORDER BY cdate DESC";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div style='border-bottom:1px solid #ccc; margin-bottom:15px;'>";
        echo "<strong>" . htmlspecialchars($row['cname']) . "</strong> ";
        echo "<em>on " . date("F j, Y", strtotime($row['cdate'])) . "</em><br>";
        echo "<p>" . nl2br(htmlspecialchars($row['cmessage'])) . "</p>";
        echo "</div>";
    }
} else {
    echo "<p>No comments yet.</p>";
}
$conn->close();
?>
    </div>
    </center>
</main>

<footer>
    <center>Footer information</center>
</footer>

</body>
</html>
