<?php

namespace App\Models;

use Spatie\Tags\HasTags;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasTags;

    protected $fillable = ['content', 'links', 'region', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
