<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vacation Adventure || Registration</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Include SweetAlert -->
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
      width: 460px;
      height: 1000px;
      object-fit: cover;
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
      outline: red;
    }

    .type-specific-fields {
      display: none;
    }
  </style>
</head>

<body>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-10">
          <div class="row form-container">
            <div class="col-md-6">
              <img src="{{ asset('images/form.jpg') }}" alt="Vacation Adventure" class="form-image">
            </div>
            <div class="form-wrapper col-md-6">
              <form id="registrationForm">
                @csrf
                <h4 class="my-4 text-center text-danger">Vacation Adventure Registration Form</h4>

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

                <!-- Children fields (original fields) -->
                <div id="childrenFields" class="type-specific-fields">
                  <div class="form-group">
                    <label for="parentsName">Parent's Name</label>
                    <input type="text" class="form-control" id="parentsName" name="parents_name" placeholder="Enter parent's name">
                  </div>
                  <div class="form-group">
                    <label for="wardsName">Ward's Name</label>
                    <input type="text" class="form-control" id="wardsName" name="wards_name" placeholder="Enter ward's name">
                  </div>
                  <div class="form-group">
                    <label for="wardAge">Age of Your Ward</label>
                    <input type="number" class="form-control" id="wardAge" name="ward_age" placeholder="Enter ward's age">
                  </div>
                  <div class="form-group">
                    <label for="wardSchool">School of Your Ward</label>
                    <input type="text" class="form-control" id="wardSchool" name="ward_school" placeholder="Enter ward's school">
                  </div>
                  <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" class="form-control" id="location" name="location" placeholder="Enter location">
                  </div>
                  <div class="form-group">
                    <label for="phoneNumber">Phone Number</label>
                    <input type="tel" class="form-control" id="phoneNumber" name="phone_number" placeholder="Enter phone number">
                  </div>
                  <div class="form-group">
                    <label for="email">Parent's Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                  </div>
                </div>

                <!-- Student-specific fields -->
                <div id="studentFields" class="type-specific-fields">
                  <div class="form-group">
                    <label for="firstName">First Name</label>
                    <input type="text" class="form-control" id="firstName" name="first_name" placeholder="Enter first name">
                  </div>
                  <div class="form-group">
                    <label for="middleName">Middle Name</label>
                    <input type="text" class="form-control" id="middleName" name="middle_name" placeholder="Enter middle name">
                  </div>
                  <div class="form-group">
                    <label for="lastName">Last Name</label>
                    <input type="text" class="form-control" id="lastName" name="last_name" placeholder="Enter last name">
                  </div>
                  <div class="form-group">
                    <label for="studentEmail">Email</label>
                    <input type="email" class="form-control" id="studentEmail" name="email" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="studentPhone">Phone</label>
                    <input type="tel" class="form-control" id="studentPhone" name="phone_number" placeholder="Enter phone number">
                  </div>
                  <div class="form-group">
                    <label for="school">Your School</label>
                    <input type="text" class="form-control" id="school" name="school" placeholder="Enter your school">
                  </div>
                  <div class="form-group">
                    <label for="program">Program</label>
                    <input type="text" class="form-control" id="program" name="program" placeholder="Enter your program">
                  </div>
                </div>

                <!-- Adult-specific fields -->
                <div id="adultFields" class="type-specific-fields">
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
                    <label for="adultEmail">Email</label>
                    <input type="email" class="form-control" id="adultEmail" name="email" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="adultPhone">Phone</label>
                    <input type="tel" class="form-control" id="adultPhone" name="phone_number" placeholder="Enter phone number">
                  </div>
                  <div class="form-group">
                    <label for="profession">Profession</label>
                    <input type="text" class="form-control" id="profession" name="profession" placeholder="Enter your profession">
                  </div>
                  <div class="form-group">
                    <label for="industry">Industry</label>
                    <input type="text" class="form-control" id="industry" name="industry" placeholder="Enter your industry">
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-warning w-100 fw-500">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
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

    // Show/hide fields based on registration type
    $('#registrationType').on('change', function() {
      $('.type-specific-fields').hide();
      var selectedType = $(this).val();
      if (selectedType === 'children') {
        $('#childrenFields').show();
      } else if (selectedType === 'student') {
        $('#studentFields').show();
      } else if (selectedType === 'adult') {
        $('#adultFields').show();
      }
    });

    $('#registrationForm').on('submit', function(e) {
      e.preventDefault();
      $('#registrationForm :input').prop('disabled', true);

      var formData = {
        registration_type: $('#registrationType').val(),
        course_name: $('#course').val(),
      };

      // Add type-specific fields to formData
      if ($('#registrationType').val() === 'children') {
        formData.parents_name = $('#parentsName').val();
        formData.wards_name = $('#wardsName').val();
        formData.ward_age = $('#wardAge').val();
        formData.ward_school = $('#wardSchool').val();
        formData.location = $('#location').val();
        formData.phone_number = $('#phoneNumber').val();
        formData.email = $('#email').val();
      } else if ($('#registrationType').val() === 'student') {
        formData.first_name = $('#firstName').val();
        formData.middle_name = $('#middleName').val();
        formData.last_name = $('#lastName').val();
        formData.email = $('#studentEmail').val();
        formData.phone_number = $('#studentPhone').val();
        formData.school = $('#school').val();
        formData.program = $('#program').val();
      } else if ($('#registrationType').val() === 'adult') {
        formData.first_name = $('#adultFirstName').val();
        formData.middle_name = $('#adultMiddleName').val();
        formData.last_name = $('#adultLastName').val();
        formData.email = $('#adultEmail').val();
        formData.phone_number = $('#adultPhone').val();
        formData.profession = $('#profession').val();
        formData.industry = $('#industry').val();
      }

      $.ajax({
        url: '/api/applicant-register',
        type: 'POST',
        data: JSON.stringify(formData),
        contentType: 'application/json',
        success: function(response) {
          Swal.fire(
            'Submitted!',
            'Applicant added successfully.',
            'success'
          ).then(() => {
            $('#registrationForm').trigger('reset');
            $('.type-specific-fields').hide();
          });
        },
        error: function(xhr) {
          alert('Registration failed: ' + xhr.responseText);
          $('#registrationForm :input').prop('disabled', false);
        }
      });
    });
  });
</script>
</script>
</body>
</html>
