<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $now = date("Y-m-d H:i:s");

      DB::table("users")->insert([
        [
              "id"         => 1,
              "name"       => "Marcelo Kunz",
              "email"       => "marcelo.kunz92@gmail.com",
              "password"     => Hash::make('123456789'),
              "created_at" => $now,
              "updated_at" => $now,
            ],
        [
              "id"         => 2,
              "name"       => "Gadiel dos Santos",
              "email"       => "gadiel@gadiel.com",
              "password"     => Hash::make('123456789'),
              "created_at" => $now,
              "updated_at" => $now,
            ],
        [
              "id"         => 3,
              "name"       => "Mauricio Cardoso",
              "email"       => "mauricio@mauricio.com",
              "password"     => Hash::make('123456789'),
              "created_at" => $now,
              "updated_at" => $now,
            ],
        [
              "id"         => 4,
              "name"       => "bernardi 1",
              "email"       => "bernardi@bernardi.com",
              "password"     => Hash::make('123456789'),
              "created_at" => $now,
              "updated_at" => $now,
            ],
        [
              "id"         => 5,
              "name"       => "jose teixeira",
              "email"       => "jose@jose.com",
              "password"     => Hash::make('123456789'),
              "created_at" => $now,
              "updated_at" => $now,
            ],
          ]);
          }
        }
