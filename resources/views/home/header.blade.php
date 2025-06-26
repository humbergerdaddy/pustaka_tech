<header>
    <nav class="menu">
        <ul class="dropdown">
            <div>
            <li class="menu-item {{ Request::is('/') ? 'active' : '' }}"> <a href="/">Home</a></li>
</div>
            <div>
            <li class="menu-item {{ Request::is('explore') ? 'active' : '' }}"> <a href="{{url('explore')}}">Telusuri Buku</a></li>
            </div>





             @if (Route::has('login'))
                <!-- <nav class="flex items-center justify-end gap-4"> -->
                    @auth
                    <div >
                    <li class="menu-item {{ Request::is('book_history') ? 'active' : '' }}"> <a href="{{url('book_history')}}">Riwayat saya</a></li>
                    </div>
                    <li>
                    <x-app-layout>
                        </x-app-layout>

                    </li>
                        

                        
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