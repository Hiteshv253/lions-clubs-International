<!DOCTYPE html>
<html>
<head>
    <title>Registration Successful</title>
    <meta http-equiv="refresh" content="5;url={{ route('home') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
        }
        .message {
            font-size: 20px;
            color: green;
        }
        .spinner {
            margin: 30px auto;
            width: 50px;
            height: 50px;
            border: 6px solid #f3f3f3;
            border-top: 6px solid #28a745;
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
