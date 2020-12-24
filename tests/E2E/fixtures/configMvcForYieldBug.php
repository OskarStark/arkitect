<?php
declare(strict_types=1);

use Arkitect\ClassSet;
use Arkitect\CLI\Config;
use Arkitect\Expression\ForClasses\HaveNameMatching;
use Arkitect\Expression\ForClasses\ResideInOneOfTheseNamespaces;
use Arkitect\Rules\Rule;

return static function (Config $ruleChecker): void {
    $mvc_class_set = ClassSet::fromDir(__DIR__.'/mvc');

    $rule_1 = Rule::allClasses()
        ->that(new ResideInOneOfTheseNamespaces('App\Controller'))
        ->should(new HaveNameMatching('*Controller'))
        ->because('all controllers should be end name with Controller');

    $ruleChecker
        ->checkThatClassesIn($mvc_class_set)
        ->meetTheFollowingRules($rule_1);
};
