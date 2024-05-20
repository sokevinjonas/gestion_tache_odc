<?php

namespace App\Models;

use App\Models\Tache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategorieTache extends Model
{
    use HasFactory;

    protected $fillable = [
		'libelle',
	];

    public function taches()
    {
        return $this->hasMany(Tache::class);
    }
}