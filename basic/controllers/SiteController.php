<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Mylist;
use app\models\CommentsList;

class SiteController extends Controller
{
	public function actionIndex() {

		$array = Mylist :: getAll();

		 $model = new Mylist();

		if ( $_POST['Mylist'] ) {
			$model->title = $_POST['Mylist']['title'];
			$model->deadline = $_POST['Mylist']['deadline'];
			if ($model->validate() && $model->save()) {
				$model = new Mylist();
				$array = Mylist :: getAll();
			}
		}
		return $this->render('index', [ 'rows' => $array, 'model'=>$model ]);
	}

	public function actionView( $id ) {

		$row = Mylist::getOne( $id );
		$comments = CommentsList::getAllComments( $id );

		$model = new CommentsList();
		$today = date("Y-m-d");

		if ( $_POST['CommentsList'] ) {
			$model->name = $_POST['CommentsList']['name'];
			$model->text = $_POST['CommentsList']['text'];
			$model->id_list = $id;
			$model->date = $today;
			if ($model->validate() && $model->save()) {
				$model = new CommentsList();
				$comments = CommentsList::getAllComments( $id );
			}
		}
		return $this->render('view', [ 'row' => $row, 'comments' => $comments, 'model'=>$model ]);
	}

	public function actionAjaxhome () {
		$item = Mylist::getOne( $_POST[ 'id' ]);
		$item->ismade = 1;
		$item->update();
		if ( $_POST[ 'name' ] == 'home' ) {
			$array = Mylist :: getAll();
			echo $this->renderPartial('tablehome', [ 'rows' => $array]);
		}
		else if ( $_POST[ 'name' ] == 'single' ) {
			$row = Mylist::find()->where(['id' => $_POST[ 'id' ]])->one();
			echo $this->renderPartial('tablesingle', [ 'row' => $row]);
		}
	}
}
