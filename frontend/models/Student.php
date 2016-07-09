<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "c_student".
 *
 * @property string $id
 * @property string $name
 * @property string $sex
 * @property integer $age
 * @property string $qq
 * @property string $mobile
 * @property string $email
 * @property string $c_id
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'c_student';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'sex', 'age', 'qq', 'mobile', 'email', 'c_id'], 'required'],
            [['age', 'c_id'], 'integer'],
            [['name', 'qq'], 'string', 'max' => 20],
            [['sex'], 'string', 'max' => 1],
            [['mobile'], 'string', 'max' => 11],
            [['email'], 'string', 'max' => 60],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'sex' => 'Sex',
            'age' => 'Age',
            'qq' => 'Qq',
            'mobile' => 'Mobile',
            'email' => 'Email',
            'c_id' => 'C ID',
        ];
    }
}