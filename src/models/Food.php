<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "food".
 *
 * @property int $id
 * @property string $name
 * @property double $price
 *
 * @property FoodIngredient[] $foodIngredients
 * @property Ingredient[] $ingredients
 * @property Order[] $orders
 */
class Food extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'food';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['price'], 'number'],
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
            'price' => Yii::t('app', 'Price'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFoodIngredients()
    {
        return $this->hasMany(FoodIngredient::class, ['food_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIngredients()
    {
        return $this->hasMany(Ingredient::class, ['id' => 'ingredient_id'])->viaTable('food_ingredient', ['food_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::class, ['food_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return FoodQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FoodQuery(get_called_class());
    }
}
