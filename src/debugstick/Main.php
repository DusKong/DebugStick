<?php

namespace debugstick;

use debugstick\command\DebugStickCommand;
use pocketmine\plugin\PluginBase;
use pocketmine\data\bedrock\EnchantmentIdMap;
use pocketmine\item\enchantment\Enchantment;
use pocketmine\item\enchantment\ItemFlags;
use pocketmine\item\enchantment\Rarity;
use pocketmine\utils\SingletonTrait;

class Main extends PluginBase{
    use SingletonTrait;

    public function onLoad() : void{
        self::setInstance($this);
    }

    public function onEnable() :void{
        $this->getServer()->getPluginManager()->registerEvents(new EventListener(), $this);

        EnchantmentIdMap::getInstance()->register(-1, new Enchantment("debug_stick", Rarity::COMMON, ItemFlags::ALL, ItemFlags::ALL, 1));
        $this->getServer()->getCommandMap()->register("pocketmine", new DebugStickCommand("debug_stick"));
    }
}