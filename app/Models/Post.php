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

    public function search($param)
    {
        return $this->withAnyTags([$param]) //search by tags
        ->orWhere("links", "LIKE", "%{$param}%" ) //search by given links
        ->orWhere("region", "LIKE", "%{$param}%" ) //search by region
        ->orWhereHas("category", function($q) use ($param) { //search by category name
            $q->where("name", "LIKE", "%{$param}%");
        })->paginate(10);
    }
}
