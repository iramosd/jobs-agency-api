<?php

use App\Enum\SkillLevelEnum;
use App\Models\Skill;
use App\Models\User;

it('Check for list all skills endpoint', function () {
    $this->actingAs(User::factory()->create())->get('/api/v1/skills')
        ->assertOk();
});

it('Check endpoint for create new skill', function () {
    $this->actingAs(User::factory()->create())->post('/api/v1/skills',
        [
            'name' => 'Tech Support L2',
        ])->assertStatus(201);
});

it('Check endpoint for failed on create new skill', function () {
    $this->actingAs(User::factory()->create())->post('/api/v1/skills',
        [
            'name' => null,
        ])->assertStatus(302);
});

it('Check endpoint for update skill', function () {
    $this->actingAs(User::factory()->create())->patch('/api/v1/skills/'.Skill::factory()->create()->id, [
        'name' => 'Angular',
    ])->assertOk();
});

it('Check endpoint for failed on update skill', function () {
    $this->actingAs(User::factory()->create())->patch('/api/v1/skills/'.Skill::factory()->create()->id, [
        'name' => null,
    ])->assertStatus(302);
});

it('Check endpoint for show skill', function () {
    $this->actingAs(User::factory()->create())->get('/api/v1/skills/'.Skill::factory()->create()->id)
        ->assertOk();
});

it('Check endpoint for not found skill', function () {
    $this->actingAs(User::factory()->create())->get('/api/v1/skills/1555151515151515151515151515')
        ->assertStatus(404);
});

it('Check endpoint for delete skill', function () {
    $this->actingAs(User::factory()->create())->delete('/api/v1/skills/'.Skill::factory()->create()->id)
        ->assertStatus(204);
});

it('Check endpoint for failed delete skill', function () {
    $this->actingAs(User::factory()->create())->delete('/api/v1/skills/1555151515151515151515151515')
        ->assertStatus(404);
});

