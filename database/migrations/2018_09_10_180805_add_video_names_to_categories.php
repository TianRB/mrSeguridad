<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;
use App\Category;

class AddVideoNamesToCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Category::truncate();
      DB::table('categories')->insert([
        'name' => 'Nuevos Productos',
        'video' => 'video/nuevos-productos.mp4',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'slug' => 'nuevos-productos',
      ]);
      DB::table('categories')->insert([
        'name' => 'Seguridad Vial',
        'video' => 'video/seguridad-vial.mp4',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'slug' => 'seguridad-vial',
      ]);
      DB::table('categories')->insert([
        'name' => 'Protección General',
        'video' => 'video/proteccion-general.mp4',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'slug' => 'proteccion-general',
      ]);
      DB::table('categories')->insert([
        'name' => 'Protección Visual',
        'video' => 'video/proteccion-visual.mp4',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'slug' => 'proteccion-visual',
      ]);
      DB::table('categories')->insert([
        'name' => 'Protección para Manos',
        'video' => 'video/proteccion-para-manos.mp4',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'slug' => 'proteccion-para-manos',
      ]);
      DB::table('categories')->insert([
        'name' => 'Protección Auditiva',
        'video' => 'video/proteccion-auditiva.mp4',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'slug' => 'proteccion-auditiva',
      ]);
      DB::table('categories')->insert([
        'name' => 'Protección para la Lluvia',
        'video' => 'video/proteccion-para-la-lluvia.mp4',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'slug' => 'proteccion-para-la-lluvia',
      ]);
      DB::table('categories')->insert([
        'name' => 'Protección Respiratoria',
        'video' => 'video/proteccion-respiratoria.mp4',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'slug' => 'proteccion-respiratoria',
      ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
