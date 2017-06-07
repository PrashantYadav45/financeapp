<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ExpenseCategory;

/**
 * ExpensecategorySearch represents the model behind the search form about `app\models\ExpenseCategory`.
 */
class ExpensecategorySearch extends ExpenseCategory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'parent_category_id', 'category_type', 'status'], 'integer'],
            [['category_name', 'category_slug', 'category_icon', 'applied_for', 'created_date', 'modify_date'], 'safe'],
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
        $query = ExpenseCategory::find();

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
            'parent_category_id' => $this->parent_category_id,
            'category_type' => $this->category_type,
            'status' => $this->status,
            'created_date' => $this->created_date,
            'modify_date' => $this->modify_date,
        ]);

        $query->andFilterWhere(['like', 'category_name', $this->category_name])
            ->andFilterWhere(['like', 'category_slug', $this->category_slug])
            ->andFilterWhere(['like', 'category_icon', $this->category_icon])
            ->andFilterWhere(['like', 'applied_for', $this->applied_for]);

        return $dataProvider;
    }
}
