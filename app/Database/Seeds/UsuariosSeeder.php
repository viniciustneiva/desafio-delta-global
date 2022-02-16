<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsuariosSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'email' => 'email@email.com',
            'senha'    => '123456'
        ];

        // Simple Queries
        $this->db->query("INSERT INTO usuarios (email, senha) VALUES(:email:, :senha:)", $data);

        // Using Query Builder
        $this->db->table('usuarios')->insert($data);
    }
}