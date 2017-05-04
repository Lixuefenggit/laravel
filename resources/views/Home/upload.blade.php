<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action='/Home/userinfo/upload/{{ $ob->id }}' method='post' enctype="multipart/form-data">
		{{ csrf_field() }}
		<input type="file" name="head">
		<input type="submit"  value="上传">
	</form>
</body>
</html>