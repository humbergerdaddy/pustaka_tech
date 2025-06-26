<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Perpustakaan Kampus</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<style>
        .detail-btn {
            display: inline-block;
            margin-top: 10px;
            padding: 8px 12px;
            background-color: transparent;
            color: #3498db;
            text-decoration: none;
            border: 2px solid #3498db;
            border-radius: 5px;
            font-size: 0.9em;
            transition: all 0.3s ease;
        }
    
        .detail-btn:hover {
            background-color: #3498db;
            color: white;
        }
    
        /* Supaya tombol sejajar dan tidak tabrakan di card */
        .book-card a {
            margin: 5px 0;
            
        }

        /* UNTUK ALERRTT MESSAGE */
        .custom-alert {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 9999;
        background-color: #e0f7e9;
        color: #2e7d32;
        border: 1px solid #b2dfdb;
        border-radius: 5px;
        padding: 15px 45px 15px 20px;
        font-size: 15px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        min-width: 250px;
        max-width: 400px;
    }

    .custom-alert i {
        margin-right: 8px;
    }

    .close-alert {
        position: absolute;
        top: 50%;
        right: 15px;
        transform: translateY(-50%);
        background: none;
        border: none;
        font-size: 18px;~
        color: #2e7d32;
        cursor: pointer;
    }

    .close-alert:hover {
        color: #1b5e20;
    }
    </style>

<body style="background:url(bg/bg1.png)">

@include('home.header')

@include('home.main')

@include('home.footer')





    
</body>
</html>
