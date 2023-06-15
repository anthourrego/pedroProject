<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Proveedores extends Migration
{
    public function up()
    {
        $this->forge->addField([
			'id'   => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
            'nit' => [
                'type'           => 'VARCHAR',
                'constraint'     => 30,
                'null'           => true,
                'unique'         => true,
            ],
			'nombre' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
            'telefono' => [
                'type'        => 'VARCHAR',
                'constraint'  => 50,
            ],
			'direccion' => [
				'type'     => 'TEXT',
			],
			'contacto' => [
				'type'        => 'VARCHAR',
				'constraint'  => 255,
				'null'        => true,
			],
			'telefonocontacto' => [
				'type'        => 'VARCHAR',
				'constraint'  => 50,
				'null'        => true,
            ],
            'id_pais' => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true
			],
            'id_depto' => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true
			],
			'id_ciudad' => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true
			],
			'estado' => [
				'type'           => 'TINYINT',
				'constraint'     => 1,
				'default'        => 1
			],
			'created_at datetime default current_timestamp',
			'updated_at datetime default current_timestamp on update current_timestamp'
		]);

		$this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_pais', 'paises', 'id');
        $this->forge->addForeignKey('id_depto', 'departamentos', 'id');
		$this->forge->addForeignKey('id_ciudad', 'ciudades', 'id');
		$this->forge->createTable('proveedores');
    }

    public function down()
    {
        $this->forge->dropTable('proveedores');
    }
}
