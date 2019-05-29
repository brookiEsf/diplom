<?php

use yii\db\Migration;

/**
 * Class m190325_180405_junction_table_for_categories_and_images_tables
 */
class m190325_180405_junction_table_for_categories_and_images_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%categories_images}}', [
            'categories_id' => $this->integer(),
            'images_id' => $this->integer(),
            'PRIMARY KEY(categories_id, images_id)',
        ]);
        // creates index for column `categories_id`
        $this->createIndex(
            '{{%idx-categories_images-categories_id}}',
            '{{%categories_images}}',
            'categories_id'
        );
        // add foreign key for table `{{%images}}`
        $this->addForeignKey(
            '{{%fk-categories_images-categories_id}}',
            '{{%categories_images}}',
            'categories_id',
            '{{%categories}}',
            'id',
            'CASCADE'
        );
        // creates index for column `images_id`
        $this->createIndex(
            '{{%idx-categories_images-images_id}}',
            '{{%categories_images}}',
            'images_id'
        );
        // add foreign key for table `{{%images}}`
        $this->addForeignKey(
            '{{%fk-categories_images-images_id}}',
            '{{%categories_images}}',
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
        // drops foreign key for table `{{%categories}}`
        $this->dropForeignKey(
            '{{%fk-categories_images-categories_id}}',
            '{{%categories_images}}'
        );
        // drops index for column `categories_id`
        $this->dropIndex(
            '{{%idx-categories_images-categories_id}}',
            '{{%categories_images}}'
        );
        // drops foreign key for table `{{%images}}`
        $this->dropForeignKey(
            '{{%fk-categories_images-images_id}}',
            '{{%categories_images}}'
        );
        // drops index for column `images_id`
        $this->dropIndex(
            '{{%idx-categories_images-images_id}}',
            '{{%categories_images}}'
        );
        $this->dropTable('{{%categories_images}}');
    }
    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190325_180405_junction_table_for_categories_and_images_tables cannot be reverted.\n";

        return false;
    }
    */
}
