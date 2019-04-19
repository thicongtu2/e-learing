<?php

use common\models\ComponentQuestion;
use common\models\LessionStatus;
use student\assets\AppAsset;
use student\utilities\ProgressTracking;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

/** @var \common\models\Material $material */
$this->title = $material->name;
/** @var int $lesson_id */
$this->progress = ProgressTracking::lessonProgress($lesson_id);
?>
    <input type="hidden" id="course_id" value="<?php echo $course_id ?>">
    <div class="progress-bar progress-bar-striped progress-bar-animated" id="progress_bar"
         role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%; height: 0.5rem; display: none;"></div>
    <div class="drag-index">
        <h1><?= Html::encode($this->title) ?></h1>
        <input type="hidden" id="material_id" value="<?php echo $material->id ?>">
        <input type="hidden" id="course_id" value="<?php echo $lesson_id ?>">
        <!--    hidden modal-->
        <div class="modal" id="success_modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Thông Báo!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>
                            <?php if ($material->end == null): ?>
                                Các em đã rất cố gắng, xin chúc mừng đã vượt qua!!
                            <?php else: ?>
                                <?php echo $material->end?>
                            <?php endif ?>
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button data-id="<?php echo $material->id; ?>" id="next_stage" type="button" class="btn btn-primary">Tiếp</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    </div>
                </div>
            </div>
        </div>
        <!--    end hidden modal-->
        <div class="question-list">
            <?php /** @var ComponentQuestion[] $model */foreach ($model as $item): ?>
                <?php echo $item->out(); ?>
            <?php endforeach; ?>
        </div>
        <div class="col-md-2 offset-10">
            <button type="button" class="btn btn-primary btn-lg" id="pop_modal" disabled>Tiếp tục</button>
        </div>
        <input type="hidden" id="question_threshold" value="<?php echo $material->question_threshold; ?>">
    </div>
<?php
$this->registerJsFile("/js/drag/index.js", ['depends' => [AppAsset::className()]]);
$this->registerJsFile("/js/common.js", ['depends' => [AppAsset::className()]]);

?>