

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
    
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="{{asset('admin/css/styles.css')}}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body>
    

    <body class="sb-nav-fixed">
        
        @include ('components.navbarr');
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                @include ('components.sidebarr');
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <div class="card my-4">
                            <div class="card-body">
                                <h4 class="card-title">3D Column Chart Example</h4>
                                <div id="chartContainer" style="height: 400px"></div>
                            </div>
                        </div>
                       
                      {{-- @include ('admin.products.home') --}}
                    </div>
                </main>
                @include ('components.footer')
            </div>
        </div>





        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('admin/js/scripts.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('admin/js/datatables-simple-demo.js')}}"></script>
    </body>

  
    
  
    <!-- Highcharts 3D library -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
{{-- <script>
    document.addEventListener('DOMContentLoaded', function () {
        Highcharts.chart('chartContainer', {
            chart: {
                type: 'column',
                options3d: {
                    enabled: true,
                    alpha: 15,
                    beta: 15,
                    depth: 50,
                    viewDistance: 25
                }
            },
            title: {
                text: '3D Column Chart'
            },
            xAxis: {
                categories: ['Apples', 'Oranges', 'Pears', 'Grapes', 'Bananas']
            },
            yAxis: {
                title: {
                    text: 'Fruit eaten'
                }
            },
            series: [{
                name: 'Jane',
                data: [1, 0, 4, 3, 2]
            }, {
                name: 'John',
                data: [5, 7, 3, 2, 1]
            }]
        });
    });
    </script> --}}
  
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Highcharts.chart('chartContainer', {
                chart: {
                    type: 'column',
                    options3d: {
                        enabled: true, // Enables the 3D chart
                        alpha: 15,     // Rotation in X-axis (angle)
                        beta: 15,      // Rotation in Y-axis (angle)
                        depth: 50,     // Depth of the columns
                        viewDistance: 25 // The distance from the chart to the viewer
                    }
                },
                title: {
                    text: 'User Roles Distribution'
                },
                xAxis: {
                    categories: ['Admin', 'User']  // This defines categories on x-axis
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Total Users'
                    }
                },
                series: [{
                    name: 'Admins',
                    data: [{{ $adminCount }}]  // Only Admin count data here
                }, {
                    name: 'Users',
                    data: [{{ $userCount }}]  // Only User count data here
                }]
            });
        });
    </script>
    
    
</body>
</html>