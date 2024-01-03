<?php
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use kartik\dynagrid\DynaGrid;
use kartik\grid\GridView;
use yii\helpers\Url;
use Mpdf\Config\ConfigVariables;
use Mpdf\Config\FontVariables;
use richardfan\widget\JSRegister;
use common\models\User;
use frontend\models\BsCategory;

$defaultConfig = (new ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];
/* @var $this yii\web\View */
/* @var $searchModel backend\models\locationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$create = [];


// User::find()->all();

// User::find()->one();

$this->title = 'User';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">
    <div class="row">
        <div class="col-md-12">
            <?php $dynagrid = DynaGrid::begin([
                'options'=>[
                    'id'=>'user',// a unique identifier is important
                    'class'=>['table-sm'],
                ],
                'theme'=>'panel-info',
                'showPersonalize'=>true,
                'storage' => DynaGrid::TYPE_COOKIE,
                'showFilter'=>false,
                'showSort'=>false,
                'allowSortSetting'=>false,
                'allowFilterSetting'=>false,
                'gridOptions'=>[
                    'exportConfig' => [
                        GridView::HTML => [
                            'label' =>'HTML',
                            'showHeader' => true,
                            'showPageSummary' => true,
                            'showFooter' => true,
                            'showCaption' => true,
                            'filename' => $this->title,
                            'alertMsg' =>'The HTML export file will be generated for download.',
                            'options' => ['title' =>'Hyper Text Markup Language.'],
                            'mime' => 'text/html',
                        ],
                        GridView::CSV => [
                            'label' =>'CSV',
                            'showHeader' => true,
                            'showPageSummary' => true,
                            'showFooter' => true,
                            'showCaption' => true,
                            'filename' => $this->title,
                            'alertMsg' =>'The CSV export file will be generated for download.',
                            'options' => ['title' =>'Comma Separated Values.'],
                            'mime' => 'application/csv',
                            'config' => [
                                'colDelimiter' => ",",
                                'rowDelimiter' => "\r\n",
                            ]
                        ],
                        GridView::TEXT => [
                            'label' =>'TEXT',
                            'showHeader' => true,
                            'showPageSummary' => true,
                            'showFooter' => true,
                            'showCaption' => true,
                            'filename' =>$this->title,
                            'alertMsg' =>'The TEXT export file will be generated for download.',//
                            'options' => ['title' =>'Tab Delimited Text.'],
                            'mime' => 'text/plain',
                            'config' => [
                                'colDelimiter' => "\t",
                                'rowDelimiter' => "\r\n",
                            ]
                        ],
                        GridView::EXCEL => [
                            'label' =>'EXCEL',
                            'showHeader' => true,
                            'showPageSummary' => true,
                            'showFooter' => true,
                            'showCaption' => true,
                            'filename' => $this->title,
                            'alertMsg' =>'The EXCEL export file will be generated for download.',
                            'options' => ['title' =>'Microsoft Excel 95+'],
                            'mime' => 'application/vnd.ms-excel',
                            'config' => [
                                'worksheet' => 'ExportWorksheet',
                                'cssFile' => ''
                            ]
                        ],
                        GridView::PDF => [
                            'label' =>'PDF',
                            'showHeader' => true,
                            'showPageSummary' => true,
                            'showFooter' => true,
                            'showCaption' => true,
                            'filename' => $this->title,
                            'alertMsg' =>'The PDF export file will be generated for download.',
                            'options' => ['title' =>'Portable Document Format'],
                            'mime' => 'application/pdf',
                            'config' => [
                                'mode' => 'UTF-8',
                                'format' => 'A4-L',
                                'destination' => 'D',
                                'marginTop' => 20,
                                'marginBottom' => 20,
                                'cssFile' => '@frontend/web/css/pdf/kartik-pdf.css',
                                'cssInline' => '',
                                'methods' => [
                                    'SetHeader' => [
                                        ['odd' => '123', 'even' => '456']
                                    ],
                                    'SetFooter' => [
                                        ['odd' => '789', 'even' => '987']
                                    ],
                                ],
                                'options' => [
                                    'title' => $this->title,
                                    'subject' =>'PDF export generated by kartik-v/yii2-grid extension',
                                    'keywords' => 'krajee, grid, export, yii2-grid, pdf',
                                    'fontDir'=>array_merge($fontDirs, [
                                        Yii::getAlias('@webroot').'/fonts'
                                    ]),
                                    'fontdata'=>$fontData + [
                                        'thsarabunpsk' => [
                                            'R' => 'THSarabun.ttf',
                                        ],

                                    ],
                                ],
                                'contentBefore'=>'',
                                'contentAfter'=>''
                            ],
                        ],
                    ],
                    'pager' => [
                        'maxButtonCount'=>5,
                        'options'=>['class'=>'pagination'],
                        'prevPageLabel' => '<',
                        'nextPageLabel' => '>',
                        'firstPageLabel'=> '<<',
                        'lastPageLabel'=> '>>',
                        'nextPageCssClass'=>'next',
                        'prevPageCssClass'=>'prev',
                        'firstPageCssClass'=>'first',
                        'lastPageCssClass'=>'last',
                    ],
                    'dataProvider'=>$dataProvider,
                    'filterModel' => $searchModel,
                    'showPageSummary'=>false,
                    'floatHeader'=>false,
                // 'pjax'=>true,
                    'responsiveWrap'=>false,
                    'responsive'=>true,
                    'hover' => true,
                    'containerOptions' => ['style' => 'overflow: auto'],
                    'krajeeDialogSettings' => [
                        'options' => [
                            'title' =>'Notification',
                        ],
                        
                        // 'overrideYiiConfirm' => false, 'useNative' => false
                    ],
                    'panel'=>[
                        'heading'=>'<h3 class="panel-title"><i class="fa fa-list"></i></h3>',
                        'before' =>'',
                        'after' => false
                    ],
                    'toolbar' =>  [
                        [
                            'content'=>Html::a('<i class="fas fa-plus"></i>',
                                Url::to(['create']),
                                [
                                    'class'=>'btn btn-success',
                                    'data-toggle' => "tooltip",
                                    'title'=>'Create',
                                 
                                ])
                        ],
                        ['content'=>'{dynagridFilter}{dynagridSort}{dynagrid}{toggleData}'],
                        '{export}',
                    ]
                ],
                'columns' => [
                    [
                        'class' => 'kartik\grid\SerialColumn', 'order'=>DynaGrid::ORDER_FIX_LEFT
                    ],

                 
                    'id',
                    'username',
                    // 'auth_key',
                    // 'password_hash',
                    // 'password_reset_token',
                    'email:email',
                    [
                        'attribute' => 'cus_status',
                        'headerOptions' => ['class' => 'text-center'],
                        'contentOptions' => ['class' => 'text-center'],
                        'vAlign' => 'middle',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return $model->custStatus;
                        },
                        'filter' => Html::activeDropDownList($searchModel, 'cus_status', User::ArrayCusStatus(), ['class' => 'form-control', 'prompt' => '']),
                    ],
                    [
                        'attribute' => 'status',
                        'headerOptions' => ['class' => 'text-center'],
                        'contentOptions' => ['class' => 'text-center'],
                        'vAlign' => 'middle',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return $model->statusValue;
                        },
                        'filter' => Html::activeDropDownList($searchModel, 'status', User::ArrayStatus(), ['class' => 'form-control', 'prompt' => '']),
                    ],
                    //'created_at',
                    //'updated_at',
                    //'verification_token',
                    'fullname',
                    'address',
                    'tel',

                  
                    [
                        'class' => 'kartik\grid\ActionColumn',
                        'buttonOptions'=>['class'=>'btn btn-default'],
                        'template'=>'<div class="btn-group btn-group-xs text-center" role="group">{change-password}{view} {update} {delete}</div>',
                        'visibleButtons'=>[
                            // 'view' => Yii::$app->user->can('category/view'),
                            // 'update' => Yii::$app->user->can('category/update'),
                            // 'delete' => Yii::$app->user->can('category/delete')
                        ],
                        'buttons'=>[
                            'change-password'=>function($url,$model,$key){
                                return Html::a('<i class="fas fa-key"></i>',
                                    Url::to(['change-password', 'id' => $model->id]),// $url, $model, $key
                                    [
                                        'class'=>'btn btn-success',
                                        'title'=>'Change Password',
                                        'data-toggle' => "tooltip",
                                    ]
                                );
                            },
                            'view'=>function($url,$model,$key){
                                return Html::a('<i class="fas fa-eye"></i>',
                                    Url::to(['view', 'id' => $model->id]),// $url, $model, $key
                                    [
                                        'class'=>'btn btn-info',
                                        'title'=>'Detail',
                                        'data-toggle' => "tooltip",
                                    ]
                                );

                            },
                            'update'=>function($url,$model,$key){
                                return Html::a('<i class="fas fa-pencil-alt"></i>',
                                    Url::to(['update', 'id' => $model->id]),// $url, $model, $key
                                    [
                                        'class'=>'btn btn-warning',
                                        'title'=>'Update',
                                        'data-toggle' => "tooltip",
                                    ]
                                );
                            },
                            'delete'=>function($url,$model,$key){
                                return Html::a('<i class="fas fa-trash-alt"></i>',
                                    Url::to(['delete', 'id' => $model->id]),// $url, $model, $key
                                    [
                                        'class'=>'btn btn-danger',
                                        'title'=> 'Delete',
                                        'data-toggle' => "tooltip",
                                        'data'=>[
                                            'method' => 'POST',
                                            'confirm' =>'Are you sure you want to delete this item?',
                                        ],

                                    ]
                          
                                );
                            },
                        ],
                    ],

                    /*[
                        'class' => 'kartik\grid\CheckboxColumn', 'order'=>DynaGrid::ORDER_FIX_RIGHT
                    ],*/
                ],

            ]);
            if (substr($dynagrid->theme, 0, 6) == 'simple') {
                $dynagrid->gridOptions['panel'] = false;
            }
            DynaGrid::end();
            ?>
        </div>
    </div>
</div>

<?php  JSRegister::begin([
    'position' => \yii\web\View::POS_READY
]); ?>
<script>

$('.kv-editable-popover').hide();
</script>
<?php  JSRegister::end(); ?>