<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ExpenseAmount;

/**
 * ExpenseamountSearch represents the model behind the search form about `app\models\ExpenseAmount`.
 */
class ExpenseamountSearch extends ExpenseAmount
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'expense_category_id', 'repeat'], 'integer'],
            [['payment_detail', 'note', 'bill_image', 'created_date', 'modify_date'], 'safe'],
            [['amount'], 'number'],
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
        $query = ExpenseAmount::find();

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
            'expense_category_id' => $this->expense_category_id,
            'amount' => $this->amount,
            'repeat' => $this->repeat,
            'created_date' => $this->created_date,
            'modify_date' => $this->modify_date,
        ]);

        $query->andFilterWhere(['like', 'payment_detail', $this->payment_detail])
            ->andFilterWhere(['like', 'note', $this->note])
            ->andFilterWhere(['like', 'bill_image', $this->bill_image]);

        return $dataProvider;
    }
}
