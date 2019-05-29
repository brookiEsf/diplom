<?php

use yii\db\Migration;

/**
 * Class m190325_180332_junction_table_for_products_and_images_tables
 */
class m190325_180332_junction_table_for_products_and_images_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%products_images}}', [
            'products_id' => $this->integer(),
            'images_id' => $this->integer(),
            'PRIMARY KEY(products_id, images_id)',
        ]);
        // creates index for column `products_id`
        $this->createIndex(
            '{{%idx-products_images-products_id}}',
            '{{%products_images}}',
            'products_id'
        );
        // add foreign key for table `{{%images}}`
        $this->addForeignKey(
            '{{%fk-products_images-products_id}}',
            '{{%products_images}}',
            'products_id',
            '{{%products}}',
            'id',
            'CASCADE'
        );
        // creates index for column `images_id`
        $this->createIndex(
            '{{%idx-products_images-images_id}}',
            '{{%products_images}}',
            'images_id'
        );
        // add foreign key for table `{{%images}}`
        $this->addForeignKey(
            '{{%fk-products_images-images_id}}',
            '{{%products_images}}',
            'images_id',
            '{{%images}}',
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
            '{{%fk-products_images-products_id}}',
            '{{%products_images}}'
        );
        // drops index for column `products_id`
        $this->dropIndex(
            '{{%idx-products_images-products_id}}',
            '{{%products_images}}'
        );
        // drops foreign key for table `{{%images}}`
        $this->dropForeignKey(
            '{{%fk-products_images-images_id}}',
            '{{%products_images}}'
        );
        // drops index for column `images_id`
        $this->dropIndex(
            '{{%idx-products_images-images_id}}',
            '{{%products_images}}'
        );
        $this->dropTable('{{%products_images}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190325_180332_junction_table_for_products_and_images_tables cannot be reverted.\n";

        return false;
    }
    */
}
