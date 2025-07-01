<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/styleAdmin.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <style>

        .center {
            text-align: center;
            margin: auto;
        }

        .table_center {
            text-align: center;
            margin: auto;
            border: 1px solid yellowgreen;
            margin-bottom : 300px;
        }
        
        th{
            background-color: skyblue;
            padding: 10px;
            font-size: 15px;
            font-weight: bold;
        }

    

        .bookimg {
            width: 150px;
            height: auto;
            
        }

        

        /* BUTTON DESIGN */

        #btn-hapus {
            width: 110px;
            height: 40px;
            background-color: red;
            color: white;
            border-radius: 6px;
            text-decoration: none;
            font-weight:bold;
            transition: background-color 0.3s ease;

        }

        #btn-hapus:hover {
            background-color:rgb(240, 80, 80);

            

        }

        #btn-edit {
            width: 110px;
            height: 40px;
            background-color: blue;
            color: white;
            border-radius: 6px;
            text-decoration: none;
            font-weight:bold;
            transition: background-color 0.3s ease;

        }

        #btn-edit:hover {
            background-color:rgb(84, 81, 250);
            

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
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        @include('admin.elements.sidebar')

        <!-- Main Content -->
        @include('admin.elements.mainContent')

        @if(session()->has('message'))
        <div class="custom-alert">
            <i class="fas fa-check-circle"></i>
            {{ session('message') }}
            <button class="close-alert" onclick="this.parentElement.style.display='none';">&times;</button>
        </div>
    @endif

    <div class="center">

        <table class="table_center">

            <tr>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Deskripsi</th>
                <th>ISBN</th>
                <th>tahun</th>
                <th>Jumlah</th>
                <th>Kategori</th>
                <th>Gambar Buku</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>

            
            @foreach($book as $book)
            <tr>
                <td>{{$book->judul}}</td>
                <td>{{$book->penulis}}</td>
                <td>{{$book->penerbit}}</td>
                <td>{{$book->deskripsi}}</td>
                <td>{{$book->isbn}}</td>
                <td>{{$book->tahun}}</td>
                <td>{{$book->jumlah}}</td>
                <td>{{$book->kategori->nama}}</td>

                <td>
                    <img class="bookimg"src="{{ url('/gambar_buku/' . basename($book->book_img)) }}">
                </td>

                <td>
                    <a onclick="confirmation(event)" href="{{url('book_delete', $book->id)}}"><Button class="btn-action btn-reject">Hapus</Button></a>
                </td>

                <td>
                    <a href="{{url('edit_book',$book->id)}}"><Button class="btn-action btn-approve">Edit</Button></a>
                </td>
                
            </tr>

            @endforeach


        </table>


    </div>

    <script type="text/javascript">

                    function confirmation(ev) {
                        ev.preventDefault();
                        var urlToRedirect = ev.currentTarget.getAttribute('href');
                        console.log(urlToRedirect);

                swal({
                    title: "Apakah ada yakin ingin menghapus ini?",
                    text: "Setelah dihapus, data tidak dapat dikembalikan",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })

                .then((willCancel) => {
                    if (willCancel) {
                        window.location.href = urlToRedirect;
                    }

                    });


                }
                </script>
    
</body>
</html>
