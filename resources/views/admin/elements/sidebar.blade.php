<div class="sidebar">
            <div class="sidebar-header">
                <h2><i class="fas fa-book"></i> Pustaka Admin</h2>
            </div>
            <div class="sidebar-menu">
            <div class="menu-item {{ Request::is('home') ? 'active' : '' }}">
                    <a id="link" href="/home">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
</a>
                </div>
                <div class="menu-item {{ Request::is('category_page') ? 'active' : '' }}">
                    <a id="link" href="{{url('category_page')}}">
                    <i class="fa-solid fa-list"></i>
                    <span>Kategori</span>
</a>
                </div>
                <div class="menu-item {{ Request::is('add_book') ? 'active' : '' }}">
                <a id="link" href="{{url('add_book')}}">
                <i class="fa-solid fa-book-medical"></i>
                    <span>Tambah Buku</span>
                    </a>
                </div>
                <div class="menu-item {{ Request::is('show_book') ? 'active' : '' }}">
                <a id="link" href="{{url('show_book')}}">
                <i class="fa-solid fa-book-open"></i>
                    <span>Kelola Buku</span>
                    </a>
                </div>
                <div class="menu-item {{ Request::is('borrow_request') ? 'active' : '' }}">
                   <a id="link" href="{{url('borrow_request')}}">
                   <i class="fas fa-book-reader"></i>
                    <span>Permintaan Peminjaman</span>
                    </a> 
                </div>
            </div>
        </div>