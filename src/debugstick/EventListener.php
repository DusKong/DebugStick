<?php

namespace debugstick;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\data\bedrock\EnchantmentIdMap;

class EventListener implements Listener{

    public function onInteract(PlayerInteractEvent $event){
        $player = $event->getPlayer();
        $block = $event->getBlock();

        $stick = $player->getInventory()->getItemInHand();
        if($stick->hasEnchantment(EnchantmentIdMap::getInstance()->fromId(-1), 1)){
            if($player->isSneaking()){

            }else{
                
            }
        }
    }
}