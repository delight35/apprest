<?php

namespace api\modules\v1\resources;

use api\models\User;

class UserResource extends User
{
    public function fields()
    {
        return [
            'id' => '_id',
            'firstName',
            'secondName'
        ];
    }
}
