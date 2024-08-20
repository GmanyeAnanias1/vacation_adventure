<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style>
        .form-container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2 class="text-center mb-4 text-danger">Add New Course</h2>
            <form id="addCourseForm">
                @csrf
                <div class="form-group">
                    <label for="course_name">Course Name</label>
                    <input type="text" class="form-control" id="course_name" name="course_name" required>
                </div>
                <button type="submit" class="btn btn-warning btn-block">Add Course</button>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#addCourseForm').on('submit', function(e) {
                e.preventDefault();

                var formData = {
                    course_name: $('#course_name').val(),
                    _token: $('input[name="_token"]').val()
                };

                $.ajax({
                    url: '/api/addCourse',
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                                Swal.fire(
                                    'Submitted!',
                                    'Course added successfully.',
                                    'success'
                                ).then(() => {
                                    $('#addCourseFormForm').trigger(
                                        'reset');
                                });
                            },
                    error: function(xhr) {
                        alert('Error adding course: ' + xhr.responseText);
                    }
                });
            });
        });
    </script>
</body>
</html>
