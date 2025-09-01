<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $areas = [
            ['codigo' => '30', 'nombre' => 'Enciclopedia'],
            ['codigo' => '100', 'nombre' => 'Filosofía'],
            ['codigo' => '150', 'nombre' => 'Psicología'],
            ['codigo' => '200', 'nombre' => 'Religión'],
            ['codigo' => '300', 'nombre' => 'Ciencias Sociales'],
            ['codigo' => '320', 'nombre' => 'Educación Cívica'],
            ['codigo' => '330', 'nombre' => 'Economía Superior'],
            ['codigo' => '370', 'nombre' => 'Pedagogía'],
            ['codigo' => '371', 'nombre' => 'Educación Física'],
            ['codigo' => '420', 'nombre' => 'Inglés'],
            ['codigo' => '460', 'nombre' => 'Lengua y Literatura'],
            ['codigo' => '463', 'nombre' => 'Diccionario'],
            ['codigo' => '500', 'nombre' => 'Ciencias Naturales'],
            ['codigo' => '510', 'nombre' => 'Matemática'],
            ['codigo' => '512', 'nombre' => 'Álgebra'],
            ['codigo' => '513', 'nombre' => 'Aritmética'],
            ['codigo' => '516', 'nombre' => 'Geometría y Trigonometría'],
            ['codigo' => '530', 'nombre' => 'Física'],
            ['codigo' => '540', 'nombre' => 'Química'],
            ['codigo' => '570', 'nombre' => 'Biología'],
            ['codigo' => '590', 'nombre' => 'Zoología y Botánica'],
            ['codigo' => '611', 'nombre' => 'Anatomía'],
            ['codigo' => '657', 'nombre' => 'Contabilidad'],
            ['codigo' => '730', 'nombre' => 'Educación Artística'],
            ['codigo' => '741', 'nombre' => 'Formación Laboral'],
            ['codigo' => '800', 'nombre' => 'Literatura'],
            ['codigo' => '865.5', 'nombre' => 'Literatura Peruana y Huanuqueña'],
            ['codigo' => '869', 'nombre' => 'Literatura Universal'],
            ['codigo' => '869.01', 'nombre' => 'Poemas y Poesías'],
            ['codigo' => '869.02', 'nombre' => 'Teatro'],
            ['codigo' => '909', 'nombre' => 'Historia Universal'],
            ['codigo' => '910', 'nombre' => 'Geografía y Mapas del Perú'],
            ['codigo' => '920', 'nombre' => 'Biografías'],
            ['codigo' => '970', 'nombre' => 'Historia de América'],
            ['codigo' => '985.008', 'nombre' => 'Historias del Perú'],
            ['codigo' => '985', 'nombre' => 'Textos de Historia del Perú'],
            ['codigo' => '985.2', 'nombre' => 'Historias de Departamentos'],
            ['codigo' => 'BACH', 'nombre' => 'Libros de Bachillerato'],
            ['codigo' => 'MATDOC', 'nombre' => 'Materiales Curriculares y Guías para Docentes'],
        ];

        DB::table('areas')->insert($areas);
    }
}
