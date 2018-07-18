<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_ingredient".
 *
 * @property int $order_id
 * @property int $ingredient_id
 *
 * @property Ingredient $ingredient
 * @property Order $order
 */
class OrderIngredient extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_ingredient';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'ingredient_id'], 'required'],
            [['order_id', 'ingredient_id'], 'integer'],
            [['order_id', 'ingredient_id'], 'unique', 'targetAttribute' => ['order_id', 'ingredient_id']],
            [['ingredient_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ingredient::class, 'targetAttribute' => ['ingredient_id' => 'id']],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::class, 'targetAttribute' => ['order_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'order_id' => Yii::t('app', 'Order ID'),
            'ingredient_id' => Yii::t('app', 'Ingredient ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIngredient()
    {
        return $this->hasOne(Ingredient::class, ['id' => 'ingredient_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::class, ['id' => 'order_id']);
    }

    /**
     * {@inheritdoc}
     * @return OrderIngredientQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OrderIngredientQuery(get_called_class());
    }
}
