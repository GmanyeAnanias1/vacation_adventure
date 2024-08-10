
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    

<div class="container d-flex justify-content-center ">
    <div class="col-md-8">
        <h2 class="text-center mb-4 text-danger mt-4">Applicant Details</h2>
        <table class="table table-bordered table-striped">
            <thead>
                <tr class="text-center">
                    <th>Field</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Parent's Name</th>
                    <td>{{ $registration->parents_name }}</td>
                </tr>
                <tr>
                    <th>Ward's Name</th>
                    <td>{{ $registration->wards_name }}</td>
                </tr>
                <tr>
                    <th>Ward's Age</th>
                    <td>{{ $registration->ward_age }}</td>
                </tr>
                <tr>
                    <th>Ward's School</th>
                    <td>{{ $registration->ward_school }}</td>
                </tr>
                <tr>
                    <th>Location</th>
                    <td>{{ $registration->location }}</td>
                </tr>
                <tr>
                    <th>Phone Number</th>
                    <td>{{ $registration->phone_number }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $registration->email }}</td>
                </tr>
                <tr>
                    <th>Start Date</th>
                    <td>{{ $registration->start_date }}</td>
                </tr>
                <tr>
                    <th>End Date</th>
                    <td>{{ $registration->end_date }}</td>
                </tr>
            </tbody>
        </table>
        <div class="text-center mt-4">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-danger">Back to Dashboard</a>
        </div>
    </div>
</div>
</body>
</html>
