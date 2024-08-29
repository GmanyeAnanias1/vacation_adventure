
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" href="{{ asset('favicon_gpa.ico') }}" type="image/x-icon"/>
    <style>
    .box-shadow {
        box-shadow: 0 4px 8px rgba(255, 0, 34, 0.5);
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
    }
</style>
</head>
<body>


<div class="container d-flex justify-content-center box-shadow">
    <div class="col-md-8">
        <h2 class="text-center mb-4 text-danger mt-4">Applicant Full Details</h2>
        <table class="table table-bordered table-striped">
            <thead>
                <tr class="text-center badge-dark">
                    <th>FIELD</th>
                    <th>DETAILS</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <th>Parent's Name:</th>
                    <td>{{ $registration->parents_name }}</td>
                </tr>
                <tr>
                    <th>Ward's Name:</th>
                    <td>{{ $registration->wards_name }}</td>
                </tr>
                <tr>
                    <th>Ward's Age:</th>
                    <td>{{ $registration->ward_age }}</td>
                </tr>
                <tr>
                    <th>Ward's School:</th>
                    <td>{{ $registration->ward_school }}</td>
                </tr>
                <tr>
                    <th>Location:</th>
                    <td>{{ $registration->location }}</td>
                </tr>

                <tr>
                    <th>Course:</th>
                    <td>{{ $registration->course_name }}</td>
                </tr>
                <tr>
                    <th>Phone Number:</th>
                    <td>{{ $registration->phone_number }}</td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td>{{ $registration->email }}</td>
                </tr>

            </tbody>
        </table>
        <div class="text-center mt-4">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-danger sm mb-4">Back to Dashboard</a>
        </div>
    </div>
</div>
</body>
</html>
