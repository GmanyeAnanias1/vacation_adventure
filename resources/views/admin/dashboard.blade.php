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
            margin-left: 210px;
            padding: 20px;
        }

        .table-container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .nav-tabs .nav-link.active {
            background-color: #ffc107;
            color: white;
        }
    </style>
</head>

<body>
    <!-- Include Navbar -->
    @include('components.navbar')

    <!-- Include Sidebar -->
    @include('components.sidebar')

    <div class="main">
        <div class="table-container">
            <h2 class="text-center">Applicants' Details</h2>

            <!-- Tabs for Registration Types -->
            <ul class="nav nav-tabs mt-4" id="registrationTabs" role="tablist">
                <li class="nav-item text-bold">
                    <a class="nav-link active" id="children-tab" data-toggle="tab" href="#children" role="tab" aria-controls="children" aria-selected="true">Children</a>
                </li>
                <li class="nav-item ml-4 text-bold">
                    <a class="nav-link" id="student-tab" data-toggle="tab" href="#student" role="tab" aria-controls="student" aria-selected="false">Student</a>
                </li>
                <li class="nav-item ml-4 text-bold">
                    <a class="nav-link" id="adult-tab" data-toggle="tab" href="#adult" role="tab" aria-controls="adult" aria-selected="false">Adult</a>
                </li>
            </ul>

            <div class="tab-content mt-4" id="registrationTabsContent">
                <!-- Children Tab -->
                <div class="tab-pane fade show active" id="children" role="tabpanel" aria-labelledby="children-tab">
                    <table id="childrenTable" class="table table-striped table-bordered" style="width:100%">
                        <thead class="thead-dark">
                            <tr>
                                <th>Parent's Name</th>
                                <th>Ward's Name</th>
                                <th>Ward's Age</th>
                                <th>Ward's School</th>
                                <th>Location</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($childrenRegistrations as $registration)
                            <tr>
                                <td>{{ $registration->parents_name }}</td>
                                <td>{{ $registration->wards_name }}</td>
                                <td>{{ $registration->ward_age }}</td>
                                <td>{{ $registration->ward_school }}</td>
                                <td>{{ $registration->location }}</td>
                                <td>
                                    <a href="{{ route('admin.applicants.show', $registration->id) }}" class="btn btn-info btn-sm">View Details</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Student Tab -->
                <div class="tab-pane fade" id="student" role="tabpanel" aria-labelledby="student-tab">
                    <table id="studentTable" class="table table-striped table-bordered" style="width:100%">
                        <thead class="thead-dark">
                            <tr>
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>School</th>
                                <th>Program</th>
                                {{-- <th>Actions</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($studentRegistrations as $registration)
                            <tr>
                                <td>{{ $registration->first_name }}</td>
                                <td>{{ $registration->middle_name }}</td>
                                <td>{{ $registration->last_name }}</td>
                                <td>{{ $registration->email }}</td>
                                <td>{{ $registration->phone_number }}</td>
                                <td>{{ $registration->school }}</td>
                                <td>{{ $registration->program }}</td>
                                {{-- <td>
                                    <a href="{{ route('admin.applicants.show', $registration->id) }}" class="btn btn-info btn-sm">View Details</a>
                                </td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Adult Tab -->
                <div class="tab-pane fade" id="adult" role="tabpanel" aria-labelledby="adult-tab">
                    <table id="adultTable" class="table table-striped table-bordered" style="width:100%">
                        <thead class="thead-dark">
                            <tr>
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Profession</th>
                                <th>Industry</th>
                                {{-- <th>Actions</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($adultRegistrations as $registration)
                            <tr>
                                <td>{{ $registration->first_name }}</td>
                                <td>{{ $registration->middle_name }}</td>
                                <td>{{ $registration->last_name }}</td>
                                <td>{{ $registration->email }}</td>
                                <td>{{ $registration->phone_number }}</td>
                                <td>{{ $registration->profession }}</td>
                                <td>{{ $registration->industry }}</td>
                                {{-- <td>
                                    <a href="{{ route('admin.applicants.show', $registration->id) }}" class="btn btn-info btn-sm">View Details</a>
                                </td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#childrenTable').DataTable();
            $('#studentTable').DataTable();
            $('#adultTable').DataTable();
        });
    </script>
</body>

</html>
