<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property int $food_id
 * @property string $user_name
 * @property int $date
 * @property string $comment
 *
 * @property Food $food
 * @property OrderIngredient[] $orderIngredients
 * @property Ingredient[] $ingredients
 */
class Order extends \yii\db\ActiveRecord
{

    public $ingredientIds = [];
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_name','food_id'],'required'],
            [['food_id', 'date'], 'integer'],
            [['comment'], 'string'],
            [['user_name'], 'string', 'max' => 255],
            [['food_id'], 'exist', 'skipOnError' => true, 'targetClass' => Food::class, 'targetAttribute' => ['food_id' => 'id']],
            [['ingredientIds'],'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'food_id' => Yii::t('app', 'Food ID'),
            'user_name' => Yii::t('app', 'User Name'),
            'date' => Yii::t('app', 'Date'),
            'comment' => Yii::t('app', 'Comment'),
            'ingredientIds'=>Yii::t('app','Ingredient Ids')
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
    public function getOrderIngredients()
    {
        return $this->hasMany(OrderIngredient::class, ['order_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIngredients()
    {
        return $this->hasMany(Ingredient::class, ['id' => 'ingredient_id'])->viaTable('order_ingredient', ['order_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return OrderQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OrderQuery(get_called_class());
    }
}
