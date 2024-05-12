<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin IdeHelperCommande
 */
class Commande extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'num_commande',
        'montant',
        // 'statut',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function produits(): HasMany
    {
        return $this->hasMany(Produit::class);
    }
}
