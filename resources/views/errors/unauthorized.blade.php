<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Access Denied</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container text-center mt-5">
        <h1 class="display-4">Access Denied</h1>
        <p class="lead">Your IP address is not authorized to access this application.</p>
        <p>Your IP: {{ request()->ip() }}</p>
        <a href="/" class="btn btn-primary">Go to Home</a>
    </div>
</body>
</html>
