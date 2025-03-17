<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories'; // Your table name
    protected $fillable = ['name']; // Add columns that can be inserted

    public function recipes()
    {
        return $this->hasMany(Recipe::class);
    }
}
