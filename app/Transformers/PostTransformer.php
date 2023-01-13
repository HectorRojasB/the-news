<?php

namespace App\Transformers;

use Carbon\Carbon;
use App\Models\Post;
use League\Fractal\TransformerAbstract;

class PostTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Post $post)
    {
        return [
            'id' => $post->id,
            'category' => $post->category->name,
            'region' => $post->region,
            'tags' => $post->tags()->get()->pluck('name'),
            'content' => $post->content,
            'creation' => $this->formatCreationDate($post->created_at),
            'link' => $post->link
        ];
    }

    public function formatCreationDate($originalDate) : string
    {
        setlocale(LC_TIME, 'es_ES');
        Carbon::setLocale('es');

        $formattedCreatedAt = Carbon::parse($originalDate);

        return $formattedCreatedAt->isToday()
            ? 'Hoy'.', '.$formattedCreatedAt->format('h:i')
            : ucfirst($formattedCreatedAt->diffForHumans(['options' => Carbon::ONE_DAY_WORDS])).', '.$formattedCreatedAt->format('h:i');
    }
}
