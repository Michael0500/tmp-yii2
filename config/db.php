<?php

return [
    'dsn' => 'pgsql:host=postgresql;port=5432;dbname=yii2tree',
    'username' => 'postgres',
    'password' => 'postgres',

    //'dsn' => 'mysql:host=mysql;dbname=yii2tree',
    //'username' => 'root',
    //'password' => '12345',


    'class' => 'yii\db\Connection',
    'charset' => 'utf8',
    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
