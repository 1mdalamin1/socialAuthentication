<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notification</title>
</head>
<body>
<h1>Hi... {{ $user->name }}</h1>
<table style="border: 1px;">
    <tr>
        <th>Email:</th>
        <td>{{ $user->email }} </td>
    </tr>
</table>

</body>
</html>
