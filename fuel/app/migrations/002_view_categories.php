<?php

namespace Fuel\Migrations;

class View_categories {

	public function up()
	{
		\DBUtil::create_table('categories', array(
			'catID' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'catName' => array('constraint' => 30, 'type' => 'varchar'),

		), array('catID'));
	}

	public function down()
	{
		\DBUtil::drop_table('categories');
	}
}