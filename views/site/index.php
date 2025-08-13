<?php

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<section class="site-index">
    <div class="row">
        <div class="col d-flex flex-column p-0">
            <span class="fw-bold text-center border border-black border-end-0 py-1 px-3">Тема</span>
            <span role="button"
                  class="topic-button border border-black border-end-0 border-top-0 py-1 px-2 active-topic">Тема 1</span>
            <span role="button"
                  class="topic-button border border-black border-end-0 border-top-0 py-1 px-2">Тема 2</span>
            <span class="h-100 d-block border border-black border-end-0 border-top-0 py-1 px-2"></span>
        </div>
        <div class="col d-flex flex-column p-0">
            <span class="fw-bold text-center border border-black border-end-0 py-1 px-3">Подтема</span>
            <div class="d-flex flex-column">
                <span role="button"
                      class="subtopic-button border border-black border-end-0 border-top-0 py-1 px-2 active-topic">Подтема 1.1</span>
                <span role="button"
                      class="subtopic-button border border-black border-end-0 border-top-0 py-1 px-2">Подтема 1.2</span>
                <span role="button"
                      class="subtopic-button border border-black border-end-0 border-top-0 py-1 px-2">Подтема 1.3</span>
            </div>
        </div>
        <div class="col-6 d-flex flex-column p-0">
            <span class="fw-bold text-center border border-black border-bottom-0 py-1 px-3">Содержимое</span>
            <p id="content" class="h-100 border border-black py-1 px-2 mb-0">Некий текст, привязанный к Подтеме 1.1</p>
        </div>
    </div>
</section>
