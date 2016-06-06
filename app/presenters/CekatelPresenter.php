<?php

namespace JunakKompetence\Presenters;

use JunakKompetence\Model\Facades\CekatelItemsFacade;

/**
 * Class CekatelPresenter
 * @package JunakKompetence\Presenters
 */
class CekatelPresenter extends BasePresenter{
  /** @var  CekatelItemsFacade $cekatelItemsFacade */
  private $cekatelItemsFacade;

  /**
   * Funkce pro zobrazení jedné čekatelské kompetence
   * @param int $id
   */
  public function renderShow($id){
    $this->template->cekatelItem=$this->cekatelItemsFacade->findCekatelItem($id);
  }

  /**
   * Funkce pro zobrazení seznamu čekatelských kompetencí
   */
  public function renderList(){
  }

  public function beforeRender(){
    parent::beforeRender();
    $this->template->cekatelItems=$this->cekatelItemsFacade->findCekatelItems();
  }


  /**
   * @param CekatelItemsFacade $cekatelItemsFacade
   */
  public function injectCekatelItemsFacade(CekatelItemsFacade $cekatelItemsFacade){
    $this->cekatelItemsFacade=$cekatelItemsFacade;
  }
}