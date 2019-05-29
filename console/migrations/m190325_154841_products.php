<?php

use yii\db\Migration;

/**
 * Class m190325_154841_products
 */
class m190325_154841_products extends Migration
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
        $this->createTable('{{%products}}', [
            'id' => $this->primaryKey(),
            'prod_name' => $this->string(95)->notNull(),
            'prod_definition' => $this->string(325)->notNull(),
            'price' => $this->integer()->notNull()->defaultValue(0),
            'date_deleted' => $this->timestamp()->defaultValue(null),
            'date_created' => $this->timestamp()->defaultValue(null),
            'date_updated' => $this->timestamp()->defaultValue(null),
            'status' => $this->smallInteger()->notNull()->defaultValue(1), //1-існує, 0 - видалено
            'seo_id'=> $this->integer()->defaultValue(null),
        ], $tableOptions);
    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%products}}');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190325_154841_products cannot be reverted.\n";

        return false;
    }
    */
}
