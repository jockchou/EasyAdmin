<?php

use yii\db\Migration;


/**
 * Handles the creation of table `user`.
 */
class m161108_030804_create_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'email' => $this->string(100)->notNull()->unique(),
            'password' => $this->string(100)->notNull(),
            'username' => $this->string(100),
            'avatar' => $this->string(),
            'auth_key' => $this->char(32),
            'access_token' => $this->char(32),
            'create_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'update_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);

        $this->createIndex('idx-user-access_token', 'user', 'access_token');
        $this->createIndex('idx-user-username', 'user', 'username');

    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user');
    }
}
