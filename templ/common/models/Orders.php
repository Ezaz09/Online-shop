<?php
/**
 * Created by PhpStorm.
 * User: Вова
 * Date: 13.06.2019
 * Time: 17:00
 */

namespace common\models;

use yii\db\ActiveRecord;

/**
 * Class Orders
 * @package common\models
 * @property string email
 * @property string fio
 * @property string phone
 */

class Orders extends ActiveRecord
{
    const SCENARIO_CREATE = "create";
    const SCENARIO_DEFAULT = self::SCENARIO_CREATE;
    public static function tableName()
    {
        return '{{%order}}';
    }

    public function scenarios()
    {
        return [
            self::SCENARIO_CREATE => [
                '!id',
                'email',
                'fio',
                'phone'
            ],
        ];
    }

    public function rules()
    {
        return [
            [['email', 'fio', 'phone'], 'string', 'max' =>5000],
            [['id'], 'safe'],
        ];
    }
}