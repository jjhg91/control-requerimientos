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
                // ES UNA PAGINA PUBLICA
                // $this->redirectDefaultSiteByRole($role);
                header('Location: /basic/web/');
                exit;
                
            }else {
                // ES UNA PAGINA PRIVADA
                
                if ($this->isAuthorized($role)){
                    // PERMITIDO
                }else {
                    // NO TIENE PERMISOS
                    
                    // $this->redirectDefaultSiteByRole($role);
                    header('Location: /basic/web/');
                    exit;
                }
            }
            // exit;
            // $id = $session->identity->p00;
            // $modelPerfiles = new PerfilUsuarioUsuario();
            // $perfilActivo = $modelPerfiles->find()->where("p00 = :id",['id' => $id])->all();

            // var_dump($perfilActivo);
        }else {
            // NO EXISTE SESION
            if ($this->isPublic()) {
                // NO PASA NADA 
            }else {
      
                header('Location: /basic/web/index.php?r=site%2Flogin');
                exit;
            }
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

    // REVISAR SOLO FALTA ESTO!!!
    public function redirectDefaultSiteByRole($roles)
    {
        $url = '';
        foreach ($this->sites as $site) {
            foreach ($site['role'] as $siteRole) {
                foreach ($roles as $role) {
                    if ( $siteRole == $role->id_perfil_usuario && $role->estatus_perfil == true ){
                        echo $site['site'] . " - " . $siteRole;
                        exit;
                        $url = "/basic/web/index.php?r=".$site['site'];
                        break;
                    }
                }
            }
        }
        // echo "esta es la url: $url";
        // exit;
        // header("location: $url");
        // exit;
    }
    
    public function isAuthorized($roles)
    {
        $currentURL = $this->getCurrentPage();

        foreach ($this->sites as $site) {
            // var_dump($this->sites);
            // echo $currentURL;
            // exit;
            if ( $site['site'] == $currentURL ){
                foreach ($site['role'] as $siteRole) {
                    foreach ($roles as $role) {
                        if($siteRole == $role->id_perfil_usuario && $role->estatus_perfil === true){
                            return true;
                        }
                        
                    }
                }
            
            }
        }
       return false; 
    }


    
}
