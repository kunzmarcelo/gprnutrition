<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $now = date("Y-m-d H:i:s");

      DB::table("roles")->insert([
        [
              "id"         => 1,
              "name"       => "Administrador",
              "role"      => "ROLE_ADMINISTRATOR",
              "created_at" => $now,
              "updated_at" => $now,
          ],
        [
              "id"         => 2,
              "name"       => "Produtor",
              "role"      => "ROLE_PRODUCER",
              "created_at" => $now,
              "updated_at" => $now,
          ],
        [
              "id"         => 3,
              "name"       => "Manager",
              "role"      => "ROLE_MANAGER",
              "created_at" => $now,
              "updated_at" => $now,
          ],
        [
              "id"         => 4,
              "name"       => "Supervisor",
              "role"      => "ROLE_SUPERVISRO",
              "created_at" => $now,
              "updated_at" => $now,
          ],
        ]);
    }
}
