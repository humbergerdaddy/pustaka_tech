<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/styleAdmin.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <style type="text/css">
        body {
            font-family: Arial, Tahoma;
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

/* INI DESAIN UNTUK FORM */
        #isi {
            height: 30px;
            border-radius: 3px;
        }
        .form {
            width: 1000px;
            text-align: center;
            margin-top: 3rem;
            margin-bottom: 6rem;
        }


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

        .center {
            margin: auto;
            width: 50%;
            text-align: center;
            margin-top: 50px;
            border: 1px solid black;
            font-family: Arial, Tahoma;
        }

        th {
            background-color: skyblue;
            padding: 10px;
        }

        table {
            background-color: gray;
            color: black;
            font-weight: bold;
            
            
        }

        tr {
            border: 1px solid white;
            padding: 10px;
        }

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

    </style>
</head>
<body>

<div class="container">
    @include('admin.elements.sidebar')

    <!-- Main Content -->
    @include('admin.elements.mainContent')

    <!-- <div>
        @if(session()->has('message'))

        <div class="alert">        
            {{session()->get('message')}}
    </div>

        @endif
    </div> -->

    <div>
    @if(session()->has('message'))
        <div class="custom-alert">
            <i class="fas fa-check-circle"></i>
            {{ session('message') }}
            <button class="close-alert" onclick="this.parentElement.style.display='none';">&times;</button>
        </div>
    @endif
    </div>


    <div class="form">
        <h1>Tambah Kategori</h1>
        <form action="{{url('add_category')}}" method="Post">

        @csrf

            <label>Nama Kategori</label>
            <input id="isi" type="text" name="category" required>

          
            <input class="button" type="submit" value="Tambah">
        </form>

        <div>
            <table class="center" border="1">
                <tr>
                    <th id="thbg">Nama Kategori</th>
                    <th id="thbg">Aksi</th>
                </tr>

                @foreach($data as $data)
                <tr>
                    <td>{{$data->nama}}</td>
                    <td> 
                        <a href="{{url('edit_category', $data->id)}}"><button id="btn-edit">Edit</button></a>
                        <a onclick="confirmation(event)" href="{{url('cat_delete', $data->id)}}"><Button id="btn-hapus">Hapus</Button></a>
                    </td>

                    
                </tr>

                @endforeach


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
            </table>
        </div>
    </div>
    </div>

    
</body>
</html>