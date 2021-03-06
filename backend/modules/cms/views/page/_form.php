<?php


use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use kartik\markdown\MarkdownEditor;
use kartik\select2\Select2;
use trntv\filekit\widget\Upload;
use backend\modules\cms\models\Category;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model backend\modules\cms\models\Page */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="page-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'body')->widget(
        MarkdownEditor::classname(),
        ['height' => 300, 'encodeLabels' => false]
    ); ?>

    <?= $form->field($model, 'view')->widget(Select2::classname(), [
    'data' => ['main'=>'Default'],
    'options' => ['placeholder' => 'Select a layout ...'],
    'pluginOptions' => [
       'allowClear' => true,
    ],
    ]); ?>

    <?= $form->field($model, 'status')->checkBox() ?>

    <?php echo $form->field($model, 'thumbnail')->widget(
        Upload::className(),
        [
            'url' => ['page/upload'],
            'maxFileSize' => 5000000, // 5 Mb
        ]);
    ?>

    <?php echo $form->field($model, 'attachments')->widget(
        Upload::className(),
        [
            'url' => ['page/upload'],
            'sortable' => true,
            'maxFileSize' => 10000000, // 10 Mb
            'maxNumberOfFiles' => 100
        ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
