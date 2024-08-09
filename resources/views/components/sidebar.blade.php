<!-- resources/views/components/sidebar.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
</head>
<body>
    <div class="sidebar bg-danger">
        <h2 class="text-gray ml-4">GPA ADMIN</h2>
        <a href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <a href="/"><i class="fas fa-users"></i> View All Applicants</a>
        <a href="/"><i class="fas fa-user-plus"></i> Add Applicant</a>
        <a href="#"><i class="fas fa-credit-card"></i> View Payments</a>
        <a href="#"><i class="fas fa-key"></i> Change Password</a>
        <a href="#"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>
</body>
</html>




