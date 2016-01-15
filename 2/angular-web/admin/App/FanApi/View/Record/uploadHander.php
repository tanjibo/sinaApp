<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	  <form method="post" action="{:U(MODULE_NAME.'/Record/uploadImg')}"  enctype="multipart/form-data" >
	  	<input type="file" name="video[]"> 
	  	<input type="file" name="video[]"> 
	  	<input type="submit" value="提交">
	  </form>
</body>
</html>