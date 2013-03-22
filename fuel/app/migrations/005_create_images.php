<?php

namespace Fuel\Migrations;

class Create_images {

	public function up()
	{
		\DBUtil::create_table('images', array(
			'imageID' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'title' => array('constraint' => 255, 'type' => 'varchar'),
			'alt' => array('constraint' => 255, 'type' => 'varchar'),
			'authorID' => array('constraint' => 11, 'type' => 'int'),
			'imageType' => array('constraint' => 2, 'type' => 'int'),
			'imagePath' => array('constraint' => 255, 'type' => 'varchar'),
			'articleID' => array('constraint' => 11, 'type' => 'int'),

		), array('imageID'));
	}

	public function down()
	{
		\DBUtil::drop_table('images');
	}
}