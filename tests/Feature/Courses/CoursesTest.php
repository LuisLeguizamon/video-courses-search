<?php

namespace Tests\Feature\Courses;

use App\Helpers\AreasHelper;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CoursesTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_show_a_list_of_courses(): void
    {
        $categories = AreasHelper::getAreas();
        $randomKey = array_rand($categories, 1);
        $category = $categories[$randomKey]['area'];

        $response = $this->get(route('courses.list', ['category' => $category]));

        $response->assertStatus(200);
    }
}
