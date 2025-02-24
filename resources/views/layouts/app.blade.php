<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .sidebar { width: 250px; height: 100vh; background: #343a40; color: white; padding-top: 20px; }
        .sidebar a { color: white; padding: 10px; display: block; text-decoration: none; }
        .sidebar a:hover, .sidebar a.active { background: #495057; }
        .content { margin-left: 250px; padding: 20px; }
    </style>
    <!-- Tambahkan Select2 dari CDN -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

</head>
<body>

    <div class="d-flex">
        @include('components.sidebar')

        <div class="content w-100">
            @include('components.navbar')

            <div class="container mt-4">
                @yield('content')
            </div>
        </div>
    </div>

</body>
</html>
