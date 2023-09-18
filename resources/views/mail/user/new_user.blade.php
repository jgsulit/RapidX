<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		body{
			font-family: Arial;
			font-size: 18px;
		}
	</style>
</head>
<body>
	<center>
		<img src="{{ asset('public/images/RAPIDX LOGO.PNG') }}" style="max-width: 300px;">
		<br><br>

		<label>Hi {{ $user_info->name }},</label><br><br><br>
		<label>Here's your RapidX account:</label><br><br>
		<label>Username: <b>{{ $e_username }}</b></label><br><br>
		<label>Password: <b>{{ $e_password }}</b> </label><br><br>
		<br><br>

		<a href="http://rapidx/">Click here to login in RapidX</a>
	</center>

	<label style="font-size: 16px;"><strong>Notice of Disclaimer:</strong></label>
	<br>
	<label style="font-size: 16px;">
		This message (including any attachments) contains confidential information intended for a specific individual and purpose, and is protected by law. If you are not the intended recipient, you should delete this message. Any disclosure, copying, or distribution of this message, or the taking of any action based on it, is strictly prohibited.   
	</label>
</body>
</html>