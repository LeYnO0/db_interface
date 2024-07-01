<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: /');
}

require_once '../../../dbconnection.php';
$id = $_GET['id'];
$db_string = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM users WHERE id='$id'"));

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
            <form class="form" action="../../../app/controllers/EditUserController.php" method="post">

                <h3 class="form-title">Обновление данных</h3>
                <input type="hidden" name="id" value="<?= $db_string['id'] ?>">
                <input class="input" type="text" name="name" value="<?= $db_string['name'] ?>" placeholder="Name">
                <input class="input" type="text" name="surname" value="<?= $db_string['surname'] ?>" placeholder="Surname">
                <input class="input" type="text" name="gender" value="<?= $db_string['gender'] ?>" placeholder="Gender">
                <input class="input" type="text" name="birthday" value="<?= $db_string['birthday'] ?>" placeholder="Birthday YYYY-MM-DD">

                <button class="reg-btn" type="submit">Обновить</button>
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