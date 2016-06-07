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

  public function actionPrev($id){
    try{
      $cekatelItem=$this->cekatelItemsFacade->findPreviousCekatelItem($id);
    }catch(\Exception $e){}

    $this->redirect('show',['id'=>empty($cekatelItem)?$id:$cekatelItem->cekatelItemId]);
  }

  public function actionNext($id){
    try{
      $cekatelItem=$this->cekatelItemsFacade->findNextCekatelItem($id);
    }catch(\Exception $e){}

    $this->redirect('show',['id'=>empty($cekatelItem)?$id:$cekatelItem->cekatelItemId]);
  }


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