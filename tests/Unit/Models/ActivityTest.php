<?php

namespace Tests\Unit\Models;

use Carbon\Carbon;
use Tests\TestCase;
use App\Models\Activity;
use App\Models\Veterinaries\Veterinary;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ActivityTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @throws \Throwable
     */
    public function records_activity_when_a_veterinary_is_created()
    {
        $this->signIn();

        $veterinary = $this->create(Veterinary::class);

        $this->assertDatabaseHas('activities', [
            'type' =>'created_veterinary',
            'user_id' =>auth()->id(),
            'subject_id' => $veterinary->id,
            'subject_type'=> get_class($veterinary)
        ]);

        $activity = Activity::first();
        $this->assertEquals($activity->subject->id, $veterinary->id);
    }
}
