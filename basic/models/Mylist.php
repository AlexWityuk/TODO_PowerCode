<?php
namespace app\models;

 class Mylist extends \yii\db\ActiveRecord {

	public function rules() {

		return [
			[['title', 'deadline'], 'required'],
		];
		
	}

	public static function tableName() {

		return 'list';

	}

	public static function getAll() {

		$data = self::find()
			->orderBy([
			  'ismade' => SORT_DESC,
			  'deadline'=>SORT_ASC
			])
			->all();

		return $data;
	}

	public static function getOne( $id ) {

		$data = self ::find()
			->where([ 'id' => $id ])
			->one(); 

		return $data;
	}

 }

?>