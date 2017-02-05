<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use app\models\CommentsList;
?>
 <table>
   <tbody>
		<tr>
			<th>checkbox</th>
			<th>Tекст задачи</th>
			<th>Дедлайн</th>
			<th>количество комментариев</th>
		</tr>
		<?php foreach ($rows as $row): ?>
		<tr>
			<td>
				<form class="myform" action="" method="post">
					<input type="checkbox" name="home" value="<?php echo $row->id; ?>" data-pjax="0">
				</form>
			</td>
			<td><a href="/site/view/<?=$row->id?>"><span id="<?php echo $row->ismade; ?>"><?php echo $row->title; ?></span></a></td>
			<td><span><?php echo $row->deadline; ?></span></td> 
			<td><span><?php echo CommentsList::find()->where([ 'id_list' => $row->id ])->count(); ?></span></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>