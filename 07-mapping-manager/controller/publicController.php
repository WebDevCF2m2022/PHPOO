<?php
// on va utiliser des namespaces

use model\ThemessageManager;
use model\TheuserManager; // manager de la classe Theuser

if(isset($_GET['user'])) {
    // appel de la vue (affichage)

    $userManager = new TheuserManager($pdo);
    try {
        $user = $userManager->getTheuserByIdTheUser(2);
    }catch (Exception $e){
        $user = $e->getMessage();
    }
    try {
        $user2 = $userManager->getTheuserByIdTheUser(3);
    }catch (Exception $e){
        $user2 = $e->getMessage();
    }
    // on charge tous les Theuser
    $users = $userManager->getAllTheuser();
    // appel de la vue (affichage)
    
    require_once "../view/theuser_view.php";
}elseif(isset($_GET['message'])) {
    // appel de la vue (affichage)

    

    require_once "../view/themessage_view.php";
    
}elseif(isset($_GET['messageManager'])) {
    // appel de la vue (affichage)
    $messagemanager = new ThemessageManager($pdo);
    try{
        $message1 = $messagemanager->getThemessageByidTheMessage(1);
    }catch(Exception $e){
        $message1 = $e ->getMessage();
    }
    
    $message = $messagemanager ->getAllThemessage();
    
    require_once "../view/themessage_manager_view.php";

}else {

    
    require_once "../view/home_view.php";
}
