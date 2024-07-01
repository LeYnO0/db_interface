<?php
session_start();
require_once '../../../dbconnection.php';
if (!isset($_SESSION['admin'])) {
    header('Location: /');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../../../resources/css/edit_data.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
</head>

<body>
    <main>
        <div class="container">
            <form class="form" action="../../../app/controllers/AddUserController.php" method="post">

                <h3 class="form-title">Создание пользователя</h3>
                <input class="input" type="text" name="name" placeholder="Name">
                <input class="input" type="text" name="surname" placeholder="Surname">
                <input class="input" type="text" name="gender" placeholder="Gender">
                <input class="input" type="text" name="birthday" placeholder="Birthday YYYY-MM-DD">
                <input class="input" type="password" name="password" placeholder="Password">

                <button class="reg-btn" type="submit">Добавить</button>
                <button class="clear-btn" type="reset">Очистить форму</button>
                <a class="home-button" href="../data/preview_data.php">На главную</a>

            </form>
        </div>
    </main>

    <div class="message">
        <?php
        if (isset($_SESSION['message'])) {
            echo '<p class="error-msg">' . $_SESSION['message'] . '</p>';
        }
        unset($_SESSION['message']);
        ?>
    </div>

</body>

</html>