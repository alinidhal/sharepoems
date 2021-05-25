<?php

namespace Controller;

use Entity\User;

class AuthController
{
    //Methode pour la connexion
    public function login()
    {
        global $userRepo;

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
    }
    //Methode pour la déconnexion
    public function logout()

    {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }
        header('Location: /display');
    }
    //Methode pour l'inscription
    public function register()
    {
        global $userRepo;
        global $manager;
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
    }
}
