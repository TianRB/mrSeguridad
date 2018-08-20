<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
       DB::table('categories')->insert([
        'name' => 'Nuevos Productos',
        'video' => '',
        'slug' => str_slug('Nuevos Productos'),
      ]);
       DB::table('categories')->insert([
        'name' => 'Seguridad Vial',
        'video' => '',
        'slug' => str_slug('Seguridad Vial'),
      ]);
       DB::table('categories')->insert([
        'name' => 'Protección General',
        'video' => '',
        'slug' => str_slug('Protección General'),
      ]);
       DB::table('categories')->insert([
        'name' => 'Protección Visual',
        'video' => '',
        'slug' => str_slug('Protección Visual'),
      ]);
       DB::table('categories')->insert([
        'name' => 'Protección para Manos',
        'video' => '',
        'slug' => str_slug('Protección para Manos'),
      ]);
       DB::table('categories')->insert([
        'name' => 'Protección Auditiva',
        'video' => '',
        'slug' => str_slug('Protección Auditiva'),
      ]);
       DB::table('categories')->insert([
        'name' => 'Protección para la Lluvia',
        'video' => '',
        'slug' => str_slug('Protección para la Lluvia'),
      ]);
       DB::table('categories')->insert([
        'name' => 'Protección Respiratoria',
        'video' => '',
        'slug' => str_slug('Protección Respiratoria'),
      ]);
     }
}
