<div class="table-container">
    <h2>Children Registrations</h2>
    <table id="childrenRegistrationsTable" class="table table-striped table-bordered">
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
            @foreach($registrations as $registration)
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
