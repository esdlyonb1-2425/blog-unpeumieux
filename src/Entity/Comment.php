<?php

namespace App\Entity;

use App\Repository\CommentRepository;
use Attributes\TargetRepository;
use Core\Attributes\Table;

#[Table(name: 'comments')]
#[TargetRepository(repoName: CommentRepository::class)]
class Comment
{
    private int $id;

    private string $content;

    private string $post_id;

    public function getId(): int
    {
        return $this->id;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getPostId(): string
    {
        return $this->post_id;
    }

    public function setPostId(string $post_id): void
    {
        $this->post_id = $post_id;
    }


}