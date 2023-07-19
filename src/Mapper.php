<?php

namespace sagoe1712\BiClientPolicies;

use Doctrine\DBAL\Query\QueryBuilder;
use sagoe1712\BiClientPolicies\Collection\Collection;
use sagoe1712\Foundation;
use Exception;
class Mapper extends  Foundation\Mapper
{
    /**
     * @return string
     */
    public function getModel(): string
    {
        return BiClientPolicies::class;
    }

    /**
     * @param array $data
     * @return BiClientPolicies
     */
    protected function instantiateModel(array $data): BiClientPolicies
    {
        return parent::instantiateModel($data);
    }

    /**
     * @return QueryBuilder
     */
    public function getBaseQuery(): QueryBuilder
    {
        // Get the database query builder.
        $queryBuilder = $this->getQueryBuilder();

        // Return a start point for a Entity.
        return $queryBuilder->select(
           'client_policies.client_id',
           'client_policies.policy_id',
           'client_policies.id'
        )->from('client_policies', 'client_policies');
    }

    /**
     * @param BiClientPolicies $policy
     * @return BiClientPolicies
     * @throws \Doctrine\DBAL\Exception
     */
    public function save(BiClientPolicies $clientPolicy): BiClientPolicies
    {
        $queryBuilder = $this->buildSave($this->getQueryBuilder(), 'client_policies', [
            'id' => ':id',
            'client_id' => ':client_id',
            'policy_id' => ':policy_id',
        ], [
            'id' => $clientPolicy->getId(),
            'client_id' => $clientPolicy->getClientId(),
            'policy_id' => $clientPolicy->getPolicyId(),
        ]);

        $queryBuilder->execute();

        // Set ID for an insert.
        if (is_null($clientPolicy->getId())) {
            $clientPolicy->setId($queryBuilder->getConnection()->lastInsertId());
        }

        return $clientPolicy;
    }

    /**
     * Get activity log by id.
     *
     * @param int $id
     * @return Collection
     * @throws \Doctrine\DBAL\Exception
     */
    public function getById(int $id): Foundation\Collection\CollectionInterface
    {
        $result = $this->getBaseQuery()
            ->where('id = :id')
            ->setParameter('id', $id)
            ->execute()
            ->fetchAll();

        return $this->bindToCollection($result, $this->collectionFactory->getCollection());
    }

}
