<?php

/*
 * Permet de situer le répértoire du fichier actuel
 */
namespace CommandsTemplate\Commands;

use pocketmine\command\{CommandSender, Command};
use pocketmine\player\Player;

/*
 * Création d'une class ExempleCommand, celle-ci :
 *
 * Hérite des fonctionnalités de la class "Command", permettant d'accéder aux fonctions du fichier, exemple : execute(...)
 */
class ExempleCommand extends Command {

    /*
     * Se lance lorsque le fichier est appelé, dans ce cas il permet de :
     *
     * 1. Enregistrer le nom de la commande
     * 2. Enregistrer la description de la commande
     * 3. Enregistrer un exemple d'usage de la commande
     * 4. Enregistrer d'autres nom pour la même commande
     */
    public function __construct() {

        parent::__construct("exemple", "Description de la commande", "/exemple", ["/ex"]);
    }


    /*
     * Se lance lorsque la commande est executée, il contient en paramètres :
     *
     * 1. Celui qui effectue la commande (Joueur, Console)
     * 2. Indique l'alias qui a été utilisé pour exécuter la commande
     * 3. Argument(s) fourni(s) lors de l'exécution de la commande
     */
    public function execute(CommandSender $sender, string $commandLabel, array $args) {

        /*
         * Permet de vérifier si celui qui effectue la commande est une instance de la class Player
         *
         * Si il ne l'est pas, la commande sera arrêté, permet d'éviter que la Console effectue la commande
         */
        if(!$sender instanceof Player)
            return;

        /*
         * Permet d'envoyer un message de couleur vert clair à celui qui effectue la commande
         */
        $sender->sendMessage("§aUn message envoyé à celui qui effectue la commande");
    }
}