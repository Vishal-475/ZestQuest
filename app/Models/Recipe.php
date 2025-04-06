<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'description', 
        'ingredients', 
        'instructions', 
        'image', 
        'category_id' // Ensure category_id is fillable
    ];

    /**
     * Get the category associated with the recipe.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * The tags that belong to the recipe.
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'recipe_tag');
    }
    
}
