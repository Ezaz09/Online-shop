<?php
/**
 * Created by PhpStorm.
 * User: Вова
 * Date: 13.06.2019
 * Time: 16:42
 */

namespace api\controllers\api;


use common\components\App;
use common\models\Orders;
use yii\rest\Controller;
use yii\web\HttpException;

class OrderController extends Controller
{
    /**
     * @return bool
     * @throws HttpException
     */
    public function actionCreate()
    {
        $request = App::request()->post();

        if ($request) {

            $order = new Orders();

            $order->setScenario( Orders::SCENARIO_CREATE);

            $order->load($request, 'order');

            if (!$order->validate()) {

                throw new HttpException(400, 'An error occurred while verifying');

            }

            if (!$order->save()) {

                throw new HttpException(500, 'An error occurred while saving');
            }

            return true;
        }

        throw new HttpException(400, 'Empty request');
    }
}