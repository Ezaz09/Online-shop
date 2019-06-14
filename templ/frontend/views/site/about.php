<?php

/* @var $this yii\web\View */
/* @var $user \common\models\User */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;

echo $user->country->country_name;
echo $user->camouflage->camouflage_name;
echo $user->gun->gun_name;
echo $user->helmet->helmet_name;
echo $user->platecarrier->platecarrier_name;

?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>This is the About page. You may modify the following file to customize its content:</p>

    <code><?= __FILE__ ?></code>
</div>
