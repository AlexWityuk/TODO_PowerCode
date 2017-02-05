<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use app\models\CommentsList;
?>
<h1>Страница задания</h1>
<table>
   <tbody>
		<tr>
			<th>checkbox</th>
			<th>Заголовок задачи</th>
			<th>Дедлайн</th>
		</tr>
		<tr>
			<td>
				<form class="myform" action="" method="get">
					<input type="checkbox" name="single" value="<?php echo $row->id; ?>" data-pjax="0">
				</form>
			</td>
			<td><span id="<?php echo $row->ismade; ?>"><?php echo $row->title; ?></span></td>
			<td><span><span><?php echo $row->deadline; ?></span></td> 
		</tr>
	</tbody>
</table>