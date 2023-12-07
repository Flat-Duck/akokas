<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Group;
use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserGroupsTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create(['email' => 'admin@admin.com']);

        Sanctum::actingAs($user, [], 'web');

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_user_groups()
    {
        $user = User::factory()->create();
        $group = Group::factory()->create();

        $user->groups()->attach($group);

        $response = $this->getJson(route('api.users.groups.index', $user));

        $response->assertOk()->assertSee($group->name);
    }

    /**
     * @test
     */
    public function it_can_attach_groups_to_user()
    {
        $user = User::factory()->create();
        $group = Group::factory()->create();

        $response = $this->postJson(
            route('api.users.groups.store', [$user, $group])
        );

        $response->assertNoContent();

        $this->assertTrue(
            $user
                ->groups()
                ->where('groups.id', $group->id)
                ->exists()
        );
    }

    /**
     * @test
     */
    public function it_can_detach_groups_from_user()
    {
        $user = User::factory()->create();
        $group = Group::factory()->create();

        $response = $this->deleteJson(
            route('api.users.groups.store', [$user, $group])
        );

        $response->assertNoContent();

        $this->assertFalse(
            $user
                ->groups()
                ->where('groups.id', $group->id)
                ->exists()
        );
    }
}
