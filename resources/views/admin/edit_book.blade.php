<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/styleAdmin.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>

        /* BUTTON */
        .button {
            Background-color: black;
            color: white;
            border-radius: 5px;
            width : 90px;
            height : 30px;
    
        }

        .button:hover {
            Background-color: gray;

        }

        /* MAIN */

        .center {
            text-align: center;
            margin: auto;
        }

        .center h1 {
            padding: 30px;
            font-size: 30px;
            font-weight: bold;

        }

        label {
            display: inline-block;
            width: 200px;
        }

        .paddings {
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

        .paddings select {
            width: 400px;
            height: 30px;
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
            <h1>Edit Buku</h1>

            <form action="{{url('update_book', $data->id)}}" method="Post" enctype="multipart/form-data">

            @csrf

                <div class="paddings">
                    <label>Judul Buku</label>
                    <input id="input" type="text" name="title" value="{{$data->judul}}">
                </div>

                <div class="paddings">
                    <label>Penulis</label>
                    <input id="input" type="text" name="penulis" value="{{$data->penulis}}">
                </div>

                <div class="paddings">
                    <label>Penerbit</label>
                    <input id="input" type="text" name="penerbit" value="{{$data->penerbit}}">
                </div>

                <div class="paddings">
                    <label>Deskripsi</label>
                    <textarea id="textarea" name="deskripsi">{{$data->deskripsi}}</textarea>
                </div>

                <div class="paddings">
                    <label>ISBN</label>
                    <input id="input" type="text" name="isbn" value="{{$data->isbn}}">
                </div>

                <div class="paddings">
                    <label>Tahun</label>
                    <input id="input" type="text" name="tahun" value="{{$data->tahun}}">
                </div>

                <div class="paddings">
                    <label>Jumlah</label>
                    <input id="input" type="number" min="0" name="jumlah" value="{{$data->jumlah}}">
                </div>

                <div class="paddings">
                    <label>Kategori</label>
                    <select name="category">

                    <option value="{{$data->kategori_id}}">{{$data->kategori->nama}}</option>

                        @foreach ($category as $category)

                        <option value="{{$category->id}}">{{$category->nama}}</option>

                        @endforeach
                    </select>

                    <div class="paddings">
                        <label for="">Sampul Buku</label>
                        
                        <img src="{{ url('/gambar_buku/' . basename($book->book_img)) }}" alt="Gambar Buku">

                    

                    </div>

                    <div class="paddings">
                        <label>Ganti Sampul Buku</label>
                        <input id="input" type="file" name="book_img">
                    </div>

                    <div class="paddings">
                        <input class="button" type="submit" value="Update Buku">
                    </div>
                </div>
            </form>
        </div>

    
            

           

   
    
     

    
</body>
</html>
