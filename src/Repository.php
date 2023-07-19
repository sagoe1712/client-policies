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
     * @param int $clientId
     * @param int $policyId
     * @param int|null $id
     * @return \sagoe1712\BiClientPolicies\BiClientPolicies
     */
    public function getNew(
        int $clientId,
        int $policyId,
        ?int $id = null
    ): BiClientPolicies\BiClientPolicies {
        return new BiClientPolicies\BiClientPolicies(
            $clientId,
            $policyId,
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
