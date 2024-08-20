<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Change Password</title>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2 class="text-center text-danger">Change Password</h2>
            <form id="changePasswordForm">
                @csrf
                <div class="form-group">
                    <label for="current_password">Current Password</label>
                    <input type="password" class="form-control" id="current_password" name="current_password" required>
                </div>
                <div class="form-group">
                    <label for="new_password">New Password</label>
                    <input type="password" class="form-control" id="new_password" name="new_password" required>
                </div>
                <div class="form-group">
                    <label for="new_password_confirmation">Confirm New Password</label>
                    <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" required>
                </div>
                <button type="submit" class="btn btn-warning btn-block">Change Password</button>
            </form>
            <p class="text-center mt-3"><a href="{{ route('login') }}" ></a></p>
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
            $('#changePasswordForm').on('submit', function(event) {
                event.preventDefault();

                $.ajax({
                    url: '/api/changePassword',  // Ensure the correct route is used
                    method: 'POST',  // Use POST method
                    data: $(this).serialize(),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        $('#success-message').text(response.message).show();
                        $('#error-message').hide();
                        $('#changePasswordForm')[0].reset();
                        
                        // Redirect to login page after 1 seconds
                setTimeout(function() {
                    window.location.href = '/api/';
                }, 1000);
                    },
                    error: function(xhr) {
                        let errors = xhr.responseJSON.errors;
                        let errorMessage = '';

                        if (errors) {
                            $.each(errors, function(key, value) {
                                errorMessage += value[0] + '<br>';
                            });
                        } else {
                            errorMessage = 'An error occurred while changing the password.';
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

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    <script>
 $(document).ready(function() {
    $('#changePasswordForm').on('submit', function(event) {
        event.preventDefault();

        $.ajax({
            url: 'changePassword',  // Ensure the correct route is used
            method: 'POST',  // Use POST method
            data: $(this).serialize(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('#success-message').text(response.message).show();
                $('#error-message').hide();
                $('#changePasswordForm')[0].reset();
            },
            error: function(xhr) {
                let errors = xhr.responseJSON.errors;
                let errorMessage = '';

                if (errors) {
                    $.each(errors, function(key, value) {
                        errorMessage += value[0] + '<br>';
                    });
                } else {
                    errorMessage = 'An error occurred while changing the password.';
                }

                $('#error-message').html(errorMessage).show();
                $('#success-message').hide();
            }
        });
    });
});

</script>


    </script>
</body>
</html>
