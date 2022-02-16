<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Alunos extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idAluno' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'nome' => [
                'type' => 'VARCHAR',
                'constraint' => 150
            ],
            'logradouro' => [
                'type' => 'VARCHAR',
                'constraint' => 150
            ],
            'numero' => [
                'type' => 'INT',
                'constraint' => 5
            ],
            'bairro' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'cidade' => [
                'type' => 'VARCHAR',
                'constraint' => 60
            ],
            'foto' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addPrimaryKey('idAluno');
        $this->forge->createTable('alunos', true, ['engine' => 'innodb']);
    }

    public function down()
    {
        $this->forge->dropTable('alunos');
    }
}
