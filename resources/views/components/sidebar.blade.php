<!-- resources/views/components/sidebar.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


</head>
<body>
    <div class="sidebar bg-danger">
        <h2 class="text-gray ml-4">GPA ADMIN</h2>
        <a href="/admin/cardGraph"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <a href="/admin/dashboard"><i class="fas fa-users"></i> View All Applicants</a>
        <a href="/"><i class="fas fa-user-plus"></i> Add Applicant</a>
        <a href="#"><i class="fas fa-book-open"></i> Add Course</a>
        <a href="#"><i class="fas fa-key"></i> Change Password</a>
        <a href="#"><i class="fas fa-sign-out-alt"></i> Logout</a>

    </div>
</body>
</html>




