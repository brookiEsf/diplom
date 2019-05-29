<?php

use yii\db\Migration;

/**
 * Class m190325_151644_user
 */
class m190325_151644_user extends Migration
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
        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'firstName' => $this->string(32)->notNull(),
            'lastName' => $this->string(32)->notNull(),
            'poBatkovi' => $this->string(32)->notNull(),
            'password' => $this->string(95)->notNull(),
            'email' => $this->string(255)->notNull()->unique(),
            'gender' => $this->tinyInteger()->notNull(),
            'age' => $this->integer()->notNull(),
            'birthday' =>$this->date()->notNull(),
            'phone' => $this->string(15)->notNull()->unique(),
            'city' =>$this->string()->notNull(),
            'role' => $this->smallInteger()->notNull()->defaultValue(1),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'auth_key' => $this->string(32)->notNull(),
            'password_reset_token' => $this->string(32)->unique()
            //role: 1-зареєстр, 10-підтверджений, 11-редактор, 100-адмін

        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // echo "m190213_184127_users cannot be reverted.\n";
        $this->dropTable('{{%users}}');
        return false;
    }
    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190325_151644_user cannot be reverted.\n";

        return false;
    }
    */
}
