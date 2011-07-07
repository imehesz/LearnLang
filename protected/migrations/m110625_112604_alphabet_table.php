<?php

class m110625_112604_alphabet_table extends CDbMigration
{
    public $table = 'alphabet';

	public function up()
	{
        $this->createTable(
            $this->table,
            array(
                'id'        => 'pk',
                'lang_id'   => 'INT not null',
                'letter'    => 'varchar(5) not null',
                'order'     => 'float default 0'
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
