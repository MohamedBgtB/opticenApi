<?php

namespace App\Entity;

use App\Repository\FollowsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FollowsRepository::class)]
class Follows
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'followed_user_id')]
    private ?Users $following_user_id = null;

    #[ORM\ManyToOne(inversedBy: 'followed')]
    private ?Users $followed_user_id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFollowingUserId(): ?Users
    {
        return $this->following_user_id;
    }

    public function setFollowingUserId(?Users $following_user_id): static
    {
        $this->following_user_id = $following_user_id;

        return $this;
    }

    public function getFollowedUserId(): ?Users
    {
        return $this->followed_user_id;
    }

    public function setFollowedUserId(?Users $followed_user_id): static
    {
        $this->followed_user_id = $followed_user_id;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }
}
