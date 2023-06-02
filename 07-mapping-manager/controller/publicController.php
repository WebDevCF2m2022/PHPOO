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

    $messageManager = new ThemessageManager($pdo);
    try{
        $messageManaged1 = $messageManager->getThemessageByidTheMessage(1);
        $messageManaged2 = $messageManager->getThemessageByidTheMessage(2);

    }catch(Exception $e){
        $messageManaged1 = $e ->getMessage();
    }
    
    try{
        $allMessages = $messageManager ->getAllThemessage();
    }catch(Exception $e){
        $allMessages = $e->getMessage();
    }
    
    require_once "../view/themessage_manager_view.php";

}else {

    
    require_once "../view/home_view.php";
}
