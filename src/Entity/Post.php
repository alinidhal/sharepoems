<?php

namespace Entity;

use ludk\Utils\Serializer;

class Post
{
    public $id;
    public $nickname;
    public $title;
    public $description;
    public $datetime;
    public $url_img;
    public User $user;
    use Serializer;
}
