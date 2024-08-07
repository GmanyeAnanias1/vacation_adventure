<!-- resources/views/admin/dashboard.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <style>
        .sidebar {
            height: 100vh;
            width: 200px;
            position: fixed;
            top: -4rem;
            padding-top: 20px;
        }
        .sidebar a {
            display: block;
            color: white;
            padding: 15px;
            text-decoration: none;
            font-size: 1.1em;
        }
        .sidebar a:hover {
            background-color: #545657;
            color: white;
            width: 10rem;
            border-radius: 1rem;
            transition: background-color 0.5s ease-in-out;
            margin-left: 10px;
        }
        .main {
            margin-left: 200px; /* Same as the width of the sidebar */
            padding: 20px;
        }
        .table-container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .navbar{
        margin-left: 12rem;
        height: 4rem;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger w-80 h-40  ">
        <a class="navbar-brand text-center" href="#">Admin Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">

        </div>
    </nav>

    <div class="sidebar bg-danger">
        <a href="#">Dashboard</a>
        <a href="/">Add Applicant</a>
        <a href="#">View Payments</a>
        <a href="#">Change Password</a>
        <a href="#">Logout</a>
    </div>
    <div class="main">
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
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Start Date</th>
                        <th>End Date</th>
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
                            <td>{{ $registration->phone_number }}</td>
                            <td>{{ $registration->email }}</td>
                            <td>{{ $registration->start_date }}</td>
                            <td>{{ $registration->end_date }}</td>
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
