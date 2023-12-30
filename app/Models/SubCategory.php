<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubCategory extends Model
{

    protected $fillable = [
        'subcategory_name',
        'subcategory_slug',
        'category_id',

    ];

    use HasFactory;

    // Define the relationship to the "Category" model
    public function category(): BelongsTo {
        return $this->belongsTo(Category::class, 'category_id');
    }

}
