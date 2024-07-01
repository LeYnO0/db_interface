<?php 
	session_start();

	if(isset($_SESSION['admin'])){
		header('Location: resources/views/data/preview_data.php');
	}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="resources/css/index.css">
	
    <title>Регистрация</title>
</head>
<body>

	<div class="main">  	
			<div class="signup">
				<form action="app/controllers/RegisterController.php" method="post">
					<label>Регистрация</label>
					<input type="text" name="login" placeholder="Login" required="">
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="password" placeholder="Password" required="">
					<button>Зарегестрироваться</button>

					<p class="issue">Уже есть аккаунт? - <a href="resources/views/auth/singin.php">Войти</a></p>

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