<!DOCTYPE html>
<html>
<head>
    <title>Contact Us</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/stylemenu.css">
</head>
<body>

<?php
require 'admin/dbcon.php'; // Your database connection
?>

<header class="banner">
    <img src="images/logo.svg">  
    <div class="panel panel-nav">
        <center>
            <div class="dropdown"><button class="dropbtn"><a href="home1.php"><b>HOME</b></a></button></div>
            <div class="dropdown"><button class="dropbtn"><a href="admin/index1.html"><b>Login</b></a></button></div>
            <div class="dropdown"><button class="dropbtn"><a href="contactus.php"><b>Contact Us</b></a></button></div>
            <div class="dropdown">
				<button class="dropbtn"><A href=details.php ><B> Details </B></A></button>
				</div>
        </center>
    </div>
</header>

<main>
    <center>
    <h1>Contact Us</h1>
    <form method="POST" action="">
        <table width="50%" border="0" cellpadding="10">
            <tr>
                <td>Name:</td>
                <td><input type="text" name="cname" required></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="email" name="cemail" required></td>
            </tr>
            <tr>
                <td>Subject:</td>
                <td><input type="text" name="csubject" required></td>
            </tr>
            <tr>
                <td>Message:</td>
                <td><textarea name="ccomments" rows="5" cols="40" required></textarea></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="submit" value="Send Message">
                </td>
            </tr>
        </table>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $name = mysqli_real_escape_string($conn, $_POST['cname']);
        $email = mysqli_real_escape_string($conn, $_POST['cemail']);
        $subject = mysqli_real_escape_string($conn, $_POST['csubject']);
        $comments = mysqli_real_escape_string($conn, $_POST['ccomments']);

        $sql = "INSERT INTO tblcontactus_FL12733 (cname, cemail, csubject, ccomments) 
                VALUES ('$name', '$email', '$subject', '$comments')";

        if ($conn->query($sql) === TRUE) {
            echo "<p style='color:green;'>Thank you! Your message has been sent.</p>";
        } else {
            echo "<p style='color:red;'>Error: " . $conn->error . "</p>";
        }
    }
    ?>
    </center>
</main>

<footer>
    <center>Footer information</center>
</footer>

</body>
</html>
