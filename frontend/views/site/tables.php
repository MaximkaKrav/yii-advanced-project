<!---->
<!--<table class="table">-->
<!---->
<!--<tr><td>{$rows['id']}</td><td>{$rows['serial_number']}</td><td>{$rows['store_id']}</td><td>{$rows['created_at']}</td><td>{$rows['updated_at']}</td></tr>-->
<!--</table>-->



<?php


use frontend\models\TablesDeviceAndStoreModel;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
echo Html::a('Добавить', ['create'], ['class' => 'btn btn-success']);


$dataProvider = new ActiveDataProvider([
    'query' => TablesDeviceAndStoreModel::find(),
]);

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'serial_number',
        'store_id',
        'created_at',
        ['class' => 'yii\grid\ActionColumn'],
    ],

]);



?>