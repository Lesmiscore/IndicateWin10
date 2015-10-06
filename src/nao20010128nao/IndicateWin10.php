<?php

namespace nao20010128nao;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat;

use pocketmine\event\player\PlayerPreJoinEvent;

class IndicateWin10 extends PluginBase implements Listener
{
	public function onEnable(){
		@mkdir($this->getDataFolder());
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		
	}
	public function onDisable(){
	}
	
	public function preJoin(PlayerPreJoinEvent $ev){
		$username=$ev->getPlayer()->getName();
		$download=file_get_contents("https://account.xbox.com/ja-JP/Profile?GamerTag=".$username);
		$lower=strtolower($download);
		if(strpos($lower,$username)){
			$this->getServer()->broadcastMessage($username." is a Win 10 Ed. player.");
		}
	}
}
