<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('viscontents')->insert([
            [ 
                'filename' => 'products/bottega-le-essenza.jpg', 
                'alt_desc' => "A blue glass perfume bottle with black cap, labeled 'Bottega Le Essenza Absolute Boy' and its matching box", 
                'prod_id' => 1 ,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [ 
                'filename' => 'products/ysl-cinema.jpg', 
                'alt_desc' => "A rectangular glass perfume bottle with a gold cap, labeled 'CINÉMA' and 'Yves Saint Laurent' next to its matching gold box", 
                'prod_id' => 2,
                'created_at' => now(),
                'updated_at' => now(), 
            ],
            [ 
                'filename' => 'products/burberry-weekend-edp-for-women-100ml.jpg', 
                'alt_desc' => "A glass perfume bottle with a silver cap, labeled 'Burberry Weekend' and its matching beige box with a checkered pattern", 
                'prod_id' => 3,
                'created_at' => now(),
                'updated_at' => now(), 
            ],
            [ 
                'filename' => 'products/mont-b.jpg', 
                'alt_desc' => "A rectangular glass perfume bottle with a silver cap, labeled 'Starwalker' and 'Montblanc' next to its blue box with the same branding", 
                'prod_id' => 4,
                'created_at' => now(),
                'updated_at' => now(), 
            ],
            [ 
                'filename' => 'products/burberry-touch.jpg', 
                'alt_desc' => "A clear glass perfume bottle with a dark wooden cap, labeled 'Burberry Touch for Women' next to its beige box with a checkered pattern", 
                'prod_id' => 5,
                'created_at' => now(),
                'updated_at' => now(), 
            ],
            [ 
                'filename' => 'products/dior-sauvage.jpg', 
                'alt_desc' => "A dark glass perfume bottle with a textured cap, labeled 'Sauvage Eau de Parfum' and 'Dior' next to its matching black box", 
                'prod_id' => 6,
                'created_at' => now(),
                'updated_at' => now(), 
            ],
            [ 
                'filename' => 'products/absolute-girl.webp', 
                'alt_desc' => "A pink glass perfume bottle with a black cap, labeled 'Bottega Le Essenza Absolute Girl' and its matching pink box", 
                'prod_id' => 7,
                'created_at' => now(),
                'updated_at' => now(), 
            ],
            [ 
                'filename' => 'products/gucci_bloom.webp', 
                'alt_desc' => "A pink rectangular perfume bottle labeled 'Gucci Bloom' next to its matching box with a red floral pattern", 
                'prod_id' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [ 
                'filename' => 'products/ck-sheer-beauty.png', 
                'alt_desc' => "pink bottle", 
                'prod_id' => 9,
                'created_at' => now(),
                'updated_at' => now(), 
            ],
            [ 
                'filename' => 'products/magical-nights.webp', 
                'alt_desc' => "clear bottle", 
                'prod_id' => 10,
                'created_at' => now(),
                'updated_at' => now(), 
            ],
            [ 
                'filename' => 'products/dior-homme.jpg', 
                'alt_desc' => "a bottle", 
                'prod_id' => 11,
                'created_at' => now(),
                'updated_at' => now(), 
            ],
            [ 
                'filename' => 'products/ysl-monparis.jpg', 
                'alt_desc' => 'a clear glass perfume bottle with a black bow and gold YSL charm, labeled "Mon Paris" next to its pink and black box with the YSL logo', 
                'prod_id' => 12,
                'created_at' => now(),
                'updated_at' => now(), 
            ],
            [ 
                'filename' => 'products/versace-eros.jpg', 
                'alt_desc' => 'a blue bottle', 
                'prod_id' => 13,
                'created_at' => now(),
                'updated_at' => now(), 
            ],
            [ 
                'filename' => 'products/lancome-lavie.webp', 
                'alt_desc' => 'sheer pink orange-ish bottle', 
                'prod_id' => 14,
                'created_at' => now(),
                'updated_at' => now(), 
            ],
            [ 
                'filename' => 'products/paco.webp', 
                'alt_desc' => 'gold-colored bottle', 
                'prod_id' => 15,
                'created_at' => now(),
                'updated_at' => now(), 
            ],
            [ 
                'filename' => 'products/jo-malone.jpg', 
                'alt_desc' => 'transparent bottle with a sheer yellow box', 
                'prod_id' => 16,
                'created_at' => now(),
                'updated_at' => now(), 
            ],
            [ 
                'filename' => 'products/chanel_chance.webp', 
                'alt_desc' => 'transparent bottle with a sheer pink box', 
                'prod_id' => 17,
                'created_at' => now(),
                'updated_at' => now(), 
            ],
            [ 
                'filename' => 'products/tom-black.jpg', 
                'alt_desc' => 'black bottle', 
                'prod_id' => 18,
                'created_at' => now(),
                'updated_at' => now(), 
            ],
            [ 
                'filename' => 'products/dolce-gabbana.jpg', 
                'alt_desc' => 'blue bottle', 
                'prod_id' => 19,
                'created_at' => now(),
                'updated_at' => now(), 
            ],
            [ 
                'filename' => 'products/bvlgari-black.jpg', 
                'alt_desc' => 'black bottle with gold accents', 
                'prod_id' => 20,
                'created_at' => now(),
                'updated_at' => now(), 
            ],
            [ 
                'filename' => 'products/maison.jpg', 
                'alt_desc' => 'transparent bottle with red and gold accents', 
                'prod_id' => 21,
                'created_at' => now(),
                'updated_at' => now(), 
            ],
            [ 
                'filename' => 'products/chanel-bleu.webp', 
                'alt_desc' => 'black-navy bottle', 
                'prod_id' => 22,
                'created_at' => now(),
                'updated_at' => now(), 
            ],
            [ 
                'filename' => 'products/musc-noir.webp', 
                'alt_desc' => 'pink bottle', 
                'prod_id' => 23,
                'created_at' => now(),
                'updated_at' => now(), 
            ],
            [ 
                'filename' => 'products/dg-l.jpg', 
                'alt_desc' => 'sheer pink bottle', 
                'prod_id' => 24,
                'created_at' => now(),
                'updated_at' => now(), 
            ],
            [ 
                'filename' => 'products/vic-hills.webp', 
                'alt_desc' => 'brown bottle', 
                'prod_id' => 25,
                'created_at' => now(),
                'updated_at' => now(), 
            ],
            
        ]);
    }
}
