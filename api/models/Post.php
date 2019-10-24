<?php

namespace api\models;

use Yii;
use yii\mongodb\ActiveRecord;

/**
 * This is the model class for collection "posts".
 *
 * @property \MongoDB\BSON\ObjectID|string $_id
 * @property mixed $citySlug
 * @property mixed $type
 * @property mixed $text
 * @property mixed $rating
 * @property mixed $imageSets
 * @property mixed $galleries
 * @property mixed $comments
 * @property mixed $commentCount
 * @property mixed $likes
 * @property mixed $hasOutletLike
 * @property mixed $likeCount
 * @property mixed $status
 * @property mixed $isEdited
 * @property mixed $createdAt
 */
class Post extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function collectionName()
    {
        return ['tbdb', 'posts'];
    }

    /**
     * {@inheritdoc}
     */
    public function attributes()
    {
        return [
            '_id',
            'citySlug',
            'placeId',
            'organisationId',
            'type',
            'text',
            'rating',
            'imageSets',
            'galleries',
            'comments',
            'commentCount',
            'likes',
            'hasOutletLike',
            'likeCount',
            'status',
            'isEdited',
            'createdAt',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['citySlug', 'placeId', 'organisationId', 'type', 'text', 'rating', 'imageSets', 'galleries', 'comments', 'commentCount', 'likes', 'hasOutletLike', 'likeCount', 'status', 'isEdited', 'createdAt'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            '_id' => 'ID',
            'citySlug' => 'City Slug',
            'type' => 'Type',
            'text' => 'Text',
            'rating' => 'Rating',
            'imageSets' => 'Image Sets',
            'galleries' => 'Galleries',
            'comments' => 'Comments',
            'commentCount' => 'Comment Count',
            'likes' => 'Likes',
            'hasOutletLike' => 'Has Outlet Like',
            'likeCount' => 'Like Count',
            'status' => 'Status',
            'isEdited' => 'Is Edited',
            'createdAt' => 'Created At',
        ];
    }
    
    /**
     * Связь с местом
     * @return $this
     */
    public function getPlace()
    {
        return $this->hasOne(Place::className(), ['_id' => 'placeId']);
    }

    /**
     * Связь с организацией
     * @return $this
     */
    public function getOrganisation()
    {
        return $this->hasOne(Organisation::className(), ['_id' => 'organisationId']);
    }

    /**
     * Связь с пользователем
     * @return $this
     */    
    public function getUser()
    {
        //return $this->hasOne(User::className(), ['_id' => 'userId']);
    }     
}
