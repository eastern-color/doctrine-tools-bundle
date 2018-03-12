<?php

namespace EasternColor\CoreBundle\Command;

use Exception;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

class DumpDoctrineTypesEnumTypeCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
          // the name of the command (the part after "bin/console")
          ->setName('ec:doctrine-tools:dump-type-enum')

          // the short description shown while running "php bin/console list"
          ->setDescription('Dump Doctrine DBAL Type (Enum Type) Actions')

          // the full command description shown when running the command with
          // the "--help" option
          ->setHelp('This command is to dump the config lines for doctrine.dbal.types')
      ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $io->title('[EasternColor] Dump Doctrine DBAL Type (Enum Type) Actions');

        $directory = getcwd().'/src/EasternColor';
        $finder = (new Finder())->files()->name('*Type.php')->contains('extends AbstractEnumType')->in($directory);
        $table = [];
        $result = [];
        $ymlResult = ['# This file is auto-generated by php bin/console eccore:dump-doctrine-type-enum', '# Last Generated: '.date('Y-m-d H:i:s'), '', 'doctrine:', '  dbal:', '    types:'];
        /* @var $file SplFileInfo */
        foreach ($finder as $file) {
            if (!strstr($file, 'DBAL\\Types')) {
                throw new Exception('"AbstractEnumType" should be put under "DBAL\\Types"');
            }
            $dest = 'EasternColor\\'.substr(str_replace([$directory, '.php'], ['', ''], $file), 1);
            preg_match_all('|\\\\(?<bundle>\w+)Bundle\\\\DBAL\\\\Types\\\\(?<entity>\w+)\\\\(?<property>\w+)\.php|', $file->getPathname(), $matches);
            $typeName = ($matches['bundle'][0]).'_'.($matches['entity'][0]).'_'.($matches['property'][0]);

            // $table[] = [
            //     'type_name' => $typeName,
            //     'dest' => $dest,
            //     'filename' => $file,
            // ];
            $result[] = sprintf('%s: %s', $typeName, $dest);
            $ymlResult[] = '      '.sprintf('%s: %s', $typeName, $dest);
        }
        // $io->title('Directory:'.$directory);
        // $io->table(['type', 'dest', 'file'], $table);
        $io->text('Founded types:');
        $io->listing($result);

        file_put_contents(getcwd().'/app/config/generated/config_doctrine_dbal_enum_types.yml', implode(PHP_EOL, $ymlResult));
    }
}
