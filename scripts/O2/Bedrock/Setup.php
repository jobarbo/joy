<?php

namespace O2\Bedrock;

use Composer\Script\Event;

class Setup {
  public static function theme(Event $event) {
    $root = dirname(dirname(dirname(__DIR__)));
    $composer = $event->getComposer();
    $io = $event->getIO();
    $theme = substr($root, strrpos($root, '/') + 1);

    $io->write("Cloning blank theme and assets");

    $commands = [
      'cd '.$root,
      'mkdir -p ./web/app/themes/'.$theme.'/ && git archive --remote=git@git.o2web.ca:o2web/wp-theme.git master | tar -x -C ./web/app/themes/'.$theme.'/',
      'git archive --remote=git@git.o2web.ca:o2web/assets.git master | tar -x -C ./web/app/themes/'.$theme.'/',
    ];
    exec(implode("\n" , $commands));
    $io->write("");
    $io->write("Done. You're good to go.");
  }
}