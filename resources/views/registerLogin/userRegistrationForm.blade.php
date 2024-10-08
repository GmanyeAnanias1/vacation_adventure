<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" href="{{ asset('favicon_gpa.ico') }}" type="image/x-icon"/>
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
        .spinner-border {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-width: 20px;
            border-style: solid;
            border-color: #343a40;
            border-top-color: yellow;
            border-radius: 50%;
            width: 6rem;
            height: 6rem;
            animation: spin 1s linear infinite;
            z-index: 9999;
        }
        @keyframes spin {
            0% {
                transform: translate(-50%, -50%) rotate(0deg);
            }
            100% {
                transform: translate(-50%, -50%) rotate(360deg);
            }
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="form-container">
            <img src="{{ asset('images/gpa_logo.png') }}" alt="Logo" width="100" height="30" class="mr-2 rounded">
            <h2 class="text-center">Register</h2>
            <form id="registrationForm">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                </div>
                <button type="submit" class="btn btn-warning btn-block">Register</button>
                <p class="text-center mt-3">Already have an account? <a href="{{ route('login') }}" class="btn btn-danger">Login Here</a></p>
            </form>
        </div>
        <div class="spinner-border"></div>
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

            $('#registrationForm').on('submit', function(e) {
                e.preventDefault();
                $('.spinner-border').show();
                $('#registrationForm :input').prop('disabled', true);

                var formData = {
                    name: $('#name').val(),
                    email: $('#email').val(),
                    password: $('#password').val(),
                    password_confirmation: $('#password_confirmation').val(),
                };

                console.log("Submitting form data:", formData); // Debugging information

                $.ajax({
                    url: 'api/userRegister',
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        alert('Registration successful! Redirecting to login...');
                        window.location.href = "/";
                    },
                    error: function(xhr) {
                        alert('Registration failed: ' + xhr.responseText);
                        console.error('Error response:', xhr.responseText);
                    },
                    complete: function() {
                        $('.spinner-border').hide();
                        $('#registrationForm').find(':input').prop('disabled', false);
                    }
                });
            });
        });
    </script>
</body>
</html>
