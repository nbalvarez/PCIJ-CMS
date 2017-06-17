<?php
class Migration_Create_File_Article extends CI_Migration {

  public function up()
  {
    $this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'filename' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'article_slug' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
		));
		$this->dbforge->add_key('id');
		$this->dbforge->create_table('file_article');
  }

  public function down()
  {
    $this->dbforge->drop_table('file_article');
  }

}
