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

//    public function getTagsAttribute()
//    {
//        return $this->tags()->get()->pluck('name');
//    }
//
//    public function getCreationAttribute() : string
//    {
//        setlocale(LC_TIME, 'es_ES');
//        Carbon::setLocale('es');
//
//        $formattedNowDate = Carbon::now()->toDateString();
//        $formattedCreatedAt = Carbon::parse($this->created_at);
//
//        return $formattedCreatedAt->gt($formattedNowDate)
//            ? 'Hoy'.', '.$formattedCreatedAt->format('h:i')
//            : ucfirst($formattedCreatedAt->diffForHumans(['options'=>Carbon::ONE_DAY_WORDS])).', '.$formattedCreatedAt->format('h:i');
//    }
}
