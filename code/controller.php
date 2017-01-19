<?php
require "./view.php";
require "./model.php";

class Controller{

    public $heading = 'User Information';

    public function showUserList($userID){
        $model = new Model();
        try {
            $userInfo = $model->getUserById($userID);
        } catch (Exception $e) {
            $userInfo = False;
        }
        $view = new View();
        if (!$userInfo){
            $view->body[] = '<h1>No User Content Found</h1>';
        } elseif (gettype(array_keys($userInfo)[0]) == 'integer') {
            $this->body[] = var_dump($userInfo);
        } else {
            $this->heading = $model->showName($userID);
            $view->body[] = '<div class="panel panel-default">';
            $view->body[] = '<div class="panel-heading">' . $this->heading . '</div>';
            $view->body[] = '<div class="panel-body">';
            $view->body[] = 'Content';
            $view->body[] = '</div>';
            $view->body[] = '</div>';
        }

        return $view->render();

    }

}

//$model = new Model();
//$view = new View();
//
//$view->setTitle('Test');
//echo $view->render();
//echo "hello";

?>
