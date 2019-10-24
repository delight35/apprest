<?php

namespace api\models;

use Yii;
use yii\mongodb\ActiveRecord;

/**
 * This is the model class for collection "places".
 *
 * @property \MongoDB\BSON\ObjectID|string $_id
 * @property mixed $slug
 * @property mixed $organisationSlug
 * @property mixed $organisationId
 * @property mixed $citySlug
 * @property mixed $name
 * @property mixed $city
 * @property mixed $street
 * @property mixed $house
 * @property mixed $category
 * @property mixed $subcategory
 * @property mixed $avatar
 * @property mixed $logo
 * @property mixed $albums
 * @property mixed $menus
 * @property mixed $followerCount
 * @property mixed $followers
 * @property mixed $status
 * @property mixed $moderationStatus
 */
class Place extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function collectionName()
    {
        return ['tbdb', 'places'];
    }

    /**
     * {@inheritdoc}
     */
    public function attributes()
    {
        return [
            '_id',
            'slug',
            'organisationSlug',
            'organisationId',
            'citySlug',
            'name',
            'city',
            'street',
            'house',
            'category',
            'subcategory',
            'avatar',
            'logo',
            'albums',
            'menus',
            'followerCount',
            'followers',
            'status',
            'moderationStatus',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['slug', 'organisationSlug', 'organisationId', 'citySlug', 'name', 'city', 'street', 'house', 'category', 'subcategory', 'avatar', 'logo', 'albums', 'menus', 'followerCount', 'followers', 'status', 'moderationStatus'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            '_id' => 'ID',
            'slug' => 'Slug',
            'organisationSlug' => 'Organisation Slug',
            'organisationId' => 'Organisation ID',
            'citySlug' => 'City Slug',
            'name' => 'Name',
            'city' => 'City',
            'street' => 'Street',
            'house' => 'House',
            'category' => 'Category',
            'subcategory' => 'Subcategory',
            'avatar' => 'Avatar',
            'logo' => 'Logo',
            'albums' => 'Albums',
            'menus' => 'Menus',
            'followerCount' => 'Follower Count',
            'followers' => 'Followers',
            'status' => 'Status',
            'moderationStatus' => 'Moderation Status',
        ];
    }
    
    public function getPosts()
    {
        return $this->hasMany(Post::className(), ['placeId' => 'id']);
    }    
}
