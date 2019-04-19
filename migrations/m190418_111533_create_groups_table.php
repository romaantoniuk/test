<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%groups}}`.
 */
class m190418_111533_create_groups_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%groups}}', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer(),
            'title' => $this->string(20),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(11)
        ]);

        $this->addForeignKey('FK-parent_id', '{{%groups}}', 'parent_id', '{{%groups}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropForeignKey('FK-parent_id', '{{%groups}}');
        $this->dropTable('{{%groups}}');
    }
}
