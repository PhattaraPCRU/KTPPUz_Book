<?php

namespace frontend\controllers;

use frontend\models\BsBook;
use frontend\models\BsBookSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use frontend\models\BsCategory;
use yii\filters\AccessControl;
/**
 * BookController implements the CRUD actions for BsBook model.
 */
class BookController extends Controller
{
    private $categories;
    /**
     * {@inheritdoc}
     */
    private function getCategories()
    {
        $this->categories = BsCategory::find()->all();
    }
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
     * Lists all BsBook models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->getCategories();
        $searchModel = new BsBookSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'categories'=>$this->categories,
        ]);
    }

    /**
     * Displays a single BsBook model.
     * @param string $book_isbn Book Isbn
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($book_isbn)
    {
        return $this->render('view', [
            'model' => $this->findModel($book_isbn),
        ]);
    }

    /**
     * Creates a new BsBook model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $this->getCategories();
        $model = new BsBook();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $file = UploadedFile::getInstance($model, 'book_pic');
                
                if($file){
                    $path           = $model->getUploadPath();
                    $file->saveAs($path . time() . '.' . $file->extension);
                    $model->book_pic = time() . '.' . $file->extension;
                }
                 if($model->save()){
                     return $this->redirect(['view', 'book_isbn' => $model->book_isbn]);
                 } 
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'categories'=>$this->categories,
        ]);
    }

    /**
     * Updates an existing BsBook model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $book_isbn Book Isbn
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($book_isbn)
    {
        $this->getCategories();
        $model = $this->findModel($book_isbn);
        list($initialPreview, $initialPreviewConfig) = $model->getInitialPreview();
        $old_file = $model->book_pic;
        if ($this->request->isPost && $model->load($this->request->post()) ) {
            $file = UploadedFile::getInstance($model, 'book_pic');
               
            if($file){
                $path           = $model->getUploadPath();
                $file->saveAs($path . time() . '.' . $file->extension);
                $model->book_pic = time() . '.' . $file->extension;


                if($old_file){
                    unlink($path . $old_file);
                }
            }
                if($model->save()){
                    return $this->redirect(['view', 'book_isbn' => $model->book_isbn]);
                }
        }

        return $this->render('update', [
            'model' => $model,
            'initialPreview' => $initialPreview,
            'initialPreviewConfig' => $initialPreviewConfig,
            'categories'=>$this->categories,
        ]);
    }

    /**
     * Deletes an existing BsBook model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $book_isbn Book Isbn
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($book_isbn)
    {
        $this->findModel($book_isbn)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the BsBook model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $book_isbn Book Isbn
     * @return BsBook the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($book_isbn)
    {
        if (($model = BsBook::findOne(['book_isbn' => $book_isbn])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
