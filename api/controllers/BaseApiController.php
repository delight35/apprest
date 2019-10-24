<?php

namespace api\controllers;

use yii\rest\ActiveController;

class BaseApiController extends ActiveController
{
    public function checkAccess($action, $model = null, $params = array()) {
        return true;
    }
    
    public function behaviors() {
        return [
            'contentNeogotinator' => [
                'class' => \yii\filters\ContentNegotiator::class,
                'formatParam' => '_format',
                'formats' => [
                    'application/json' => \yii\web\Response::FORMAT_JSON
                ]
            ]
        ];
    }
}

