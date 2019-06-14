<?php
/**
 * Created by PhpStorm.
 * User: Вова
 * Date: 13.06.2019
 * Time: 16:42
 */

namespace api\controllers\api;


use common\models\Categories;
use common\models\Product;
use yii\rest\Controller;

class ProductController extends Controller
{
    public function actionCategories() {
        return array_map(function (Categories $model) {
            return [
                'id' => $model->getAttribute('id'),
                'name' => $model->getAttribute('name'),
                'rus_name' => $model->getAttribute('rus_name'),
            ];
        }, Categories::find()
            ->all()
        );
    }

    public function actionIndex($id=null)
    {
        $products = Product::find();
        if($id){
            $products->where(['cat_id' => $id]);
        }
        return array_map(function (Product $model) {
            return [
                'id' => $model->getAttribute('id'),
                'title' => $model->getAttribute('title'),
                'cat_id' => $model->getAttribute('cat_id'),
                'price' => $model->getAttribute('price'),
                'rus_name' => $model->getAttribute('rus_name'),
                'img' => $model->getAttribute('img'),
                'descr' => $model->getAttribute('descr'),
            ];
        },
            $products->all()
        );
    }
}