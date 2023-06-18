<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\game;
use App\Models\transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransaksiController extends Controller
{
    public function showTransaksiFrom(game $game)
    {
        return view('transaksi', compact('game'));
    }

    public function buy($game_id)
    {
        $game = game::find($game_id);
        return view('buy', compact('game'));
    }

    public function processBuy($game_id)
    {
        $user = auth()->user();

        $game = Game::find($game_id);

        $transaksi = new Transaksi();
        $transaksi->user_id = $user->id;
        $transaksi->game_id = $game->id;
        $transaksi->qty = 1;
        $transaksi->price = $game->price;
        $transaksi->save();

        return redirect()->route('transaksi.show', ['transaksi_id' => $transaksi->id])->with('success', 'Pembelian berhasil.');
    }


    
    public function show($transaksi_id)
    {
        $transaksi = Transaksi::findOrFail($transaksi_id);

        return view('transaksi.show', compact('transaksi'));
    }

}
