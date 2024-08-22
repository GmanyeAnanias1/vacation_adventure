

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
            course_name: $('#course_name').val()
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

    // Open Edit Course Modal
    $(document).on('click', '.edit-course', function() {
        var courseId = $(this).data('id');
        var courseCode = $(this).data('course-code');
        var courseName = $(this).data('course-name');

        $('#edit_course_id').val(courseId);
        $('#edit_course_code').val(courseCode);
        $('#edit_course_name').val(courseName);

        $('#editCourseModal').modal('show');
    });

    // Handle form submission for editing a course
    $('#editCourseForm').on('submit', function(e) {
    e.preventDefault();

    var courseId = $('#edit_course_id').val();
    var formData = {
        course_code: $('#edit_course_code').val(),
        course_name: $('#edit_course_name').val()
    };

    $.ajax({
        url: 'api/courses/' + courseId, // Replace {id} with courseId
        type: 'PUT',
        data: formData,
        success: function(response) {
            Swal.fire(
                'Updated!',
                'Course updated successfully.',
                'success'
            ).then(() => {
                $('#editCourseModal').modal('hide'); // Hide modal on success
                table.ajax.reload(); // Reload DataTable
            });
        },
        error: function(xhr) {
            Swal.fire(
                'Failed!',
                'There was an error updating the course.',
                'error'
            );
        }
    });
});

    // Handle delete button click
    $(document).on('click', '.delete-course', function() {
        var courseId = $(this).data('id');
    
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: 'api/courses/' + courseId, // Replace {id} with courseId
                    type: 'DELETE',
                    data: {
                        "_token": $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        Swal.fire(
                            'Deleted!',
                            response.message,
                            'success'
                        ).then(() => {
                            table.ajax.reload(); // Reload DataTable
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
})    


