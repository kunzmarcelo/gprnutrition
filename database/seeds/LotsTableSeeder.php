<?php

use Illuminate\Database\Seeder;

class LotsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $now = date("Y-m-d H:i:s");

      DB::table("lots")->insert([

        [
          "id"         => 11,
          "name"       => "Vacas em Lactação",
          "phase"       => "Vacas em Lactação",
          "description"       => "NULL",
          "color"       => "NULL",
           "user_id" => 4,
               "created_at" => $now,
               "updated_at" => $now
             ],
        [
          "id"         => 12,
          "name"       => "Bezerros(as) até 6 meses",
          "phase"       => "Bezerros(as) até 6 meses",
          "description"       => "NULL",
          "color"       => "NULL",
          "user_id" => 4,
               "created_at" => $now,
               "updated_at" => $now
             ],
        [
          "id"         => 13,
          "name"       => "Bezerros(as) de 7 até meses",
          "phase"       => "Bezerros(as) de 7 até meses",
          "description"       => "NULL",
          "color"       => "NULL",
          "user_id" => 4,
               "created_at" => $now,
               "updated_at" => $now
             ],
        [
          "id"         => 14,
          "name"       => "Novilhos(as) acima de 12 meses",
          "phase"       => "Novilhos(as) acima de 12 meses",
          "description"       => "NULL",
          "color"       => "NULL",
           "user_id" => 5,
               "created_at" => $now,
               "updated_at" => $now
             ],
        [
          "id"         => 15,
          "name"       => "Novilhas prenhas",
          "phase"       => "Novilhas prenhas",
          "description"       => "NULL",
          "color"       => "NULL",
          "user_id" => 5,
               "created_at" => $now,
               "updated_at" => $now
             ],
        [
          "id"         => 16,
          "name"       => "Vacas Seca",
          "phase"       => "Vacas Seca",
          "description"       => "NULL",
          "color"       => "NULL",
          "user_id" => 5,
               "created_at" => $now,
               "updated_at" => $now
             ],
        [
          "id"         => 17,
          "name"       => "Enfermaria",
          "phase"       => "Enfermaria",
          "description"       => "NULL",
          "color"       => "NULL",
          "user_id" => 4,
               "created_at" => $now,
               "updated_at" => $now
             ],
        [
          "id"         => 18,
          "name"       => "Touros",
          "phase"       => "Touros",
          "description"       => "NULL",
          "color"       => "NULL",
          "user_id" => 5,
               "created_at" => $now,
               "updated_at" => $now
             ],
        [
          "id"         => 19,
          "name"       => "Engorda",
          "phase"       => "Engorda",
          "description"       => "NULL",
          "color"       => "NULL",
          "user_id" => 4,
               "created_at" => $now,
               "updated_at" => $now
             ],
        [
          "id"         => 20,
          "name"       => "Pré-Parto",
          "phase"       => "Pré-Parto",
          "description"       => "NULL",
          "color"       => "NULL",
          "user_id" => 5,
               "created_at" => $now,
               "updated_at" => $now
             ],
      ]);
    }
}
