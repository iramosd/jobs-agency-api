<?php

test('List all applicants', function () {
    $response = $this->get('/api/v1/applicants');

    $response->assertStatus(200);
});

test('create a new applicant', function () {
    $response = $this->post('/api/v1/applicants');

    $response->assertStatus(201);
});

test('Retrieve applicant information', function () {
    $response = $this->post('/api/v1/applicants');

    $response->assertStatus(201);
});

test('Update applicant information', function () {
    $response = $this->patch('/api/v1/applicants1', []);

    $response->assertStatus(200);
});

test('Delete an applicant', function () {
    $response = $this->delete('/api/v1/applicants/1', []);

    $response->assertStatus(204);
});

