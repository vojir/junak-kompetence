<?php
namespace JunakKompetence\Model\Facades;

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
   * @return CompetenceGroup[]
   */
  public function findCompetenceGroups(){
    return $this->competenceGroupsRepository->findAll();
  }




}