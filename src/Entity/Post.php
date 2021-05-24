<?php

namespace Entity;

use Entity\User;
use ludk\Utils\Serializer;

class Post
{
    public $id;
    public $title;
    public $description;
    public $datetime;
    public $url_img;
    public User $user;
    use Serializer;
}
