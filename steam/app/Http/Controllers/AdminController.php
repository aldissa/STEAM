<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\game;
use App\Models\kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function storeGame(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'foto' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'kategori_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('message', $validator->errors());
        }

        $game = new game();
        $game->foto = $request->foto;
        $game->name = $request->name;
        $game->description = $request->description;
        $game->price = $request->price;
        $game->kategori_id = $request->kategori_id;
        $game->save();

        return redirect()->route('index-game')->with('success', 'Game berhasil ditambahkan.');
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:kategories',
        ]);
    
        $kategori = new kategori();
        $kategori->name = $request->name;
        $kategori->save();
    
        $kategories = kategori::all();
    
        return redirect()->back()->with('success', 'Kategori berhasil ditambahkan.')->with('kategories', $kategories);
    }

    public function dash()
    {
        $games = game::all();

        return view('admin.index-game', compact('games'));
    }

    public function showAddGame()
    {
        $kategories = Kategori::all();
        $games = $this->listGames();

        return view('admin.add-game', compact('kategories', 'games'));
    }

    public function listGames()
    {
        $games = game::all();
        return $games;
    }
    
    public function index()
    {
        $user = Auth::user();
        
        if ($user && $user->role === 'admin') {
            return view('welcome');
        }
        
        $games = Game::all();
        return view('welcome', compact('games'));
    }


}
