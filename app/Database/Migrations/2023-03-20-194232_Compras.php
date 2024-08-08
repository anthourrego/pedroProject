<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Compras extends Migration
{
    public function up() {
		$this->forge->addField([
			'id'   => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'codigo' => [
				'type'           => 'VARCHAR',
				'constraint'     => 20,
				'unique'         => true
			],
			'id_usuario' => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true
			],
			'observacion' => [
				'type'        => 'TEXT',
				"null"        => true
			],
			'impuesto' => [
				'type'        => 'DECIMAL',
				'constraint'  => '20,2',
				'default'     => 0
			],
			'neto' => [
				'type'        => 'DECIMAL',
				'constraint'  => '20,2',
				'default'     => 0
			],
			'total' => [
				'type'        => 'DECIMAL',
				'constraint'  => '20,2',
				'default'     => 0
			],
      'estado' => [
				'type'        => 'CHAR',
				'constraint'  => 2,
				'null'        => false,
			],
			'created_at' => [
        'type'    => 'datetime',
        'default' => new RawSql('CURRENT_TIMESTAMP'),
    	],
			'updated_at' => [
        'type'    => 'datetime',
        'default' => new RawSql('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
    	]
		]);

		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('id_usuario', 'usuarios', 'id');
		$this->forge->createTable('compras', false, ATRIBUTOSDB);
	}

	public function down() {
		$this->forge->dropTable('compras');
	}
}
