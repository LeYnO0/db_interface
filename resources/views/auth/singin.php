<?php

session_start();

if(isset($_SESSION['admin'])){
	header('Location: ../../resources/views/data/main_data.php');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/index.css">
    <title>Авторизация</title>
</head>
<body>

	<div class="main">  	
			<div class="signup">
				<form action="../../../app/controllers/AuthController.php" method="post">
					<label>Авторизация</label>
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="password" placeholder="Password" required="">
					<button>Войти</button>
					<p class="issue">Нет аккаунта?<a href="../../../index.php">Зарегестрироваться</a></p>
					<?php
						if(isset($_SESSION['message'])){
							echo '<p class="msg">' . $_SESSION['message'] . '</p>';
						}
						unset($_SESSION['message']);
					?>
				</form>
			</div>
	</div>

</body>
</html>