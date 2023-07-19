<?php

namespace sagoe1712\BiClientPolicies;

use sagoe1712\BiClientPolicies;
use sagoe1712\Foundation;
use sagoe1712\BiClientPolicies\Collection\Collection;
use Doctrine\DBAL\Exception;

class Repository extends Foundation\Repository
{
    /**
     * @param BiClientPolicies\Mapper $mapper
     */
    public function __construct(BiClientPolicies\Mapper $mapper)
    {
        $this->mapper = $mapper;
    }

    /**
     * @param string $name
     * @param int|null $id
     * @return \sagoe1712\BiClientPolicies\BiClientPolicies
     */
    public function getNew(
        string $name,
        ?int $id = null
    ): BiClientPolicies\BiClientPolicies {
        return new BiClientPolicies\BiClientPolicies(
            $name,
            $id
        );
    }

    /**
     * @param \sagoe1712\BiClientPolicies\BiClientPolicies $client
     * @return \sagoe1712\BiClientPolicies\BiClientPolicies
     * @throws Exception
     */
    public function save(BiClientPolicies\BiClientPolicies $client): BiClientPolicies\BiClientPolicies
    {
        return $this->mapper->save($client);
    }

    /**
     * Get policy by id.
     *
     * @param int $id
     * @return Collection
     * @throws Exception
     */
    public function getById(int $id): Collection
    {
        return $this->mapper->getById($id);
    }

}
