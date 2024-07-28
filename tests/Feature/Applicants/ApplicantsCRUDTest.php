<?php

test('Check for list all applicants endpoint', function () {
    $response = $this->get('/api/v1/applicants');

    $response->assertStatus(200);
});

test('Check endpoint for create new applicant', function () {
    $response = $this->post('/api/v1/applicants');

    $response->assertStatus(201);
});

test('Check endpoint for update existing applicant', function () {
    $response = $this->get('/api/v1/applicants/1');

    $response->assertStatus(201);
});

test('Check endpoint for delete applicant', function () {
    $response = $this->patch('/api/v1/applicants/1', []);

    $response->assertStatus(200);
});

test('Delete an applicant', function () {
    $response = $this->delete('/api/v1/applicants/1', []);

    $response->assertStatus(204);
});

