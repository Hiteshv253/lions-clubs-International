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
            </style>
      </head>
      <body>

            <div class="message">
                  {{ $message }}
            </div>

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
