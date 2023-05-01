<?php

namespace Tests\Feature\Courses;

use App\Helpers\AreasHelper;
use App\Services\Search\YouTubeVideoSearch;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CoursesTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_show_a_list_of_courses(): void
    {
        $category = $this->getRandomCategory();

        $response = $this->get(route('courses.list', ['category' => $category]));

        $response->assertStatus(200);
    }

    public function test_show_video_screen_is_rendered(): void
    {
        $randomVideo = $this->getRandomVideo();

        $response = $this->get(route('courses.show', ['videoId' => $randomVideo['videoId'], 'title' => $randomVideo['videoTitle']]));

        $response->assertStatus(200);
    }

    private function getRandomCategory() : string
    {
        $categories = AreasHelper::getAreas();
        $randomKey = array_rand($categories, 1);
        $category = $categories[$randomKey]['area'];

        return $category;
    }

    private function getRandomVideo(): array
    {
        $category = $this->getRandomCategory();

        $videos = app(YouTubeVideoSearch::class)->search($category);
        $randomKeyVideo = array_rand($videos);

        return $videos[$randomKeyVideo];
    }
}
