<?php
require_once './autoload.php';
require_once './vendor/autoload.php';
use App\Controller\ParticipantController;
use App\Controller\RolesController;
$rolesController = new RolesController();
$participantController = new ParticipantController();
session_start();
//Analyse de l'URL avec parse_url() et retourne ses composants
    $url = parse_url($_SERVER['REQUEST_URI']);
    //test si l'url posséde une route sinon on renvoi à la racine
    $path = isset($url['path']) ? $url['path'] : '/';
    //routeur
    switch ($path) {
        case '/easeevent/':
            include './App/Vue/home.php';
            break;
        case '/easeevent/new_event':
            include './App/Vue/new_event.php';
            break;
        case '/easeevent/participantadd':
            $participantController->addParticipant();
            break;
        case '/easeevent/rolesadd':
            $rolesController->addRoles();
            break;    
        default:
            include './error.php';
            break;
    }