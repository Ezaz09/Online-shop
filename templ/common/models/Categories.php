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
 * Class Categories
 * @package common\models
 * @property integer $id
 * @property string $name
 * @property string $rus_name
 */

class Categories extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%cets}}';
    }
}