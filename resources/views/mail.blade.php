<div style="background: rgb(247, 247, 247);border-radius: 10px;border: 1px solid black;text-align: center;padding: 30px;width: 50%;margin: auto;">
<h1>Reset Password</h1>
<p style="font-size: 20px;font-weight: 600">Hello mr {{ $data_user[0]['name'] }}</p>
<p> Please type the following code in the verification field
      to be able to change the password</p>
<div style="padding: 15px; background: black; border-radius: 3px; color: white;width: fit-content;margin: auto">{{ $token }}</div>
</div>
