<?php

namespace Fuel\Migrations;

class Create_authors {

	public function up()
	{
		\DBUtil::create_table('authors', array(
			'authorID' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'fname' => array('constraint' => 25, 'type' => 'varchar'),
			'lname' => array('constraint' => 40, 'type' => 'varchar'),
			'bio' => array('constraint' => 1000, 'type' => 'varchar'),
			'authorPhone' => array('constraint' => 20, 'type' => 'varchar'),
			'bioImageID' => array('constraint' => 11, 'type' => 'int'),
			'userID' => array('constraint' => 11, 'type' => 'int'),

		), array('authorID'));
	}

	public function down()
	{
		\DBUtil::drop_table('authors');
	}
}