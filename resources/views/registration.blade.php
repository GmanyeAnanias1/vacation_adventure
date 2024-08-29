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
                                    <input type="text" class="form-control" id="wardsName" name="wards_name" placeholder="Enter ward's name">
                                </div>
                                <div class="form-group">
                                    <label for="wardSchool">School of Your Ward</label>
                                    <input type="text" class="form-control" id="wardSchool" name="ward_school" placeholder="Enter ward's school">
                                </div>
                                <div class="form-group">
                                    <label for="wardAge">Age of Your Ward</label>
                                    <input type="number" class="form-control" id="wardAge" name="ward_age" placeholder="Enter ward's age">
                                </div>
                                <h5 class="text-center text-danger">Parent/Guardian</h5>
                                <div class="form-group">
                                    <label for="parentsName">Parent's Name</label>
                                    <input type="text" class="form-control" id="parentsName" name="parents_name" placeholder="Enter parent's name">
                                </div>
                                <div class="form-group">
                                    <label for="location">Location</label>
                                    <input type="text" class="form-control" id="location" name="location" placeholder="Enter location">
                                </div>
                            </div>

                            <!-- Student fields -->
                            <div id="studentFields" class="type-specific-fields">
                                <h5 class="text-center text-danger">Student Details</h5>
                                <div class="form-group">
                                    <label for="studentFirstName">First Name</label>
                                    <input type="text" class="form-control" id="studentFirstName" name="first_name" placeholder="Enter first name">
                                </div>
                                <div class="form-group">
                                    <label for="studentMiddleName">Middle Name</label>
                                    <input type="text" class="form-control" id="studentMiddleName" name="middle_name" placeholder="Enter middle name">
                                </div>
                                <div class="form-group">
                                    <label for="studentLastName">Last Name</label>
                                    <input type="text" class="form-control" id="studentLastName" name="last_name" placeholder="Enter last name">
                                </div>
                                <div class="form-group">
                                    <label for="studentSchool">Your School</label>
                                    <input type="text" class="form-control" id="studentSchool" name="school" placeholder="Enter your school">
                                </div>
                                <div class="form-group">
                                    <label for="studentProgram">Program</label>
                                    <input type="text" class="form-control" id="studentProgram" name="program" placeholder="Enter your program">
                                </div>
                            </div>

                            <!-- Adult fields -->
                            <div id="adultFields" class="type-specific-fields">
                                <h5 class="text-center text-danger">Adult Details</h5>
                                <div class="form-group">
                                    <label for="adultFirstName">First Name</label>
                                    <input type="text" class="form-control" id="adultFirstName" name="first_name" placeholder="Enter first name">
                                </div>
                                <div class="form-group">
                                    <label for="adultMiddleName">Middle Name</label>
                                    <input type="text" class="form-control" id="adultMiddleName" name="middle_name" placeholder="Enter middle name">
                                </div>
                                <div class="form-group">
                                    <label for="adultLastName">Last Name</label>
                                    <input type="text" class="form-control" id="adultLastName" name="last_name" placeholder="Enter last name">
                                </div>
                                <div class="form-group">
                                    <label for="profession">Profession</label>
                                    <input type="text" class="form-control" id="profession" name="profession" placeholder="Enter profession">
                                </div>
                                <div class="form-group">
                                    <label for="industry">Industry</label>
                                    <input type="text" class="form-control" id="industry" name="industry" placeholder="Enter industry">
                                </div>
                            </div>

                            <!-- Common fields -->
                            <div class="form-group">
                                <label for="phoneNumber">Phone Number</label>
                                <input type="tel" class="form-control" id="phoneNumber" name="phone_number" placeholder="Enter phone number" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
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
        // Hide all type-specific fields initially
        $('.type-specific-fields').hide();

        // Handle registration type change
        $('#registrationType').change(function() {
            var type = $(this).val();

            // Hide all type-specific fields
            $('.type-specific-fields').hide();

            // Clear previous input values to avoid unwanted submission
            $('.type-specific-fields input').val('');

            // Show the selected type's fields
            $('#' + type + 'Fields').show();

            // Reset required attributes for all fields
            $('.type-specific-fields input').prop('required', false);

            // Set required attributes for the selected type
            $('#' + type + 'Fields input:not([name="middle_name"])').prop('required', true);
        });

        // Trigger change event to set required fields correctly on initial load
        $('#registrationType').trigger('change');

        $('#registrationForm').on('submit', function(e) {
            e.preventDefault();

            // Validate required fields
            var isValid = true;
            $(this).find('input:required, select:required').each(function() {
                if ($(this).val() === '') {
                    isValid = false;
                    $(this).addClass('is-invalid');
                } else {
                    $(this).removeClass('is-invalid');
                }
            });

            if (!isValid) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Please fill in all required fields.',
                });
                return;
            }

            // Prepare form data
            var formData = new FormData();

            // Append only visible input fields to formData
            $(this).find('input:visible, select:visible').each(function() {
                formData.append($(this).attr('name'), $(this).val());
            });

            // Add the registration type to the form data
            formData.append('registration_type', $('#registrationType').val());

            // Send AJAX request
            $.ajax({
                url: 'api/applicant-register',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Form has been submitted successfully.',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Reset the form
                            $('#registrationForm')[0].reset();
                            // Hide all type-specific fields
                            $('.type-specific-fields').hide();
                        }
                    });
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'An error occurred while submitting the form. Please try again.',
                    });
                    console.error(xhr.responseText);
                }
            });
        });
    });
    </script>
</body>
</html>
