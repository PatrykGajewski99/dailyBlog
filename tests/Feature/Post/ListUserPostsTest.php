<?php

namespace Tests\Feature\Post;

use Tests\ApiTest;
use Tests\Helpers\PostHelper;
use Tests\Helpers\UserHelper;

class ListUserPostsTest extends ApiTest
{
    public function setUp(): void
    {
        parent::setUp();

        $this->firstUser = UserHelper::create();
        $this->secondUser = UserHelper::create();

        $this->actingAs($this->firstUser);
        $this->actingAs($this->secondUser);

        $this->firstUserFirstPost = PostHelper::create($this->firstUser);
        $this->firstUserSecondPost = PostHelper::create($this->firstUser);
    }


    public function test_it_list_user_posts()
    {
        $secondUserFirstPost = PostHelper::create($this->secondUser);
        $secondUserSecondPost = PostHelper::create($this->secondUser);

        $response = $this->getd($this->firstUser, 'api/post')->getOriginalContent();

        $arrayOfPostIds = $response->pluck('id')->toArray();

        $this->assertContains($this->firstUserFirstPost->id, $arrayOfPostIds);
        $this->assertContains($this->firstUserSecondPost->id, $arrayOfPostIds);
        $this->assertNotContains($secondUserFirstPost->id, $arrayOfPostIds);
        $this->assertNotContains($secondUserSecondPost->id, $arrayOfPostIds);

        $response = $this->getd($this->secondUser, 'api/post')->getOriginalContent();

        $arrayOfPostIds = $response->pluck('id')->toArray();

        $this->assertNotContains($this->firstUserFirstPost->id, $arrayOfPostIds);
        $this->assertNotContains($this->firstUserSecondPost->id, $arrayOfPostIds);
        $this->assertContains($secondUserFirstPost->id, $arrayOfPostIds);
        $this->assertContains($secondUserSecondPost->id, $arrayOfPostIds);
    }

    public function test_it_return_error_on_read_other_user_post(): void
    {
        $this->getd($this->secondUser, "api/post/{$this->firstUserFirstPost->id}", expectedStatus: 403);
    }
}
