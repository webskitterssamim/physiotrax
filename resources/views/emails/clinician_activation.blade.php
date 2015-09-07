
Welcome to PhysioTrax,
<br><br>
Your clinician account was created by PhysioTrax Admin.

<br><br>
<strong>Login Access as below:</strong>
<br>
<string>Username/Email: </string> {{$email}}
<br>
<string>Password: </string> {{$password}}
<br><br>

To activate your account.<br>
Click the link below or open url in the browser.<br>
{{URL::route('clinician_verification',$token)}}

<br><br>
Thanks & Regards
<br>
PhysioTrax Team