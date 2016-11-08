<?php

use yii\db\Schema;
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
            'create_at' => $this->timestamp(),
            'update_at' => $this->timestamp()
        ]);

        $this->createIndex('idx-user-access_token', 'user', 'access_token');

    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user');
    }
}
