<?php

use yii\db\Migration;

/**
 * Class m190529_041824_shopping_cart
 */
class m190529_041824_shopping_cart extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%shopping_cart}}', [
            'id' => $this->bigPrimaryKey(),
            'user_id' => $this->integer(11),
            'status' => $this->enum(['created', 'undone', 'approved', 'submitted', 'refused']) . " DEFAULT 'created'",
            'description' => $this->text()->notNull(),
            'created_at' => $this->bigInteger()->defaultValue(null),
            'updated_at' => $this->bigInteger()->defaultValue(null),
            'deleted_at' => $this->bigInteger(),
        ]);
        $this->createIndex(
            '{{idx-shopping_cart-user_id}}',
            '{{%shopping_cart}}',
            'user_id'
        );

        // add foreign key for table `{{%products}}`
        $this->addForeignKey(
            '{{fk-shopping_cart-user_id}}',
            '{{%shopping_cart}}',
            'user_id',
            '{{%user}}',
            'id',
            'NO ACTION'
        );

    }

    public function enum(array $data)
    {
        return 'enum("' . implode('","', $data) . '")';
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%shopping_cart}}');
    }

}
