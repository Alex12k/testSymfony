<?php


namespace App\Repository;


use App\Entity\Post;
use DateTime;
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



    public function activePosts():array
    {

     /*   $currentDate = new DateTime();
        foreach( $this->fetchAll() as $post ){
            $activeTime = $post->getActiveForm();
            if($currentDate >= $activeTime){$res[] = $post;}
        }

        return $res;*/

        return $this->getEntityManager()->createQueryBuilder()
            ->select('entity')
            ->from(Post::class, 'entity')
            -> where('entity.activeForm <= :currentDate')
            ->setParameter('currentDate', new DateTime())
            ->getQuery()
            ->getResult();


    }


} //end class