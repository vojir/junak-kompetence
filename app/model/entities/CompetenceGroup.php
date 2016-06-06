<?php

namespace JunakKompetence\Model\Entities;


use LeanMapper\Entity;

/**
 * Class CompetenceGroup
 * @package JunakKompetence\Model\Entities
 * @property int $competenceGroupId
 * @property string $name
 * @property string $description
 * @property Competence[] $competences m:belongsToMany
 */
class CompetenceGroup extends Entity{

}