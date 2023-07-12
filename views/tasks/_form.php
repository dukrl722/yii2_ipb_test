<?php

use yii\jui\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Users;
use app\models\Categories;

/** @var yii\web\View $this */
/** @var app\models\Tasks $model */
/** @var yii\widgets\ActiveForm $form */

$userModal = new Users();
$categoryModal = new Categories();
?>

<div class="tasks-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'user_id')->dropDownList($userModal->getAllUsers(), ['prompt' => '']) ?>

    <?= $form->field($model, 'category_id')->dropDownList($categoryModal->getAllCategories(), ['prompt' => '']) ?>

    <?= $form->field($model, 'finished_at')->widget(DatePicker::class, [
            'dateFormat' => 'yyyy-MM-dd'
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
