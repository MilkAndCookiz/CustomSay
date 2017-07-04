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
use pocketmine\permission\ServerOperator;
use pocketmine\event\player\PlayerCommandPreprocessEvent;

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
					$sender->sendMessage(TextFormat::RED . "[" . TextFormat::BLUE . "CustomSay" . TextFormat::RED . "]" . TextFormat::GOLD . " Use : /cs <message>");
                return false;
                }

                $sender->getServer()->broadcastMessage(implode(" ", $args));
				$sender->sendMessage(TextFormat::RED . "[" . TextFormat::BLUE . "CustomSay" . TextFormat::RED . "]" . TextFormat::GOLD . " Your message ' " . TextFormat::WHITE . (implode(" ", $args)) . TextFormat::RESET . TextFormat::GOLD . " ' has been broadcasted !");
                return false;
          }
        }
      }