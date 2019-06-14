<?php
/**
 * Created by PhpStorm.
 * User: Вова
 * Date: 13.06.2019
 * Time: 16:39
 */

namespace common\models;

use yii\db\ActiveRecord;

/**
 * Class Product
 * @package common\models
 * @property integer $id
 * @property string $title
 * @property integer $cat_id
 * @property integer $price
 * @property string $rus_name
 * @property string $img
 * @property string $descr
 */

class Product extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%products}}';
    }
}