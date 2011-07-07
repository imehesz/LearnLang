<?php

class m110625_112021_languages_table extends CDbMigration
{
    public $table = 'language';

	public function up()
	{
        $this->createTable(
            $this->table,
            array(
                'id'        => 'pk',
                'code'      => 'varchar(25)',
                'name'      => 'varchar(100)',
                'active_yn' => 'int default 0'
            )
        );
	}

	public function down()
	{
        $this->dropTable( $this->table );
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}
