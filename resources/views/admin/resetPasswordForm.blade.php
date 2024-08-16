



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-container {
            max-width: 400px;
            height: 300px;
            margin: 100px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <form id="resetPasswordForm">
                @csrf

                <div class="form-group">
                    <p class="text-danger text-bold text-center">"Please provide the email address where you would like to receive the password reset link.
                    </p>
                    <label for="email" class="mt-4">Email Address</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-warning btn-block">Send Password Reset Link</button>
            </form>
            <div id="success-message" class="alert alert-success mt-3" style="display: none;"></div>
            <div id="error-message" class="alert alert-danger mt-3" style="display: none;"></div>
        </div>
    </div>

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#resetPasswordForm').on('submit', function(event) {
                event.preventDefault();

                $.ajax({
                    url: '/api/resetPassword',
                    method: 'POST',
                    data: $(this).serialize(),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        $('#success-message').text(response.message || 'Password reset link sent to your email!').show();
                        $('#error-message').hide();
                        $('#resetPasswordForm')[0].reset();
                    },
                    error: function(xhr) {
                        let errors = xhr.responseJSON.errors;
                        let errorMessage = '';

                        if (errors) {
                            $.each(errors, function(key, value) {
                                errorMessage += value[0] + '<br>';
                            });
                        } else {
                            errorMessage = 'An error occurred while sending the password reset link.';
                        }

                        $('#error-message').html(errorMessage).show();
                        $('#success-message').hide();
                    }
                });
            });
        });
    </script>
</body>
</html>
