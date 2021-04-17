<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array=[
            'Italiana',
            'Cinese',
            'Giapponese',
            'Americana',
            'Indiana',
            'Greca',
            'Asiatica',
            'Messicana',
            'Sudamericana',
            'Pizzeria',
            'Paninoteca'
        ];
        for($i=0; $i < count($array); $i++) {
            $category = new Category();
            $category->name = $array[$i];
            $category->save();}
    }
}
