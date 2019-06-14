<?php
namespace api\controllers\api;

use Yii;
use yii\rest\Controller;


/**
 * Site controller
 */
class CartController extends Controller
{

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function checkout()
    {
        return $this->render('index');
    }

}
