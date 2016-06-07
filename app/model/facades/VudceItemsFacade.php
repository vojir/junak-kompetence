<?php

namespace JunakKompetence\Model\Facades;


use JunakKompetence\Model\Entities\VudceItem;
use JunakKompetence\Model\Exceptions\EntityNotFoundException;
use JunakKompetence\Model\Repositories\VudceItemsRepository;

class VudceItemsFacade{
  /** @var VudceItemsRepository $vudceItemsRepository */
  private $vudceItemsRepository;

  public function __construct(VudceItemsRepository $vudceItemsRepository){
    $this->vudceItemsRepository=$vudceItemsRepository;
  }

  /**
   * Funkce pro nalezení jedné vůdcovské kompetence
   * @param int $id
   * @return VudceItem
   * @throws \JunakKompetence\Model\Exceptions\EntityNotFoundException
   */
  public function findVudceItem($id){
    return $this->vudceItemsRepository->find($id);
  }

  /**
   * Funkce vracející přehled vůdcovských kompetencí
   * @return VudceItem[]
   */
  public function findVudceItems(){
    return $this->vudceItemsRepository->findAllBy(['order'=>'directive_id']);
  }

  /**
   * @param int $id
   * @return VudceItem
   * @throws EntityNotFoundException
   */
  public function findPreviousVudceItem($id){
    $vudceItem=$this->findVudceItem($id);
    $result=$this->vudceItemsRepository->findAllBy([['directive_id<%i',$vudceItem->directiveId],'order'=>'directive_id DESC'],0,1);
    if (count($result)>0){
      return array_pop($result);
    }
    throw new EntityNotFoundException();
  }

  /**
   * @param int $id
   * @return VudceItem
   * @throws EntityNotFoundException
   */
  public function findNextVudceItem($id){
    $vudceItem=$this->findVudceItem($id);
    $result=$this->vudceItemsRepository->findAllBy([['directive_id>%i',$vudceItem->directiveId],'order'=>'directive_id ASC'],0,1);
    if (count($result)>0){
      return array_pop($result);
    }
    throw new EntityNotFoundException();
  }
}