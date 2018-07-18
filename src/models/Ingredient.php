<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ingredient".
 *
 * @property int $id
 * @property string $name
 *
 * @property FoodIngredient[] $foodIngredients
 * @property Food[] $foods
 * @property OrderIngredient[] $orderIngredients
 * @property Order[] $orders
 */
class Ingredient extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ingredient';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFoodIngredients()
    {
        return $this->hasMany(FoodIngredient::class, ['ingredient_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFoods()
    {
        return $this->hasMany(Food::class, ['id' => 'food_id'])->viaTable('food_ingredient', ['ingredient_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderIngredients()
    {
        return $this->hasMany(OrderIngredient::class, ['ingredient_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::class, ['id' => 'order_id'])->viaTable('order_ingredient', ['ingredient_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return IngredientQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new IngredientQuery(get_called_class());
    }
}
