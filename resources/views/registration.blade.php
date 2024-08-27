<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vacation Adventure || Registration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .type-specific-fields {
            display: none;
        }

        .form-container {
            display: flex;
            align-items: stretch;
        }

        .form-image {
            width: 100%;
            height: 60rem;
            object-fit: cover;
            margin-top: 1rem;
        }

        .form-wrapper {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        }

        .form-group input {
            width: 100%;
            height: 3rem;
            margin-bottom: 15px;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-group input:hover {
            border-color: red;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row form-container mt-2">
                    <div class="col-md-6">
                        <img src="{{ asset('images/form.jpg') }}" alt="Vacation Adventure" class="form-image">
                    </div>
                    <div class="form-wrapper col-md-6">
                        <form id="registrationForm">
                            @csrf
                            <h4 class="my-4 text-center text-danger">GPA Registration Form</h4>

                            <div class="form-group">
                                <label for="registrationType">Registration Type</label>
                                <select name="registration_type" id="registrationType" class="form-control" required>
                                    <option value="" disabled selected>Select registration type</option>
                                    <option value="children">Children</option>
                                    <option value="student">Student</option>
                                    <option value="adult">Adult</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="course">Choose a course:</label>
                                <select name="course_name" id="course" class="form-control" required>
                                    <option value="" disabled selected>Select a course</option>
                                    @foreach($courses as $course)
                                    <option value="{{ $course->course_name }}">{{ $course->course_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Children fields -->
                            <div id="childrenFields" class="type-specific-fields">
                                <h5 class="text-center text-danger">Child Details</h5>

                                <div class="form-group">
                                    <label for="wardsName">Ward's Name</label>
                                    <input type="text" class="form-control" id="wardsName" name="wards_name"
                                        placeholder="Enter ward's name">
                                </div>
                                <div class="form-group">
                                    <label for="wardSchool">School of Your Ward</label>
                                    <input type="text" class="form-control" id="wardSchool" name="ward_school"
                                        placeholder="Enter ward's school">
                                </div>
                                <div class="form-group">
                                    <label for="wardAge">Age of Your Ward</label>
                                    <input type="number" class="form-control" id="wardAge" name="ward_age"
                                        placeholder="Enter ward's age">
                                </div>
                                <h5 class="text-center text-danger">Parent/Guardian</h5>
                                <div class="form-group">
                                    <label for="parentsName">Parent's Name</label>
                                    <input type="text" class="form-control" id="parentsName" name="parents_name"
                                        placeholder="Enter parent's name">
                                </div>
                                <div class="form-group">
                                    <label for="location">Location</label>
                                    <input type="text" class="form-control" id="location" name="location"
                                        placeholder="Enter location">
                                </div>
                            </div>

                            <!-- Student-specific fields -->
                            <div id="studentFields" class="type-specific-fields">
                                <h5 class="text-center text-danger">Student Details</h5>

                                <div class="form-group">
                                    <label for="firstName">First Name</label>
                                    <input type="text" class="form-control" id="firstName" name="first_name"
                                        placeholder="Enter first name">
                                </div>
                                <div class="form-group">
                                    <label for="middleName">Middle Name</label>
                                    <input type="text" class="form-control" id="middleName" name="middle_name"
                                        placeholder="Enter middle name">
                                </div>
                                <div class="form-group">
                                    <label for="lastName">Last Name</label>
                                    <input type="text" class="form-control" id="lastName" name="last_name"
                                        placeholder="Enter last name">
                                </div>
                                <div class="form-group">
                                    <label for="studentSchool">Your School</label>
                                    <input type="text" class="form-control" id="studentSchool" name="school"
                                        placeholder="Enter your school">
                                </div>
                                <div class="form-group">
                                    <label for="program">Program</label>
                                    <input type="text" class="form-control" id="program" name="program"
                                        placeholder="Enter your program">
                                </div>
                            </div>

                            <!-- Adult-specific fields -->
                            <div id="adultFields" class="type-specific-fields">
                                <h5 class="text-center text-danger">Adult Details</h5>

                                <div class="form-group">
                                    <label for="adultFirstName">First Name</label>
                                    <input type="text" class="form-control" id="adultFirstName" name="first_name"
                                        placeholder="Enter first name">
                                </div>
                                <div class="form-group">
                                    <label for="adultMiddleName">Middle Name</label>
                                    <input type="text" class="form-control" id="adultMiddleName" name="middle_name"
                                        placeholder="Enter middle name">
                                </div>
                                <div class="form-group">
                                    <label for="adultLastName">Last Name</label>
                                    <input type="text" class="form-control" id="adultLastName" name="last_name"
                                        placeholder="Enter last name">
                                </div>
                                <div class="form-group">
                                    <label for="profession">Profession</label>
                                    <input type="text" class="form-control" id="profession" name="profession"
                                        placeholder="Enter profession">
                                </div>
                                <div class="form-group">
                                    <label for="industry">Industry</label>
                                    <input type="text" class="form-control" id="industry" name="industry"
                                        placeholder="Enter industry">
                                </div>
                            </div>

                            <!-- Common fields -->
                            <div class="form-group">
                                <label for="phoneNumber">Phone Number</label>
                                <input type="tel" class="form-control" id="phoneNumber" name="phone_number"
                                    placeholder="Enter phone number">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter email">
                            </div>

                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-warning w-100 fw-60">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            // Handle registration type change
            $('#registrationType').change(function() {
                var type = $(this).val();
                $('.type-specific-fields').hide();
                if (type === 'children') {
                    $('#childrenFields').show();
                } else if (type === 'student') {
                    $('#studentFields').show();
                } else if (type === 'adult') {
                    $('#adultFields').show();
                }
            });

            // Handle form submission
            $('#registrationForm').on('submit', function(e) {
                e.preventDefault();
                var formData = $(this).serialize();

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
                        }).then(() => {
                            $('#registrationForm')[0].reset();
                            $('.type-specific-fields').hide();
                        });
                    },
                    error: function(xhr) {
                        $('#registrationForm :input').prop('disabled', false);
                        if (xhr.status === 422) {
                            var errors = xhr.responseJSON.errors;
                            var errorMessages = '';
                            $.each(errors, function(key, messages) {
                                $.each(messages, function(index, message) {
                                    errorMessages += message + '<br>';
                                });
                            });
                            Swal.fire({
                                title: 'Error!',
                                html: errorMessages,
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        } else {
                            Swal.fire({
                                title: 'Error!',
                                text: 'Something went wrong. Please try again later.',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>
