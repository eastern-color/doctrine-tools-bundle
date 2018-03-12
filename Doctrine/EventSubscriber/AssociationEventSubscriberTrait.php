<?php

namespace EasternColor\DoctrineToolsBundle\Doctrine\EventSubscriber;

use Doctrine\Common\Inflector\Inflector;
use Doctrine\ORM\Mapping\ClassMetadata;
use ReflectionClass;

trait AssociationEventSubscriberTrait
{
    protected function checkAndAddManyToOne(ClassMetadata $classMetadata, $fieldName, $entityClassName, $targetEntity, $inversible = true, $eager = false)
    {
        $hasProperty = $classMetadata->reflClass->hasProperty($fieldName);
        $noAssociation = !$classMetadata->hasAssociation($fieldName);

        if ($hasProperty and $noAssociation) {
            $reflect = new ReflectionClass($entityClassName);
            $map = [
                'fieldName' => $fieldName,
                'joinColumns' => [[
                    'name' => Inflector::tableize($fieldName).'_id',
                    'referencedColumnName' => 'id',
                    'onDelete' => 'CASCADE',
                ]],
                'targetEntity' => $targetEntity,
            ];
            if ($inversible) {
                $inversedBy = lcfirst($reflect->getShortName()).'s';
                $map['inversedBy'] = $inversedBy;
            }
            if ($eager) {
                $map['fetch'] = 'EAGER';
            }

            $classMetadata->mapManyToOne($map);
        }
    }

    protected function checkAndAddOneToOne(ClassMetadata $classMetadata, $fieldName, $entityClassName, $targetEntity)
    {
        $hasProperty = $classMetadata->reflClass->hasProperty($fieldName);
        $noAssociation = !$classMetadata->hasAssociation($fieldName);

        if ($hasProperty and $noAssociation) {
            $reflect = new ReflectionClass($entityClassName);
            $inversedBy = lcfirst($reflect->getShortName());

            $classMetadata->mapOneToOne([
                'fieldName' => $fieldName,
                'joinColumns' => [[
                    'name' => Inflector::tableize($fieldName).'_id',
                    'referencedColumnName' => 'id',
                    'onDelete' => 'CASCADE',
                ]],
                'targetEntity' => $targetEntity,
            ]);
        }
    }

    protected function checkAndAddManyToMany(ClassMetadata $classMetadata, $fieldName, $entityClassName, $targetEntity, $eager = false)
    {
        $hasProperty = $classMetadata->reflClass->hasProperty($fieldName);
        $noAssociation = !$classMetadata->hasAssociation($fieldName);

        if ($hasProperty and $noAssociation) {
            $reflect = new ReflectionClass($entityClassName);
            $joinTableName = $classMetadata->getTableName().'s_'.Inflector::tableize($fieldName).'';

            $map = [
                'fieldName' => $fieldName,
                'joinTable' => [
                    'name' => $joinTableName,
                ],
                'targetEntity' => $targetEntity,
            ];
            if ($eager) {
                $map['fetch'] = 'EAGER';
            }
            $classMetadata->mapManyToMany($map);
        }
    }
}
