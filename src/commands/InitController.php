<?php

namespace app\commands;

use app\models\Food;
use app\models\FoodIngredient;
use app\models\Ingredient;
use yii\console\Controller;
use yii\console\ExitCode;


class InitController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     */
    public function actionIndex()
    {

    	$kebab = new Food(['name'=>'Kebab', 'price'=>8]);
    	$kebab->save();

	    $dueruem = new Food(['name'=>'Dürüm', 'price'=>9]);
	    $dueruem->save();

    	$salad = new Ingredient(['name'=>'Salat']);
    	$salad->save();
    	$tomatoes = new Ingredient(['name'=>'Tomaten']);
    	$tomatoes->save();
    	$onions = new Ingredient(['name'=>'Zwiebeln']);
    	$onions->save();
    	$rk = new Ingredient(['name'=>'Rotkraut']);
    	$rk->save();
    	$carrots = new Ingredient(['name'=>'Rüebli']);
    	$carrots->save();
    	$spicy = new Ingredient(['name'=>'Scharfes Pulver']);
    	$spicy->save();

    	$cocktail = new Ingredient(['name'=>'Cocktail']);
    	$cocktail->save();
    	$samurai = new Ingredient(['name'=>'Samurai']);
    	$samurai->save();
    	$yogurt = new Ingredient(['name'=>'Yogurt']);
    	$yogurt->save();

	    (new FoodIngredient(['food_id'=>$kebab->id, 'ingredient_id'=>$salad->id]))->save();
	    (new FoodIngredient(['food_id'=>$kebab->id, 'ingredient_id'=>$tomatoes->id]))->save();
	    (new FoodIngredient(['food_id'=>$kebab->id, 'ingredient_id'=>$onions->id]))->save();
	    (new FoodIngredient(['food_id'=>$kebab->id, 'ingredient_id'=>$rk->id]))->save();
	    (new FoodIngredient(['food_id'=>$kebab->id, 'ingredient_id'=>$carrots->id]))->save();
	    (new FoodIngredient(['food_id'=>$kebab->id, 'ingredient_id'=>$spicy->id]))->save();
	    (new FoodIngredient(['food_id'=>$kebab->id, 'ingredient_id'=>$cocktail->id]))->save();
	    (new FoodIngredient(['food_id'=>$kebab->id, 'ingredient_id'=>$samurai->id]))->save();
	    (new FoodIngredient(['food_id'=>$kebab->id, 'ingredient_id'=>$yogurt->id]))->save();



	    (new FoodIngredient(['food_id'=>$dueruem->id, 'ingredient_id'=>$salad->id]))->save();
	    (new FoodIngredient(['food_id'=>$dueruem->id, 'ingredient_id'=>$tomatoes->id]))->save();
	    (new FoodIngredient(['food_id'=>$dueruem->id, 'ingredient_id'=>$onions->id]))->save();
	    (new FoodIngredient(['food_id'=>$dueruem->id, 'ingredient_id'=>$rk->id]))->save();
	    (new FoodIngredient(['food_id'=>$dueruem->id, 'ingredient_id'=>$carrots->id]))->save();
	    (new FoodIngredient(['food_id'=>$dueruem->id, 'ingredient_id'=>$spicy->id]))->save();
	    (new FoodIngredient(['food_id'=>$dueruem->id, 'ingredient_id'=>$cocktail->id]))->save();
	    (new FoodIngredient(['food_id'=>$dueruem->id, 'ingredient_id'=>$samurai->id]))->save();
	    (new FoodIngredient(['food_id'=>$dueruem->id, 'ingredient_id'=>$yogurt->id]))->save();

        return ExitCode::OK;
    }


}
