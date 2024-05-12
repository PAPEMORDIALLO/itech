<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperProduit
 */
class Produit extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function categorie(): BelongsTo {
        return $this->belongsTo(Categorie::class);
    }


}
