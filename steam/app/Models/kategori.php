<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'kategoris';


    public function games()
    {
        return $this->hasMany(game::class);
    }
}
