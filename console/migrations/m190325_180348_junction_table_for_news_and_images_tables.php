<?php

use yii\db\Migration;

/**
 * Class m190325_180348_junction_table_for_news_and_images_tables
 */
class m190325_180348_junction_table_for_news_and_images_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%news_images}}', [
            'news_id' => $this->integer(),
            'images_id' => $this->integer(),
            'PRIMARY KEY(news_id, images_id)',
        ]);
        // creates index for column `news_id`
        $this->createIndex(
            '{{%idx-news_images-news_id}}',
            '{{%news_images}}',
            'news_id'
        );
        // add foreign key for table `{{%images}}`
        $this->addForeignKey(
            '{{%fk-news_images-news_id}}',
            '{{%news_images}}',
            'news_id',
            '{{%news}}',
            'id',
            'CASCADE'
        );
        // creates index for column `images_id`
        $this->createIndex(
            '{{%idx-news_images-images_id}}',
            '{{%news_images}}',
            'images_id'
        );
        // add foreign key for table `{{%images}}`
        $this->addForeignKey(
            '{{%fk-news_images-images_id}}',
            '{{%news_images}}',
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
        // drops foreign key for table `{{%news}}`
        $this->dropForeignKey(
            '{{%fk-news_images-news_id}}',
            '{{%news_images}}'
        );
        // drops index for column `news_id`
        $this->dropIndex(
            '{{%idx-news_images-news_id}}',
            '{{%news_images}}'
        );
        // drops foreign key for table `{{%images}}`
        $this->dropForeignKey(
            '{{%fk-news_images-images_id}}',
            '{{%news_images}}'
        );
        // drops index for column `images_id`
        $this->dropIndex(
            '{{%idx-news_images-images_id}}',
            '{{%news_images}}'
        );
        $this->dropTable('{{%news_images}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190325_180348_junction_table_for_news_and_images_tables cannot be reverted.\n";

        return false;
    }
    */
}
