<?php

use App\Enum\SkillLevelEnum;
use App\Services\SkillService;
use App\Models\Skill;

it('create a new skill', function () {
    $response = (new SkillService())->create([
        'name' => 'Statical Analysis',
    ]);

    $this->assertTrue($response instanceof Skill);
});

it('retrieve skill information', function () {

    $response = (new SkillService())->show(Skill::factory()->create());

    $this->assertTrue($response instanceof Skill);
});

it('update skill information', function () {
    $response = (new SkillService())->update(
        Skill::factory()->create(),
        [
            'name' => 'IT Management',
        ]
    );

    $this->assertTrue($response);
});

it('delete a skill', function () {
    $response = (new SkillService())->delete(Skill::factory()->create());

    $this->assertTrue($response);
});
