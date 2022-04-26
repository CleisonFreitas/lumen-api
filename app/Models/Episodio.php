<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class Episodio extends Model 
{
    
    protected $table = 'episodios';

    protected $fillable = [
        'temporada', 'numero','assistido','serie_id'
    ];

    public $timestamps = false;

    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }
}
