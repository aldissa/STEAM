<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\game;
use App\Models\kategori;
use App\Models\transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    public function edit($id)
    {
        $game = Game::findOrFail($id);
        $kategories = Kategori::all();

        return view('admin.edit-game', compact('game', 'kategories'));
    }

    public function update(Request $request, $id)
    {
        $game = Game::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'kategori_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('message', $validator->errors());
        }

        $game->name = $request->name;
        $game->description = $request->description;
        $game->price = $request->price;
        $game->kategori_id = $request->kategori_id;
        $game->save();

        return redirect()->route('index-game')->with('message', 'Game updated successfully.');
    }

    public function destroy($id)
    {
        $game = game::findOrFail($id);
        $game->delete();

        return redirect()->route('index-game')->with('message', 'Game deleted successfully.');
    }

}
