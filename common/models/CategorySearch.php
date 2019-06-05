<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Categories;

/**
 * CategorySearch represents the model behind the search form of `common\models\Categories`.
 */
class CategorySearch extends Categories
{
    public static function getParentCategories()
    {
        $query = Categories::find()->where(['is', 'parentId', null])->with('categories')->all();
//        foreach ($query as $item) {
//            $item->children = Category::find()->where(['=', 'parentId', $item->id])->all();
//        }
        return $query;
    }

    public static function normalWhereIs()
    {

        return Categories::whereIsNull('parentId')->all();
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'parentId', 'status', 'date_created', 'date_updated', 'date_deleted'], 'integer'],
            [['title'], 'safe'],
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
        $query = Categories::find();

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
        //    'image_id' => $this->image_id,
            'parentId' => $this->parentId,
            'status' => $this->status,
            'date_created' => $this->date_created,
            'date_updated' => $this->date_updated,
            'date_deleted' => $this->date_deleted,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title]);

        return $dataProvider;
    }
}
