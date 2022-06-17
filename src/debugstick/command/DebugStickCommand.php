<?php

namespace debugstick\command;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\defaults\VanillaCommand;
use pocketmine\data\bedrock\EnchantmentIdMap;
use pocketmine\item\enchantment\EnchantmentInstance;
use pocketmine\item\VanillaItems;
use pocketmine\permission\DefaultPermissionNames;
use pocketmine\lang\KnownTranslationFactory;
use pocketmine\utils\TextFormat;

class DebugStickCommand extends VanillaCommand {

    public function __construct(string $name){
        parent::__construct(
            $name,
            "/debug_stick",
            "/debug_stick"
        );
        $this->setPermission(DefaultPermissionNames::COMMAND_GIVE);
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args) {
        if(!$this->testPermission($sender)){
            return true;
        }

        $stick = VanillaItems::STICK();
        $enchant = EnchantmentIdMap::getInstance()->fromId(-1);
        $stick->addEnchantment(new EnchantmentInstance($enchant, 1));
        $stick->setCustomName(TextFormat::LIGHT_PURPLE . "Debug Stick");

        $sender->getInventory()->addItem($stick);
        Command::broadcastCommandMessage($sender, KnownTranslationFactory::commands_give_success(
            $stick->getCustomName(),
            (string) $item->getCount(),
            $sender->getName()
        ));
        return true;
    }
}