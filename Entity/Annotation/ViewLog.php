<?php

namespace EasternColor\DoctrineToolsBundle\Entity\Annotation;

use Doctrine\Common\Annotations\Annotation;

/**
 * ## Sample
 * $product = new Product();
 * $annotationReader = $this->get('annotation_reader');
 * $property = (new \ReflectionClass($product));
 * $anno = $annotationReader->getClassAnnotation($property, 'EasternColor\DoctrineToolsBundle\Entity\Annotation\ViewLog');
 * ## /Sample.
 *
 * @Annotation
 * @Target("CLASS")
 */
class ViewLog
{
}
