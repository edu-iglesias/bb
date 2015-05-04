<?php

return array(

    'multi' => array(
        'customer' => array(
             'driver' => 'eloquent',
            'model' => 'Accounts'
        ),
        'user' => array(
            'driver' => 'database',
            'table' => 'users'
        )
    ),

    'reminder' => array(

        //'email' => 'emails.auth.reminder',

        //'table' => 'password_reminders',

        //'expire' => 60,

    ),

);