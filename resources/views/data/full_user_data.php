<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: /');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../resources/css/full_user_data.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>User data</title>

</head>

<body>


    <div class="user-data">
        <p>id: <?= $_SESSION['user_data']['id'] ?></p>
        <p>name: <?= $_SESSION['user_data']['name'] ?></p>
        <p>surname: <?= $_SESSION['user_data']['surname'] ?></p>
        <p>gender: <?= $_SESSION['user_data']['gender'] ?></p>
        <p>birthday: <?= $_SESSION['user_data']['birthday'] ?></p>
    </div>

    <div class="container">
        <div class="row">
            <a href="../../../app/controllers/HomeredirectController.php" class="btn btn-warning btn-lg btn-block">На главную</a>
        </div>
    </div>
</body>

</html>