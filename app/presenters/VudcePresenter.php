<?php

namespace JunakKompetence\Presenters;

use JunakKompetence\Model\Facades\VudceItemsFacade;

/**
 * Class VudcePresenter
 * @package JunakKompetence\Presenters
 */
class VudcePresenter extends BasePresenter{
  /** @var  VudceItemsFacade $vudceItemsFacade */
  private $vudceItemsFacade;

  /**
   * Funkce pro zobrazení jedné vůdcovské kompetence
   * @param int $id
   */
  public function renderShow($id){
    $this->template->vudceItem=$this->vudceItemsFacade->findVudceItem($id);
  }

  /**
   * Funkce pro zobrazení seznamu vůdcovských kompetencí
   * @param int $id
   */
  public function renderList($id){
    $this->template->vudceItems=$this->vudceItemsFacade->findVudceItems();
  }


  /**
   * @param VudceItemsFacade $vudceItemsFacade
   */
  public function injectVudceItemsFacade(VudceItemsFacade $vudceItemsFacade){
    $this->vudceItemsFacade=$vudceItemsFacade;
  }
}