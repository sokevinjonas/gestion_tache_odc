<?php

namespace App\Models;

use App\Models\User;
use App\Models\CategorieTache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tache extends Model
{
    use HasFactory;

    protected $fillable = [
		'titre',
	];

    public function categorieTache()
    {
        return $this->belongsTo(CategorieTache::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}