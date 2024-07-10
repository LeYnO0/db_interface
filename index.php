<?php
//in each component start a session to work with globals arrays
session_start();
//check for authorized admin. this check happens on every page
//to differentiate access between authorized and unauthorized admins so that
//an authorized admin cannot go to the registration and authorization page and vice versa.
//cannot go to the registration and authorization page and vice versa, so that an unauthorized admin
//cannot view and modify user data
if (isset($_SESSION['admin'])) {
	//redirect if admin is authorized
	header('Location: resources/views/data/preview_data.php');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="resources/css/index.css">

	<title>Register</title>
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
				//checking for the existence of a session error message
				if (isset($_SESSION['message'])) {
					echo '<p class="msg">' . $_SESSION['message'] . '</p>';
				}
				//its removal after a page reload
				unset($_SESSION['message']);
				?>
			</form>
		</div>
	</div>

</body>

</html>