<?php

namespace api\modules\v1\resources;

use api\models\Organisation;

class OrganisationResource extends Organisation
{
    public function fields()
    {
        return [
            'id' => '_id',
            'name',
            'category',
            'city'
        ];
    }
}
