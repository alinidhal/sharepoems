<?php

namespace Controller;

use Entity\Post;
use ludk\Http\Request;
use ludk\Http\Response;
use ludk\Controller\AbstractController;

class  ContentController extends AbstractController
{
    public function create(Request $request): Response
    {
        $postRepo = $this->getOrm()->getRepository(Post::class);
        $manager = $this->getOrm()->getManager();
        $postNew = $postRepo->findAll();
        if (
            ($request->getSession()->has('user'))
            && ($request->request->has('title'))
            && ($request->request->has('description'))
            && ($request->request->has('image'))
        ) {
            $errorMsg = NULL;
            if (strlen(trim($request->request->get('title'))) < 2) {
                $errorMsg = "Your title should have at least 2 characters.";
            } else if (strlen(trim($request->request->get('description'))) < 2) {
                $errorMsg = "Your desc should have at least 2 characters.";
            }
            if ($errorMsg) {
                $data = array(
                    "errorMsg" => $errorMsg
                );
                return $this->render("createForm.php", $data);
            } else {
                $newPost = new Post();
                $newPost->title = trim($request->request->get('title'));
                $newPost->description = trim($request->request->get('description'));
                $newPost->url_img = trim($request->request->get('image'));
                $newPost->datetime = date("Y-m-d H:i:s");
                $newPost->user = $request->getSession()->get('user');
                $manager->persist($newPost);
                $manager->flush();
                return $this->redirectToRoute("display");
            }
        } else {
            return $this->render("createForm.php");
        }
    }
}
