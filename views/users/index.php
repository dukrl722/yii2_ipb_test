<?php

use app\models\Users;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Users', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'name',
                'format' => 'raw',
                'label' => 'Nome',
                'value' => function ($data) {
                    return $data->getshortNameLabel();
                }
            ],
            'date_of_birth',
            'email:ntext',
            'gender',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Users $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ID' => $model->ID]);
                },
                'buttons' => [
                    'tasks' => function($action, Users $model, $key) {
                        $icon = include $_SERVER['DOCUMENT_ROOT'] . '/yii2_ipb_test/assets/svg/task_icon_svg.php';
                        return Html::a($icon, ['tasks/index', 'user_id' => $model->ID]);
                    }
                ],
                'template' => '{view} {update} {delete} {tasks}',

            ],
        ],
    ]); ?>


</div>
