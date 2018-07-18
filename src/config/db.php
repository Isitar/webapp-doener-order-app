<?php

return [
    'class' => 'yii\db\Connection',
    #'dsn'=>'mysql:host=192.168.0.18:32409;dbname=doener-order-app',
    'dsn' => 'mysql:host='.getenv('MYSQL_HOST').';dbname=doener-order-app',
    'username' => getenv('MYSQL_USER'),
    'password'=>getenv('MYSQL_PW'),
    #'password' => 'Dvx0TNJMj48yJ9ozFnix',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
