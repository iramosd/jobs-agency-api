<?php

use App\Services\ApplicantService;

test('List all applicants', function () {

    $response = (new ApplicantService())->list();

    $this->assertTrue(false);
});

test('create a new applicant', function () {
    $response = (new ApplicantService())->create();

    $this->assertTrue(false);
});

test('Retrieve applicant information', function () {
    $response = (new ApplicantService())->show();

    $this->assertTrue(false);
});

test('Update applicant information', function () {
    $response = (new ApplicantService())->update();

    $this->assertTrue(false);
});

test('Delete an applicant', function () {
    $response = (new ApplicantService())->delete();

    $this->assertTrue(false);
});
