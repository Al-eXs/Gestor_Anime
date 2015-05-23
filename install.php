<?php

global $smcFunc, $db_prefix;

/*// Add a column for Delete/Edit dissable
$smcFunc['db_add_column']('{db_prefix}messages', 
	array(
		'name' => 'AManager',
		'type' => 'tinyint',
		'size' => '1',
		'default' => 0,
	)
);*/
	

// Add tables
$smcFunc['db_create_table']('{db_prefix}an_capture',
	array(
		array(
			'name' => 'ID_CAPTURE',
			'type' => 'int',
			'size' => 11,
			'auto' => true,
		),
		array(
			'name' => 'ID_CHAPTER',
			'type' => 'int',
			'size' => 11,
		),
		array(
			'name' => 'Route',
			'type' => 'varchar',
			'size' => 255,
		),
	),
	array(
		array(
			'name' => 'ID_CAPTURE',
			'type' => 'primary',
			'columns' => array('ID_CAPTURE'),
		),
	),
	array(),
	'overwrite');

$smcFunc['db_create_table']('{db_prefix}an_categories',
	array(
		array(
			'name' => 'id_category',
			'type' => 'int',
			'size' => 10,
			'auto' => true,
		),
		array(
			'name' => 'id_category_sp',
			'type' => 'int',
			'size' => 10,
		),
		array(
			'name' => 'id_category_forums',
			'type' => 'tinyint',
			'size' => 4,
		),
		array(
			'name' => 'id_category_private',
			'type' => 'tinyint',
			'size' => 4,
		),
		array(
			'name' => 'id_category_forums_finalized',
			'type' => 'tinyint',
			'size' => 4,
		),
		array(
			'name' => 'id_category_private_finalized',
			'type' => 'tinyint',
			'size' => 4,
		),
	),
	array(
		array(
			'name' => 'id_category',
			'type' => 'primary',
			'columns' => array('id_category'),
		),
	),
	array(),
	'overwrite');

$smcFunc['db_create_table']('{db_prefix}an_chapter',
	array(
		array(
			'name' => 'ID_CHAPTER',
			'type' => 'int',
			'size' => 11,
			'auto' => true,
		),
		array(
			'name' => 'ID_DOWNLOAD',
			'type' => 'int',
			'size' => 11,
			'default' => '0',
			'null' => true,
		),
		array(
			'name' => 'ID_SAGA',
			'type' => 'int',
			'size' => 11,
		),
		array(
			'name' => 'Number',
			'type' => 'mediumint',
			'size' => 5,
			'default' => '0',
		),
		array(
			'name' => 'Title',
			'type' => 'text',
		),
		array(
			'name' => 'ID_MSG',
			'type' => 'int',
			'size' => 11,
			'null' => true,
			'default' => '0',
		),
		array(
			'name' => 'Double',
			'type' => 'tinyint',
			'size' => 4,
			'default' => '0',
		),
	),
	array(
		array(
			'name' => 'ID_CHAPTER',
			'type' => 'primary',
			'columns' => array('ID_CHAPTER'),
		),
	),
	array(),
	'overwrite');

$smcFunc['db_create_table']('{db_prefix}an_download',
	array(
		array(
			'name' => 'ID_DOWNLOAD',
			'type' => 'int',
			'size' => 11,
			'auto' => true,
		),
		array(
			'name' => 'ID_SAGA',
			'type' => 'int',
			'size' => 5,
		),
		array(
			'name' => 'ID_MSG',
			'type' => 'int',
			'size' => 11,
		),
		array(
			'name' => 'NEWS_TEXT',
			'type' => 'text',
		),
	),
	array(
		array(
			'name' => 'ID_DOWNLOAD',
			'type' => 'primary',
			'columns' => array('ID_DOWNLOAD'),
		),
		array(
			'name' => 'ID_MSG',
			'type' => 'unique',
			'columns' => array('ID_MSG'),
		),
	),
	array(),
	'overwrite');

$smcFunc['db_create_table']('{db_prefix}an_links',
	array(
		array(
			'name' => 'ID_LINK',
			'type' => 'int',
			'size' => 11,
			'auto' => true,
		),
		array(
			'name' => 'ID_CHAPTER',
			'type' => 'int',
			'size' => 11,
		),
		array(
			'name' => 'ID_PORTAL',
			'type' => 'smallint',
			'size' => 4,
		),
		array(
			'name' => 'Route',
			'type' => 'varchar',
			'size' => 255,
		),
	),
	array(
		array(
			'name' => 'ID_LINK',
			'type' => 'primary',
			'columns' => array('ID_LINK'),
		),
	),
	array(),
	'overwrite');

