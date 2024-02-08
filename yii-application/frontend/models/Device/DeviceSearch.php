<?php

namespace frontend\models\Device;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * DeviceSearch represents the model behind the search form of `app\models\Device`.
 */
class DeviceSearch extends Device
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'serial_number', ], 'integer'],
            [['name', 'description','storrage', 'created_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Device::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'serial_number' => empty($this->serial_number) ? null : parse_ini_string($this->serial_number) ,
           // 'storrage' => empty($this->storrage) ? null : $this->storrage,
            'created_at' => empty($this->created_at) ? null : parse_ini_string($this->created_at) ,
        ]);
        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'serial_number',$this->serial_number])
            ->andFilterWhere(['like', 'storrage', $this->storrage])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
