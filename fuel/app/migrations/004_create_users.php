<?php

namespace Fuel\Migrations;

class Create_users {

	public function up()
	{
		\DBUtil::create_table('simpleauth', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'username' => array('constraint' => 50, 'type' => 'varchar'),
			'password' => array('constraint' => 255, 'type' => 'varchar'),
			'group' => array('constraint' => 11, 'type' => 'int'),
			'email' => array('constraint' => 255, 'type' => 'varchar'),

		), array('simpleauth'));
	}

	public function down()
	{
		\DBUtil::drop_table('simpleauth');
	}
}