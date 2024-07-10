<?php

session_start();

require_once '../../../dbconnection.php';

if (!isset($_SESSION['admin'])) {
    header('Location: /');
}

$full_data = mysqli_query($connect, "SELECT * FROM users");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../resources/css/preview_data.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>DB Data</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col">
                <table id="table" class="table">
                    <thead>
                        <tr class="main-col">
                            <th data-type="number">ID</th>
                            <th data-type="string"> Name</th>
                            <th data-type="string">Surname</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($full_data) {
                            foreach ($full_data as $string) { ?>
                                <!--loop through each line of the sample-->
                                <tr class="string">
                                    <!-- form a table from the data obtained by selecting all users. Put the data in the tag a -->
                                    <td><a><?= $string['id'] ?></a></td>
                                    <td><a class="name"><?= $string['name'] ?></a></td>
                                    <td><a class="surname"><?= $string['surname'] ?></a></td>
                                    <!-- in this and the following tags it is necessary to pass user id in the get-parameter to work with them in third-party controllers -->
                                    <td><a class="btn btn-outline-info btn-sm" href="../../../app/controllers/ShowUserController.php?id=<?= $string['id'] ?>">Подробнее</a></td>
                                    <td><a class="btn btn-outline-success btn-sm" href="../../views/data/edit_data.php?id=<?= $string['id'] ?>">Изменить</a></td>
                                    <td><a class="btn btn-outline-danger btn-sm" href="../../../app/controllers/DeleteUserController.php?id=<?= $string['id'] ?>">Удалить</a></td>
                                </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <a href="add_user.php" class="btn btn-primary btn-lg btn-block">Добавить пользователя</a>
        </div>
    </div>

    <div class="exit-button">
        <div class="container">
            <div class="row">
                <a href="../../../app/controllers/LogoutController.php" class="btn btn-warning btn-lg btn-block">Выйти</a>
            </div>
        </div>
    </div>

    <script src="../../js/table_sorter.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>