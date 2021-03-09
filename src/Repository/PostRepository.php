<?php


namespace App\Repository;


use App\Entity\Post;
use Doctrine\ORM\EntityRepository;

class PostRepository extends EntityRepository
{

    public function fetchAll():array
    {
        return $this->getEntityManager()->createQueryBuilder()
        ->select('entity')
        ->from(Post::class, 'entity')
        ->getQuery()
        ->getResult();

    }

}