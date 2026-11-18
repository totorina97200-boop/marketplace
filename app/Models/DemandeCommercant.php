<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class DemandeCommercant extends Model
{
    protected $fillable = [
        'user_id',
        'nom_boutique',
        'description',
        'telephone',
        'statut',
    ];

    public function utilisateur(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}