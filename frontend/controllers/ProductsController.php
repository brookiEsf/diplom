<?php

namespace frontend\controllers;

use Yii;
use common\models\Products;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

///**
// * ProductsController implements the CRUD actions for Products model.
// */
//class ProductsController extends Controller
//{
//    /**
//     * {@inheritdoc}
//     */
//    public function behaviors()
//    {
//        return [
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//                    'delete' => ['POST'],
//                ],
//            ],
//        ];
//    }
//
//    /**
//     * Lists all Products models.
//     * @return mixed
//     */
//    public function actionIndex()
//    {
////        $dataProvider = new ActiveDataProvider([
////            'query' => Products::find(),
////        ]);
//
//        return $this->render('index', [
//            'products' => Products::findAll('date_deleted'=>'null')
//        ]);
//
////        return $this->render('index', [
////            'dataProvider' => $dataProvider,
////        ]);
//    }
//
//    /**
//     * Displays a single Products model.
//     * @param integer $id
//     * @return mixed
//     * @throws NotFoundHttpException if the model cannot be found
//     */
//    public function actionView($id)
//    {
//        return $this->render('view', [
//            'model' => $this->findModel($id),
//        ]);
//    }
//
//    /**
//     * Creates a new Products model.
//     * If creation is successful, the browser will be redirected to the 'view' page.
//     * @return mixed
//     */
//    public function actionCreate()
//    {
//        $model = new Products();
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        }
//
//        return $this->render('create', [
//            'model' => $model,
//        ]);
//    }
//
//    /**
//     * Updates an existing Products model.
//     * If update is successful, the browser will be redirected to the 'view' page.
//     * @param integer $id
//     * @return mixed
//     * @throws NotFoundHttpException if the model cannot be found
//     */
//    public function actionUpdate($id)
//    {
//        $model = $this->findModel($id);
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        }
//
//        return $this->render('update', [
//            'model' => $model,
//        ]);
//    }
//
//    /**
//     * Deletes an existing Products model.
//     * If deletion is successful, the browser will be redirected to the 'index' page.
//     * @param integer $id
//     * @return mixed
//     * @throws NotFoundHttpException if the model cannot be found
//     */
//    public function actionDelete($id)
//    {
//        $this->findModel($id)->delete();
//
//        return $this->redirect(['index']);
//    }
//
//    /**
//     * Finds the Products model based on its primary key value.
//     * If the model is not found, a 404 HTTP exception will be thrown.
//     * @param integer $id
//     * @return Products the loaded model
//     * @throws NotFoundHttpException if the model cannot be found
//     */
//    protected function findModel($id)
//    {
//        if (($model = Products::findOne($id)) !== null) {
//            return $model;
//        }
//
//        throw new NotFoundHttpException('The requested page does not exist.');
//    }
//}


class ProductsController extends Controller
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
     * Lists all Products models.
     * @return mixed
     */
    public function actionIndex()
    {
        $page = Yii::$app->request->get('page')??1;
        $quantities = Yii::$app->request->get('elementQuantities')??15;
        if ($page < 1 && !is_numeric($page)) {
            $page = 1;
        }
        $products = Products::find()->where(['is', 'date_deleted', null])->andWhere([
            '=',
            'status',
            '1'
        ])->orderBy(['date_created' => SORT_DESC]);
        $limits = $products->count();

        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('ajax-index', [
                'products' => $products->limit($quantities)->offset($quantities * ($page - 1))->all(),
                'page' => $page,
                'limits' => ['elements' => $limits, 'lastPage' => round($limits / $quantities)],
            ]);
        } else {
            return $this->render('index', [
                'baseUrl' => null,
                'products' => $products->limit($quantities)->offset($quantities * ($page - 1))->all(),
                'page' => $page,
                'elementQuantities' => $quantities,
                'limits' => ['elements' => $limits, 'lastPage' => round($limits / $quantities)],
            ]);
        }
    }


    /**
     * Displays a single Products model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Products::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}