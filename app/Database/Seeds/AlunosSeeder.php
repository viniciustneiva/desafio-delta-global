<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AlunosSeeder extends Seeder
{
    public function run()
    {
        //  dados que serão inseridos na tabela de alunos

        $data = [
            'nome' => 'João Silva',
            'logradouro' => 'Rua das Flores',
            'numero' => '126',
            'cidade' => 'Belo Horizonte',
            'bairro' => 'Centro',
            'foto' => 'avatar.png',
        ];


        // povoando a tabela para testes

        $this->db->table('alunos')->insert($data);

    }
}