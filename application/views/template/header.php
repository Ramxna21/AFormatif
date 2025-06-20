<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Tambahan biar kompatibel dengan IE -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title><?= isset($title) ? $title : 'Halaman'; ?></title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" 
          integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" 
          crossorigin="anonymous">
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Tambahan CSS lain jika perlu -->
    <style>
        body {
            background-color: #f8f9fc;
        }
    </style>
</head>
<body>

<!-- Container Utama -->
<div class="container">
