<?php

namespace JunakKompetence\Model\Entities;


use LeanMapper\Entity;

/**
 * Class Competence
 * @package JunakKompetence\Model\Entities
 * @property int $competenceId
 * @property string $name
 * @property string|null $levelCekatel
 * @property string|null $levelVudce
 * @property CompetenceGroup $competenceGroup m:hasOne
 * @property VudceItem[] $vudceItems m:hasMany(vudce_item_id:competences_vudce_items:competence_id:competences)
 * @property CekatelItem[] $cekatelItems m:hasMany(cekatel_item_id:competences_cekatel_items:competence_id:competences)
 */
class Competence extends Entity{

}