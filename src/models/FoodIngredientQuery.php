<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[FoodIngredient]].
 *
 * @see FoodIngredient
 */
class FoodIngredientQuery extends \yii\db\ActiveQuery
{
    /**
     * Named scope to order by food
     * @return $this
     */
    public function orderByFood() {
        $this->addOrderBy('food_id');
        return $this;
    }

    /**
     * Named scope to order by ingredient
     * @return $this
     */
    public function orderByIngredient() {
        $this->addOrderBy('ingredient_id');
        return $this;
    }
}
