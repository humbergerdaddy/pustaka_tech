<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Buku - {{ $data->judul }}</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        .detail-container {
            max-width: 900px;
            margin: 50px auto;
            background-color: rgba(0,0,0,0.7);
            padding: 30px;
            border-radius: 15px;
            display: flex;
            gap: 30px;
            color: #fff;
            box-shadow: 0 0 15px rgba(255,255,255,0.1);
        }

        .detail-image img {
            width: 250px;
            height: 350px;
            object-fit: cover;
            border-radius: 10px;
        }

        .detail-info {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .detail-info h2 {
            font-size: 1.8em;
            margin-bottom: 10px;
            color: #fff;
            text-align: left !important;
        }

        .detail-info p {
            font-size: 1em;
            line-height: 1.6em;
            color: #ddd;
            

    
        }

        


        .detail-info p span {
            font-weight: bold;
            color: #3498db;
        }

        .action-buttons {
            margin-top: 20px;
        }

        .action-buttons a {
            display: inline-block;
            padding: 10px 15px;
            margin-right: 10px;
            background-color: #3498db;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            font-size: 0.95em;
            transition: background-color 0.2s ease;
        }

        .action-buttons a:hover {
            background-color: #2980b9;
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
    
        @media (max-width: 768px) {
            .detail-container {
                flex-direction: column;
                align-items: center;
            }

            .detail-image img {
                width: 100%;
                height: auto;
            }

            .detail-info {
                text-align: center;
            }

            .action-buttons a {
                margin-top: 10px;
                margin-right: 0;
            }
        }
    </style>
</head>
<body style="background:url(/bg/bg1.png); background-size: cover; background-attachment: fixed;">

<header>
    <nav class="menu">
        <ul class="dropdown">
            <li><a href="/">Home</a></li>
            <li><a href="/#book-gallery">Telusuri Buku</a></li>


            @if (Route::has('login'))
                <!-- <nav class="flex items-center justify-end gap-4"> -->
                    @auth
                    <div >
                    <li class="menu-item {{ Request::is('book_history') ? 'active' : '' }}"> <a href="{{url('book_history')}}">Riwayat saya</a></li>
                    </div>
                        <x-app-layout>
                        </x-app-layout>

                        
                    @else
                        <li> <a href="{{ route('login') }}">Masuk</a></li>

                        @if (Route::has('register'))
                            <li> <a href="{{ route('register') }}">Daftar</a></li>
                        @endif
                    @endauth
                <!-- </nav> -->
            @endif


            
            
            
        </ul>
    </nav>
</header>

<main>

@if(session()->has('message'))

            <div class="custom-alert">
            <i class="fa-solid fa-bell"></i>
            {{ session()->get('message') }}
            <button class="close-alert" onclick="this.parentElement.style.display='none';">&times;</button>
        </div>

        @endif
    <div class="detail-container">
        <div class="detail-image">
            <img src="{{ asset('storage/' . $data->book_img) }}" alt="{{ $data->judul }}">
        </div>

        <div class="detail-info">
            <h2>{{ $data->judul }}</h2>
            <p><span>ISBN:</span> {{ $data->isbn }}</p>
            <p><span>Tahun:</span> {{ $data->tahun }}</p>
            <p><span>Penerbit:</span> {{ $data->penerbit }}</p>
            <p><span>Kategori:</span> {{$data->kategori->nama}}</p>
            <p><span>Buku tersedia:</span> {{ $data->jumlah }}</p>
            <p><span>Deskripsi:</span><br> {{ $data->deskripsi }}</p> 

            

            <div class="action-buttons">
                <a href="{{ url('borrow_books', $data->id) }}">Pinjam Buku</a>
                <a href="/">Kembali</a>
            </div>
        </div>
    </div>
</main>

<footer>
    <p>&copy; 2025 Pustaka.tech</p>
</footer>

</body>
</html>
