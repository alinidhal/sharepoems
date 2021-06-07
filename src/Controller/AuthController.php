<?php

namespace Controller;

use Entity\User;
use ludk\Controller\AbstractController;
use ludk\Http\Request;
use ludk\Http\Response;

class AuthController extends AbstractController
{
    //Methode pour la connexion
    public function login(Request $request): Response
    {
        $userRepo = $this->getOrm()->getRepository(User::class);

        if ($request->request->has('username') && $request->request->has('password')) {
            $criteriaWithloginAndPawword = [
                "nickname" => $request->request->get('username'),
                "password" => $request->request->get('password'),
            ];
            $usersWithThisNicknameAndPassword = $userRepo->findBy($criteriaWithloginAndPawword);
            if (count($usersWithThisNicknameAndPassword) == 1) {
                $request->getSession()->set('user', $usersWithThisNicknameAndPassword[0]);
                return $this->redirectToRoute("display");
            } else {
                $errorMsg = "Wrong login and/or password.";
                include "../templates/loginForm.php";
            }
        } else {
            include "../templates/loginForm.php";
        }
    }
    //Methode pour la déconnexion
    public function logout(Request $request): Response

    {
        if ($request->getSession()->has('user')) {
            $request->getSession()->remove('user');
        }
        return $this->redirectToRoute("display");
    }
    //Methode pour l'inscription
    public function register(Request $request): Response
    {
        $userRepo = $this->getOrm()->getRepository(User::class);
        $manager = $this->getOrm()->getManager();

        if ($request->request->has('username') && $request->request->has('password') && $request->request->has('passwordRetype')) {
            $usersWithThisUsername = $userRepo->findBy(["nickname" => $request->request->get('username')]);
            if (count($usersWithThisUsername) > 0) {
                $errorMsg = "Nickname already used.";
            } else if ($request->request->get('password') != $request->request->get('passwordRetype')) {
                $errorMsg = "Passwords are not  the same.";
            } else if (strlen(trim($request->request->get('password'))) < 8) {
                $errorMsg = "Your password should have at least 8 characters.";
            } else if (strlen(trim($request->request->get('username'))) < 4) {
                $errorMsg = "Your nickname should have at least 4 characters.";
            }
            if ($errorMsg) {
                include "../templates/registerForm.php";
            } else {
                $newUser = new User();
                $newUser->nickname = $request->request->get('username');
                $newUser->password = $request->request->get('password');
                $manager->persist($newUser);
                $manager->flush();
                $request->getSession()->set('user', $newUser);
                return $this->redirectToRoute("display");
            }
        } else {
            include "../templates/registerForm.php";
        }
    }
}
