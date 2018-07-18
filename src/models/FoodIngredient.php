<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "food_ingredient".
 *
 * @property int $food_id
 * @property int $ingredient_id
 *
 * @property Food $food
 * @property Ingredient $ingredient
 */
class FoodIngredient extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'food_ingredient';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['food_id', 'ingredient_id'], 'required'],
            [['food_id', 'ingredient_id'], 'integer'],
            [['food_id', 'ingredient_id'], 'unique', 'targetAttribute' => ['food_id', 'ingredient_id']],
            [['food_id'], 'exist', 'skipOnError' => true, 'targetClass' => Food::class, 'targetAttribute' => ['food_id' => 'id']],
            [['ingredient_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ingredient::class, 'targetAttribute' => ['ingredient_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'food_id' => Yii::t('app', 'Food ID'),
            'ingredient_id' => Yii::t('app', 'Ingredient ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFood()
    {
        return $this->hasOne(Food::class, ['id' => 'food_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIngredient()
    {
        return $this->hasOne(Ingredient::class, ['id' => 'ingredient_id']);
    }

    /**
     * {@inheritdoc}
     * @return FoodIngredientQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FoodIngredientQuery(get_called_class());
    }
}
