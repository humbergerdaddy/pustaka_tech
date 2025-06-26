<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Perpustakaan Kampus</title>
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

        /* BTN BATAL */
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

<!-- MAIN PAGE -->

<!-- <div>
   
    <table class="table_deg">
        <tr>
            <th>Judul Buku</th>
            <th>Penulis</th>
            <th>Status Peminjaman</th>
            <th>Gambar</th>
        </tr>

        <tr>
            <td>abcd</td>
            <td>abcd</td>
            <td>abcd</td>
            <td>abcd</td>
        </tr>
    </table>


</div> -->

<main class="history-container">
        <h2>Riwayat Peminjaman Buku</h2>
        <table class="history-table">

        


    @if(session()->has('message'))
        <div class="custom-alert">
            <i class="fas fa-check-circle"></i>
            {{ session('message') }}
            <button class="close-alert" onclick="this.parentElement.style.display='none';">&times;</button>
        </div>
    @endif
    </div>
            <tr>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Status</th>
                <th>Gambar</th>
                <th>Batalkan Peminjaman</th>
            </tr>

           
            @foreach($data as $data)
            <tr>
                <td>{{$data->buku->judul}}</td>
                <td>{{$data->buku->penulis}}</td>
                <td>{{$data->status}}</td>
                <td><img src="book/{{$data->buku->book_img}}" alt="Atomic Habits"></td>
                <td>
                    @if($data->status == 'Menunggu')
                <a href="{{url('cancel_req',$data->id)}}" class="cancel-btn">Batalkan</a>

                @else

                <p style="color: white; font-weight: bold;">Tidak dapat di batalkan</p>

                @endif
                </td>
            </tr>
            @endforeach
           
           
        </table>
    </main>

@include('home.footer')





    
</body>
</html>
