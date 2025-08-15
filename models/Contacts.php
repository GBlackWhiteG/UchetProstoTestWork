<?php

namespace app\models;

use yii\db\ActiveRecord;

class Contacts extends ActiveRecord
{
    private $name;
    private $surname;
    private $deals;

    public function rules()
    {
        return [
            [['name', 'surname'], 'required'],
            ['name', 'string'],
            ['surname', 'string'],
        ];
    }

    public function getDeals()
    {
        return $this->hasMany(Deals::class, ['id' => 'deal_id'])
            ->viaTable('deal_contact', ['contact_id' => 'id']);
    }
}
