<?php

namespace Tests;

use App\Models\User;
use Illuminate\Support\Facades\{Auth, Event};
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function signIn($attributes = []) : TestCase
    {
        return $this->actingAs(
            $this->create(User::class, $attributes)
        );
    }

    public function signOut()
    {
        Auth::logout();
    }

    /**
     * factory(Model::class, $amount)->create($attributes)->count($count);
     *
     * @param $class
     * @param array $attributes
     * @param string|null $state
     * @param int $count
     *
     * @return mixed
     */
    public function create($class, array $attributes = [], string $state = null, int $count = 1)
    {
        if ($count > 1) {
            return $class::factory()->count($count)->create($attributes);
        }
        if (! is_null($state) && is_string($state)) {
            if ($count > 1) {
                return $class::factory()->count($count)->$state()->create();
            }

            return $class::factory()->$state()->create();
        }

        return $class::factory()->create($attributes);
    }

    /**
     * factory()->make();
     *
     * @param $class
     * @param array $attributes
     * @return mixed
     */
    public function make($class, array $attributes = [], string $state = null)
    {
        if (! is_null($state) && is_string($state)) {
            return $class::factory()->$state()->make();
        }
        return $class::factory()->make($attributes);
    }

    public function morphsTo($model, $relation, string $as, $data = [], $action = 'create')
    {
        return $this->$action($model, array_merge([
            $as . '_id' => $relation->id,
            $as . '_type' => get_class($relation)
        ], $data));
    }

    public function loadSeeders(array $seeders)
    {
        foreach ($seeders as $seeder) {
            $this->artisan('db:seed --class=' . class_basename($seeder));
        }
    }

    public function fakeEvent()
    {
        Event::fake();
    }
}
