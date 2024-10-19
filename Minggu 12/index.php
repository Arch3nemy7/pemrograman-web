<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="styles/styles.css">
	<title>Document</title>
</head>

<body>
	<div class="container">
		<div class="info">
			<h2>Upload File</h2>
		</div>
		<div class="input">
			<form enctype="multipart/form-data" method="post" action="upload2.php">
				<input type="file" name="userfile"><br>
				<input class="button" type="submit" name="upload" value="Upload">
			</form>
		</div>
	</div>
</body>

</html>