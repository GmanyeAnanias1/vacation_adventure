<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


</head>
<body>
<!-- Include Navbar -->
@include('components.navbar')

<!-- Include Sidebar -->
@include('components.sidebar')

    <div class="container mt-4">
        <!-- Row for the Card -->
        <div class="row mb-4 d-flex no-gutters">
            <div class="col-md-6">
                <div class="card custom-card w-50 mx-auto text-center ">
                    <div class="card-header custom-card-header bg-warning text-secondary font-weight-bolder">
                        Total Applicants
                    </div>
                    <div class="card-body custom-card-body">
                        <h2 class="card-title custom-card-title text-danger">{{ $registrations->count() }}</h2>
                        <p class="card-text custom-card-text">Total Number of Applicants</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card custom-card w-50 mx-auto text-center">
                    <div class="card-header custom-card-header bg-info text-white font-weight-bolder">
                        Total Courses
                    </div>
                    <div class="card-body custom-card-body">
                        <h2 class="card-title custom-card-title text-danger">{{ $registrations->count() }}</h2>
                        <p class="card-text custom-card-text">Total Number of Courses</p>
                    </div>
                </div>
            </div>
        </div>


        <!-- Row for the Chart -->
        <div class="row ml-4 mt-20">
            <div class="col-md-12">
                <div class="custom-chart-container ml-5"> <!-- Increased margin-left for right alignment -->
                    <div class="custom-chart-header text-danger font-weight-bolder text-center mt-4">
                        Registrations Overview
                    </div>
                    <div class="card-body ml-2">
                        <canvas id="registrationChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap JS, Popper.js, and jQuery -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var ctx = document.getElementById('registrationChart').getContext('2d');
                var registrationChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: {!! json_encode($registrationsByMonth->keys()) !!}, // Month names as labels
                        datasets: [{
                            label: 'Number of Registrations',
                            data: {!! json_encode($registrationsByMonth->values()) !!}, // Number of registrations per month
                            backgroundColor: 'rgba(54, 162, 235, 0.7)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 2,
                            hoverBackgroundColor: 'rgba(54, 162, 235, 0.9)',
                            hoverBorderColor: 'rgba(54, 162, 235, 1)',
                            maxBarThickness: 60 // Adjusted for increased bar height
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    color: '#495057',
                                },
                                grid: {
                                    color: 'rgba(0, 0, 0, 0.1)',
                                }
                            },
                            x: {
                                ticks: {
                                    color: '#495057',
                                },
                                grid: {
                                    color: 'rgba(0, 0, 0, 0.1)',
                                }
                            }
                        },
                        plugins: {
                            legend: {
                                labels: {
                                    color: '#495057'
                                }
                            }
                        },
                        responsive: true,
                        maintainAspectRatio: false,
                    }
                });
            });
        </script>


</body>
</html>
