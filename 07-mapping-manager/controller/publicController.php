<?php
// on va utiliser des namespaces
use model\TheuserManager; // manager de la classe Theuser
use model\ThemessageManager; // manager de la classe Themessage

if(isset($_GET['user'])) {
    // appel de la vue (affichage)
    require_once "../view/theuser_view.php";
}elseif(isset($_GET['message'])) {
    // appel de la vue (affichage)
    require_once "../view/themessage_view.php";

}elseif(isset($_GET['messageManager'])) {
    // on crée un objet ThemessageManager
    $messageManager = new ThemessageManager($pdo);
    try {
        $message = $messageManager->getThemessageByIdTheMessage(2);
    }catch (Exception $e){
        $message = $e->getMessage();
    }
    try {
        $message2 = $messageManager->getThemessageByIdTheMessage(3);
    }catch (Exception $e){
        $message2 = $e->getMessage();
    }
    // on charge tous les Themessage
    $messages = $messageManager->getAllThemessage();
    // appel de la vue (affichage)
    require_once "../view/themessage_manager_view.php";
}else {

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
    require_once "../view/home_view.php";
}
