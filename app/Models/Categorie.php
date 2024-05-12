<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin IdeHelperCategorie
 */
class Categorie extends Model
{
    use HasFactory;

    protected $fillable = ['libelle', 'image'];

    public function produits(): hasMany
    {
        return $this->hasMany(Produit::class);
    }

    public function preferences(): hasMany
    {
        return $this->hasMany(Preference::class);
    }

}
