<?php

use App\Models\User;
use App\Models\Thread;

test('an authenticated user can create new thread', function () {
    $thread = Thread::factory()->make();

    $user = User::factory()->create();

    $response = $this->actingAs($user)->post(route('threads.store'), $thread->toArray());

    expect($response->getStatusCode())->toEqual(302);

    $response->assertRedirect();
});
