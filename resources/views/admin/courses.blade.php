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
@include('components.navbar')
@include('components.sidebar')
<body>
    <div class="container mt-2">
        <h2 class="text-center">Courses</h2>
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8 ml-custom">
                <div class="table-responsive">
                    <table id="coursesTable" class="table table-bordered table-striped table-sm ">
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

                                        <button type="button" class="btn btn-sm btn-warning" data-id="{{ $course->trans_id }}">
                                            Edit
                                        </button>
                                        <button type="button" class="btn btn-sm btn-danger ml-2" data-id="{{ $course->trans_id }}">
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
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
    $(document).ready(function() {
        $('#coursesTable').DataTable({
            responsive: true, // Enable responsive extension
            autoWidth: false  // Prevent automatic column width adjustments
        }); // Initialize the DataTable with responsive feature

        // Handle delete button click
        $('.delete-course').on('click', function() {
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
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            Swal.fire(
                                'Deleted!',
                                'The course has been deleted.',
                                'success'
                            ).then(() => {
                                location.reload(); // Reload the page after deletion
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
