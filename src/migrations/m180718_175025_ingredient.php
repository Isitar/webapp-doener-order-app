<?php

use yii\db\Migration;

/**
 * Class m180718_175025_ingredient
 */
class m180718_175025_ingredient extends Migration
{

    private  const tableName = '{{%ingredient}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::tableName, [
            'id'=>$this->primaryKey(),
            'name'=>$this->string(255)
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
