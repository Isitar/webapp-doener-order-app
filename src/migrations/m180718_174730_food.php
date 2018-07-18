<?php

use yii\db\Migration;

/**
 * Class m180718_174730_food
 */
class m180718_174730_food extends Migration
{
    private const tableName = '{{%food}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::tableName, [
            'id'=>$this->primaryKey(),
            'name'=>$this->string(255),
            'price'=>$this->float()
        ]);
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable(self::tableName);
        return true;
    }
}
