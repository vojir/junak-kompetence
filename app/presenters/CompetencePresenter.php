<?php
/**
 * Created by PhpStorm.
 * User: Stanislav
 * Date: 6. 6. 2016
 * Time: 11:48
 */

namespace JunakKompetence\Presenters;


use JunakKompetence\Model\Facades\CompetenceFacade;

class CompetencePresenter extends BasePresenter{
  /** @var  CompetenceFacade $competencesFacade */
  private $competencesFacade;


  /**
   * Akce pro zobrazení detailů jedné kompetence
   * @param int $id
   */
  public function renderShow($id){
    $this->template->competence=$this->competencesFacade->findCompetence($id);
  }

  /**
   * Akce pro zobrazení detailů skupiny kompetencí
   * @param int $id
   */
  public function renderGroup($id){
    $this->template->competenceGroup=$this->competencesFacade->findCompetenceGroup($id);
  }

  public function beforeRender(){
    parent::beforeRender();
    $this->template->competenceGroups=$this->competencesFacade->findCompetenceGroups();
  }


  /**
   * @param CompetenceFacade $competenceFacade
   */
  public function injectCompetencesFacade(CompetenceFacade $competenceFacade){
    $this->competencesFacade=$competenceFacade;
  }
}