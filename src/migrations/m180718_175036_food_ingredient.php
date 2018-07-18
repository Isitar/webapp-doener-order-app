<?php

use yii\db\Migration;

/**
 * Class m180718_175036_food_ingredient
 */
class m180718_175036_food_ingredient extends Migration
{
    private  const tableName = '{{%food_ingredient}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::tableName, [
            'food_id'=>$this->integer(),
            'ingredient_id'=>$this->integer()
        ]);
        $this->addPrimaryKey('PK_food_ingredient',self::tableName,['food_id', 'ingredient_id']);
        $this->addForeignKey('FK_food_ingredient_food',self::tableName,'food_id','{{%food}}',['id'],'CASCADE','CASCADE');
        $this->addForeignKey('FK_food_ingredient_ingredient',self::tableName,'ingredient_id','{{%ingredient}}',['id'],'CASCADE','CASCADE');
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
