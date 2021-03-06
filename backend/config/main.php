<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'as locale' => [
        'class' => 'common\components\LocaleBehavior',
        'enablePreferredLanguage' => true
    ],
    'modules' => [
       'markdown' => [
            'class' => 'kartik\markdown\Module',
        ],
       'user' => [
            'class' => 'common\modules\user\Module',
        ],
        'cms' => [
            'class' => 'backend\modules\cms\Module',
        ],
        'content' => [
            'class' => 'backend\modules\content\Module',
        ],
    ],
    'components' => [

        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
    ],
    'params' => $params,
];
