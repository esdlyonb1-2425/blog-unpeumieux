<?php

namespace App\Controller;

use App\Entity\Post;
use Attributes\DefaultEntity;
use Core\Controller\Controller;
use Core\Response\Response;

#[DefaultEntity(entityName: Post::class)]
class PostController extends Controller
{


    public function index(): Response
    {

      $thePosts =  $this->getRepository()->findAll();

        return $this->render('post/index', [
            'posts' => $thePosts,
        ]);
    }


    public function show(): Response
    {
        $id = null;
        if(!empty($_GET["id"]) && ctype_digit($_GET["id"])){
            $id = $_GET["id"];
        }

        if(!$id)
        {
            return $this->redirect([
                "type"=>"post",
                "action"=>"index"
            ]);
        }

        $post = $this->getRepository()->find($id);

        if(!$post)
        {
            return $this->redirect();
        }

        return $this->render('post/show', [
            'post' => $post,
        ]);
    }
}