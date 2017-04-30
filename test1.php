<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="test1.php" enctype='multipart/form-data' method='post'>
		<input type="file" name="upload" id="">
		<input type="text" name='aaa'>
		<input type="submit" value="提交">
	</form>
</body>
</html>
<?php
require_once('init.inc.php');
if(isset($_FILES)){
	$file = new FileUpload('upload',6000);
	echo $file->getPath();
}

?>