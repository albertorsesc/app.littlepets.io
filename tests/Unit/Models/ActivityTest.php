<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ActivityTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @throws \Throwable
     */
    public function records_activity_when_a_model_is_created()
    {
        $this->signIn();

        $fakeModel = new FakeModel(['id' => 1]);

        $this->assertDatabaseHas('activities', [
            'type' =>'created_adoption',
            'user_id' =>auth()->id(),
            'subject_id' => $fakeModel->id,
            'subject_type'=> get_class($fakeModel)
        ]);
    }
}

class FakeModel extends Model
{
    protected int $id;
    protected $fillable = ['id'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->id = $attributes['id'];
    }
}
