<?php

class m110625_113013_word_table extends CDbMigration
{
    public $table = 'word';

	public function up()
	{
        $this->createTable(
            $this->table,
            array(
                'id'            => 'PK',
                'alphabet_id'   => 'int not null',
                'word'          => 'varchar(255)',
                'in_english'    => 'varchar(255)',
                'video'         => 'varchar(255)',
                'picture'       => 'varchar(255)',
                'ext_link'      => 'varchar(255)',
                'meaning'       => 'text',
                'active_yn'     => 'int default 0',
                'created'       => 'int',
                'updated'       => 'int'
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
