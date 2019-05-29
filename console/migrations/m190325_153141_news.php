<?php

use yii\db\Migration;

/**
 * Class m190325_153141_news
 */
class m190325_153141_news extends Migration
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
        $this->createTable('{{%news}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull()->unique(),
            'body' => $this->text()->notNull(),
            'shortDescription' => $this->text()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1), //1-існує, 0 - видалено
            'seo_id'=> $this->integer()->defaultValue(null),
            'date_deleted' => $this->timestamp()->defaultValue(null),
            'date_created' => $this->timestamp()->defaultValue(null),
            'date_updated' => $this->timestamp()->defaultValue(null),


        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%news}}');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190325_153141_news cannot be reverted.\n";

        return false;
    }
    */
}
