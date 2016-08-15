<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use app\models\MesechtaSearch;
use app\models\DistributionProfile;
use app\models\DistributionProfileSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DistributionController implements the CRUD actions for DistributionProfile model.
 */
class DistributionController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['profile','view','update','delete','create'],
                'rules' => [
                    [
                        'actions' => ['profile','view','update','delete','create'],
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['profile','view','update','delete','create'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }
    

    /**
     * Lists all DistributionProfile models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DistributionProfileSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DistributionProfile model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Displays a single DistributionProfile model.
     * @param integer $id
     * @return mixed
     */
    public function actionProfile($profilename)
    {
        return $this->render('view', [
            'model' => $this->findModelWhere('profilename', $profilename),
        ]);
    }

    public function actionChalukah()
    {
        $searchModel = new MesechtaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('mesechta_list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new DistributionProfile model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DistributionProfile();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing DistributionProfile model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing DistributionProfile model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the DistributionProfile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DistributionProfile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DistributionProfile::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Finds the DistributionProfile model based on a field and value condition.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @fieldname fild to filter on
     * @param filter
     * @return DistributionProfile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModelWhere($fieldname, $param)
    {
        if (($model = DistributionProfile::find()->where([$fieldname => $param])->one()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
