<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/styleAdmin.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>

        /* Container table */
.center {
    margin: 40px auto;
    width: 95%;
    max-width: 1200px;
    border-collapse: collapse;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
    background-color: #fff;
    border-radius: 10px;
    overflow: hidden;
}

/* Table Header */
.center th {
    background-color: #3498db;
    color: white;
    font-size: 16px;
    font-weight: bold;
    padding: 12px;
    text-align: center;
}

/* Table Data */
.center td {
    padding: 12px;
    font-size: 15px;
    color: #333;
    text-align: center;
    border-bottom: 1px solid #eee;
}

/* Gambar Buku */
.center td img {
    height: 120px;
    width: 80px;
    object-fit: cover;
    border-radius: 5px;
    box-shadow: 0 0 5px rgba(0,0,0,0.1);
}

/* BUTTON: Umum */
.detail-btn,
#btn-hapus,
#detail-btn-green {
    display: inline-block;
    margin: 5px 2px;
    padding: 8px 14px;
    font-size: 14px;
    font-weight: 500;
    border-radius: 8px;
    border: 2px solid transparent;
    text-decoration: none;
    transition: all 0.3s ease;
    cursor: pointer;
}

/* BTN: Setujui */
.detail-btn {
    color: #3498db;
    border-color: #3498db;
    background-color: white;
}

.detail-btn:hover {
    background-color: #3498db;
    color: white;
}

/* BTN: Tolak */
#btn-hapus {
    color: red;
    border-color: red;
    background-color: white;
}

#btn-hapus:hover {
    background-color: red;
    color: white;
}

/* BTN: Sudah Dikembalikan */
#detail-btn-green {
    color: green;
    border-color: green;
    background-color: white;
}

#detail-btn-green:hover {
    background-color: green;
    color: white;
}

/* STATUS WARNA */
td span {
    font-weight: bold;
    padding: 4px 10px;
    border-radius: 8px;
    display: inline-block;
}

td span[style*="blue"] {
    background-color: rgba(52, 152, 219, 0.1);
}

td span[style*="red"] {
    background-color: rgba(231, 76, 60, 0.1);
}

td span[style*="green"] {
    background-color: rgba(46, 204, 113, 0.1);
}

td span[style*="black"] {
    background-color: rgba(149, 165, 166, 0.1);
}



    </style>
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        @include('admin.elements.sidebar')

        <!-- Main Content -->
        @include('admin.elements.mainContent')

        <div>
            <table class="center">
                <tr>
                    <th>Nama pengguna</th>
                    <th>Email</th>
                    <th>No seluler</th>
                    <th>Judul buku</th>
                    <th>Jumlah</th>
                    
                    <th>Gambar buku</th>
                    <th>Status</th>
                    <th>Ubah Status</th>
                </tr>

                @foreach($data as $data)
                <tr>
                    <td>{{$data->user->name}}</td>
                    <td>{{$data->user->email}}</td>
                    <td>{{$data->user->phone}}</td>
                    <td>{{$data->buku->judul}}</td>
                    <td>{{$data->buku->jumlah}}</td>
                    <td><img style="height:125px; width: 75px;"src="book/{{$data->buku->book_img}}" alt=""></td>
                    
                    <td>@if($data->status == 'Disetujui')

                    <span style="color: blue;">{{$data->status}}</span>
                    @endif
                    @if($data->status == 'Ditolak')

                    <span style="color: red;">{{$data->status}}</span>
                    @endif

                    @if($data->status == 'Dikembalikan')

                    <span style="color: green;">{{$data->status}}</span>
                    @endif

                    

                    @if($data->status == 'Menunggu')

                    <span style="color: black;">{{$data->status}}</span>
                    @endif</td>
                    <td>
                    <a href="{{url('approve_book', $data->id)}}" class="btn-action btn-approve">Setujui</a>
                    <a href="{{url('rejected_book', $data->id)}}"><Button class="btn-action btn-reject">Tolak</Button></a>
                    <a href="{{url('return_book', $data->id)}}" class="btn-action btn-returned">Dikembalikan</a></td>
                </tr>

                @endforeach
            </table>
        </div>
    
     

    
</body>
</html>
