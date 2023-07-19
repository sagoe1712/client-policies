<?php

namespace sagoe1712\BiClientPolicies;

use sagoe1712\Foundation\Model;
class BiClientPolicies extends Model
{
    /**
     * @var int|null
     */
    protected ?int $id;

    /**
     * @var int
     */
    protected int $clientId;

    /**
     * @var int
     */
    protected int $policyId;

    /**
     * @param string $name
     * @param int|null $id
     */
    public function __construct(
        int $clientId,
        int $policyId,
        ?int $id
    )
    {
        $this->id = $id;
        $this->clientId = $clientId;
        $this->policyId = $policyId;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getClientId(): int
    {
        return $this->clientId;
    }

    /**
     * @param int $clientId
     */
    public function setClientId(int $clientId): void
    {
        $this->clientId = $clientId;
    }

    /**
     * @return int
     */
    public function getPolicyId(): int
    {
        return $this->policyId;
    }

    /**
     * @param int $policyId
     */
    public function setPolicyId(int $policyId): void
    {
        $this->policyId = $policyId;
    }

}
