<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'game_id',
        'buyer_name',
        'buyer_email',
        'qty',
        'price',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function detailTransaksi()
    {
        return $this->hasMany(detailTransaksi::class);
    }

    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
