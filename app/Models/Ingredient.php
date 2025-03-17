<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    protected $table = 'ingredients'; // Your table name
    protected $fillable = ['name', 'recipe_id', 'quantity']; // Add columns that can be inserted

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
