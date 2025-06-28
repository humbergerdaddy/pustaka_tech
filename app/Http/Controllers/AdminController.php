<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use App\Models\buku;

use App\Models\kategori;

use App\Models\Pinjam;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        if(Auth::id())

        {
            $user_type = Auth()->user()->usertype;

            if($user_type == 'admin')

            {
                $user = User::all()->count();

                $book = Buku::all()->count();

                $borrow = Pinjam::where('status', 'Disetujui')->count();

                $returned = Pinjam::where('status', 'Dikembalikan')->count();

                return view('admin.index', compact('user', 'book', 'borrow', 'returned'));
            }

            else if($user_type == 'user')

            {

                $data = buku::all();
                return view('home.index', compact('data'));
            }
        }

        else

        {
            return redirect()->back();
        }

    }

    public function category_page()
    {
        $data = kategori::all();
        return view('admin.category', compact('data'));
    }

    public function add_category(Request $request)
    {
        $data = new kategori;

        $data->nama = $request->category;

        $data->save();

        return redirect()->back()->with('message', 'Kategori Berhasil Ditambahkan');

    }

    public function cat_delete($id)
    {
        $data= kategori::find($id);

        $data->delete();
        return redirect()->back()->with('message', 'data kategori berhasil dihapus');
    }

    public function edit_category($id)
    {
        $data = kategori::find($id);

        return view('admin.edit_category', compact('data'));
    }

    public function update_category(Request $request,$id)
    {
        $data = kategori::find($id);

        $data->nama = $request->cat_name;

        $data->save();

        return redirect('/category_page')->with('message', 'Kategori berhasil dirubah');
    }

    public function add_book()
    {
        $data = kategori::all();

        return view('admin.add_book', compact('data'));
    }

    public function store_book(Request $request)
    {
        $data =new buku;

        $data->judul = $request->book_name;

        $data->penulis = $request->auther_name;

        $data->penerbit = $request->publisher;

        $data->deskripsi = $request->deskripsi;

        $data->isbn = $request->isbn_isbn;

        $data->tahun = $request->tahun;

        $data->jumlah = $request->quantity;

        $data->kategori_id = $request->category;

        $book_image=$request->file('book_img');

        if($book_image)
        {
            $book_image_name = time().'.'.$book_image->getClientOriginalExtension();

            // INI KODE SEBELUMNYA
            // $request->book_img->move('book', $book_image_name);

            // FIXING BUG RAILWAY SOLUSI DR CHATGPT

            // $book_image_name = time().'.'.$book_image->getClientOriginalExtension();
            // $request->book_img->move(public_path('book'), $book_image_name);

            // perubahan struktur jadi simpan di storage (Solution bychatgpt)
            $path = $book_image->storeAs('public/book', $book_image_name);


            $data->book_img = $book_image_name;
        }

        $data->save();

        return redirect()->back()->with('message', 'Data Buku berhasil ditambahkan');


    }


    public function show_book()
    {
        $book = buku::all();

        return view('admin.show_book', compact('book'));
    }

    public function book_delete($id)
    {
        $book = buku::find($id);

        $book->delete();

        return redirect()->back()->with('message', 'Data Buku berhasil dihapus');
    }

    public function edit_book($id)
    {

        $data = buku::find($id);

        $category = kategori::all();

        return view('admin.edit_book',compact('data', 'category'));
    }

    public function update_book(Request $request, $id)
    {
        $data = buku::find($id);

        $data->judul = $request->title;

        $data->penulis = $request->penulis;

        $data->penerbit = $request->penerbit;

        $data->deskripsi = $request->deskripsi;

        $data->isbn = $request->isbn;

        $data->tahun = $request->tahun;

        $data->jumlah = $request->jumlah;

        $data->kategori_id= $request->category;

        $book_image=$request->file('book_img');

        // test file masuk apa enggak
        if (!$request->hasFile('book_img')) {
            dd('GAK ADA FILE YANG DIUPLOAD');
        }
        
        if($book_image)
        {
            $book_image_name = time().'.'.$book_image->getClientOriginalExtension();

            // $request->book_img->move('book', $book_image_name);
            // $request->book_img->move(public_path('book'), $book_image_name);

            // perubahan struktur jadi simpan di storage (Solution bychatgpt)
            $path = $book_image->storeAs('public/book', $book_image_name);

            $data->book_img = $book_image_name;
        }

        $data->save();

        return redirect('/show_book')->with('message', 'Buku berhasil di update!');
       

    }

    public function borrow_request() 
    {
        $data = Pinjam::all();

        return view('admin.borrow_request',compact('data'));

    }

    public function approve_book($id)
    {
        $data = Pinjam::find($id);

        $status = $data->status;

        if ($status == 'Disetujui'){

            return redirect()->back();

        }
        else

        {
        
            $data->status ='Disetujui';

        $data->save();


        $bookid = $data->buku_id;

        $book = buku::find($bookid);

        $book_qty = $book->jumlah - '1' ;

        $book->jumlah = $book_qty;

        $book->save();



        return redirect()->back();


        }

        
    }

    public function return_book($id)
    {
        $data = Pinjam::find($id);

        $status = $data->status;

        if ($status == 'Dikembalikan'){

            return redirect()->back();

        }
        else

        {
        
            $data->status ='Dikembalikan';

        $data->save();


        $bookid = $data->buku_id;

        $book = buku::find($bookid);

        $book_qty = $book->jumlah + '1' ;

        $book->jumlah = $book_qty;

        $book->save();



        return redirect()->back();


        }

        
    }

    public function rejected_book($id)
    {
        $data = Pinjam::find($id);

        $data->status ='Ditolak';

        $data->save();

        return redirect();




    }

    
}
