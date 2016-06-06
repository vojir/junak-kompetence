<?php

namespace JunakKompetence\Model\Facades;

use JunakKompetence\Model\Entities\CekatelItem;
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
    return $this->cekatelItemsRepository->findAllBy(['order'=>'directive_id']);
  }

}