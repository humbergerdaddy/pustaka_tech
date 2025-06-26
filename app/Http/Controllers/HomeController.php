<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\buku;

use App\Models\Pinjam;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\kategori;

class HomeController extends Controller
{
    public function index()
    {

        $data = buku::all();
        return view('home.index', compact('data'));
    }

    public function book_details($id)
    {
        $data = buku::find($id);

        return view('home.book_details', compact('data'));
    }

    public function borrow_books($id)
    {
        $data = buku::find($id);

        $book_id = $id;

        $quantity = $data->jumlah;

            if($quantity >='1')
            {

                if (Auth::id())
                {
                    $user_id = Auth::user()->id;

                    $borrow = new Pinjam;

                    $borrow->buku_id = $book_id;

                    $borrow->user_id = $user_id;

                    $borrow->status = 'Menunggu';

                    $borrow->save();

                    return redirect()->back()->with('message', 'Permintaan peminjaman berhasil terkirim, peminjaman mu akan segera di verifikasi oleh admin!');

                    

                }
                else
                {
                    return redirect('/login');

                }


            }
            else
            {
                return redirect()->back()->with('message', 'Buku tidak tersedia/sedang dipinjam');

            }
    }

    public function book_history()

    {
        if(Auth::id())
        {
            $userid = Auth::user()->id;

            $data = Pinjam::where('user_id', '=', $userid)->get();

            return view('home.book_history', compact('data'));
        }
        
    }

    public function cancel_req($id)
    {
        $data = Pinjam::find($id);

        $data->delete();

        return redirect()->back()->with('message', 'Peminjaman berhasil di batalkan');
        
    }

    public function explore()
    {
        $data = buku::all();
        $category = kategori::all();

        return view('home.explore',compact('data', 'category'));
    }

    public function search(Request $request)
    {

        $category = kategori::all();

        

        $search = $request->search;

        $data = buku::where('judul','LIKE','%'.$search.'%')->orWhere('penulis','LIKE','%'.$search.'%')->get();

        return view('home.explore',compact('data', 'category'));
    }


    public function cat_search($id)
    {
        $category = kategori::all();

        $data = buku::where('kategori_id', $id)->get();
        return view('home.explore',compact('data', 'category'));


    }
}

