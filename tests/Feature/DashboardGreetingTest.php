<?php

test('dashboard uses Asia Jakarta timezone for greetings', function () {
    expect(config('app.timezone'))->toBe('Asia/Jakarta');
});
