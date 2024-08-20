<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Courses Management</title>
    <style>
        /* Custom styles for a smaller DataTable */
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 0.5rem 1rem;
        }
        .dataTables_wrapper .dataTables_info {
            font-size: 0.875rem;
        }
        #coursesTable {
            font-size: 0.875rem;
        }
        .table th, .table td {
            padding: 0.5rem;
        }
        .table-responsive {
            overflow-x: auto; /* Ensure horizontal scroll on small screens */
        }
        .ml-custom {
            margin-left: 20px;
        }
    </style>
</head>
<body>

@include('components.navbar')
@include('components.sidebar')

<div class="d-flex justify-content-center mt-5">
    <button id="openAddModalButton" class="btn btn-sm btn-danger ml-2">
        Add New Course
    </button>
</div>

<div class="row justify-content-center">
    <div class="col-md-10 col-lg-8 ml-custom">
        <div class="table-responsive">
            <table id="coursesTable" class="table table-bordered table-striped table-sm">
                <thead>
                    <tr>
                        <th>Transaction ID</th>
                        <th>Course Code</th>
                        <th>Course Name</th>
                        <th>Created By</th>
                        <th>Created Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($courses as $course)
                        <tr>
                            <td>{{ $course->trans_id }}</td>
                            <td>{{ $course->course_code }}</td>
                            <td>{{ $course->course_name }}</td>
                            <td>{{ $course->createuser }}</td>
                            <td>{{ $course->createdate }}</td>
                            <td class="d-flex">
                                <button type="button" class="btn btn-sm btn-warning edit-course" data-id="{{ $course->id }}" data-course-code="{{ $course->course_code }}" data-course-name="{{ $course->course_name }}">
                                    Edit
                                </button>
                                <button type="button" class="btn btn-sm btn-danger delete-course ml-2" data-id="{{ $course->id }}">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Edit Course Modal -->
<div class="modal fade" id="editCourseModal" tabindex="-1" aria-labelledby="editCourseModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="editCourseModalLabel">Edit Course</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editCourseForm">
                    @csrf
                    <input type="hidden" id="edit_course_id" name="course_id">
                    <div class="form-group">
                        <label for="edit_course_code">Course Code</label>
                        <input type="text" class="form-control" id="edit_course_code" name="course_code" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_course_name">Course Name</label>
                        <input type="text" class="form-control" id="edit_course_name" name="course_name" required>
                    </div>
                    <button type="submit" class="btn btn-warning btn-block">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Add Course Modal -->
<div class="modal fade" id="addCourseModal" tabindex="-1" aria-labelledby="addCourseModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-secondary" id="addCourseModalLabel">Add New Course</h5>
                <button type="button " class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
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
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<script>
$(document).ready(function() {
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
            _token: $('meta[name="csrf-token"]').attr('content')
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
            course_name: $('#edit_course_name').val(),
            _token: $('meta[name="csrf-token"]').attr('content')
        };

        $.ajax({
            url: '/courses/' + courseId,
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
                    url: '/courses/' + courseId,
                    type: 'DELETE',
                    data: {
                        "_token": $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        Swal.fire(
                            'Deleted!',
                            'The course has been deleted.',
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
});
</script>

</body>
</html>
