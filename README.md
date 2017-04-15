# Dbmover\ExplicitDrop
This DbMover plugin explicitly hoists drops from your schema and executes them.
It does not itself add any `IF EXISTS` clauses, but you can of course include
these in your schemas.

This plugin is useful for explicitly dropping recreatables that aren't supported
yet, e.g. `DROP MATERIALIZED VIEW` in PostgreSQL.

## Installation
```sh
composer require dbmover/explicit-drop
```

## Usage
For general DbMover usage, see `dbmover/core`.

This plugin should usually go near or at the front of your plugin list, since
other plugins might attempt to create something that turns out to already be
there, and throw an error.

## Contributing
See `dbmover/core`.

