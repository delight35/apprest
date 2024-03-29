<?php

namespace api\modules\v1\resources;

use api\models\Post;
use api\modules\v1\resources\PlaceResource;
use api\modules\v1\resources\OrganisationResource;

class PostResource extends Post
{
    public function fields()
    {
        return [
            'id' => '_id',            
            'organisation' => function (Post $model)
            {
                return new OrganisationResource($model->organisation);
            },
            'place' => function (Post $model)
            {
                return new PlaceResource($model->place);
            },
            'text',
            'rating',                    
            //'timePassed'
            //'user',
        ];
    }
}
