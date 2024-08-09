<!-- resources/views/admin/dashboard.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        .sidebar {
            height: 100vh;
            width: 210px;
            position: fixed;
            top: 0;
            padding-top: 4rem;
        }
        .main {
            margin-left: 210px; /* Adjusted width of the sidebar */
            padding: 20px;
        }
        .table-container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <!-- Include Navbar -->
    @include('components.navbar')

    <!-- Include Sidebar -->
    @include('components.sidebar')

    <div class="main">
        <!-- Main content goes here -->
        <div class="table-container">
            <h2>Applicants' Details</h2>
            <table id="registrationsTable" class="table table-striped table-bordered" style="width:100%">
                <thead class="thead-dark">
                    <tr>
                        <th>Parent's Name</th>
                        <th>Ward's Name</th>
                        <th>Ward's Age</th>
                        <th>Ward's School</th>
                        <th>Location</th>
                        <th>Actions</th> <!-- New Actions column -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($registrations as $registration)
                        <tr>
                            <td>{{ $registration->parents_name }}</td>
                            <td>{{ $registration->wards_name }}</td>
                            <td>{{ $registration->ward_age }}</td>
                            <td>{{ $registration->ward_school }}</td>
                            <td>{{ $registration->location }}</td>
                            <td>
                                <a href="{{ route('admin.applicants.show', $registration->id) }}" class="btn btn-info btn-sm">
                                    View Details
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#registrationsTable').DataTable();
        });
    </script>
</body>
</html>
