<?php

namespace api\modules\v1\resources;

use api\models\Place;

class PlaceResource extends Place
{
    public function fields()
    {
        return [
            'id' => '_id',
            'name',
            'city',
            'street',
            'category',
            'subcategory',
        ];
    }
}
