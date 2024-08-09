

@extends('components.navbar')
@extends('components.sidebar')
@section('content')
    <div class="container">
        <h2>Applicant Details</h2>
        <table class="table table-bordered">
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
        </table>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Back to Dashboard</a>
    </div>
@endsection
