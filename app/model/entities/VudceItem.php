<?php

namespace JunakKompetence\Model\Entities;

use LeanMapper\Entity;

/**
 * Class Vudce
 * @package JunakKompetence\Model\Entities
 * @property int $vudceItemId
 * @property int $directiveId
 * @property string $name
 * @property string $description
 * @property Competence[] $competences m:hasMany(vudce_item_id:competences_vudce_items:competence_id:competences)
 */
class VudceItem extends Entity{
  
}