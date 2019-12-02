<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m191130_222801_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'auth_key' => $this->string(32)->notNull(),
            'first_name' => $this->string(50)->notNull(),
            'middle_name' => $this->string(50)->notNull(),
            'second_name' => $this->string(50)->notNull(),
            'email' => $this->string()->unique()->notNull(),
            'password' => $this->string()->notNull(),
            'tin' => $this->string(20)->null(),
            'company_name' => $this->string(100)->null(),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
