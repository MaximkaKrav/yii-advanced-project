<?php

use yii\db\Migration;
use yii\behaviors\TimestampBehavior;

/**
 * Handles the creation of table `{{%device}}`.
 */
class m231108_113820_create_device_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('device', [
            'id' => $this->primaryKey(),
            'serial_number' => $this->string()->unique()->notNull(),
            'store_id' => $this->integer(),
            'created_at' => $this->timestamp()->notNull(),
            'updated_at' => $this->timestamp(),
        ]);

        $this->createIndex('idx-device-store_id', 'device', 'store_id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk-device-store_id', 'device');
        $this->dropIndex('idx-device-store_id', 'device');
        $this->dropTable('device');

    }
}
