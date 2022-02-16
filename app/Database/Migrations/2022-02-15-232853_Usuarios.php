<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Usuarios extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idUsuario' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
                'unique' => true,
            ],
            'senha' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addPrimaryKey('idUsuario');
        $this->forge->createTable('usuarios', true, ['engine' => 'innodb']);
    }

    public function down()
    {
        $this->forge->dropTable('usuarios');
    }
}
