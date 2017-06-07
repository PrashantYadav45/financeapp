<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TblPerson;

/**
 * PersonSearch represents the model behind the search form about `app\models\TblPerson`.
 */
class PersonSearch extends TblPerson
{
	public $fullname;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'country_id', 'parent_id'], 'integer'],
            [['first_name', 'last_name'], 'safe'],
			[['fullName'], 'safe']
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
        $query = TblPerson::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        /*$this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'country_id' => $this->country_id,
            'parent_id' => $this->parent_id,
        ]);

        $query->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name]);
			
			*/
			
	    $dataProvider->setSort([
        'attributes' => [
            'id',
            'fullName' => [
                'asc' => ['first_name' => SORT_ASC, 'last_name' => SORT_ASC],
                'desc' => ['first_name' => SORT_DESC, 'last_name' => SORT_DESC],
                'label' => 'Full Name',
                'default' => SORT_ASC
            ],
            'country_id'
        ]
    ]);
 
    if (!($this->load($params) && $this->validate())) {
        return $dataProvider;
    }
 
    $this->addCondition($query, 'id');
    $this->addCondition($query, 'first_name', true);
    $this->addCondition($query, 'last_name', true);
    $this->addCondition($query, 'country_id');
 
    /* Setup your custom filtering criteria */
 
    // filter by person full name
    $query->andWhere('first_name LIKE "%' . $this->fullName . '%" ' .
        'OR last_name LIKE "%' . $this->fullName . '%"'
    );		

        return $dataProvider;
    }
}
