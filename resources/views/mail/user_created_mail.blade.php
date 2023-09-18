<!DOCTYPE html>
<html>
<head>
    <title>RapidX Notification</title>
</head>
<body>
   
    <center>
    <h2 style="padding: 23px;background: #b3deb8a1;border-bottom: 6px green solid;">
        <a href="http://rapidx/RapidX/">Login to RapidX</a>
    </h2>
    </center>
      
    <p>Good Day!,</p>
    <p>{{ $e_message }}</p>
    <p><b>Note! </b>This is just a test email for QUADS System Development. Please do not reply.</p>
    <p>ISS - Angelo Bautista</p>
    <br>
    <p>Your username : <strong>{{ $e_username }}</strong></p>
    <p>Your password : <strong>{{ $e_password }}</strong></p>
      
    <p>Thank you!</p>
  
</body>
</html>