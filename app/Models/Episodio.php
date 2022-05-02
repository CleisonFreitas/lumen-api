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

    protected $appends = ['links'];

    protected $hidden = ['serie_id'];


    public function getAssistidoAttribute($assistido): bool
    {
        return $assistido;
    }

    public $timestamps = false;

    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }

    public function getLinksAttribute($links): array
    {
        return [
            'self' => '/api/episodios/'. $this->id,
            'serie' => '/api/series/' . $this->serie_id
        ];
    }
}
