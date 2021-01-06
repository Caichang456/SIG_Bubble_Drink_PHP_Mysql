<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="bootstrap-4.5.3-dist/css/bootstrap.css">
		<script type="text/javascript" src="jquery-3.5.1.js"></script>
		<script type="text/javascript" src="bootstrap-4.5.3-dist/js/bootstrap.js"></script>
	</head>
	<body>
		<form name="form_login" action="login.php" method="POST" onsubmit="return validasi()">
			<h1>Login</h1>
			<table>
				<tr>
					<td><input type="email" name="txt_email" placeholder="Email"></td>
				</tr>
				<tr>
					<td><input type="password" name="txt_password" placeholder="Password"></td>
				</tr>
				<tr>
					<td>
						<input class="btn btn-primary" type="submit" name="btn_login" value="Login"><br><br>
						<a class="btn btn-primary" href="daftar_akun.php">Daftar</a><br>
						<a class="btn btn-danger"href="lupa_password.php">Lupa Password</a>
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>