<?php

use yii\db\Migration;

/**
 * Class m190418_101200_add_default_user
 */
class m190418_101200_add_default_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('{{%users}}', [
            'username' => 'test',
            'email' => 'test@test.com',
            'password' => Yii::$app->security->generatePasswordHash('123456'),
            'auth_key' => Yii::$app->security->generateRandomString(),
            'created_at' => time(),
            'updated_at' => time()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('{{%users}}', ['email' => 'test@test.com']);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190418_101200_add_default_user cannot be reverted.\n";

        return false;
    }
    */
}
