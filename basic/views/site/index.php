<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use yii\widgets\Pjax;
use app\models\CommentsList;
?>
<div class="site-index">
	<div class="body-content">
		<?php Pjax::begin(['enablePushState' => true]); ?>
		<div class="row tablelist">
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
						<td>
							<a href="/site/view/<?=$row->id?>">
								<span id="<?php echo $row->ismade; ?>"><?php echo $row->title; ?></span>
							</a>
						</td>
						<td><span><?php echo $row->deadline; ?></span></td> 
						<td><span><?php echo CommentsList::find()->where([ 'id_list' => $row->id ])->count(); ?></span></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		<div><h3>Добавить запись</h3></div>
		<div class="index">
			<?php $form = ActiveForm::begin(['options' => ['data' => ['pjax' => true]],]); ?>
				<?= $form->field($model, 'title') ?>
				<?= $form->field($model, 'deadline')
					->widget(\yii\jui\DatePicker::classname(), ['language' => 'ru','dateFormat' => 'yyyy-MM-dd',]) ?>
				<div class="form-group">
					<?= Html::submitButton('Добавить запись', ['class' => 'btn btn-primary']) ?>
				</div>
			<?php ActiveForm::end(); ?>
		</div><!-- index -->
		<?php Pjax::end(); ?>
	</div><!--end body-content-->
</div>
