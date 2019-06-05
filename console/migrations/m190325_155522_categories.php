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
            'cat_description' => $this->string(95),
            'date_deleted' => $this->timestamp()->defaultValue(null),
            'date_created' => $this->timestamp()->defaultValue(null),
            'date_updated' => $this->timestamp()->defaultValue(null),
            'status' => $this->smallInteger()->notNull()->defaultValue(1), //1-існує, 0 - видалено
         //   'seo'=> $this->integer()->notNull(),

        ], $tableOptions);


        $this->batchInsert('{{%categories}}', ['cat_name', 'cat_description', 'date_created', 'date_updated', 'date_deleted', 'status'],
            [
                ['Домашні кінотеатри', '', date('y-m-d h:i:s'), '', '', '1'],
                ['Медіаплеєри', '', date('y-m-d h:i:s'), '', '', '1'],
                ['Колонки', '', date('y-m-d h:i:s'), '', '', '1'],
                ['Музикальні центри', '', date('y-m-d h:i:s'), '', '', '1'],
                ['Автозвук', '', date('y-m-d h:i:s'), '', '', '1'],
                ['МП3-плеєри', '', date('y-m-d h:i:s'), '', '', '1'],
                ['Навушники', '', date('y-m-d h:i:s'), '', '', '1'],
                ['Домашні кінотеатри', '', date('y-m-d h:i:s'), '', '', '1'],
                ['Саундбари', '', date('y-m-d h:i:s'), '', '', '1'],
                ['Портативні', '', date('y-m-d h:i:s'), '', '', '1'],
                ['Стаціонарні', '', date('y-m-d h:i:s'), '', '', '1'],
                ['Смарт-колонки', '', date('y-m-d h:i:s'), '', '', '1'],
                ['Бумбокси', '', date('y-m-d h:i:s'), '', '', '1'],
                ['Мікросистеми', '', date('y-m-d h:i:s'), '', '', '1'],
                ['Мінісистеми', '', date('y-m-d h:i:s'), '', '', '1'],
                ['Радіогодинники', '', date('y-m-d h:i:s'), '', '', '1'],
                ['Безпровідні', '', date('y-m-d h:i:s'), '', '', '1'],
                ['Провідні', '', date('y-m-d h:i:s'), '', '', '1'],
                ['Гарнітури', '', date('y-m-d h:i:s'), '', '', '1'],
                ['Автоакустика', '', date('y-m-d h:i:s'), '', '', '1'],
                ['Автомагнітоли', '', date('y-m-d h:i:s'), '', '', '1'],
                ['ФМ-трансміттери', '', date('y-m-d h:i:s'), '', '', '1'],
            ]);

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
