<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
           // 'class' => 'yii\caching\FileCache',
            'class' => 'yii\caching\NoCache',
        ],
    ],
];
