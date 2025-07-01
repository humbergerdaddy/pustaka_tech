<main>
        <h1>Pustaka.tech</h1>
        <p>"Menjembatani Teknologi dan Literasi untuk Generasi Cerdas"</p>

       
            @if(session()->has('message'))

            <div class="custom-alert">
            <i class="fa-solid fa-bell"></i>
            {{ session()->get('message') }}
            <button class="close-alert" onclick="this.parentElement.style.display='none';">&times;</button>
        </div>

        @endif

            



            
        </div>


        
    <section class="book-gallery">
    @foreach($data as $data)
        <div class="book-card">
            <img src="{{ url('/gambar_buku/' . basename($book->book_img)) }}" alt="Buku 1">
            <div class="book-info">
            <h3>{{$data->judul}}</h3>
            </div>

            <div class="book-actions">
            <a href="{{url('book_details',$data->id)}}" class="detail-btn">Lihat detail buku</a>
            
            
            <a href="{{url('borrow_books',$data->id)}}" class="login-btn">Pinjam</a>
            </div>
        </div>

        
        @endforeach
        <!-- Tambah buku di sini -->
    </section>

   

</main>