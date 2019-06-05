<?php

use yii\db\Migration;

/**
 * Handles adding parentId to table `{{%categories}}`.
 */
class m190531_170636_add_parentId_column_to_categories_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%categories}}', 'parentId', $this->integer());

        $this->createIndex('idx-parentId','{{categories}}', 'parentId');
        $this->addForeignKey('fk-categories-parentId-categories-id', '{{categories}}', 'parentId', '{{categories}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%categories}}', 'parentId');
    }
}
