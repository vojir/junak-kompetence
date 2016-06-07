<?php

namespace JunakKompetence\Model\Facades;

use JunakKompetence\Model\Entities\CekatelItem;
use JunakKompetence\Model\Exceptions\EntityNotFoundException;
use JunakKompetence\Model\Repositories\CekatelItemsRepository;

class CekatelItemsFacade{
  /** @var CekatelItemsRepository $cekatelItemsRepository */
  private $cekatelItemsRepository;

  public function __construct(CekatelItemsRepository $cekatelItemsRepository){
    $this->cekatelItemsRepository=$cekatelItemsRepository;
  }

  /**
   * Funkce pro nalezení jedné čekatelské kompetence
   * @param int $id
   * @return CekatelItem
   * @throws \JunakKompetence\Model\Exceptions\EntityNotFoundException
   */
  public function findCekatelItem($id){
    return $this->cekatelItemsRepository->find($id);
  }

  /**
   * Funkce vracející přehled čekatelských kompetencí
   * @return CekatelItem[]
   */
  public function findCekatelItems(){
    return $this->cekatelItemsRepository->findAll();
  }

  /**
   * @param int $id
   * @return CekatelItem
   * @throws EntityNotFoundException
   */
  public function findPreviousCompetence($id){
    $result=$this->cekatelItemsRepository->findAllBy([['cekatel_item_id<%i',$id],'order'=>'cekatel_item_id DESC'],0,1);
    if (count($result)>0){
      return array_pop($result);
    }
    throw new EntityNotFoundException();
  }

  /**
   * @param int $id
   * @return CekatelItem
   * @throws EntityNotFoundException
   */
  public function findNextCompetence($id){
    $result=$this->cekatelItemsRepository->findAllBy([['cekatel_item_id>%i',$id],'order'=>'cekatel_item_id ASC'],0,1);
    if (count($result)>0){
      return array_pop($result);
    }
    throw new EntityNotFoundException();
  }

}