<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .form-container {
            max-width: 500px;
            margin: 0 auto;
            padding: 40px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="form-container">
            <img src="{{ asset('images/gpa_logo.png') }}" alt="Logo" width="100" height="30" class="mr-2 rounded">
            <h2 class="text-center">Login</h2>
            <form id="loginForm">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-warning btn-block">Login</button>
                <p class="text-center mt-3">Don't have an account? <a href="{{ route('register') }}" class="btn btn-danger">Register Here</a></p>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#loginForm').on('submit', function(e) {
                e.preventDefault();

                // Prepare form data including CSRF token
                var formData = {
                    email: $('#email').val(),
                    password: $('#password').val(),
                    _token: $('meta[name="csrf-token"]').attr('content') // Include CSRF token
                };

                console.log("Submitting form data:", formData); // Debugging information

                $.ajax({
                    url: '/api/login',
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        alert('Login successful! Redirecting to Admin Dashboard...');
                        window.location.href = "/api/admin/dashboard"; // Correct URL for redirection
                    },
                    error: function(xhr) {
                        alert('Login failed: ' + xhr.responseText);
                        console.error('Error response:', xhr.responseText);
                    },
                    complete: function() {
                        $('#loginForm').find(':input').prop('disabled', false);
                    }
                });
            });
        });
    </script>
</body>
</html>
