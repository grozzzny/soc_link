<?php
namespace app\modules\soc_link\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use app\modules\soc_link\models\SocLink;
use yii\widgets\ActiveForm;

use yii\easyii\components\Controller;


class AController extends Controller
{
    public $rootActions = ['create', 'delete'];

    public function actionIndex()
    {
        $data = new ActiveDataProvider([
            'query' => SocLink::find(),
        ]);
        return $this->render('index', [
            'data' => $data
        ]);
    }

    public function actionCreate($slug = null)
    {
        $model = new SocLink();
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
        $model = SocLink::findOne($id);

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
        if(($model = SocLink::findOne($id))){
            $model->delete();
        } else {
            $this->error = 'Не найдена';
        }
        return $this->formatResponse('Удалено');
    }
}