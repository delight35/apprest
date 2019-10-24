<?php

namespace api\modules\v1\controllers;

use api\controllers\BaseApiController;
use api\modules\v1\resources\PostResource;

class PostController extends BaseApiController
{
    public $modelClass = PostResource::class;
}

