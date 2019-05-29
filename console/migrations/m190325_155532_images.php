<?php

use yii\db\Migration;

/**
 * Class m190325_155532_images
 */
class m190325_155532_images extends Migration
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
        $this->createTable('{{%images}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(25)->notNull()->unique(),
            'path' => $this->string(255)->notNull()->unique(),
            'alt' => $this->string(255)->notNull(),
            'title' => $this->string(255)->notNull(),
            'seo' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%images}}');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190325_155532_images cannot be reverted.\n";

        return false;
    }
    */
}
