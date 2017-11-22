<?php

namespace Dbmover\ExplicitDrop;

use Dbmover\Core;

class Plugin extends Core\Plugin
{
    public $description = 'Explicitly dropping objects...';

    public function __invoke(string $sql) : string
    {
        preg_match_all('@^DROP .*?;$@ms', $sql, $matches, PREG_SET_ORDER);
        foreach ($matches as $stmt) {
            $this->addOperation($stmt[0]);
            $sql = str_replace($stmt[0], '', $sql);
        }
        preg_match_all('@^ALTER TABLE \w+ DROP CONSTRAINT .*?;$@ms', $sql, $matches, PREG_SET_ORDER);
        foreach ($matches as $stmt) {
            $this->addOperation($stmt[0]);
            $sql = str_replace($stmt[0], '', $sql);
        }
        return $sql;
    }
}

