<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property int $employee_id
 * @property string $employee_name
 * @property int $employee_num
 * @property string $address
 * @property int $salary
 * @property string $job_tittle
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['employee_name', 'employee_num', 'address', 'salary', 'job_tittle'], 'required'],
            [['employee_num', 'salary'], 'integer'],
            [['employee_name', 'address', 'job_tittle'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'employee_id' => 'Employee ID',
            'employee_name' => 'Employee Name',
            'employee_num' => 'Employee Num',
            'address' => 'Address',
            'salary' => 'Salary',
            'job_tittle' => 'Job Tittle',
        ];
    }
}
