$(document).ready(function() {
    $('#registrationType').change(function() {
        var type = $(this).val();
        $('.type-specific-fields').hide(); // Hide all sections
        if (type === 'children') {
            $('#childrenFields').show(); // Show children fields
        } else if (type === 'student') {
            $('#studentFields').show(); // Show student fields
        } else if (type === 'adult') {
            $('#adultFields').show(); // Show adult fields
        }
    });

    $('#registrationForm').on('submit', function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        console.log(formData); // Debugging: Check if the form data is correct

        $.ajax({
            url: "{{ url('api/applicant-register') }}",
            method: "POST",
            data: formData,
            beforeSend: function() {
                $('#registrationForm :input').prop('disabled', true);
            },
            success: function(response) {
                Swal.fire({
                    title: 'Success!',
                    text: 'Registration was successful!',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
                $('#registrationForm')[0].reset();
                $('#registrationForm :input').prop('disabled', false);
                $('.type-specific-fields').hide();
            },
            error: function(xhr) {
                Swal.fire({
                    title: 'Error!',
                    text: xhr.responseJSON.message,
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                $('#registrationForm :input').prop('disabled', false);
            }
        });
    });
});
