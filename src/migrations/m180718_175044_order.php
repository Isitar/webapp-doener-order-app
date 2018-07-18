<?php

use yii\db\Migration;

/**
 * Class m180718_175044_order
 */
class m180718_175044_order extends Migration
{
    private  const tableName = '{{%order}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::tableName,[
            'id'=>$this->primaryKey(),
            'food_id'=>$this->integer(),
            'user_name'=>$this->string(255),
            'date'=>$this->integer(),
            'comment'=>$this->text(),
        ]);
        $this->addForeignKey('FK_order_food',self::tableName,'food_id','{{%food}}','id','CASCADE','CASCADE');
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
