<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TargetAmount;

/**
 * TargetamountSearch represents the model behind the search form about `app\models\TargetAmount`.
 */
class TargetamountSearch extends TargetAmount
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'no_family', 'no_children', 'no_earning_member', 'status'], 'integer'],
            [['target_amount', 'average_monthly_income'], 'number'],
            [['housing_type', 'maintenance', 'investment_habit', 'created_date', 'modify_date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = TargetAmount::find();

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
            'user_id' => $this->user_id,
            'target_amount' => $this->target_amount,
            'average_monthly_income' => $this->average_monthly_income,
            'no_family' => $this->no_family,
            'no_children' => $this->no_children,
            'no_earning_member' => $this->no_earning_member,
            'status' => $this->status,
            'created_date' => $this->created_date,
            'modify_date' => $this->modify_date,
        ]);

        $query->andFilterWhere(['like', 'housing_type', $this->housing_type])
            ->andFilterWhere(['like', 'maintenance', $this->maintenance])
            ->andFilterWhere(['like', 'investment_habit', $this->investment_habit]);

        return $dataProvider;
    }
}
