<?php

namespace JunakKompetence\Model\Entities;

use LeanMapper\Entity;

/**
 * Class Cekatel
 * @package JunakKompetence\Model\Entities
 * @property int $cekatelItemId
 * @property string $name
 * @property string $description
 * @property Competence[] $competences m:hasMany(cekatel_item_id:competences_cekatel_items:competence_id:competences)
 */
class CekatelItem extends Entity{

}