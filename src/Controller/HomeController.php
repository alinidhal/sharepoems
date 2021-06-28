<?php

namespace Controller;

use Entity\Post;
use Entity\User;
use ludk\Http\Request;
use ludk\Http\Response;
use ludk\Controller\AbstractController;

class HomeController extends AbstractController
{

    public function display(Request $request): Response
    {
        $postRepo = $this->getOrm()->getRepository(Post::class);
        $userRepo = $this->getOrm()->getRepository(User::class);

        $items = array();
        if ($request->query->has('search')) {
            $strToSearch = $request->query->get('search');
            if (strpos($strToSearch, "@") === 0) {
                $userName = substr($strToSearch, 1);
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
        $data = array(
            "items" => $items
        );
        return $this->render("display.php", $data);

        // include "../templates/display.php";
    }
}
