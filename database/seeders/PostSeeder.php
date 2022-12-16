<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        //Using eloquent to prevent timestamps issues
        Post::create([
            'category_id' => 1,
            'region' => 'Argentina',
            'content' => 'La empresa Body Health Group abrirá un centro de estética en pleno corazón de la ciudad de Buenos Aires, con el que busca atender a más de 500 personas al día, generando empleo en Argentina y luchando contra la economía.',
            'links' => '{"links": [{"url": "www.google.com","short": "SteticNews.com"}]}'
        ]);

        Post::create([
            'category_id' => 2,
            'region' => 'Portugal',
            'content' => 'Nueva adquisición: SteticABC acaba de anunciar un acuerdo para comprar SteticDEF con el objetivo de aumentar su presencia en el mercado alemán. El acuerdo se estima en alrededor de 2 millones de euros Lea más en SteticNews oNewsDaily',
            'links' => '{"links": [{"url": "www.google.com","short": "SteticNews.com"},{"url": "www.google.com","short": "NewDaily.com"}]}'
        ]);

        Post::create([
            'category_id' => 3,
            'region' => 'Italia',
            'content' => 'La empresa Almalaser ha finalizado operaciones en Argentina, no ha podido continuar con sus labores dado que el mercado ha cambiado y no pudo competir con la tecnología que están usando hoy en día los equipos, quedando atrás en el mercado.',
            'links' => '{"links": [{"url": "www.google.com","short": "SteticNews.com"}]}'
        ]);
    }
}
