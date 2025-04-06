<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Define Many-to-Many Relationship
    public function recipes()
    {
        return $this->belongsToMany(Recipe::class, 'recipe_tag');
    }
    
}
