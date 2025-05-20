<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="{{ asset('admin/css/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">

    {{-- Navbar --}}
    @include('components.navbarr')

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            {{-- Sidebar --}}
            @include('components.sidebarr')
        </div>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Add Admin/User</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">User Management</li>
                    </ol>

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-user-plus me-1"></i>
                            Add New User/Admin
                        </div>
                        <div class="card-body">
                            <form action="{{ route('superadmin.addadmin') }}" method="POST"
                                class="p-4 bg-light rounded shadow-sm">
                                @csrf

                                <h5 class="mb-4 border-bottom pb-2 text-primary">
                                    <i class="fas fa-user-cog me-2"></i> Admin/User Information
                                </h5>

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="name" class="form-label">Admin Name</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            <input type="text" name="name" id="name" class="form-control"
                                                placeholder="Enter name" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="mobile" class="form-label">Mobile Number</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                            <input type="text" name="mobile" id="mobile" class="form-control"
                                                placeholder="Enter mobile number" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Email Address</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                            <input type="email" name="email" id="email" class="form-control"
                                                placeholder="Enter email" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="password" class="form-label">Password</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                            <input type="password" name="password" id="password" class="form-control"
                                                placeholder="Enter password" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="user_type" class="form-label">User Type</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                                            <select name="user_type" id="user_type" class="form-select" required>
                                                <option value="">Select user type</option>
                                                <option value="admin">Admin</option>
                                                <option value="user">User</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4 text-end">
                                    <button type="submit" class="btn btn-success px-4">
                                        <i class="fas fa-plus-circle me-1"></i> Add User
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </main>


            @include('components.footer')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script>
        @if(Session::has('success'))
            Toastify({
                text: "{{ Session::get('success') }}",
                duration: 4000,
                close: true,
                gravity: "top", // top or bottom
                position: "right", // left, center or right
                backgroundColor: "#28a745", // success green
            }).showToast();
        @endif
    
        @if(Session::has('error'))
            Toastify({
                text: "{{ Session::get('error') }}",
                duration: 4000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "#dc3545", // error red
            }).showToast();
        @endif
    
        @if(Session::has('info'))
            Toastify({
                text: "{{ Session::get('info') }}",
                duration: 4000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "#0dcaf0", // info blue
            }).showToast();
        @endif
    
        @if(Session::has('warning'))
            Toastify({
                text: "{{ Session::get('warning') }}",
                duration: 4000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "#ffc107", // warning yellow
            }).showToast();
        @endif
    </script>
    


</body>

</html>