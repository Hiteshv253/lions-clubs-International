<!DOCTYPE html>
<html>
<head>
    <title>Event Registration Card</title>
    <style>
        .card {
            width: 350px;
            border: 2px solid #000;
            padding: 20px;
            font-family: Arial, sans-serif;
            text-align: center;
        }
        .qr-code {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="card">
        <h2>Event Registration Card</h2>
        <p><strong>Name:</strong> {{ $user->first_name }} {{ $user->last_name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>

        <div class="qr-code">
            <img src="data:image/png;base64,{{ $qrCodeBase64 }}" alt="QR Code">
        </div>

        <p>Show this QR code at the event entrance.</p>
    </div>
</body>
</html>
