$(document).ready(function() {
    // Set up CSRF token for AJAX requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Initialize DataTable
    var table = $('#coursesTable').DataTable({
        responsive: true,
        autoWidth: false
    });

    // Open Add Course Modal
    $('#openAddModalButton').on('click', function() {
        $('#addCourseModal').modal('show');
    });

    // Handle form submission for adding a new course
    $('#addCourseForm').on('submit', function(e) {
        e.preventDefault();

        var formData = {
            course_name: $('#course_name').val(),
            course_code: $('#course_code').val()
        };

        $.ajax({
            url: 'api/addCourse',
            type: 'POST',
            data: formData,
            success: function(response) {
                Swal.fire(
                    'Submitted!',
                    'Course added successfully.',
                    'success'
                ).then(() => {
                    $('#addCourseForm').trigger('reset');
                    $('#addCourseModal').modal('hide'); // Hide modal on success
                    table.ajax.reload(); // Reload DataTable
                });
            },
            error: function(xhr) {
                Swal.fire(
                    'Failed!',
                    'There was an error adding the course.',
                    'error'
                );
            }
        });
    });

    $(document).on('click', '.edit-course', function() {
        // Retrieve course data from the button's data attributes
        var courseId = $(this).data('id'); // Now this is the course ID
        var courseCode = $(this).data('course-code');
        var courseName = $(this).data('course-name');

        // Populate the edit form with the course data
        $('#edit_course_id').val(courseId);
        $('#edit_course_code').val(courseCode);
        $('#edit_course_name').val(courseName);

        // Show the modal for editing
        $('#editCourseModal').modal('show');
    });

    $('#editCourseForm').on('submit', function(e) {
        e.preventDefault();

        // Get the course ID from the hidden input field
        var courseId = $('#edit_course_id').val();

        // Gather form data
        var formData = {
            course_code: $('#edit_course_code').val(),
            course_name: $('#edit_course_name').val()
        };

        $.ajax({
            url: '/api/courses/' + courseId, // Updated URL to use courseId
            type: 'PUT',
            data: formData,
            success: function(response) {
                Swal.fire(
                    'Updated!',
                    'Course updated successfully.',
                    'success'
                ).then(() => {
                    $('#editCourseModal').modal('hide');
                    $('#coursesTable').DataTable().ajax.reload();
                });
            },
            error: function(xhr) {
                // Error handling remains the same
            }
        });
    });

    // Handle delete button click
    $(document).on('click', '.delete-course', function() {
        var courseId = $(this).data('id'); // Now this is the course ID

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/api/courses/' + courseId, // Updated URL to use courseId
                    type: 'DELETE',
                    success: function(response) {
                        Swal.fire(
                            'Deleted!',
                            response.message,
                            'success'
                        ).then(() => {
                            table.ajax.reload();
                        });
                    },
                    error: function(xhr) {
                        Swal.fire(
                            'Failed!',
                            'There was an error deleting the course.',
                            'error'
                        );
                    }
                });
            }
        });
    });
});
