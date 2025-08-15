<?php

namespace app\controllers;

use app\models\Contacts;
use app\models\Deals;
use Yii;
use yii\web\Controller;

class SiteController extends Controller
{
    private function getIndexData()
    {
        return [
            'deals' => Deals::find()->orderBy('id')->all(),
            'contacts' => Contacts::find()->orderBy('id')->all()
        ];
    }

    public function actionIndex()
    {
        $contactModel = new Contacts();
        $dealModel = new Deals();

        $deals = Deals::find()->orderBy('id')->all();
        $contacts = Contacts::find()->orderBy('id')->all();

        $this->view->registerJsFile(
            '@web/js/tableSwitch.js'
        );
        $this->view->registerJsFile(
            '@web/js/modal.js'
        );

        $data = $this->getIndexData();
        $data['contactModel'] = $contactModel;
        $data['dealModel'] = $dealModel;

        return $this->render('index', $data);

    }

    public function actionCreateContact()
    {
        $contact = new Contacts();
        $formData = Yii::$app->request->post();

        if ($contact->load($formData) && $contact->validate()) {
            if ($contact->save() && is_array($formData['Contacts']['deals'])) {
                foreach ($formData['Contacts']['deals'] as $dealId) {
                    $deal = Deals::findOne($dealId);
                    $contact->link('deals', $deal);
                }
            }
        }

        $this->view->registerJsFile(
            '@web/js/tableSwitch.js'
        );

        $dealModel = new Deals();

        $data = $this->getIndexData();
        $data['contactModel'] = $contact;
        $data['dealModel'] = $dealModel;

        return $this->redirect(['index']);
    }

    public function actionCreateDeal()
    {
        $deal = new Deals();
        $formData = Yii::$app->request->post();

        if ($deal->load($formData) && $deal->validate()) {
            if ($deal->save() && is_array($formData['Deals']['contacts'])) {
                foreach ($formData['Deals']['contacts'] as $contactId) {
                    $contact = Contacts::findOne($contactId);
                    $deal->link('contacts', $contact);
                }
            }
        }

        $this->view->registerJsFile(
            '@web/js/tableSwitch.js'
        );

        $contactModel = new Contacts();

        $data = $this->getIndexData();
        $data['dealModel'] = $deal;
        $data['contactModel'] = $contactModel;

        return $this->redirect(['index']);
    }

    public function actionUpdateDeal()
    {
        $formData = Yii::$app->request->post();

        $deal = Deals::findOne($formData['dealId']);
        $deal->name = $formData['Deals']['name'];
        $deal->cost = $formData['Deals']['cost'];
        $deal->save();

        $newContactIds = $formData['Deals']['contacts'] ?? [];
        $currentContactIds = $deal->getContacts()->select('id')->column();

        foreach (array_diff($newContactIds, $currentContactIds) as $contactId) {
            if ($contact = Contacts::findOne($contactId)) {
                $deal->link('contacts', $contact);
            }
        }

        foreach (array_diff($currentContactIds, $newContactIds) as $contactId) {
            if ($contact = Contacts::findOne($contactId)) {
                $deal->unlink('contacts', $contact, true);
            }
        }

        return $this->redirect(['index']);
    }

    public function actionUpdateContact()
    {
        $formData = Yii::$app->request->post();

        $contact = Contacts::findOne($formData['contactId']);
        $contact->name = $formData['Contacts']['name'];
        $contact->surname = $formData['Contacts']['surname'];
        $contact->save();

        $newDealIds = $formData['Contacts']['deals'] ?? [];
        $currentDealIds = $contact->getDeals()->select('id')->column();

        foreach (array_diff($newDealIds, $currentDealIds) as $dealId) {
            if ($deal = Contacts::findOne($dealId)) {
                $contact->link('deals', $deal);
            }
        }

        foreach (array_diff($currentDealIds, $newDealIds) as $contactId) {
            if ($deal = Contacts::findOne($contactId)) {
                $contact->unlink('deals', $deal, true);
            }
        }

        return $this->redirect(['index']);
    }

    public function actionDeleteDeal($id)
    {
        $deal = Deals::findOne($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionDeleteContact($id)
    {
        $contact = Contacts::findOne($id)->delete();

        return $this->redirect(['index']);
    }
}
