<?php

namespace frontend\controllers;

use frontend\models\BsCategory;
use frontend\models\BsCategorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
/**
 * CategoryController implements the CRUD actions for BsCategory model.
 */
class CategoryController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::class,
                    'only' => ['index','view','create','update','delete','change-password'],
                    'rules' => [  
                        [
                            'actions' => [''],
                            'allow' => true,
                            'roles' => ['?'],
                        ],
                        [
                            'actions' => ['index','view','create','update','delete','change-password'],
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                    ],
                ],
                'verbs' => [
                    'class' => VerbFilter::className(),

                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all BsCategory models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new BsCategorySearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BsCategory model.
     * @param int $cate_id Cate ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($cate_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($cate_id),
        ]);
    }

    /**
     * Creates a new BsCategory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new BsCategory();

        if ($this->request->isPost) { // ถ้ามีการส่งข้อมูลมา
            if ($model->load($this->request->post()) && $model->save()) {       // ถ้าโหลดข้อมูลจาก post และ save สำเร็จ
                return $this->redirect(['view', 'cate_id' => $model->cate_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing BsCategory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $cate_id Cate ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($cate_id)
    {
        $model = $this->findModel($cate_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'cate_id' => $model->cate_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing BsCategory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $cate_id Cate ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($cate_id)
    {
        $this->findModel($cate_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the BsCategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $cate_id Cate ID
     * @return BsCategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($cate_id)
    {
        if (($model = BsCategory::findOne(['cate_id' => $cate_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
