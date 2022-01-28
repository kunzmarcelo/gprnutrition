<?php

use Illuminate\Database\Seeder;

class BreedsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date("Y-m-d H:i:s");

        DB::table("breeds")->insert([
          ["name"=>"Holandes preto e branco", "created_at"=>$now,"updated_at"=>$now,],
          ["name"=>"Girolando", "created_at"=>$now,"updated_at"=>$now,],
          ["name"=>"Gir leiteiro", "created_at"=>$now,"updated_at"=>$now,],
          ["name"=>"jersey", "created_at"=>$now,"updated_at"=>$now,],
          ["name"=>"Guernsey", "created_at"=>$now,"updated_at"=>$now,],
          ["name"=>"Ayrshire", "created_at"=>$now,"updated_at"=>$now,],
          ["name"=>"Caracu", "created_at"=>$now,"updated_at"=>$now,],
          ["name"=>"Simetal", "created_at"=>$now,"updated_at"=>$now,],
          ["name"=>"Mestiça", "created_at"=>$now,"updated_at"=>$now,],
          ["name"=>"Pardo Suíça (schwyz)", "created_at"=>$now,"updated_at"=>$now,],
          ["name"=>"Jersolando", "created_at"=>$now,"updated_at"=>$now,],
          ["name"=>"Nelore", "created_at"=>$now,"updated_at"=>$now,],
          ["name"=>"Angus", "created_at"=>$now,"updated_at"=>$now,],
          ["name"=>"Red Angus", "created_at"=>$now,"updated_at"=>$now,],
          ["name"=>"Aberdeen Angus", "created_at"=>$now,"updated_at"=>$now,],
          ["name"=>"Hereford", "created_at"=>$now,"updated_at"=>$now,],
          ["name"=>"Tabapuã", "created_at"=>$now,"updated_at"=>$now,],
          ["name"=>"Senepol", "created_at"=>$now,"updated_at"=>$now,],
          ["name"=>"Brahman", "created_at"=>$now,"updated_at"=>$now,],
          ["name"=>"Kiwi", "created_at"=>$now,"updated_at"=>$now,],
          ["name"=>"Guzerá", "created_at"=>$now,"updated_at"=>$now,],
          ["name"=>"Guzolando", "created_at"=>$now,"updated_at"=>$now,],
          ["name"=>"F1", "created_at"=>$now,"updated_at"=>$now,],
          ["name"=>"S1", "created_at"=>$now,"updated_at"=>$now,],
          ["name"=>"Desconhecida", "created_at"=>$now,"updated_at"=>$now,],
          ["name"=>"Brangus", "created_at"=>$now,"updated_at"=>$now,],
          ["name"=>"Cruzamento Industrial", "created_at"=>$now,"updated_at"=>$now,],
          ["name"=>"Murrah", "created_at"=>$now,"updated_at"=>$now,],
          ["name"=>"Jafarabadi", "created_at"=>$now,"updated_at"=>$now,],
          ["name"=>"Purunã", "created_at"=>$now,"updated_at"=>$now,],
          ["name"=>"Pardo Alpina", "created_at"=>$now,"updated_at"=>$now,],
          ["name"=>"Saanem", "created_at"=>$now,"updated_at"=>$now,],
          ["name"=>"Santa InêsGir", "created_at"=>$now,"updated_at"=>$now,],
          ["name"=>"White Dorper", "created_at"=>$now,"updated_at"=>$now,],
          ["name"=>"Black Dorper", "created_at"=>$now,"updated_at"=>$now,],
          ["name"=>"Poll Dorset", "created_at"=>$now,"updated_at"=>$now,],
          ["name"=>"Tricoss", "created_at"=>$now,"updated_at"=>$now,],
          ["name"=>"Holandês Vermelho", "created_at"=>$now,"updated_at"=>$now,],
          ["name"=>"Braford", "created_at"=>$now,"updated_at"=>$now,],
          ["name"=>"Norueguês Vermelho", "created_at"=>$now,"updated_at"=>$now,],
          ["name"=>"Outra", "created_at"=>$now,"updated_at"=>$now,],
          ["name"=>"Montbeliard", "created_at"=>$now,"updated_at"=>$now,],
          ["name"=>"Charolês", "created_at"=>$now,"updated_at"=>$now,],
          ["name"=>"Normando", "created_at"=>$now,"updated_at"=>$now,],
          ["name"=>"Composto", "created_at"=>$now,"updated_at"=>$now,],
          ["name"=>"Zebuíno", "created_at"=>$now,"updated_at"=>$now,],
          ["name"=>"Tabolanda", "created_at"=>$now,"updated_at"=>$now,],
          ["name"=>"Guzerá leiteiroSindi", "created_at"=>$now,"updated_at"=>$now,],
          ["name"=>"Sindolando", "created_at"=>$now,"updated_at"=>$now,],
          ["name"=>"Nelorando", "created_at"=>$now,"updated_at"=>$now,],
          ["name"=>"Sinjer", "created_at"=>$now,"updated_at"=>$now,],
          ["name"=>"Nelore Pintado", "created_at"=>$now,"updated_at"=>$now,],
          ["name"=>"Canchim", "created_at"=>$now,"updated_at"=>$now,],
          ["name"=>"Saanen", "created_at"=>$now,"updated_at"=>$now,],
          ]);
    }
}
