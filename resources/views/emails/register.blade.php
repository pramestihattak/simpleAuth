<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Email</title>
</head>
<body>

Hello {{ $name }} thanks for registering! <br><br>

<br><br>
Please click the link to verify your registration 
<a href="{{ url('/registration/activate/'. $code) }}">
{{ url('/registration/activate/'. $code) }}
</a><br><br><br><br><br>


Cheers,<br><br>

<p style="color:red;">Team.</p>
</body>
</html>


