<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use app\models\MesechtaSearch;
use app\models\DistributionProfile;
use app\models\DistributionProfileSearch;
use app\models\DistributionLearner;
use app\models\DistributionLearnerSearch;
use app\models\User;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ChalukahController implements the CRUD actions for DistributionLearner model.
 */
class ChalukahController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
		'except' => ['list','select','confirmation','selected'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['?'],
		    ],
                    [
                        'actions' => ['profiles','index','delete','view','update','create'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['profiles','view','delete','update','create'],
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all DistributionLearner models.
     * @return mixed
     */
    public function actionIndex($profilename)
    {
	$profile = DistributionProfile::find()->where(['profilename' => $profilename])->one();

	if(!$profile)
	    return $this->redirect(Array('/chalukah/list'));

        $searchModel = new DistributionLearnerSearch();
        $dataProvider = $searchModel->search($profile->id, Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
	    'profile' => $profile,
        ]);
    }

    /**
     * Lists all DistributionProfile models.
     * @return mixed
     */
    public function actionProfiles()
    {
	if(Yii::$app->user->isGuest)
	    return $this->redirect(Array('/chalukah/list'));

        $searchModel = new DistributionProfileSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, false);

        return $this->render('profiles', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all DistributionProfile models.
     * @return mixed
     */
    public function actionList()
    {
        $searchModel = new DistributionProfileSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, true);

        return $this->render('profiles', [
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
            'model' => $this->findDistributionProfile($id),
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
     * Updates an existing DistributionLearner model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionSelect($id)
    {
	$user = new User();
        $model = $this->findDistributionLearner($id);

    	if($model->userid)
    	{
	    return $this->render('selected', array('model'=>$model, 'user'=>$user));
    	}

	if(!$user->load(Yii::$app->request->post()) && Yii::$app->user->isGuest)
	{
	    return $this->render('select', array('model'=>$model, 'user'=>$user));	
	}

	if(Yii::$app->user->isGuest)
	{
	    $user->usertypeid = 2;
	    $user->registrationdate = date("Y-m-d H:i:s");
	    $user->lastupdatedate = date("Y-m-d H:i:s");
	    $user->thelogin = uniqid();

	    if($user->save())
	    {
		$model->userid = $user->id;
	    }
	    else
	    {
		return $this->render('selected', array('model'=>$model, 'user'=>$user));
	    }
	}
	else
	{
	    $model->userid = Yii::$app->user->id;
	}

        if ($model->userid && $model->save()) 
	{
	    return $this->render('confirmation', array('model'=>$model, 'user'=>$user));
        } 
	else 
	{
	    return $this->render('selected', array('model'=>$model, 'user'=>$user));
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
        $model = $this->findDistributionProfile($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    /**
     * Deletes an existing DistributionLearner model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findDistributionProfile($id)->delete();

        return $this->redirect(['profiles']);
    }

    /**
     * Finds the DistributionLearner model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DistributionLearner the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findDistributionLearner($id)
    {
        if (($model = DistributionLearner::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Finds the DistributionProfile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DistributionLearner the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findDistributionProfile($id)
    {
        if (($model = DistributionProfile::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
