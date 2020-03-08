<?php

namespace App\Repository;

use App\Entity\Pays;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Pays|null find($id, $lockMode = null, $lockVersion = null)
 * @method Pays|null findOneBy(array $criteria, array $orderBy = null)
 * @method Pays[]    findAll()
 * @method Pays[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PaysRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Pays::class);
    }

    public function nameContinent()
    {
     
    $results = $this->createQueryBuilder('pays')
   ->select(' continent.name AS Nom')
    ->join('pays.continent' , 'continent')
    ->where('pays.id = idcontinent_id')
 
    ->getQuery()
   
;

//Retour des résultats 
return $results;

}

public function search(string $search): Query
{
$results = $this->createQueryBuilder('pays')
->where ('pays.name LIKE :search')
->setParameters([
    'search' => "$search%",
])
->getQuery()
;
return $results;
}   
   
}
