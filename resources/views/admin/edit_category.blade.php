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

        
        
        #btn-submit {
            Background-color: black;
            color: white;
            border-radius: 5px;
            width : 90px;
            height : 30px;
        }

        #btn-submit:hover {
            Background-color: gray;
        }

        /* .bungkusbang {
            text-align: center;
            margin: auto;
        } */

        .bungkusbang input {
            height: 30px;
            border-radius: 3px;
            text-align: center;
        } 

        .form {
            width: 1000px;
            text-align: center;
            margin-top: 3rem;
            margin-bottom: 6rem;
        }
            


    </style>
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        @include('admin.elements.sidebar')

        <!-- Main Content -->
        @include('admin.elements.mainContent')

        <div class="form">
    <div class="bungkusbang">
        <h1>Ubah Category</h1>

        <form action="{{url('update_category', $data->id)}}" method="post">

    @csrf
           
            <label>Nama kategori</label>

            <input type="text" name="cat_name" value="{{$data->nama}}">

            <input type="submit" id="btn-submit" value="Update">
    </form>
    </div>
    </div>
        

           
    
     

    
</body>
</html>
