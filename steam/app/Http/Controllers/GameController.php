<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\game;
use App\Models\transaksi;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function showGame($id)
    {
        $game = game::findOrFail($id);
        return view('game.detail', compact('game'));
    }

    public function koleksi()
    {
        $user = auth()->user();

        $transaksis = transaksi::where('user_id', $user->id)->get();

        return view('koleksi', compact('transaksis'));
    }

}
