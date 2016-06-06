<?php
namespace JunakKompetence\Model\Facades;

use JunakKompetence\Model\Entities\Competence;
use JunakKompetence\Model\Entities\CompetenceGroup;
use JunakKompetence\Model\Repositories\CompetenceGroupsRepository;
use JunakKompetence\Model\Repositories\CompetencesRepository;

class CompetenceFacade{
  /** @var CompetencesRepository $competencesRepository */
  private $competencesRepository;
  /** @var  CompetenceGroupsRepository $competenceGroupsRepository */
  private $competenceGroupsRepository;

  public function __construct(CompetencesRepository $competencesRepository, CompetenceGroupsRepository $competenceGroupsRepository){
    $this->competencesRepository=$competencesRepository;
    $this->competenceGroupsRepository=$competenceGroupsRepository;
  }

  /**
   * Funkce pro nalezení všech skupin kompetencí
   * @return CompetenceGroup[]
   */
  public function findCompetenceGroups(){
    return $this->competenceGroupsRepository->findAll();
  }

  /**
   * Funkce pro nalezení jedné konkrétní kompetence
   * @param int $id
   * @return Competence
   * @throws \JunakKompetence\Model\Exceptions\EntityNotFoundException
   */
  public function findCompetence($id){
    return $this->competencesRepository->find($id);
  }

  /**
   * Funkce pro nalezení jedné skupiny kompetencí
   * @param int $id
   * @return CompetenceGroup
   * @throws \JunakKompetence\Model\Exceptions\EntityNotFoundException
   */
  public function findCompetenceGroup($id){
    return $this->competenceGroupsRepository->find($id);
  }


}