<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%results}}`.
 */
class m190418_115659_create_results_table extends Migration
{

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%results}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'biomarker_id' => $this->integer()->notNull(),
            'result' => $this->double(),
            'date' => $this->string(),
            'unit' => $this->string(10),
            'references' => $this->string(),
            'created_at' => $this->string(11),
            'updated_at' => $this->string(11)
        ]);

        $this->addForeignKey('FK-user_id', '{{%results}}', 'user_id', '{{%users}}', 'id');
        $this->addForeignKey('FK-biomarker_id', '{{%results}}', 'biomarker_id', '{{%biomarkers}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('FK-user_id', '{{%results}}');
        $this->dropForeignKey('FK-biomarker_id', '{{%results}}');

        $this->dropTable('{{%results}}');
    }
}
