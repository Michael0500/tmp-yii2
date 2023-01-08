<?php

use yii\db\Migration;

/**
 * Class m230108_175355_department
 */
class m230108_175355_department extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('department', [
            'dept_id' => $this->primaryKey(),
            'dept_id_parent' => $this->integer(),
            'departments' => $this->string(255),
        ]);

        $this->batchInsert('department', ['dept_id', 'dept_id_parent', 'departments'], [
            [0, 0, 'Main'],
            [1, 0, 'menu 1'],
            [2, 0, 'menu 2'],
            [3, 0, 'menu 3'],

            [4, 1, 'Sub menu 1.1'],
            [5, 1, 'Sub menu 1.2'],
            [6, 2, 'Sub menu 2.1'],
            [7, 2, 'Sub menu 2.2'],
            [8, 3, 'Sub menu 3.1'],
            [9, 3, 'Sub menu 3.2'],
            [10, 3, 'Sub menu 3.3'],
            [11, 3, 'Sub menu 3.4'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('department');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230108_175355_department cannot be reverted.\n";

        return false;
    }
    */
}
