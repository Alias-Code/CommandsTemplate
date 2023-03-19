<?php

/*
 * Permet de situer le répértoire du fichier actuel
 */
namespace CommandsTemplate;

use CommandsTemplate\Commands\ExempleCommand;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\SingletonTrait;

/*
 * Création d'une class Main, celle-ci :
 *
 * Hérite des fonctionnalités de la class PluginBase, permettant d'accéder aux fonctions du fichier, exemple : onEnable(...)
 * Implemente la Class Listener, utilisé lorsque l'on souhaite utiliser un evenement
 */
class Main extends PluginBase implements Listener {

    /*
     * Permet d'accéder aux fonctions du fichier, exemple : setInstance(...)
     */
    use SingletonTrait;

    /*
     * Se lance lorsque le serveur s'allume, dans ce cas il permet :
     *
     * D'enregister tout les evenements présent dans la class Main
     * D'annoncer le fait que le plugin s'est bien lancé
     * D'appeler la fonction registerCommands()
     *
     */
    public function onEnable(): void {

        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info("Plugin CommandsTemplate ON");

        $this->registerCommands();
    }


    /*
     * Se lance lorsque le serveur s'éteint, dans ce cas il permet :
     *
     * D'annoncer le fait que le plugin s'est bien éteint
     *
     */
    public function onDisable(): void {

        $this->getLogger()->info("Plugin CommandsTemplate OFF");
    }

    /*
     * Enregistre l'instance de notre class Main, dans ce cas il permet :
     *
     * De pouvoir utiliser n'importe où les fonctions héritées ou non de notre class Main
     */
    public function onLoad(): void {

        self::setInstance($this);
    }

    /*
     * Se lance lorsqu'on l'appelle, dans ce cas il permet :
     *
     * 1. D'executer le code à l'intérieur de cette fonction
     * 2. Ce code permet d'enregistrer la commande que nous avons créé
     */
    public function registerCommands(): void {

        $this->getServer()->getCommandMap()->register("CommandsTemplate", new ExempleCommand());
    }
}