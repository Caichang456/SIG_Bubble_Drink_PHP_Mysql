<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<form action="login.php" method="POST">
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
						<input type="submit" name="btn_login" value="Login"><br>
						<a href="daftar_akun.php">Daftar</a><br>
						<a href="lupa_password.php">Lupa Password</a>
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>