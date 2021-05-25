<?php

namespace Controller;

class HomeController
{

    public function display()
    {
        global $postRepo;
        global $userRepo;

        $items = array();
        if (isset($_GET['search'])) {
            $strToSearch = $_GET['search'];
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
        include "../templates/display.php";
    }
}
