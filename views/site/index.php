<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<section class="site-index">
    <div class="row">
        <div class="col d-flex flex-column p-0">
            <span class="fw-bold text-center border border-black border-end-0 py-1 px-3">Меню</span>
            <span id="dealButton" role="button"
                  class="d-flex justify-content-between border border-black border-end-0 border-top-0 py-1 px-2 active-topic">
                Сделки
                <button id="dealModalBtn" class="delete-update-btn">Доб.</button>
            </span>
            <span id="contactButton" role="button"
                  class="d-flex justify-content-between border border-black border-end-0 border-top-0 py-1 px-2">
                Контакты
                <button id="contactModalBtn" class="delete-update-btn">Доб.</button>
            </span>
            <span class="h-100 d-block border border-black border-end-0 border-top-0 py-1 px-2"></span>
        </div>
        <div class="col d-flex flex-column p-0">
            <span class="fw-bold text-center border border-black border-end-0 py-1 px-3">Список</span>
            <div id="deals" class="active-subtopics d-none flex-column">
                <?php foreach ($deals as $deal): ?>
                    <span id="deal<?= $deal->id ?>" data-deal="<?= $deal->id ?>" role="button"
                          class="d-flex justify-content-between border border-black border-end-0 border-top-0 py-1 px-2">
                        <?= Html::encode($deal->name) ?>
                        <div class="d-flex gap-1">
                            <button class="deal-update-btn delete-update-btn" data-update="<?= $deal->id ?>">Ред.</button>
                            <?php
                            $form = ActiveForm::begin(['action' => ['site/delete-deal', 'id' => $deal->id]]);
                            echo Html::submitButton('X', ['class' => 'delete-update-btn']);
                            $form = ActiveForm::end();
                            ?>
                        </div>
                    </span>
                <?php endforeach; ?>
            </div>
            <div id="contacts" class="d-none flex-column">
                <?php foreach ($contacts as $contact): ?>
                    <span id="contact<?= $contact->id ?>" data-contact="<?= $contact->id ?>" role="button"
                          class="d-flex justify-content-between border border-black border-end-0 border-top-0 py-1 px-2">
                        <?= Html::encode("{$contact->name} {$contact->surname}") ?>
                        <div class="d-flex gap-1">
                            <button class="contact-update-btn delete-update-btn" data-update="<?= $contact->id ?>">Ред.</button>
                            <?php
                            $form = ActiveForm::begin(['action' => ['site/delete-contact', 'id' => $contact->id]]);
                            echo Html::submitButton('X', ['class' => 'delete-update-btn']);
                            $form = ActiveForm::end();
                            ?>
                        </div>
                    </span>
                <?php endforeach; ?>
            </div>
            <span class="h-100 d-block border border-black border-end-0 border-top-0 py-1 px-2"></span>
        </div>
        <div class="col-6 d-flex flex-column p-0">
            <span class="fw-bold text-center border border-black py-1 px-3">Содержимое</span>
            <div id="dealsContent">
                <?php foreach ($deals as $deal): ?>
                    <div id="dealData<?= $deal->id ?>" class="d-none">
                        <div class="row">
                            <div class="col d-flex flex-column pe-0">
                                <span class="border border-black border-top-0 py-1 px-2">Id сделки</span>
                                <span class="border border-black border-top-0 py-1 px-2">Имя</span>
                                <span class="border border-black border-top-0 py-1 px-2">Сумма</span>
                            </div>
                            <div class="col d-flex flex-column ps-0">
                                <span class="border border-black border-top-0 border-start-0 py-1 px-2"><?= Html::encode($deal->id) ?></span>
                                <span class="border border-black border-top-0 border-start-0 py-1 px-2"><?= Html::encode($deal->name) ?></span>
                                <span class="border border-black border-top-0 border-start-0 py-1 px-2"><?= Html::encode($deal->cost) ?></span>
                            </div>
                        </div>
                        <?php foreach ($deal->getContacts()->all() as $contact): ?>
                            <div class="row mw-100 ms-0">
                                <span class="col border border-black border-top-0 py-1 px-2">Id контакта: <?= $contact->id ?></span>
                                <span class="col border border-black border-top-0 border-start-0 py-1 px-2"><?= Html::encode("{$contact->name} {$contact->surname}") ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
            </div>
            <div id="contactsContent" class="d-none">
                <?php foreach ($contacts as $contact): ?>
                    <div id="contactData<?= $contact->id ?>" class="d-none">
                        <div class="row">
                            <div class="col d-flex flex-column pe-0">
                                <span class="border border-black border-top-0 py-1 px-2">Id контакта</span>
                                <span class="border border-black border-top-0 py-1 px-2">Имя</span>
                                <span class="border border-black border-top-0 py-1 px-2">Фамилия</span>
                            </div>
                            <div class="col d-flex flex-column ps-0">
                                <span class="border border-black border-top-0 border-start-0 py-1 px-2"><?= Html::encode($contact->id) ?></span>
                                <span class="border border-black border-top-0 border-start-0 py-1 px-2"><?= Html::encode($contact->name) ?></span>
                                <span class="border border-black border-top-0 border-start-0 py-1 px-2"><?= Html::encode($contact->surname) ?></span>
                            </div>
                        </div>
                        <?php foreach ($contact->getDeals()->all() as $deal): ?>
                            <div class="row mw-100 ms-0">
                                <span class="col border border-black border-top-0 py-1 px-2">Id контакта: <?= $deal->id ?></span>
                                <span class="col border border-black border-top-0 border-start-0 py-1 px-2"><?= Html::encode($deal->name) ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="user-modal d-none">
        <div class="modal-wrapper">
            <div class="modal-close-btn-wrapper"><span class="modal-close-btn"></span></div>
            <h1>Создать контакт</h1>

            <?php $form = ActiveForm::begin(['action' => ['site/create-contact']]) ?>

            <?= $form->field($contactModel, 'name') ?>

            <?= $form->field($contactModel, 'surname') ?>

            <?php
            $dealsList = [];
            foreach ($deals as $deal) {
                $dealsList[$deal->id] = $deal->name;
            }
            ?>

            <?= $form->field($contactModel, 'deals')->dropDownList($dealsList, ['prompt' => 'Не выбрано', 'multiple' => true]); ?>

            <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary']) ?>

            <?php $form = ActiveForm::end() ?>
        </div>
    </div>

    <div class="user-modal d-none">
        <div class="modal-wrapper">
            <div class="modal-close-btn-wrapper"><span class="modal-close-btn"></span></div>
            <h1>Создать сделку</h1>

            <?php
            $form = ActiveForm::begin(['action' => ['site/create-deal']]);

            echo $form->field($dealModel, 'name');
            echo $form->field($dealModel, 'cost');

            $contactsList = [];
            foreach ($contacts as $contact) {
                $contactsList[$contact->id] = $contact->name . ' ' . $contact->surname;
            }

            echo $form->field($dealModel, 'contacts')->dropDownList($contactsList, ['prompt' => 'Не выбрано', 'multiple' => true]);

            echo Html::submitButton('Добавить', ['class' => 'btn btn-primary']);
            $form = ActiveForm::end();
            ?>
        </div>
    </div>

    <div id="contactUpdateModal" class="user-modal d-none">
        <div class="modal-wrapper">
            <div class="modal-close-btn-wrapper"><span class="modal-close-btn"></span></div>
            <h1>Редактировать контакт</h1>

            <?php $form = ActiveForm::begin(['action' => ['site/update-contact']]) ?>

            <?= Html::hiddenInput('contactId', 0, ['class' => 'updateModalContactId']) ?>
            <?= $form->field($contactModel, 'name') ?>
            <?= $form->field($contactModel, 'surname') ?>

            <?php
            $dealsList = [];
            foreach ($deals as $deal) {
                $dealsList[$deal->id] = $deal->name;
            }
            ?>

            <?= $form->field($contactModel, 'deals')->dropDownList($dealsList, ['prompt' => 'Не выбрано', 'multiple' => true]); ?>

            <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary']) ?>

            <?php $form = ActiveForm::end() ?>
        </div>
    </div>

    <div id="dealUpdateModal" class="user-modal d-none">
        <div class="modal-wrapper">
            <div class="modal-close-btn-wrapper"><span class="modal-close-btn"></span></div>
            <h1>Редактировать сделку</h1>

            <?php
            $form = ActiveForm::begin(['action' => ['site/update-deal']]);

            echo Html::hiddenInput('dealId', 0, ['class' => 'updateModalDealId']);
            echo $form->field($dealModel, 'name');
            echo $form->field($dealModel, 'cost');

            $contactsList = [];
            foreach ($contacts as $contact) {
                $contactsList[$contact->id] = $contact->name . ' ' . $contact->surname;
            }

            echo $form->field($dealModel, 'contacts')->dropDownList($contactsList, ['prompt' => 'Не выбрано', 'multiple' => true]);

            echo Html::submitButton('Добавить', ['class' => 'btn btn-primary']);
            $form = ActiveForm::end();
            ?>
        </div>
    </div>
</section>
