<?php
namespace grozzzny\soc_link\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\easyii2\components\ActiveRecord;
use yii\widgets\ActiveForm;

use yii\easyii2\components\Controller;


class AController extends Controller
{
    public $rootActions = ['create', 'delete'];

    public function actionIndex()
    {
        $model = ActiveRecord::getModelByName('SocLink', 'soclink');
        $data = new ActiveDataProvider([
            'query' => $model::find(),
        ]);
        return $this->render('index', [
            'data' => $data
        ]);
    }

    public function actionCreate($slug = null)
    {
        $model = ActiveRecord::getModelByName('SocLink', 'soclink');
        if ($model->load(Yii::$app->request->post())) {
            if(Yii::$app->request->isAjax){
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }
            else{
                if($model->save()){
                    $this->flash('success', 'Запись создана');
                    return $this->redirect(['/admin/'.$this->module->id]);
                }
                else{
                    $this->flash('error', 'Ошибка');
                    return $this->refresh();
                }
            }
        }
        else {
            if($slug){
                $model->slug = $slug;
            }
            return $this->render('create', [
                'model' => $model
            ]);
        }
    }

    public function actionEdit($id)
    {
        $model = ActiveRecord::getModelByName('SocLink', 'soclink');
        $model = $model::findOne($id);

        if($model === null){
            $this->flash('error', 'Не найдена');
            return $this->redirect(['/admin/'.$this->module->id]);
        }

        if ($model->load(Yii::$app->request->post())) {
            if(Yii::$app->request->isAjax){
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }
            else{
                if($model->save()){
                    $this->flash('success', 'Запись отредактирована');
                }
                else{
                    $this->flash('error', 'Ошибка');
                }
                return $this->refresh();
            }
        }
        else {
            return $this->render('edit', [
                'model' => $model
            ]);
        }
    }

    public function actionDelete($id)
    {
        $model = ActiveRecord::getModelByName('SocLink', 'soclink');
        if(($model = $model::findOne($id))){
            $model->delete();
        } else {
            $this->error = 'Не найдена';
        }
        return $this->formatResponse('Удалено');
    }
}