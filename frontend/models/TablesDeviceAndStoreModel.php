<?php
namespace frontend\models;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
class TablesDeviceAndStoreModel extends ActiveRecord{

    public function rules()
    {
        return [
            [['serial_number', 'store_id'], 'required'],
            [['store_id'], 'integer'],
            [['serial_number'], 'string', 'max' => 255],
        ];
    }


    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'value' => function () {
//                    return Yii::$app->formatter->asDatetime(date('Y-d-m h:i:s'));
                },
            ],
        ];
    }

}
