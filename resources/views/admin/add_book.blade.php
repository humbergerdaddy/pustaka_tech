<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/styleAdmin.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        body {
            font-family: Arial, Tahoma;
        }

        .center {
            text-align: center;
            margin: auto;
        }

        .title_deg {
            color: black;
            padding: 35px;
            font-size: 40px;
            text-align: center;
        }

        label {
            display: inline-block;
            width: 200px;
        }

        .input {
            padding: 5px;
        }

        #input{
            width: 400px;
            height: 30px;
        }

        #textarea{
            width: 400px;
            height: 110px;
        }

        #btn {
            width: 110px;
            height: 40px;
            background-color: blue;
            color: white;
            border-radius: 6px;
            text-decoration: none;
            font-weight:bold;
            transition: background-color 0.3s ease;

        }

        #btn:hover {
            background-color:rgb(84, 81, 250);
            

        }

        .input select {
            width: 400px;
            height: 30px;
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

        

        <div class="center">
            <h1 class="title_deg">Tambah Buku</h1>



            <div>
    @if(session()->has('message'))
        <div class="custom-alert">
            <i class="fas fa-check-circle"></i>
            {{ session('message') }}
            <button class="close-alert" onclick="this.parentElement.style.display='none';">&times;</button>
        </div>
    @endif
    </div>
            <form action="{{url('store_book')}}" method="Post" enctype="multipart/form-data">

                @csrf

                <div class="input">
                    <label>Judul Buku</label>
                    <input id="input" type="text" name="book_name">
                </div>

                <div class="input">
                    <label>Penulis</label>
                    <input id="input" type="text" name="auther_name">
                </div>

                <div class="input">
                    <label>Penerbit</label>
                    <input id="input" type="text" name="publisher">
                </div>


                <div class="input">
                    <label>ISBN</label>
                    <input id="input" type="text" name="isbn_isbn">
                </div>

                <div class="input">
                    <label>Tahun</label>
                    <input id="input" type="text" name="tahun">
                </div>

                <div class="input">
                    <label>Jumlah Buku</label>
                    <input id="input" type="number" name="quantity" min="0">
                </div>

                <div class="input">
                    <label>Deskripsi</label>
                    <textarea id="textarea" name="deskripsi" id=""></textarea>
                </div>

                <div class="input">
                    <label>Kategori</label>

                    <select name="category" required>
                        <option>Pilih Kategori</option>
                        @foreach($data as $data)
                        <option value="{{$data->id}}">{{($data->nama)}}</option>
                        @endforeach

                    </select>
                </div>

                <div class="input">
                    <label>Gambar Buku</label>
                    <input id="input" type="file" name="book_img">
                </div>

                

                <div class="input">
                    <input id="btn" type="submit" value="Tambah">
                </div>



            </form>
        </div>

        

    </div>
        

           
    
     

    


</body>
</html>