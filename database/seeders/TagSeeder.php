<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin\Tag;
use Illuminate\Support\Str;
use PhpParser\Node\Stmt\Foreach_;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            [
                'tag' => 'montagna',
                
            ],
            [
                'tag' => 'mare',
                
            ]
        ];

        foreach ($tags as $elem) {

            $new_tag = new Tag();

            $new_tag->tag = $elem['tag'];

            

            $new_tag->save();
        }
    }
}
