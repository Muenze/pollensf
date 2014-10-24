<?php
$manager = $this->getContainer()->get('h4cc_alice_fixtures.manager');

// Get a FixtureSet with __default__ options.
$set = $manager->createFixtureSet();
$set->addFile(__DIR__.'/basic.yml', 'yaml');

// Change locale for this set only.
$set->setLocale('de_DE');
// Define a custom random seed for "predictable randomness".
$set->setSeed(42);
// Enable persisting of objects
$set->setDoPersist(true);
// Enable dropping and recreating current ORM schema.
$set->setDoDrop(true);

return $set;