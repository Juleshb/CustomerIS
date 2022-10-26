<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customers".
 *
 * @property int $customer_id
 * @property string $Customer_name
 * @property string $address
 * @property int $contact_num
 * @property int $age
 * @property int $payment
 */
class Customers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Customer_name', 'address', 'contact_num', 'age', 'payment'], 'required'],
            [['contact_num', 'age', 'payment'], 'integer'],
            [['Customer_name', 'address'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'customer_id' => 'Customer ID',
            'Customer_name' => 'Customer Name',
            'address' => 'Address',
            'contact_num' => 'Contact Num',
            'age' => 'Age',
            'payment' => 'Payment',
        ];
    }
}
