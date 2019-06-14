<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%products}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(50)->notNull(),
            'cat_id' => $this->integer()->notNull(),
            'price' => $this->integer()->notNull(),
            'rus_name' => $this->string(50)->notNull(),
            'img' => $this->string(50)->notNull(),
            'descr' => $this->string(5000)->notNull(),
        ], $tableOptions);

        $this->createTable('{{%cets}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull(),
            'rus_name' => $this->string(50)->notNull(),
        ], $tableOptions);

        $this->createTable('{{%order}}', [
            'id' => $this->primaryKey(),
            'email' => $this->string(100)->notNull(),
            'fio' => $this->string(100)->notNull(),
            'phone' => $this->string(100)->notNull(),
        ], $tableOptions);

        $this->createIndex('key-prod-cat', 'products', 'cat_id');

        $this->addForeignKey('fk-prod-cat', 'products', 'cat_id', 'cets', 'id');
    }

    public function down()
    {
        $this->dropForeignKey('fk-prod-cat', 'products');

        $this->dropTable('{{%products}}');
        $this->dropTable('{{%cets}}');
        $this->dropTable('{{%order}}');
    }
}
