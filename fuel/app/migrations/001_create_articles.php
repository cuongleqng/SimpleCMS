<?php

namespace Fuel\Migrations;

class Create_articles {

	public function up()
	{
		\DBUtil::create_table('articles', array(
			'articleID' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'articleTitle' => array('constraint' => 65, 'type' => 'varchar'),
			'articleExcerpt' => array('constraint' => 350, 'type' => 'varchar'),
			'articleBody' => array('type' => 'longtext'),
			'startDate' => array('type' => 'datetime'),
			'endDate' => array('type' => 'datetime'),
			'modDate' => array('type' => 'datetime'),
			'authorID' => array('constraint' => 11, 'type' => 'int'),
			'articleCat' => array('constraint' => 11, 'type' => 'int'),
			'articleImage' => array('constraint' => 65, 'type' => 'varchar'),
			'featured' => array('constraint' => 1, 'type' => 'int'),

		), array('articleID'));
	}

	public function down()
	{
		\DBUtil::drop_table('articles');
	}
}