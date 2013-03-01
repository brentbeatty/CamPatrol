<?php

namespace Fuel\Migrations;

class Create_searches
{
	public function up()
	{
		\DBUtil::create_table('searches', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'zip' => array('constraint' => 11, 'type' => 'int'),
			'name' => array('constraint' => 100, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('searches');
	}
}