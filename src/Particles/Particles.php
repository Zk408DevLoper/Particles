<?php

namespace Particles;

use pocketmine\plugin\PluginBase as PB;
use pocketmine\event\Listener as L;

use pocketmine\level\{Position, Location};
use pocketmine\math\Vector3;

use pocketmine\event\player\PlayerMoveEvent;

use pocketmine\command\CommandSender;
use pocketmine\command\Command;

use pocketmine\Player;

use pocketmine\Server;

use pocketmine\level\particle\FlameParticle;
use pocketmine\level\particle\BubbleParticle;
use pocketmine\level\particle\HeartParticle;
use pocketmine\level\particle\AngryVillagerParticle;
use pocketmine\level\particle\CriticalParticle;
use pocketmine\level\particle\DustParticle;

class Particles extends PB implements L{
	
	private $flame = []; #Array UwU
    private $bubble = []; #Array
    private $dust = []; #Array
    private $critical = []; #Array
    private $angry = []; #Array
    private $heart = []; #Array
    
	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);      
		$this->getLogger()->info("§bCreated By Skiddy");
	}
	public function onMove(PlayerMoveEvent $event){
		$player = $event->getPlayer();
		$x = $player->getX();
        $y = $player->getY();
        $z = $player->getZ();
		if(isset($this->flame[strtolower($player->getName())])){ //Checking If The Player Is On Array
        $player->getLevel()->addParticle(new FlameParticle(new Vector3($x, $y, $z)));
        }
        $x = $player->getX();
        $y = $player->getY();
        $z = $player->getZ();
		if(isset($this->bubble[strtolower($player->getName())])){ //Checking If The Player Is On Array
        $player->getLevel()->addParticle(new BubbleParticle(new Vector3($x, $y, $z)));
        }
        $x = $player->getX();
        $y = $player->getY();
        $z = $player->getZ();
		if(isset($this->angry[strtolower($player->getName())])){ //Checking If The Player Is On Array
        $player->getLevel()->addParticle(new AngryVillagerParticle(new Vector3($x, $y, $z)));
        }
        $x = $player->getX();
        $y = $player->getY();
        $z = $player->getZ();
		if(isset($this->dust[strtolower($player->getName())])){ //Checking If The Player Is On Array
        $player->getLevel()->addParticle(new DustParticle(new Vector3($x, $y, $z)));
        }
        $x = $player->getX();
        $y = $player->getY();
        $z = $player->getZ();
		if(isset($this->critical[strtolower($player->getName())])){ //Checking If The Player Is On Array
        $player->getLevel()->addParticle(new CriticalParticle(new Vector3($x, $y, $z)));
        }
        $x = $player->getX();
        $y = $player->getY();
        $z = $player->getZ();
		if(isset($this->heart[strtolower($player->getName())])){ //Checking If The Player Is On Array
        $player->getLevel()->addParticle(new HeartParticle(new Vector3($x, $y, $z)));
       }
     }
	public function onCommand(CommandSender $sender, Command $command, $label, array $args){
          switch($command->getName()){
               case "particles":
                     if($sender->hasPermission("particles.use")){ #Check Player If Player Has Perms UwU
                        if(!isset($args[0])){
           $sender->sendMessage("§8[§bParticles§8] §cPlease Run /particles list");
               return true;              
           }
                    switch($args[0]){
              case "flame":
          $this->flame[strtolower($sender->getName())] = $args[0]; //Putting Player To Array
          unset($this->bubble[strtolower($sender->getName())]); //Removing Player Into Array
          unset($this->heart[strtolower($sender->getName())]); //Removing Player Into Array
          unset($this->critical[strtolower($sender->getName())]); //Removing Player Into Array
          unset($this->angry[strtolower($sender->getName())]); //Removing Player Into Array
          unset($this->dust[strtolower($sender->getName())]); //Removing Player Into Array
          $sender->sendMessage("§8[§bParticle§8] §aEnabled");
             return true;
             case "heart":
          $this->heart[strtolower($sender->getName())] = $args[0]; //Putting Player To Array
          unset($this->bubble[strtolower($sender->getName())]); //Removing Player Into Array
          unset($this->dust[strtolower($sender->getName())]); //Removing Player Into Array
          unset($this->flame[strtolower($sender->getName())]); //Removing Player Into Array
          unset($this->angry[strtolower($sender->getName())]); //Removing Player Into Array
          unset($this->critical[strtolower($sender->getName())]); //Removing Player Into Array
          $sender->sendMessage("§8[§bParticle§8] §aEnabled");
             return true;
             case "critical":
          $this->critical[strtolower($sender->getName())] = $args[0]; //Putting Player To Array
          unset($this->bubble[strtolower($sender->getName())]); //Removing Player Into Array
          unset($this->heart[strtolower($sender->getName())]); //Removing Player Into Array
          unset($this->flame[strtolower($sender->getName())]); //Removing Player Into Array
          unset($this->angry[strtolower($sender->getName())]); //Removing Player Into Array
          unset($this->dust[strtolower($sender->getName())]); //Removing Player Into Array
          $sender->sendMessage("§8[§bParticle§8] §aEnabled");
             return true;
             case "angryvillager":
          $this->angry[strtolower($sender->getName())] = $args[0]; //Putting Player To Array
          unset($this->bubble[strtolower($sender->getName())]); //Removing Player Into Array
          unset($this->heart[strtolower($sender->getName())]); //Removing Player Into Array
          unset($this->flame[strtolower($sender->getName())]); //Removing Player Into Array
          unset($this->critical[strtolower($sender->getName())]); //Removing Player Into Array
          unset($this->dust[strtolower($sender->getName())]); //Removing Player Into Array
          $sender->sendMessage("§8[§bParticle§8] §aEnabled");
             return true;
              case "bubble":
          unset($this->critical[strtolower($sender->getName())]); //Removing Player Into Array
          unset($this->heart[strtolower($sender->getName())]); //Removing Player Into Array
          unset($this->flame[strtolower($sender->getName())]); //Removing Player Into Array
          unset($this->angry[strtolower($sender->getName())]); //Removing Player Into Array
          unset($this->dust[strtolower($sender->getName())]); //Removing Player Into Array
         $this->bubble[strtolower($sender->getName())] = $args[0]; //Putting Player To Array
         $sender->sendMessage("§8[§bParticle§8] §aEnabled");
             return true;
             case "list":
         $sender->sendMessage("§8[§bParticles§8] §aAvailable Particles\n§bflame, bubble, heart, angryvillager, dust, critical");
            return true;
            case "off":
          unset($this->critical[strtolower($sender->getName())]); //Removing Player Into Array
          unset($this->heart[strtolower($sender->getName())]); //Removing Player Into Array
          unset($this->flame[strtolower($sender->getName())]); //Removing Player Into Array
          unset($this->angry[strtolower($sender->getName())]); //Removing Player Into Array
          unset($this->dust[strtolower($sender->getName())]); //Removing Player Into Array
          unset($this->bubble[strtolower($sender->getName())]); //Removing Player Into Array
         $sender->sendMessage("§8[§bParticles§8] §cDisabled");
            return true;
            }
         }
      }
   }
}
