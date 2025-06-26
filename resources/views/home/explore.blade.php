<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Perpustakaan Kampus</title>
    <base href="/public">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<style>

body {
            background: url('/bg/bg1.png');
            background-size: cover;
            background-attachment: fixed;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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

    /* TAMBAHAN */

    .history-container {
            max-width: 1000px;
            margin: 60px auto;
            background-color: rgba(0,0,0,0.75);
            padding: 30px;
            border-radius: 15px;
            color: #fff;
            box-shadow: 0 0 20px rgba(255,255,255,0.1);
        }

        .history-container h2 {
            text-align: center;
            font-size: 2em;
            margin-bottom: 25px;
            color: #3498db;
        }

        table.history-table {
            width: 100%;
            border-collapse: collapse;
            background-color: rgba(255,255,255,0.05);
        }

        table.history-table th,
        table.history-table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        table.history-table th {
            background-color: rgba(255,255,255,0.1);
            color: #3498db;
            font-weight: 600;
        }

        table.history-table td img {
            height: 100px;
            border-radius: 5px;
            object-fit: cover;
        }

        /* BTN */
a.cancel-btn {
    background-color: #e74c3c;
    color: white;
    padding: 8px 16px;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 500;
    transition: background-color 0.3s ease, transform 0.2s ease;
    display: inline-block;
    text-align: center;
}

a.cancel-btn:hover {
    background-color: #c0392b;
    transform: scale(1.05);
}

/* UNTUK DESAIN FORM SEARCH SECTIONNN */


.search-section {
    display: flex;
    justify-content: center;
    margin: 30px auto;

}

.search-form {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 12px;
    flex-wrap: wrap;
    max-width: 800px;
    width: 100%;
}

.search-input-wrapper,
.search-button-wrapper {
    flex-shrink: 0;
}

.search-input {
    padding: 12px 20px;
    border-radius: 8px;
    border: none;
    width: 500px;
    max-width: 90%;
    background-color: rgba(255, 255, 255, 0.9);
    font-size: 1em;
    transition: box-shadow 0.3s ease, transform 0.2s ease;

    color: #222;
}

.search-input:focus {
    outline: none;
    box-shadow: 0 0 10px #3498db;
    transform: scale(1.02);
}

.search-button {
    padding: 12px 20px;
    background-color: #3498db;
    color: white;
    border: none;
    border-radius: 8px;
    font-size: 1em;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

.search-button:hover {
    background-color: #2980b9;
    transform: scale(1.05);
}

/* FILTER BERDASARKAN KATEGORI DESIGN */
.category-filter {
    display: flex;
    justify-content: center;
    margin-bottom: 20px;
}

.category-list {
    list-style: none;
    display: flex;
    gap: 12px;
    padding: 0;
    flex-wrap: wrap;
    justify-content: center;
}

.category-item {
    background-color: rgba(255, 255, 255, 0.9);
    color: #222;
    padding: 8px 16px;
    border-radius: 20px;
    cursor: pointer;
    font-weight: 500;
    transition: all 0.3s ease;
    border: 2px solid #3498db;
}

.category-item a {
    text-decoration: none !important;
    color: inherit;
}

.category-item:hover {
    background-color: #3498db;
    color: white;
    transform: scale(1.05);
}







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

        @media (max-width: 768px) {
            .history-container {
                padding: 15px;
            }

            table.history-table th, table.history-table td {
                font-size: 0.9em;
                padding: 10px;
            }

            table.history-table td img {
                height: 80px;
            }
        }






    </style>

<body style="background:url(bg/bg1.png)">

@include('home.header')




<div class="search-section">

        <!-- UNTUK CARI BERDASARKAN KATEGORI -->
        <div class="category-filter">
    <ul class="category-list">
        @foreach($category as $category)
            <li class="category-item">
                <a href="{{url('cat_search', $category->id)}}">{{$category->nama}}</a>
            </li>
        @endforeach
    </ul>
</div>

@if(session()->has('message'))

            <div class="custom-alert">
            <i class="fa-solid fa-bell"></i>
            {{ session()->get('message') }}
            <button class="close-alert" onclick="this.parentElement.style.display='none';">&times;</button>
        </div>

        @endif
    <form class="search-form" action="{{url('search')}}" method="get">

    @csrf


        <div class="search-input-wrapper">
            <input class="search-input" type="search" name="search" placeholder="Cari buku berdasarkan Judul, Penulis, Kategori">
        </div>

        <div class="search-button-wrapper">
            <input class="search-button" type="submit" value="Search">
        </div>
    </form>
    
</div>


<section class="book-gallery">
    @foreach($data as $data)
        <div class="book-card">
            <img src="book/{{$data->book_img}}" alt="Buku 1">
            <h3>{{$data->judul}}</h3>
            <a href="{{url('book_details',$data->id)}}" class="detail-btn">Lihat detail buku</a>
            
            
            <a href="{{url('borrow_books',$data->id)}}" class="login-btn">Pinjam</a>
        </div>

        
        @endforeach
        <!-- Tambah buku di sini -->
    </section>

@include('home.footer')





    
</body>
</html>
