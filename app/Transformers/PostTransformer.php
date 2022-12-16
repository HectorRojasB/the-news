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
            'links' => json_decode($post->links)
        ];
    }

    public function formatCreationDate($originalDate) : string
    {
        setlocale(LC_TIME, 'es_ES');
        Carbon::setLocale('es');

        $formattedNowDate = Carbon::now()->toDateString();
        $formattedCreatedAt = Carbon::parse($originalDate);

        return $formattedCreatedAt->gt($formattedNowDate)
            ? 'Hoy'.', '.$formattedCreatedAt->format('h:i')
            : ucfirst($formattedCreatedAt->diffForHumans(['options' => Carbon::ONE_DAY_WORDS])).', '.$formattedCreatedAt->format('h:i');
    }
}
