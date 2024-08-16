<!-- resources/views/components/sidebar.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .avatar {
            width: 85px;
            height: 85px;
            border-radius: 50%;
            margin: 20px auto;
            display: block;
            object-fit: cover;
        }
        .sidebar .profile {
            text-align: center;
            color: rgb(211, 214, 19);
            margin-bottom: 20px;
            margin-top: -4rem;
        }
    </style>
</head>
<body>
    <div class="sidebar bg-danger">
        <div class="profile">
            <!-- Display the avatar image -->
            <img src="{{ asset('images/admin_image.jpg') }}" alt="User Avatar" class="avatar">
            <h3 class="text-gray ml-4">{{ Auth::user()->name ?? 'GPA ADMIN' }}</h3>
            <h4>Online...</h4>
        </div>
        <a href="/admin/cardGraph"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <a href="/admin/dashboard"><i class="fas fa-users"></i> View All Applicants</a>
        <a href="/form"><i class="fas fa-user-plus"></i> Add Applicant</a>
        <a href="admin/addCourse"><i class="fas fa-book-open"></i> Add Course</a>
        <a href="/admin/changePassword"><i class="fas fa-key"></i> Change Password</a>
        <a href="/login"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>
</body>
</html>
