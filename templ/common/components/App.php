<?php

namespace common\components;

use Yii;


use yii\helpers\ArrayHelper;
use yii\web\User;
use yii\web\Request;
use yii\web\Response;
use yii\web\UrlManager;
use yii\web\Session;
use yii\db\Connection;
use yii\base\Security;

/**
 * Class App
 * @package common\components
 *
 * @method static UrlManager frontUrlManager()
 * @method static UrlManager backUrlManager()
 * @method static UrlManager staticUrlManager()
 * @method static Connection db()
 * @method static User user()
 * @method static Security security()
 * @method static Session session()
 * @method static Request request()
 * @method static Response response()
 */

class App
{
    /**
     * @return \common\models\User|\yii\web\IdentityInterface
     */
    public static function userModel()
    {
        if (!Yii::$app->has('user')) {
            return null;
        }

        return self::user()->identity;
    }

    /**
     * @param $name
     * @param $parameters
     * @return null|object
     * @throws \yii\base\InvalidConfigException
     */
    public static function __callStatic($name, $parameters)
    {
        if (Yii::$app->has($name)) {
            return Yii::$app->get($name);
        }
        return null;
    }

    /**
     * @return bool
     */
    public static function debug()
    {
        return defined('YII_DEBUG') && YII_DEBUG === true || defined('YII_ENV') && YII_ENV === 'test';
    }

    /**
     * @return \yii\console\Controller|\yii\web\Controller
     */
    public static function controller()
    {
        return Yii::$app->controller;
    }


    public static function sendJson($data)
    {
        self::response()->format = Response::FORMAT_JSON;
        return $data;
    }


    /**
     * @return array
     */
    public static function requestData()
    {
        $request = App::request();
        $result = [];

        if ($request->isGet || $request->isPost) {
            $result = ArrayHelper::merge($request->get(), $request->post());
        }

        return $result;
    }
}
