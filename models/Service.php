<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "service".
 *
 * @property int $service_id
 * @property string $treatment
 * @property int $quantity
 */
class Service extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'service';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['treatment', 'quantity'], 'required'],
            [['quantity'], 'integer'],
            [['treatment'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'service_id' => 'Service ID',
            'treatment' => 'Treatment',
            'quantity' => 'Quantity',
        ];
    }
}
