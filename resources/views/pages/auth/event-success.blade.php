<!DOCTYPE html>
<html>
<head>
    <title>Registration Successful</title>
    <meta http-equiv="refresh" content="5;url={{ route('event') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
        }
        .message {
            font-size: 20px;
            color: green;
            margin-bottom: 20px;
        }
        .spinner {
            margin: 20px auto;
            width: 40px;
            height: 40px;
            border: 5px solid rgba(0,0,0,0.1);
            border-top: 5px solid #28a745;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
    </style>
</head>
<body>

    <div class="message">
        {{ $message }}
    </div>

    <div class="spinner"></div>

    <p>You will be redirected in <span id="countdown">5</span> seconds.</p>

    <script>
        let seconds = 5;
        const countdown = document.getElementById('countdown');
        setInterval(() => {
            seconds--;
            if (seconds >= 0) {
                countdown.textContent = seconds;
            }
        }, 1000);
    </script>

</body>
</html>
