<?php

use yii\db\Migration;

/**
 * Class m180718_175057_order_ingredient
 */
class m180718_175057_order_ingredient extends Migration
{
    private  const tableName = '{{%order_ingredient}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::tableName, [
            'order_id'=>$this->integer(),
            'ingredient_id'=>$this->integer(),
        ]);
        $this->addPrimaryKey('PK_order_ingredient',self::tableName,['order_id','ingredient_id']);
        $this->addForeignKey('FK_order_ingredient_order',self::tableName, 'order_id','{{%order}}','id','CASCADE', 'CASCADE');
        $this->addForeignKey('FK_order_ingredient_ingredient',self::tableName, 'ingredient_id','{{%ingredient}}','id','CASCADE', 'CASCADE');

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