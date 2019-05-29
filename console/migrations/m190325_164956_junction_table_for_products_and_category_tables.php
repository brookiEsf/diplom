<?php

use yii\db\Migration;

/**
 * Class m190325_164956_junction_table_for_products_and_category_tables
 */
class m190325_164956_junction_table_for_products_and_category_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%products_category}}', [
            'products_id' => $this->integer(),
            'category_id' => $this->integer(),
            'PRIMARY KEY(products_id, category_id)',
        ]);
        // creates index for column `products_id`
        $this->createIndex(
            '{{%idx-products_category-products_id}}',
            '{{%products_category}}',
            'products_id'
        );
        // add foreign key for table `{{%products}}`
        $this->addForeignKey(
            '{{%fk-products_category-products_id}}',
            '{{%products_category}}',
            'products_id',
            '{{%products}}',
            'id',
            'CASCADE'
        );
        // creates index for column `category_id`
        $this->createIndex(
            '{{%idx-products_category-category_id}}',
            '{{%products_category}}',
            'category_id'
        );
        // add foreign key for table `{{%category}}`
        $this->addForeignKey(
            '{{%fk-products_category-category_id}}',
            '{{%products_category}}',
            'category_id',
            '{{%categories}}',
            'id',
            'CASCADE'
        );
    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%products}}`
        $this->dropForeignKey(
            '{{%fk-products_category-products_id}}',
            '{{%products_category}}'
        );
        // drops index for column `products_id`
        $this->dropIndex(
            '{{%idx-products_category-products_id}}',
            '{{%products_category}}'
        );
        // drops foreign key for table `{{%category}}`
        $this->dropForeignKey(
            '{{%fk-products_category-category_id}}',
            '{{%products_category}}'
        );
        // drops index for column `category_id`
        $this->dropIndex(
            '{{%idx-products_category-category_id}}',
            '{{%products_category}}'
        );
        $this->dropTable('{{%products_category}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190325_164956_junction_table_for_products_and_category_tables cannot be reverted.\n";

        return false;
    }
    */
}
