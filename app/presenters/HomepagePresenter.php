<?php

namespace JunakKompetence\Presenters;

use JunakKompetence\Model\Facades\CompetenceFacade;
use Nette;

class HomepagePresenter extends BasePresenter{
  /** @var  CompetenceFacade $competenceFacade */
  private $competenceFacade;

  public function renderDefault(){
    

  }

  public function injectCompetenceFacade(CompetenceFacade $competenceFacade){
    $this->competenceFacade=$competenceFacade;
  }

}
