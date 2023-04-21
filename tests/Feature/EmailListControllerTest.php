<?php

use App\Models\EmailList;
use App\Models\User;
use Laravel\Sanctum\Sanctum;

beforeEach(function () {
    $this->user = User::factory()->create();
    Sanctum::actingAs($this->user);
});

test('  logged in user can create a new list', function () {
    // Arrange

    // Act
    $this->postJson(route('email-lists.store'), [
        'name' => 'My List',
    ]);

    // Assert
    $this->assertDatabaseHas('email_lists', [
        'name'    => 'My List',
        'user_id' => $this->user->id,
    ]);
});

test("guests can't create a new list", function () {
    // Arrange
    app('auth')->guard('sanctum')->forgetUser();
    // Act
    $this->withExceptionHandling();

    $this->postJson(route('email-lists.store'), [
        'name' => 'My List',
    ])->assertUnauthorized();
});

test('new list requires name field', function () {
    // Arrange

    // Act
    $this->withExceptionHandling();

    $this->postJson(route('email-lists.store'), [
        'name' => '',
    ])->assertStatus(422);
});

test('user can list all the email lists', function () {
    // Arrange

    $emailList = EmailList::factory()->create([
        'user_id' => $this->user->id,
    ]);

    // Act
    $response = $this->getJson(route('email-lists.index'));

    // Assert
    $response->assertOk();
    $response->assertJson([
        'data' => [
            [
                'id'   => $emailList->id,
                'name' => $emailList->name,
            ],
        ],
    ]);
});

test("user can update a single list", function () {
    // Arrange

    $emailList = EmailList::factory()->create([
        'user_id' => $this->user->id,
    ]);

    // Act
    $response = $this->putJson(route('email-lists.update', $emailList->id), [
        'name' => 'New Name',
    ]);

    // Assert
    $response->assertOk();
    $this->assertDatabaseHas('email_lists', [
        'id'   => $emailList->id,
        'name' => 'New Name',
    ]);
});

test("user can delete a list", function () {
    // Arrange

    $emailList = EmailList::factory()->create([
        'user_id' => $this->user->id,
    ]);

    // Act
    $response = $this->deleteJson(route('email-lists.destroy', $emailList->id));

    // Assert
    $response->assertOk();
    $this->assertDatabaseMissing('email_lists', [
        'id' => $emailList->id,
    ]);
});

test('user can get single email list that user has created', function () {
    // Arrage
    $user = User::factory()->create();
    Sanctum::actingAs($user);
    $list = EmailList::factory()->create([
        'user_id' => $user->id,
    ]);

    // Act
    $response = $this->getJson(route('email-lists.show', $list->id));
    // Assert
    $response->assertOk();
});
