<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;
use frontend\behavior\MyBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;



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
            'time' => '测试timestamp行为',
        ];
    }



    /** 测试事件流程
     */
    public function say_hello()
    {
        echo '类 - 事件的执行流程';

    }

    /**
     * 事件测试: 
     * @param 删除学生之后执行此方法,更新班级总人数
     */
    public function updateStudentNumber($params)
    {
        $id = $params->sender->actionParams['c_id'];
        $model = Room::findOne($id);
        echo $id;
        p($model);

    }



    /**
     * 行为测试: 
     * @return 新增完班级之后,自动填充时间戳
     */
    // public function behaviors()
    // {
    //     return [
    //         'class' => TimestampBehavior::className(),
    //         'attributes' => [
    //             ActiveRecord::EVENT_BEFORE_INSERT => ['created_at','updated_at'],
    //         ],
    //     ];
        
    // }
}