<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PostsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_id'     => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'title'       => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'excerpt' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'content'     => [
                'type' => 'TEXT',
            ],
            'author' => [
            'type'   => 'VARCHAR',
            'constraint' => 100,
            ],
            'date' => [
            'type' => 'DATE',
            ],
            'status' => [
                'type'   => 'VARCHAR',
                'constraint' => 100,
                'default'    => 'draft',
            ],
            'created_at'  => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at'  => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true); // Primary key
       
        $this->forge->createTable('posts');
    }

    public function down()
    {
        $this->forge->dropTable('posts');
    }
}
