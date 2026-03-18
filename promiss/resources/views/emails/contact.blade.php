<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novy dopyt</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.5; color: #111;">
    <h2>Novy dopyt z kontaktneho formulara</h2>

    <p><strong>Meno:</strong> {{ $data['name'] }}</p>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    <p><strong>Telefon:</strong> {{ $data['phone'] ?: '-' }}</p>
    <p><strong>Typ eventu:</strong> {{ $data['event_type'] }}</p>

    <h3>Sprava</h3>
    <p>{!! nl2br(e($data['message'])) !!}</p>
</body>
</html>
