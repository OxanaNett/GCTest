<?php

namespace app\models;

use Yii;
use yii\helpers\Url;

/**
 * This is the model class for table "customer".
 *
 * @property integer $id
 * @property string $Name
 * @property string $reg_date
 * @property string $phoneNumber
 * @property integer $status_id
 * @property string $photo
 *
 * @property CustomerStatus $status
 * @property CustomerOrder[] $customerOrders
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Name', 'reg_date'], 'required'],
            [['reg_date'], 'safe'],
            [['status_id'], 'integer'],
            [['Name', 'phoneNumber'], 'string', 'max' => 150],
            [['photo'], 'string', 'max' => 200],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => CustomerStatus::className(), 'targetAttribute' => ['status_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Name' => 'Name',
            'reg_date' => 'Reg Date',
            'phoneNumber' => 'Phone Number',
            'status_id' => 'Status ID',
            'photo' => 'Photo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(CustomerStatus::className(), ['id' => 'status_id'])->inverseOf('customers');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomerOrders()
    {
        return $this->hasMany(CustomerOrder::className(), ['customer_id' => 'id'])->inverseOf('customer');
    }

    public function getOrdersAmount()
    {
        return $this->hasMany(CustomerOrder::className(), ['customer_id' => 'id'])->inverseOf('customer')->count();
    }

    public function getOrdersSumm()
    {
        return $this->hasMany(CustomerOrder::className(), ['customer_id' => 'id'])->inverseOf('customer')->sum('sum');
    }
    public function getLastOrder()
    {
        return $this->hasMany(CustomerOrder::className(), ['customer_id' => 'id'])->inverseOf('customer')->addOrderBy('order_date DESC')->one();

    }
    public function getImageUrl()
    {
        return Url::to('@web/img/' . $this->photo, true);
    }
}
