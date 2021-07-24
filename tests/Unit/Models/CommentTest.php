<?php

namespace Tests\Unit\Models;

use App\Models\Comment;
use App\Models\Concerns\Commentable;
use App\Models\User;
use Database\Seeders\SpecieSeeder;
use Illuminate\Database\Eloquent\Model;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CommentTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @throws \Throwable
    */
    public function comment_belongs_to_a_user()
    {
        $this->loadSeeders([SpecieSeeder::class]);
        // to get the user_id for the comment
        $this->signIn();
        $fakeModel = new FakeModel(['id' => 1]);

        $fakeModel->comment('some body');

        $this->assertInstanceOf(User::class, $fakeModel->comments->first()->user);
    }
}

class FakeModel extends Model
{
    use Commentable;

    protected int $id;
    protected $fillable = ['id'];
}
