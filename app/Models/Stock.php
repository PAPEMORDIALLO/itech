<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperStock
 */
class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'produit_id',
        'quantite',
    ];

    public function produit() : BelongsTo
    {
        return $this->belongsTo(Produit::class);
    }
}
