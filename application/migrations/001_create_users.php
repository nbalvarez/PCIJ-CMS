<?php
class Migration_Create_users extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'email' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'password' => array(
				'type' => 'VARCHAR',
				'constraint' => '128',
			),
			'first_name' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'last_name' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'middle_name' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'user_name' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'image' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'bio' => array(
				'type' => 'VARCHAR',
				'constraint' => '1000',
			),
			'active' => array(
				'type' => 'BOOLEAN',
			),
		));
		$this->dbforge->add_key('id');
		$this->dbforge->create_table('users');
	}

	public function down()
	{
		$this->dbforge->drop_table('users');
	}
}