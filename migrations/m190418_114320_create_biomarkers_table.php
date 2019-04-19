<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%biomarkers}}`.
 */
class m190418_114320_create_biomarkers_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%biomarkers}}', [
            'id' => $this->primaryKey(),
            'group_id' => $this->integer(),
            'title' => $this->string(50),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11)
        ]);

        $this->addForeignKey('FK-group_id', '{{%biomarkers}}', 'group_id', '{{%groups}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('FK-group_id', '{{%biomarkers}}');
        $this->dropTable('{{%biomarkers}}');
    }
}
