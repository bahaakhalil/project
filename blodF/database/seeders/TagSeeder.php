<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // //by object way
        // $tag = new Tag();
        // $tag->name = "PHP";
        // $tag->save();



        // //by model way
        // Tag::create(['name' => 'Java']);
        // // for ($i=0; $i < 10; $i++) {
        // //     Tag::create(['name' => 'Java'. $i]);
        // // }

        // //by query builder way
        // DB::table('tags')->insert([
        //     ['name' => 'HTML'],
        //     ['name' => 'CSS'],
        //     ['name' => 'JS'],
        // ]);

        Tag::factory(10)->create();
    }
}
