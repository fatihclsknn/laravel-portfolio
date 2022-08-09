<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

</head>
<body>
<h1> {{$contact_message->name}} tarafından yeni bir mesaj gönderildi</h1>
<ul>
    <li>İsim : {{$contact_message->name}}</li>
    <li>Kullancının email : {{$contact_message->email}}</li>
    <li>Mesajın Konusu : {{$contact_message->subject}}</li>
    <li>Mesajın İçeriği : {{$contact_message->message}}</li>
</ul>

</body>
</html>


