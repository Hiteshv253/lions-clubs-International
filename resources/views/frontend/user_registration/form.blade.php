<!DOCTYPE html>
<html>
      <head>
            <title>Lions Club - Register Member</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
      </head>
      <body class="p-4">
            <div class="container">
                  <h2>Register New Lions Club Member</h2>

                  @if(session('success'))
                  <div class="alert alert-success">{{ session('success') }}</div>
                  @endif

                  <form action="{{ route('user.register') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                              <label>First Name</label>
                              <input type="text" name="first_name" class="form-control" required>
                              @error('first_name') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                              <label>Last Name</label>
                              <input type="text" name="last_name" class="form-control" required>
                              @error('last_name') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                              <label>Email Address</label>
                              <input type="email" name="email" class="form-control" required>
                              @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Register Member</button>
                  </form>
            </div>
      </body>
</html>
