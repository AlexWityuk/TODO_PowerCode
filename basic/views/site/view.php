<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use yii\widgets\Pjax;
use app\models\CommentsList;
?>
<div class="site-about">
	<div class="body-content">
		<?php Pjax::begin(['enablePushState' => true]); ?>
		<div class="row tablelist">
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
							<form class="myform" action="" method="post">
								<input type="checkbox" name="single" value="<?php echo $row->id; ?>" data-pjax="0">
							</form>
						</td>
						<td><span id="<?php echo $row->ismade; ?>"><?php echo $row->title; ?></span></td>
						<td><span><span><?php echo $row->deadline; ?></span></td> 
					</tr>
				</tbody>
			</table>
		</div>
		<div class="row">       
			<div><h3>Список коментариев</h3></div>
			<div class="col-lg-12">
			   <ol class="list">
					<?php foreach ($comments as $row): ?>
						<li class="task">
							<span><?php echo $row->text; ?></span>
							<span><?php echo $row->date; ?></span>
						</li>
					<?php endforeach; ?>
				</ol>
			</div>
		</div>
		<div class="row">
			<div><h3>Добавить коментарий</h3></div>
			<div class="col-lg-12">
				<?php $form = ActiveForm::begin(['options' => ['data' => ['pjax' => true]],]); ?>
				<?= $form->field($model, 'name') ?>
				<?= $form->field($model, 'text') ?>
				<div class="form-group">
					<?= Html::submitButton('Добавить коментарий', ['class' => 'btn btn-primary']) ?>
				</div>
			<?php ActiveForm::end(); ?>
			</div>
		</div>
		<?php Pjax::end(); ?>
	</div>
</div>
