<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DiskIndex;

/**
 * DiskIndexSearch represents the model behind the search form of `app\models\DiskIndex`.
 */
class DiskIndexSearch extends DiskIndex
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'diskid', 'filesize', 'filectime', 'filemtime', 'created_at'], 'integer'],
            [['dirname', 'filename', 'extension'], 'safe'],
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
        $query = DiskIndex::find();

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
            'diskid' => $this->diskid,
            'filesize' => $this->filesize,
            'filectime' => $this->filectime,
            'filemtime' => $this->filemtime,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'dirname', $this->dirname])
            ->andFilterWhere(['like', 'filename', $this->filename])
            ->andFilterWhere(['like', 'extension', $this->extension]);

        return $dataProvider;
    }
}
