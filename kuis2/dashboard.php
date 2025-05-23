<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

include 'connection.php';

$username = $_SESSION['user'];
$query = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

if (!$user) {
    $user = [
        'username' => $username,
        'photo' => 'default-profile.png'
    ];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body style="background-color:gray;">

<div style="background:black;;">
    <b>MyApp</b>
    <span style="float:right;">
        <img src="<?php echo $user['photo']; ?>" style="width:30px;height:30px;">
        <?php echo $user['username']; ?>
        <button onclick="window.location='logout.php'" style="margin-left:10px;">Logout</button>
    </span>
</div>

<h2 style="margin:20px;">Halo <?php echo $user['username']; ?></h2>
<p style="margin:20px;">Ini dashboard kamu.</p>

</body>
</html>
