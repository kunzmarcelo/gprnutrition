<?php

use Illuminate\Database\Seeder;

class BloodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $now = date("Y-m-d H:i:s");

      DB::table("bloods")->insert([
        ["name"=>"Desconhecido", "created_at"=>$now,"updated_at"=>$now,],
        ["name"=>"1/8", "created_at"=>$now,"updated_at"=>$now,],
        ["name"=>"1/4", "created_at"=>$now,"updated_at"=>$now,],
        ["name"=>"3/8", "created_at"=>$now,"updated_at"=>$now,],
        ["name"=>"7/16", "created_at"=>$now,"updated_at"=>$now,],
        ["name"=>"1/2", "created_at"=>$now,"updated_at"=>$now,],
        ["name"=>"9/16", "created_at"=>$now,"updated_at"=>$now,],
        ["name"=>"5/8", "created_at"=>$now,"updated_at"=>$now,],
        ["name"=>"11/16", "created_at"=>$now,"updated_at"=>$now,],
        ["name"=>"3/4", "created_at"=>$now,"updated_at"=>$now,],
        ["name"=>"13/16", "created_at"=>$now,"updated_at"=>$now,],
        ["name"=>"7/8", "created_at"=>$now,"updated_at"=>$now,],
        ["name"=>"15/16", "created_at"=>$now,"updated_at"=>$now,],
        ["name"=>"31/32", "created_at"=>$now,"updated_at"=>$now,],
        ["name"=>"PC", "created_at"=>$now,"updated_at"=>$now,],
        ["name"=>"PCOD", "created_at"=>$now,"updated_at"=>$now,],
        ["name"=>"PCOC", "created_at"=>$now,"updated_at"=>$now,],
        ["name"=>"PO", "created_at"=>$now,"updated_at"=>$now,],
        ["name"=>"LA", "created_at"=>$now,"updated_at"=>$now,],
        ["name"=>"CG", "created_at"=>$now,"updated_at"=>$now,],
        ["name"=>"63/34", "created_at"=>$now,"updated_at"=>$now,],
        ["name"=>"127/128", "created_at"=>$now,"updated_at"=>$now,],
        ["name"=>"255/256", "created_at"=>$now,"updated_at"=>$now,],
        ["name"=>"GC-01", "created_at"=>$now,"updated_at"=>$now,],
        ["name"=>"GC-02", "created_at"=>$now,"updated_at"=>$now,],
        ["name"=>"GC-03", "created_at"=>$now,"updated_at"=>$now,],
        ["name"=>"GC-04", "created_at"=>$now,"updated_at"=>$now,],
        ["name"=>"GC-05", "created_at"=>$now,"updated_at"=>$now,],
        ["name"=>"GC-06", "created_at"=>$now,"updated_at"=>$now,],
        ["name"=>"GC-07", "created_at"=>$now,"updated_at"=>$now,],
        ["name"=>"17/32", "created_at"=>$now,"updated_at"=>$now,],
        ["name"=>"23/32", "created_at"=>$now,"updated_at"=>$now,],
        ["name"=>"25/32", "created_at"=>$now,"updated_at"=>$now,],
        ["name"=>"41/64", "created_at"=>$now,"updated_at"=>$now,],
        ["name"=>"57/64", "created_at"=>$now,"updated_at"=>$now,],
        ["name"=>"1023/1024", "created_at"=>$now,"updated_at"=>$now,],
        ["name"=>"63/37", "created_at"=>$now,"updated_at"=>$now,],
        ["name"=>"50/50", "created_at"=>$now,"updated_at"=>$now,],
        ["name"=>"75/25", "created_at"=>$now,"updated_at"=>$now,],
        ["name"=>"88/12", "created_at"=>$now,"updated_at"=>$now,],
        ["name"=>"81/19", "created_at"=>$now,"updated_at"=>$now,],
        ["name"=>"62/37", "created_at"=>$now,"updated_at"=>$now,],
        ["name"=>"56/44", "created_at"=>$now,"updated_at"=>$now,],
        ["name"=>"56/43", "created_at"=>$now,"updated_at"=>$now,],
        ["name"=>"72/28", "created_at"=>$now,"updated_at"=>$now,],
        ["name"=>"25/25", "created_at"=>$now,"updated_at"=>$now,],
        ["name"=>"31/18", "created_at"=>$now,"updated_at"=>$now,],
        ["name"=>"69/31", "created_at"=>$now,"updated_at"=>$now,],
        ["name"=>"PS", "created_at"=>$now,"updated_at"=>$now,],
        ["name"=>"CEIP", "created_at"=>$now,"updated_at"=>$now,],
      ]);
    }
}
