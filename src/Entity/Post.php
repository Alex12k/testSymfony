<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\PostRepository;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PostRepository", repositoryClass=PostRepository::class)
 * @ORM\Table(name="blog")
 */
class Post
{

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;


    /**
     * @ORM\Column(name="content", type="string", length=255)
     */
    private $content;


    /**
     * @ORM\Column(name="activeForm", type="datetime")
     */
    private $activeForm;

    /**
     * @return mixed
     */
    public function getActiveForm()
    {
        return $this->activeForm;
    }

    /**
     * @param mixed $activeForm
     * @return Post
     */
    public function setActiveForm($activeForm)
    {
        $this->activeForm = $activeForm;
        return $this;
    }



    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     * @return Post
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }




    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Post
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return Post
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }





}