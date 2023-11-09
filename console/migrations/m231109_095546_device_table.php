<?php

use yii\behaviors\TimestampBehavior;
use yii\db\Migration;

/**
 * Class m231109_095546_device_table
 */
class m231109_095546_device_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('TablesDeviceAndStoreModel', [
            'id' => $this->primaryKey(),
            'serial_number' => $this->string()->unique()->notNull(),
            'store_id' => $this->integer(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')->notNull(),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')->notNull(),

        ]);

        $this->createIndex('idx-device-store_id', 'TablesDeviceAndStoreModel', 'store_id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk-device-store_id', 'TablesDeviceAndStoreModel');
        $this->dropIndex('idx-device-store_id', 'TablesDeviceAndStoreModel');
        $this->dropTable('TablesDeviseAndStoreModel');

    }
}
