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

$dataProvider = new ActiveDataProvider(
    [
        'query' => TablesDeviceAndStoreModel::find(),
    ]
);

$searchModel = new TablesDeviceAndStoreModel();

echo GridView::widget(
    [
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'serial_number',
            [
                'attribute' => 'store_id',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::a(
                        $model->store_id,
                        '#',
                        [
                            'data-store-id' => $model->store_id,
                            'data-target' => 'modal',
                        ]
                    );
                },
                'filter' => Html::activeTextInput($searchModel, 'store_id', ['class' => 'form-control']),
            ],
            'about',
            'created_at',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]
);
?>


<style>
    /* Стили для затемнения фона */
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
    }

    /* Стили для модального окна */
    .modal-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        animation: fadeIn 0.5s ease-in-out; /* Анимация открытия*/
    }

    /* Стили для кнопки закрытия */
    .close-button {
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 20px;
        cursor: pointer;
    }

    /* Анимация */
    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 2;
        }
    }

    .hidden {
        display: none;
    }
</style>


<!--МОдальное окно-->
<div id="modal" class="modal hidden">
    <div class="modal-content">
        <span class="close-button">&times;</span>
        <!-- Здесь будет выводиться содержимое представления store.php -->
        <div class="modal-body"></div>
    </div>
</div>

<?php
$this->registerJs(
    '
    const links = document.querySelectorAll("a[data-target=\'modal\']");
    const modal = document.getElementById("modal");
    const modalBody = modal.querySelector(".modal-body");

    links.forEach(function(link) {
        link.addEventListener("click", function(event) {
            event.preventDefault();

            const store_id = this.getAttribute("data-store-id");

            fetch("index.php?r=site/stores&store_id=" + store_id)
                .then(response => response.text())
                .then(data => {
                    modalBody.innerHTML = data;
                    modal.style.display = "block";
                });
        });
    });

    modal.querySelector(".close-button").addEventListener("click", function() {
        modal.style.display = "none";
    });
'
);
