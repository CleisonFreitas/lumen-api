<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Serie extends Model 
{
    protected $table = 'series';
 
    protected $fillable = [
        'nome'
    ];

    protected $appends = ['links'];

    public $timestamps = false;

    
 

    public function getLinksAttribute($links): array
    {
        return [
            'self' => '/api/series/'. $this->id,
            'episodios' => '/api/series/' . $this->id . '/episodios'
        ];

    }

    public function setNomeAttribute($nome)
    {
      $this->attributes['nome'] = strtoupper($nome);
    }

    public function serie()
    {
        return $this->hasMany(Episodio::class);
    }
}
