<?php

namespace frontend\controllers;

use frontend\models\BsCustomer;
use frontend\models\BsCustomerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CustomerController implements the CRUD actions for BsCustomer model.
 */
class CustomerController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
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
     * Lists all BsCustomer models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new BsCustomerSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BsCustomer model.
     * @param string $cus_login Cus Login
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($cus_login)
    {
        return $this->render('view', [
            'model' => $this->findModel($cus_login),
        ]);
    }

    /**
     * Creates a new BsCustomer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new BsCustomer();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'cus_login' => $model->cus_login]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing BsCustomer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $cus_login Cus Login
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($cus_login)
    {
        $model = $this->findModel($cus_login);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'cus_login' => $model->cus_login]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing BsCustomer model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $cus_login Cus Login
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($cus_login)
    {
        $this->findModel($cus_login)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the BsCustomer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $cus_login Cus Login
     * @return BsCustomer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($cus_login)
    {
        if (($model = BsCustomer::findOne(['cus_login' => $cus_login])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
