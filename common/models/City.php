<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "city".
 *
 * @property int $id
 * @property double $lat
 * @property double $lng
 * @property string $lang
 * @property string $Description
 * @property string $SettlementTypeDescription
 * @property string $AreaDescription
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lat', 'lng'], 'number'],
            [['lang'], 'string'],
            [['Description', 'SettlementTypeDescription', 'AreaDescription'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lat' => 'Lat',
            'lng' => 'Lng',
            'lang' => 'Lang',
            'Description' => 'Description',
            'SettlementTypeDescription' => 'Settlement Type Description',
            'AreaDescription' => 'Area Description',
        ];
    }
}
