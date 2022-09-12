<?php

declare(strict_types=1);

namespace Arkitect;

use Arkitect\Rules\DSL\ArchRule;

class ClassSetRules
{
    /** @var ClassSet */
    private $classSet;
    /**
     * @var ArchRule[]
     */
    private $rules;

    private function __construct(ClassSet $classSet, array $rules)
    {
        $this->classSet = $classSet;
        $this->rules = $rules;
    }

    public static function create(ClassSet $classSet, array $rules): self
    {
        return new self($classSet, $rules);
    }

    public function getClassSet(): ClassSet
    {
        return $this->classSet;
    }

    public function getRules(): array
    {
        return $this->rules;
    }

    public function getRulesByName(string $ruleName): ?ArchRule
    {
        return $this->rules[$ruleName] ?? null;
    }
}
