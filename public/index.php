<?php

use ludk\Persistence\ORM;

use Entity\Post;
use Entity\User;

require __DIR__ . '/../vendor/autoload.php';

session_start();

$orm = new ORM(__DIR__ . '/../Resources');

$manager = $orm->getManager();

$postRepo = $orm->getRepository(Post::class);
$userRepo = $orm->getRepository(User::class);

$action = substr(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), 1);
switch ($action) {
    case 'register':
        include "../Resources/User.json";
        if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['passwordRetype'])) {
            $usersWithThisUsername = $userRepo->findBy(["nickname" => $_POST["username"]]);
            if (count($usersWithThisUsername) > 0) {
                $errorMsg = "Nickname already used.";
            } else if ($_POST['password'] != $_POST['passwordRetype']) {
                $errorMsg = "Passwords are not  the same.";
            } else if (strlen(trim($_POST['password'])) < 8) {
                $errorMsg = "Your password should have at least 8 characters.";
            } else if (strlen(trim($_POST['username'])) < 4) {
                $errorMsg = "Your nickname should have at least 4 characters.";
            }
            if ($errorMsg) {
                include "../templates/registerForm.php";
            } else {
                $newUser = new User();
                $newUser->nickname = $_POST['username'];
                $newUser->password = $_POST['password'];
                $manager->persist($newUser);
                $manager->flush();
                $_SESSION['user'] = $newUser;
                header('Location: /display');
            }
        } else {
            include "../templates/registerForm.php";
        }
        break;
    case 'logout':
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }
        header('Location: /display');
        break;

    case 'login':
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $criteriaWithloginAndPawword = [
                "nickname" => $_POST['username'],
                "password" => $_POST['password']
            ];
            $usersWithThisNicknameAndPassword = $userRepo->findBy($criteriaWithloginAndPawword);
            if (count($usersWithThisNicknameAndPassword) == 1) {
                $_SESSION['user'] = $usersWithThisNicknameAndPassword[0];
                header('Location: /display');
            } else {
                $errorMsg = "Wrong login and/or password.";
                include "../templates/loginForm.php";
            }
        } else {
            include "../templates/loginForm.php";
        }
        break;
    case 'new':
        $postNew = $postRepo->findAll();
        if (
            isset($_SESSION['user'])
            && isset($_POST['title'])
            && isset($_POST['description'])
            && isset($_POST['image'])
        ) {
            $errorMsg = NULL;
            if (strlen(trim($_POST['title'])) < 2) {
                $errorMsg = "Your title should have at least 2 characters.";
            } else if (strlen(trim($_POST['description'])) < 2) {
                $errorMsg = "Your desc should have at least 2 characters.";
            }
            if ($errorMsg) {
                include "../templates/createForm.php";
            } else {
                $newPost = new Post();
                $newPost->title = trim($_POST['title']);
                $newPost->description = trim($_POST['description']);
                $newPost->url_img = trim($_POST['image']);
                $newPost->datetime = date("Y-m-d H:i:s");
                $newPost->user = $_SESSION['user'];
                $manager->persist($newPost);
                $manager->flush();
                header('Location: /display');
            }
        } else {
            include "../templates/createForm.php";
        }
        break;
    case 'display':
    default:
        $items = array();
        if (isset($_GET['search'])) {
            $strToSearch = $_GET['search'];
            if (strpos($strToSearch, "@") === 0) {
                $userName = substr($strToSearch, 1);
                $userRepo = $orm->getRepository(User::class);
                $users = $userRepo->findBy(array("nickname" => $userName));
                if (count($users) == 1) {
                    $items = $postRepo->findBy(array("user" => $users[0]->id));
                }
            } else {
                $items = $postRepo->findBy(array("title" => '%' . $_GET['search'] . '%'));
            }
        } else {
            $items = $postRepo->findAll();
        }
        include "../templates/display.php";
        break;
}
