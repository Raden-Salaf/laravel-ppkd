<?php

test('protected pages redirect guests to the login page', function () {
    $response = $this->get('/menu');

    $response->assertRedirect('/login');
});
