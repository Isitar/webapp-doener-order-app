<?php

namespace app\controllers;

use Yii;
use app\models\FoodIngredient;
use app\models\search\FoodIngredientSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FoodIngredientController implements the CRUD actions for FoodIngredient model.
 */
class FoodIngredientController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all FoodIngredient models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FoodIngredientSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->orderByFood();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FoodIngredient model.
     * @param integer $food_id
     * @param integer $ingredient_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($food_id, $ingredient_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($food_id, $ingredient_id),
        ]);
    }

    /**
     * Creates a new FoodIngredient model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($foodId = null, $ingredientId = null)
    {
        $model = new FoodIngredient();
        if ($foodId !== null) {
            $model->food_id = $foodId;
        }
        if ($ingredientId !== null) {
            $model->ingredient_id = $ingredientId;
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ($foodId !== null) {
                return $this->redirect(['food/view','id'=>$foodId]);
            }
            if ($ingredientId !== null) {
                return $this->redirect(['ingredient/view','id'=>$ingredientId]);
            }
            return $this->redirect(['view', 'food_id' => $model->food_id, 'ingredient_id' => $model->ingredient_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing FoodIngredient model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $food_id
     * @param integer $ingredient_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($food_id, $ingredient_id)
    {
        $model = $this->findModel($food_id, $ingredient_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'food_id' => $model->food_id, 'ingredient_id' => $model->ingredient_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing FoodIngredient model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $food_id
     * @param integer $ingredient_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($food_id, $ingredient_id)
    {
        $this->findModel($food_id, $ingredient_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the FoodIngredient model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $food_id
     * @param integer $ingredient_id
     * @return FoodIngredient the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($food_id, $ingredient_id)
    {
        if (($model = FoodIngredient::findOne(['food_id' => $food_id, 'ingredient_id' => $ingredient_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
