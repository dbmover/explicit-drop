<?php

namespace Dbmover\ExplicitDrop;

use Dbmover\Core\DeferrablePlugin;

class Plugin extends DeferrablePlugin
{
    public function __invoke(string $sql) : string
    {
        preg_match_all('@^DROP .*?;$@ms', $sql, $matches, PREG_SET_ORDER);
        foreach ($matches as $stmt) {
            $this->defer($stmt[0]);
            $sql = str_replace($stmt[0], '', $sql);
        }
        return $sql;
    }
}

