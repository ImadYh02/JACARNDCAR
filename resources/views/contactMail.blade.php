<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h2>Hello</h2> <br><br>
You have got an email from : {{ $details['name'] }} <br><br>
User details: <br><br>
Name: {{ $details['name'] }} <br>
Email: {{ $details['email'] }} <br>
{{-- Phone: {{ $phone }} <br> --}}
Subject: {{ $details['subject'] }} <br>
Message: {{ $details['message'] }} <br><br>
Thanks
</body>
</html>
