<?php

namespace sagoe1712\BiClientPolicies\Collection;

use sagoe1712\Foundation\Collection\Factory as CollectionFactory;
use sagoe1712\BiClientPolicies\Collection\Collection as EntityCollection;

class Factory extends CollectionFactory
{
    /**
     * Get a new entity Collection.
     *
     * @return EntityCollection
     */
    public function getCollection()
    {
        return new EntityCollection;
    }
}
