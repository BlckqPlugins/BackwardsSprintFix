<?php

namespace blckqplugins;

use pocketmine\event\Listener;
use pocketmine\event\server\DataPacketReceiveEvent;
use pocketmine\network\mcpe\protocol\PlayerAuthInputPacket;
use pocketmine\network\mcpe\protocol\types\PlayerAuthInputFlags;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;

class Main extends PluginBase implements Listener {

    protected function onEnable(): void
    {
        Server::getInstance()->getLogger()->info("§aEnabled.");
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onPacket(DataPacketReceiveEvent $event){
        $player = $event->getOrigin()->getPlayer();
        $packet = $event->getPacket();

        if ($packet instanceof PlayerAuthInputPacket){
            if ($packet->hasFlag(PlayerAuthInputFlags::DOWN)){
                $player?->setSprinting(false);
            }
        }
    }
}