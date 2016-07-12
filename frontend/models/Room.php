<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "c_room".
 *
 * @property string $id
 * @property string $name
 * @property string $s_number
 */
class Room extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'c_room';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '班级ID',
            'name' => '班级名称',
            's_number' => '学生数量',
            'test_event' => 'event测试',
        ];
    }


}