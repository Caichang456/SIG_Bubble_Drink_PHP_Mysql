<!DOCTYPE html>
<html>
	<head>
		<title>Lupa Password</title>
		<link rel="stylesheet" type="text/css" href="bootstrap-4.5.3-dist/css/bootstrap.css">
		<script type="text/javascript" src="jquery-3.5.1.js"></script>
		<script type="text/javascript" src="bootstrap-4.5.3-dist/js/bootstrap.js"></script>
	</head>
	<body>
		<form method="POST" action="lupar.php">
			<h1>Lupa Akun</h1>
			<table>
				<tr>
					<td><input type="text" name="txt_email" placeholder="Email"></td>
				</tr>
				<tr>
					<td><input type="password" name="txt_password" placeholder="Password"></td>
				</tr>
				<tr>
					<td><input type="submit" value="Daftar" class="btn btn-primary"></td>
				</tr>
			</table>
		</form>
	</body>
</html>