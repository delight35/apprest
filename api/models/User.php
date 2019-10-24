<?php

namespace api\models;

use Yii;
use yii\mongodb\ActiveRecord;

/**
 * This is the model class for collection "users".
 *
 * @property \MongoDB\BSON\ObjectID|string $_id
 * @property mixed $slug
 * @property mixed $phone
 * @property mixed $password
 * @property mixed $restorePassword
 * @property mixed $firstName
 * @property mixed $secondName
 * @property mixed $avatar
 * @property mixed $city
 * @property mixed $about
 * @property mixed $link
 * @property mixed $followerCount
 * @property mixed $followers
 * @property mixed $status
 */
class User extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function collectionName()
    {
        return ['tbdb', 'users'];
    }

    /**
     * {@inheritdoc}
     */
    public function attributes()
    {
        return [
            '_id',
            'slug',
            'phone',
            'password',
            'restorePassword',
            'firstName',
            'secondName',
            'avatar',
            'city',
            'about',
            'link',
            'followerCount',
            'followers',
            'status',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['slug', 'phone', 'password', 'restorePassword', 'firstName', 'secondName', 'avatar', 'city', 'about', 'link', 'followerCount', 'followers', 'status'], 'safe']
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
            'phone' => 'Phone',
            'password' => 'Password',
            'restorePassword' => 'Restore Password',
            'firstName' => 'First Name',
            'secondName' => 'Second Name',
            'avatar' => 'Avatar',
            'city' => 'City',
            'about' => 'About',
            'link' => 'Link',
            'followerCount' => 'Follower Count',
            'followers' => 'Followers',
            'status' => 'Status',
        ];
    }
}
