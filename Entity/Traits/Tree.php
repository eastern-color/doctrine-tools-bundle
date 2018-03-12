<?php

/*
 *
 */

namespace EasternColor\DoctrineToolsBundle\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

trait Tree
{
    /**
     * @Gedmo\TreeLeft
     * @ORM\Column(type="integer")
     */
    protected $lft;

    /**
     * @Gedmo\TreeRight
     * @ORM\Column(type="integer")
     */
    protected $rgt;

    /**
     * @Gedmo\TreeLevel
     * @ORM\Column(type="integer")
     */
    protected $lvl;

    public function __toString()
    {
        return (string) $this->id;
    }

    public function indentedCaption()
    {
        return str_repeat('--', $this->lvl).$this->getIndentedCaption();
    }

    public function getLft()
    {
        return $this->lft;
    }

    public function getLvl()
    {
        return $this->lvl;
    }

    public function getRgt()
    {
        return $this->rgt;
    }

    public static function entityTypeOptions(array $options = [], array $queryParam = [])
    {
        $result = [
            'placeholder' => isset($options['placeholder']) ? $options['placeholder'] : 'Choose an option',
            'required' => isset($options['required']) ? $options['required'] : false,
            'class' => static::class,
            'multiple' => isset($options['multiple']) ? $options['multiple'] : false,
            'expanded' => isset($options['expanded']) ? $options['expanded'] : false,
            'choice_label' => isset($options['choice_label']) ? $options['choice_label'] : 'i18nCaption',
            'choice_value' => function ($entity) {
                return empty($entity) ? null : strval($entity);
            },
            'query_builder' => function ($r) use ($queryParam) {
                if (isset($queryParam['root_subtree'])) {
                    $qb = $r->createQueryBuilder('c');
                    $qb
                        ->select('c', 'ctrans')
                        ->join('c.translations', 'ctrans')
                        ->where($qb->expr()->in(
                        'c.root',
                        $r->createQueryBuilder('c2')->select('c2.id')->where('c2.value = :root_value')
                            ->andWhere('c2.deletedAt IS NULL')
                            ->getDQL()
                    ))
                        ->andWhere('c.lvl > 1')
                        ->andWhere('c.deletedAt IS NULL')
                        ->setParameter('root_value', $queryParam['root_subtree'])
                        ->orderBy('c.lft', 'ASC');
                    // echo $qb->getQuery()->getSql();exit;
                } elseif (isset($queryParam['root_value'])) {
                    $qb = $r->createQueryBuilder('c');
                    $qb
                        ->select('c', 'ctrans')
                        ->join('c.translations', 'ctrans')
                        ->where($qb->expr()->in(
                        'c.root',
                        $r->createQueryBuilder('c2')->select('c2.id')->where('c2.value = :root_value')->getDQL()
                    ))
                        ->andWhere('c.lvl = 1')
                        ->andWhere('c.deletedAt IS NULL')
                        ->setParameter('root_value', $queryParam['root_value'])
                        ->orderBy('c.lft', 'ASC');
                    // echo $qb->getQuery()->getSql();exit;
                } else {
                    $qb = $r->createQueryBuilder('c')
                        ->select('c', 'ctrans')
                        ->join('c.translations', 'ctrans')
                        ->where('c.lvl = 0')
                        ->orderBy('c.lft', 'ASC');
                }

                return $qb;
            }, ];

        return $options + $result;
    }

    abstract protected function getIndentedCaption();
}
