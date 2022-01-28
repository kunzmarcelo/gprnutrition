<?php

use Illuminate\Database\Seeder;

class ResourcesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $now = date("Y-m-d H:i:s");

      DB::table("resources")->insert([
        [
              "id"         => 1,
              "name"       => "Animais index",
              "resource"      => "animais.index",
              "is_menu"=>true,
              "created_at" => $now,
              "updated_at" => $now,
          ],
        [
              "id"         => 2,
              "name"       => "Animais create",
              "resource"      => "animais.create",
              "is_menu"=>true,
              "created_at" => $now,
              "updated_at" => $now,
          ],
        [
              "id"         => 3,
              "name"       => "Animais store",
              "resource"      => "animais.store",
              "is_menu"=>true,
              "created_at" => $now,
              "updated_at" => $now,
          ],
        [
              "id"         => 4,
              "name"       => "Animais edit",
              "resource"      => "animais.edit",
              "is_menu"=>true,
              "created_at" => $now,
              "updated_at" => $now,
          ],

        [
              "id"         => 5,
              "name"       => "Animais update",
              "resource"      => "animais.update",
              "is_menu"=>true
              ,"created_at" => $now,
              "updated_at" => $now,
          ],

        [
              "id"         => 6,
              "name"       => "Animais Destroy",
              "resource"      => "animais.destroy",
              "is_menu"=>true,
              "created_at" => $now,
              "updated_at" => $now,
          ],


          [
                "id"         => 7,
                "name"       => "Lote index",
                "resource"      => "lote.index",
                "is_menu"=>true,
                "created_at" => $now,
                "updated_at" => $now,
            ],
          [
                "id"         => 8,
                "name"       => "Lote create",
                "resource"      => "lote.create",
                "is_menu"=>true,
                "created_at" => $now,
                "updated_at" => $now,
            ],
          [
                "id"         => 9,
                "name"       => "Lote store",
                "resource"      => "lote.store",
                "is_menu"=>true,
                "created_at" => $now,
                "updated_at" => $now,
            ],
          [
                "id"         => 10,
                "name"       => "Lote edit",
                "resource"      => "lote.edit",
                "is_menu"=>true,
                "created_at" => $now,
                "updated_at" => $now,
            ],

          [
                "id"         => 11,
                "name"       => "Lote update",
                "resource"      => "lote.update",
                "is_menu"=>true,
                "created_at" => $now,
                "updated_at" => $now,
            ],

          [
                "id"         => 12,
                "name"       => "Lote Destroy",
                "resource"      => "lote.destroy",
                "is_menu"=>true,
                "created_at" => $now,
                "updated_at" => $now,
            ],


            [
                  "id"         => 13,
                  "name"       => "medicamento index",
                  "resource"      => "medicamento.index",
                  "is_menu"=>true,
                  "created_at" => $now,
                  "updated_at" => $now,
              ],
            [
                  "id"         => 14,
                  "name"       => "medicamento create",
                  "resource"      => "medicamento.create",
                  "is_menu"=>true,
                  "created_at" => $now,
                  "updated_at" => $now,
              ],
            [
                  "id"         => 15,
                  "name"       => "medicamento store",
                  "resource"      => "medicamento.store",
                  "is_menu"=>true,
                  "created_at" => $now,
                  "updated_at" => $now,
              ],
            [
                  "id"         => 16,
                  "name"       => "medicamento edit",
                  "resource"      => "medicamento.edit",
                  "is_menu"=>true,
                  "created_at" => $now,
                  "updated_at" => $now,
              ],

            [
                  "id"         => 17,
                  "name"       => "medicamento update",
                  "resource"      => "medicamento.update",
                  "is_menu"=>true,
                  "created_at" => $now,
                  "updated_at" => $now,
              ],

            [
                  "id"         => 18,
                  "name"       => "medicamento Destroy",
                  "resource"      => "medicamento.destroy",
                  "is_menu"=>true,
                  "created_at" => $now,
                  "updated_at" => $now,
              ],


              [
                    "id"         => 19,
                    "name"       => "estoque index",
                    "resource"      => "estoque.index",
                    "is_menu"=>true,
                    "created_at" => $now,
                    "updated_at" => $now,
                ],
              [
                    "id"         => 20,
                    "name"       => "estoque create",
                    "resource"      => "estoque.create",
                    "is_menu"=>true,
                    "created_at" => $now,
                    "updated_at" => $now,
                ],
              [
                    "id"         => 21,
                    "name"       => "estoque store",
                    "resource"      => "estoque.store",
                    "is_menu"=>true,
                    "created_at" => $now,
                    "updated_at" => $now,
                ],
              [
                    "id"         => 22,
                    "name"       => "estoque edit",
                    "resource"      => "estoque.edit",
                    "is_menu"=>true,
                    "created_at" => $now,
                    "updated_at" => $now,
                ],

              [
                    "id"         => 23,
                    "name"       => "estoque update",
                    "resource"      => "estoque.update",
                    "is_menu"=>true,
                    "created_at" => $now,
                    "updated_at" => $now,
                ],

              [
                    "id"         => 24,
                    "name"       => "estoque Destroy",
                    "resource"      => "estoque.destroy",
                    "is_menu"=>true,
                    "created_at" => $now,
                    "updated_at" => $now,
                ],



              [
                    "id"         => 25,
                    "name"       => "semem index",
                    "resource"      => "semem.index",
                    "is_menu"=>true,
                    "created_at" => $now,
                    "updated_at" => $now,
                ],
              [
                    "id"         => 26,
                    "name"       => "semem create",
                    "resource"      => "semem.create",
                    "is_menu"=>true,
                    "created_at" => $now,
                    "updated_at" => $now,
                ],
              [
                    "id"         => 27,
                    "name"       => "semem store",
                    "resource"      => "semem.store",
                    "is_menu"=>true,
                    "created_at" => $now,
                    "updated_at" => $now,
                ],
              [
                    "id"         => 28,
                    "name"       => "semem edit",
                    "resource"      => "semem.edit",
                    "is_menu"=>true,
                    "created_at" => $now,
                    "updated_at" => $now,
                ],

              [
                    "id"         => 29,
                    "name"       => "semem update",
                    "resource"      => "semem.update",
                    "is_menu"=>true,
                    "created_at" => $now,
                    "updated_at" => $now,
                ],

              [
                    "id"         => 30,
                    "name"       => "semem Destroy",
                    "resource"      => "semem.destroy",
                    "is_menu"=>true,
                    "created_at" => $now,
                    "updated_at" => $now,
                ],



              [
                    "id"         => 31,
                    "name"       => "cobertura index",
                    "resource"   => "cobertura.index",
                    "is_menu"=>true,
                    "created_at" => $now,
                    "updated_at" => $now,
                ],
              [
                    "id"         => 32,
                    "name"       => "cobertura create",
                    "resource"   => "cobertura.create",
                    "is_menu"=>true,
                    "created_at" => $now,
                    "updated_at" => $now,
                ],
              [
                    "id"         => 33,
                    "name"       => "cobertura store",
                    "resource"   => "cobertura.store",
                    "is_menu"=>true,
                    "created_at" => $now,
                    "updated_at" => $now,
                ],
              [
                    "id"         => 34,
                    "name"       => "cobertura edit",
                    "resource"   => "cobertura.edit",
                    "is_menu"=>true,
                    "created_at" => $now,
                    "updated_at" => $now,
                ],

              [
                    "id"         => 35,
                    "name"       => "cobertura update",
                    "resource"   => "cobertura.update",
                    "is_menu"=>true,
                    "created_at" => $now,
                    "updated_at" => $now,
                ],

              [
                    "id"         => 36,
                    "name"       => "cobertura Destroy",
                    "resource"   => "cobertura.destroy",
                    "is_menu"=>true,
                    "created_at" => $now,
                    "updated_at" => $now,
                ],


              [
                    "id"         => 37,
                    "name"       => "reproducao index",
                    "resource"   => "reproducao.index",
                    "is_menu"=>true,
                    "created_at" => $now,
                    "updated_at" => $now,
                ],
              [
                    "id"         => 38,
                    "name"       => "reproducao create",
                    "resource"   => "reproducao.create",
                    "is_menu"=>true,
                    "created_at" => $now,
                    "updated_at" => $now,
                ],
              [
                    "id"         => 39,
                    "name"       => "reproducao store",
                    "resource"   => "reproducao.store",
                    "is_menu"=>true,
                    "created_at" => $now,
                    "updated_at" => $now,
                ],
              [
                    "id"         => 40,
                    "name"       => "reproducao edit",
                    "resource"   => "reproducao.edit",
                    "is_menu"=>true,
                    "created_at" => $now,
                    "updated_at" => $now,
                ],

              [
                    "id"         => 41,
                    "name"       => "reproducao update",
                    "resource"   => "reproducao.update",
                    "is_menu"=>true,
                    "created_at" => $now,
                    "updated_at" => $now,
                ],

              [
                    "id"         => 42,
                    "name"       => "reproducao Destroy",
                    "resource"   => "reproducao.destroy",
                    "is_menu"=>true,
                    "created_at" => $now,
                    "updated_at" => $now,
                ],



              [
                    "id"         => 43,
                    "name"       => "producao index",
                    "resource"   => "producao.index",
                    "is_menu"=>true,
                    "created_at" => $now,
                    "updated_at" => $now,
                ],
              [
                    "id"         => 44,
                    "name"       => "producao create",
                    "resource"   => "producao.create",
                    "is_menu"=>true,
                    "created_at" => $now,
                    "updated_at" => $now,
                ],
              [
                    "id"         => 45,
                    "name"       => "producao store",
                    "resource"   => "producao.store",
                    "is_menu"=>true,
                    "created_at" => $now,
                    "updated_at" => $now,
                ],
              [
                    "id"         => 46,
                    "name"       => "producao edit",
                    "resource"   => "producao.edit",
                    "is_menu"=>true,
                    "created_at" => $now,
                    "updated_at" => $now,
                ],

              [
                    "id"         => 47,
                    "name"       => "producao update",
                    "resource"   => "producao.update",
                    "is_menu"=>true,
                    "created_at" => $now,
                    "updated_at" => $now,
                ],

              [
                    "id"         => 48,
                    "name"       => "producao Destroy",
                    "resource"   => "producao.destroy",
                    "is_menu"=>true,
                    "created_at" => $now,
                    "updated_at" => $now,
                ],


              [
                    "id"         => 49,
                    "name"       => "entrega index",
                    "resource"   => "entrega.index",
                    "is_menu"=>true,
                    "created_at" => $now,
                    "updated_at" => $now,
                ],
              [
                    "id"         => 50,
                    "name"       => "entrega create",
                    "resource"   => "entrega.create",
                    "is_menu"=>true,
                    "created_at" => $now,
                    "updated_at" => $now,
                ],
              [
                    "id"         => 51,
                    "name"       => "entrega store",
                    "resource"   => "entrega.store",
                    "is_menu"=>true,
                    "created_at" => $now,
                    "updated_at" => $now,
                ],
              [
                    "id"         => 52,
                    "name"       => "entrega edit",
                    "resource"   => "entrega.edit",
                    "is_menu"=>true,
                    "created_at" => $now,
                    "updated_at" => $now,
                ],

              [
                    "id"         => 53,
                    "name"       => "entrega update",
                    "resource"   => "entrega.update",
                    "is_menu"=>true,
                    "created_at" => $now,
                    "updated_at" => $now,
                ],

              [
                    "id"         => 54,
                    "name"       => "entrega Destroy",
                    "resource"   => "entrega.destroy",
                    "is_menu"=>true,
                    "created_at" => $now,
                    "updated_at" => $now,
                ],


              [
                    "id"         => 55,
                    "name"       => "aplicacoes index",
                    "resource"   => "aplicacoes.index",
                    "is_menu"=>true,
                    "created_at" => $now,
                    "updated_at" => $now,
                ],
              [
                    "id"         => 56,
                    "name"       => "aplicacoes create",
                    "resource"   => "aplicacoes.create",
                    "is_menu"=>true,
                    "created_at" => $now,
                    "updated_at" => $now,
                ],
              [
                    "id"         => 57,
                    "name"       => "aplicacoes store",
                    "resource"   => "aplicacoes.store",
                    "is_menu"=>true,
                    "created_at" => $now,
                    "updated_at" => $now,
                ],
              [
                    "id"         => 58,
                    "name"       => "aplicacoes edit",
                    "resource"   => "aplicacoes.edit",
                    "is_menu"=>true,
                    "created_at" => $now,
                    "updated_at" => $now,
                ],

              [
                    "id"         => 59,
                    "name"       => "aplicacoes update",
                    "resource"   => "aplicacoes.update",
                    "is_menu"=>true,
                    "created_at" => $now,
                    "updated_at" => $now,
                ],

              [
                    "id"         => 60,
                    "name"       => "aplicacoes Destroy",
                    "resource"   => "aplicacoes.destroy",
                    "is_menu"=>true,
                    "created_at" => $now,
                    "updated_at" => $now,
                ],


              [
                    "id"         => 61,
                    "name"       => "desafio index",
                    "resource"   => "desafio.index",
                    "is_menu"=>true,
                    "created_at" => $now,
                    "updated_at" => $now,
                ],
              [
                    "id"         => 62,
                    "name"       => "desafio create",
                    "resource"   => "desafio.create",
                    "is_menu"=>true,
                    "created_at" => $now,
                    "updated_at" => $now,
                ],
              [
                    "id"         => 63,
                    "name"       => "desafio store",
                    "resource"   => "desafio.store",
                    "is_menu"=>true,
                    "created_at" => $now,
                    "updated_at" => $now,
                ],
              [
                    "id"         => 64,
                    "name"       => "desafio edit",
                    "resource"   => "desafio.edit",
                    "is_menu"=>true,
                    "created_at" => $now,
                    "updated_at" => $now,
                ],

              [
                    "id"         => 65,
                    "name"       => "desafio update",
                    "resource"   => "desafio.update",
                    "is_menu"=>true,
                    "created_at" => $now,
                    "updated_at" => $now,
                ],

              [
                    "id"         => 66,
                    "name"       => "desafio Destroy",
                    "resource"   => "desafio.destroy",
                    "is_menu"=>true,
                    "created_at" => $now,
                    "updated_at" => $now,
                ],


              [
                    "id"         => 67,
                    "name"       => "configuracao index",
                    "resource"   => "configuracao.index",
                    "is_menu"=>true,
                    "created_at" => $now,
                    "updated_at" => $now,
                ],
              [
                    "id"         => 68,
                    "name"       => "configuracao create",
                    "resource"   => "configuracao.create",
                    "is_menu"=>true,
                    "created_at" => $now,
                    "updated_at" => $now,
                ],
              [
                    "id"         => 69,
                    "name"       => "configuracao store",
                    "resource"   => "configuracao.store",
                    "is_menu"=>true,
                    "created_at" => $now,
                    "updated_at" => $now,
                ],
              [
                    "id"         => 70,
                    "name"       => "configuracao edit",
                    "resource"   => "configuracao.edit",
                    "is_menu"=>true,
                    "created_at" => $now,
                    "updated_at" => $now,
                ],

              [
                    "id"         => 71,
                    "name"       => "configuracao update",
                    "resource"   => "configuracao.update",
                    "is_menu"=>true,
                    "created_at" => $now,
                    "updated_at" => $now,
                ],

              [
                    "id"         => 72,
                    "name"       => "configuracao Destroy",
                    "resource"   => "configuracao.destroy",
                    "is_menu"=>true,
                    "created_at" => $now,
                    "updated_at" => $now,
                ],
        ]);
    }
}
