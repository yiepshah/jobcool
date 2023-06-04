<?php include 'inc/header.php'; ?>

<?php
$userid =  $_SESSION['user_id'];//2310
$sql = "SELECT * FROM user WHERE user_id = '$userid'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume</title>
</head>
<body>
    <div class="container">
        <div class="card-body text-fluit">
        <iframe id="checkresume" width="100%" height="500px" src=<?php echo "./profile/resume/". $user['file_resume'];?> frameborder="0"></iframe><br><br>

</body>
</html>

<?php include 'inc/footer.php'; ?>