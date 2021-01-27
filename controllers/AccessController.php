<?php


namespace app\controllers;

use Yii;
// use yii\web\Controller;
use  yii\web\Session;

use app\models\PerfilUsuarioUsuario;
use app\models\PerfilUsuario;


class AccessController 
{


    public function accessT()
    {

        $json = $this->getJSONFileConfig();
        $this->sites = $json['sites'];
        $this->defaultSites = $json['default-sites'];


        // exit;
       $this->validateSession();


        // $this->validateSession();
    }

    public function getJSONFileConfig()
    {
        $string = file_get_contents('class/access.json');
        $json = json_decode($string, true);

        return $json;
    }

    public function validateSession()
    {
        $session =  Yii::$app->user;

        // if (!$session->isGuest){
        if ($this->existsSession($session)){
            // $role = $this->existsSession($session);
            $role = $this->getUserSessionData();

            if ($this->isPublic()) {
                $this->redirectDefaultSiteByRole($role);
                
            }else {
                exit;
            }
            // $id = $session->identity->p00;
            // $modelPerfiles = new PerfilUsuarioUsuario();
            // $perfilActivo = $modelPerfiles->find()->where("p00 = :id",['id' => $id])->all();

            // var_dump($perfilActivo);
        }else {
            echo 'hh';
        }
    }

    public function existsSession($session)
    {

        if($session->isGuest) return false;

        if($session->identity->p00) return true;

        return false;
    }

    public function getUserSessionData()
    {
        $session =  Yii::$app->user;
        $id = $session->identity->p00;

        $modelPerfiles = new PerfilUsuarioUsuario();
        $perfilActivo = $modelPerfiles->find()->where("p00 = :id",['id' => $id])->all();

        return $perfilActivo;

    }

    public function isPublic()
    {
        $currentURL = $this->getCurrentPage();
        foreach ($this->sites as $site) {
            if ($currentURL === $site['site'] && $site['access'] === 'public'){
                return true;
            }
        }
        return false;
    }

    public function getCurrentPage()
    {

        $actualLink = trim("$_SERVER[REQUEST_URI]");
        $url2 = explode('/',$actualLink);
        if (!empty($url2[3])){
            $url1 = explode("=",$url2[3]);
            if(!empty($url1[1])){
                $url = $url1[1];
            }else {
                $url = $url1[0];
            }
        }else{
            $url = '';
        }

        return $url;
    }

    public function redirectDefaultSiteByRole($role)
    {
        $url = '';
        foreach ($this->sites as $site) {
            var_dump($role);
            if ( $site['role'] === $role ){
                $url = "/basic/web/index.php?r=".$site['site'];
            }else{
                exit;
            }
        }
    }
    
}
