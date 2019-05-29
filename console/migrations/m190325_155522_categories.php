<?php

use yii\db\Migration;

/**
 * Class m190325_155522_categories
 */
class m190325_155522_categories extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=INNODB';
        }
        $this->createTable('{{%categories}}', [
            'id' => $this->primaryKey(),
            'cat_name' => $this->string(95)->notNull(),
            'cat_description' => $this->string(95)->notNull(),
            'date_deleted' => $this->timestamp()->defaultValue(null),
            'date_created' => $this->timestamp()->defaultValue(null),
            'date_updated' => $this->timestamp()->defaultValue(null),
            'status' => $this->smallInteger()->notNull()->defaultValue(1), //1-існує, 0 - видалено
         //   'seo'=> $this->integer()->notNull(),

        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%categories}}');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190325_155522_categories cannot be reverted.\n";

        return false;
    }
    */
}
