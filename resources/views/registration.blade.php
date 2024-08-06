<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vacation Adventure || Registration</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <style>
    /* Your CSS styles */
    .spinner-border {
      display: none; /* Hide the spinner initially */
      position: fixed; /* Fixed position */
      top: 50%; /* Position from the top */
      left: 50%; /* Position from the left */
      transform: translate(-50%, -50%); /* Center the spinner */
      border-width: 20px;
      border-style: solid;
      border-color: #343a40;
      border-top-color: yellow;
      border-radius: 50%;
      width: 6rem;
      height: 8rem;
      animation: spin 2s linear infinite;
      z-index: 9999; /* Ensure it's above other elements */
    }

    @keyframes spin {
      0% { transform: translate(-50%, -50%) rotate(0deg); }
      100% { transform: translate(-50%, -50%) rotate(360deg); }
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
                <label for="parentsName">Parent's Name</label>
                <input type="text" class="form-control" id="parentsName" name="parents_name" placeholder="Enter parent's name" required>
              </div>
              <div class="form-group">
                <label for="wardsName">Ward's Name</label>
                <input type="text" class="form-control" id="wardsName" name="wards_name" placeholder="Enter ward's name" required>
              </div>
              <div class="form-group">
                <label for="wardAge">Age of Your Ward</label>
                <input type="number" class="form-control" id="wardAge" name="ward_age" placeholder="Enter ward's age" required>
              </div>
              <div class="form-group">
                <label for="wardSchool">School of Your Ward</label>
                <input type="text" class="form-control" id="wardSchool" name="ward_school" placeholder="Enter ward's school" required>
              </div>
              <div class="form-group">
                <label for="location">Location</label>
                <input type="text" class="form-control" id="location" name="location" placeholder="Enter location" required>
              </div>
              <div class="form-group">
                <label for="phoneNumber">Phone Number</label>
                <input type="tel" class="form-control" id="phoneNumber" name="phone_number" placeholder="Enter phone number" required>
              </div>
              <div class="form-group">
                <label for="email">Parent's Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
              </div>
              <div class="form-group">
                <label for="startDate">Start Date</label>
                <input type="date" class="form-control" id="startDate" name="start_date" value="2024-08-13" readonly>
              </div>
              <div class="form-group">
                <label for="endDate">End Date</label>
                <input type="date" class="form-control" id="endDate" name="end_date" value="2024-08-30" readonly>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-warning w-100 fw-500">Submit</button>
                <div class="spinner-border text-warning ml-3" role="status">
                  <span class="sr-only">Submitting...</span>
                </div>
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

      $('#registrationForm').on('submit', function(e) {
        e.preventDefault();
        $('.spinner-border').show();
        $('#registrationForm :input').prop('disabled', true);

        var formData = {
          parents_name: $('#parentsName').val(),
          wards_name: $('#wardsName').val(),
          ward_age: $('#wardAge').val(),
          ward_school: $('#wardSchool').val(),
          location: $('#location').val(),
          phone_number: $('#phoneNumber').val(),
          email: $('#email').val(),
          start_date: $('#startDate').val(),
          end_date: $('#endDate').val()
        };

        $.ajax({
          url: '/api/register',
          type: 'POST',
          data: JSON.stringify(formData),
          contentType: 'application/json',
          success: function(response) {
            alert('Registration successful!');
            $('.spinner-border').hide();
            $('#registrationForm :input').prop('disabled', false);
            $('#registrationForm')[0].reset();
          },
          error: function(xhr) {
            alert('Registration failed: ' + xhr.responseText);
            $('.spinner-border').hide();
            $('#registrationForm :input').prop('disabled', false);
          }
        });
      });
    });
  </script>
</body>
</html>
