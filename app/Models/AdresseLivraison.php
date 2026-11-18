<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AdresseLivraison extends Model
{
    use HasFactory;

    protected $fillable = [
        'commande_id',
        'nom_complet',
        'telephone',
        'adresse',
        'code_postal',
        'ville',
        'pays',
    ];

    public function commande(): BelongsTo
    {
        return $this->belongsTo(Commande::class);
    }
}