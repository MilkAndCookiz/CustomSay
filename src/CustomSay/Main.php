<?php
namespace CustomSay;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\utils\TextFormat;
use pocketmine\utils\Config;
use pocketmine\permission\ServerOperator;
use pocketmine\event\player\PlayerCommandPreprocessEvent;
use pocketmine\network\portocol\LevelSoundEvent;

//Coded by CookieCode

class Main extends PluginBase implements Listener{
  
    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->saveDefaultConfig();
        $this->getLogger()->info(TextFormat::BLUE . "CustomSay by Cookie loaded.");
    }
    
    public function onDisable(){
        $this->getLogger()->info(TextFormat::BLUE . "CustomSay disabled.");
    }

    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        switch($command->getName()){

          case "customsay":
                    if(!(isset($args[0]))){
                return false;
                }
                $sender->getServer()->broadcastMessage(implode(" ", $args));
                $sender->getLevel()->broadcastLevelEvent($sender, LevelEventPacket::EVENT_SOUND_ANVIL_USE);
                return false;
          }
        }
  
      }
