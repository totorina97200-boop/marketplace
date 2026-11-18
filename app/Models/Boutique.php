<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Boutique extends Model
{
    use HasFactory;

    protected $fillable = [
       'user_id',
    'nom',
    'slug',
    'description',
    'logo',
    'email',
    'telephone',
    'statut',
    ];

    public function produits(): HasMany
    {
        return $this->hasMany(Produit::class);
    }

    public function lignesCommande(): HasMany
    {
        return $this->hasMany(LigneCommande::class);
    }
    public function utilisateur(): BelongsTo
{
    return $this->belongsTo(User::class, 'user_id');
}
}