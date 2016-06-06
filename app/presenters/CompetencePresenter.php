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


  public function actionPrev($id){
    try{
      $competence=$this->competencesFacade->findPreviousCompetence($id);
    }catch(\Exception $e){}

    $this->redirect('show',['id'=>empty($competence)?$id:$competence->competenceId]);
  }

  public function actionNext($id){
    try{
      $competence=$this->competencesFacade->findNextCompetence($id);
    }catch(\Exception $e){}

    $this->redirect('show',['id'=>empty($competence)?$id:$competence->competenceId]);
  }

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