<?php

namespace App\Entity;

use App\Repository\UsersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UsersRepository::class)]
class Users
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $username = null;

    #[ORM\Column(length: 255)]
    private ?string $role = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    /**
     * @var Collection<int, Follows>
     */
    #[ORM\OneToMany(targetEntity: Follows::class, mappedBy: 'following_user_id')]
    private Collection $followed_user_id;

    /**
     * @var Collection<int, Follows>
     */
    #[ORM\OneToMany(targetEntity: Follows::class, mappedBy: 'followed_user_id')]
    private Collection $followed;

    /**
     * @var Collection<int, Posts>
     */
    #[ORM\OneToMany(targetEntity: Posts::class, mappedBy: 'user_id')]
    private Collection $posts;

    public function __construct()
    {
        $this->followed_user_id = new ArrayCollection();
        $this->followed = new ArrayCollection();
        $this->posts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): static
    {
        $this->username = $username;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): static
    {
        $this->role = $role;

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

    /**
     * @return Collection<int, Follows>
     */
    public function getFollowedUserId(): Collection
    {
        return $this->followed_user_id;
    }

    public function addFollowedUserId(Follows $followedUserId): static
    {
        if (!$this->followed_user_id->contains($followedUserId)) {
            $this->followed_user_id->add($followedUserId);
            $followedUserId->setFollowingUserId($this);
        }

        return $this;
    }

    public function removeFollowedUserId(Follows $followedUserId): static
    {
        if ($this->followed_user_id->removeElement($followedUserId)) {
            // set the owning side to null (unless already changed)
            if ($followedUserId->getFollowingUserId() === $this) {
                $followedUserId->setFollowingUserId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Follows>
     */
    public function getFollowed(): Collection
    {
        return $this->followed;
    }

    public function addFollowed(Follows $followed): static
    {
        if (!$this->followed->contains($followed)) {
            $this->followed->add($followed);
            $followed->setFollowedUserId($this);
        }

        return $this;
    }

    public function removeFollowed(Follows $followed): static
    {
        if ($this->followed->removeElement($followed)) {
            // set the owning side to null (unless already changed)
            if ($followed->getFollowedUserId() === $this) {
                $followed->setFollowedUserId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Posts>
     */
    public function getPosts(): Collection
    {
        return $this->posts;
    }

    public function addPost(Posts $post): static
    {
        if (!$this->posts->contains($post)) {
            $this->posts->add($post);
            $post->setUserId($this);
        }

        return $this;
    }

    public function removePost(Posts $post): static
    {
        if ($this->posts->removeElement($post)) {
            // set the owning side to null (unless already changed)
            if ($post->getUserId() === $this) {
                $post->setUserId(null);
            }
        }

        return $this;
    }
}
