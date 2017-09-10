<?php
/**
 */

namespace execut\files\controllers;


use execut\crud\params\Crud;
use execut\files\models\File;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;

class BackendController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actions()
    {
        $crud = new Crud([
            'modelClass' => File::class,
            'module' => 'files',
            'moduleName' => 'Files',
            'modelName' => File::MODEL_NAME,
        ]);
        return ArrayHelper::merge($crud->actions(), [
            'update' => [
                'adapter' => [
                    'filesAttributes' => [
                        'data' => 'dataFile'
                    ],
                ]
            ],
        ]);
    }
}