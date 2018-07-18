<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[OrderIngredient]].
 *
 * @see OrderIngredient
 */
class OrderIngredientQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return OrderIngredient[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return OrderIngredient|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
