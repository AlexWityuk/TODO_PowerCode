<?php
namespace app\models;

 class CommentsList extends \yii\db\ActiveRecord {

	public function rules() {

		return [
			[['name', 'text'], 'required'],
		];

	}

	public static function tableName() {

		return 'commentts';

	}

	public static function getAllComments( $id ) {

		$data = self::find()
			->where([ 'id_list' => $id ])
			->orderBy([
			  'date'=>SORT_ASC
			])
			->All();

		return $data;

	}

 }

?>