$smcFunc['db_create_table']('{db_prefix}an_portal',
	array(
		array(
			'name' => 'ID_PORTAL',
			'type' => 'smallint',
			'size' => 4,
			'auto' => true,
		),
		array(
			'name' => 'Name',
			'type' => 'varchar',
			'size' => 50,
		),
		array(
			'name' => 'Logo',
			'type' => 'varchar',
			'size' => 255,
		),
		array(
			'name' => 'Protected',
			'type' => 'tinyint',
			'size' => 1,
		),
		array(
			'name' => 'ID_CATEGORY',
			'type' => 'int',
			'size' => 10,
		),
		array(
			'name' => 'Private',
			'type' => 'tinyint',
			'size' => 1,
		),
	),
	array(
		array(
			'name' => 'ID_PORTAL',
			'type' => 'primary',
			'columns' => array('ID_PORTAL'),
		),
	),
	array(),
	'overwrite');

$smcFunc['db_create_table']('{db_prefix}an_sagas',
	array(
		array(
			'name' => 'ID_SAGA',
			'type' => 'mediumint',
			'size' => 5,
			'auto' => true,
		),
		array(
			'name' => 'ID_SERIES',
			'type' => 'int',
			'size' => 8,
		),
		array(
			'name' => 'ID_MSG',
			'type' => 'int',
			'size' => 10,
			'null' => true,
			'default' => '0',
		),
		array(
			'name' => 'Name',
			'type' => 'varchar',
			'size' => 255,
		),
		array(
			'name' => 'Image',
			'type' => 'varchar',
			'size' => 255,
		),
		array(
			'name' => 'Abstract',
			'type' => 'text',
		),
		array(
			'name' => 'Specs',
			'type' => 'text',
		),
		array(
			'name' => 'Staff',
			'type' => 'text',
		),
		array(
			'name' => 'Licensed',
			'type' => 'tinyint',
			'size' => 1,
			'default' => '0',
		),
	),
	array(
		array(
			'name' => 'ID_SAGA',
			'type' => 'primary',
			'columns' => array('ID_SAGA'),
		),
		array(
			'name' => 'ID_MSG',
			'type' => 'unique',
			'columns' => array('ID_MSG'),
		),
	),
	array(),
	'overwrite');

$smcFunc['db_create_table']('{db_prefix}an_series',
	array(
		array(
			'name' => 'ID_SERIES',
			'type' => 'int',
			'size' => 8,
			'auto' => true,
		),
		array(
			'name' => 'ID_CATEGORY',
			'type' => 'int',
			'size' => 10,
		),
		array(
			'name' => 'ID_BOARD',
			'type' => 'smallint',
			'size' => 5,
		),
		array(
			'name' => 'ID_Private_Board',
			'type' => 'smallint',
			'size' => 5,
		),
		array(
			'name' => 'ID_MSG',
			'type' => 'int',
			'size' => 10,
		),
		array(
			'name' => 'Name',
			'type' => 'varchar',
			'size' => 255,
		),
		array(
			'name' => 'Img_Banner',
			'type' => 'varchar',
			'size' => 255,
		),
		array(
			'name' => 'Img_News',
			'type' => 'varchar',
			'size' => 255,
		),
		array(
			'name' => 'Img_Download_Block',
			'type' => 'varchar',
			'size' => 255,
		),
		array(
			'name' => 'Img_slider',
			'type' => 'varchar',
			'size' => 255,
		),
		array(
			'name' => 'Abstract',
			'type' => 'text',
		),
		array(
			'name' => 'Specs',
			'type' => 'text',
		),
		array(
			'name' => 'Staff',
			'type' => 'text',
		),
		array(
			'name' => 'Finalized',
			'type' => 'tinyint',
			'size' => 1,
			'default' => '0',
		),
		array(
			'name' => 'Public',
			'type' => 'tinyint',
			'size' => 1,
			'default' => '0',
		),
	),
	array(
		array(
			'name' => 'ID_SERIES',
			'type' => 'primary',
			'columns' => array('ID_SERIES'),
		),
		array(
			'name' => 'ID_MSG',
			'type' => 'unique',
			'columns' => array('ID_MSG'),
		),
	),
	array(),
	'overwrite');

$smcFunc['db_create_table']('{db_prefix}an_settings',
	array(
		array(
			'name' => 'variable',
			'type' => 'varchar',
			'size' => 255,
		),
		array(
			'name' => 'value',
			'type' => 'text',
		),
	),
	array(
		array(
			'name' => 'variable',
			'type' => 'primary',
			'columns' => array('variable'),
		),
	),
	array(),
	'overwrite');

?>