<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomePageTest extends TestCase
{
    public function test_home_page_shows_every_section(): void
    {
        $response = $this->get('/');

        $response->assertOk();

        foreach (['home', 'about', 'skills', 'projects', 'journey', 'contact'] as $id) {
            $response->assertSee('id="'.$id.'"', false);
        }

        $response->assertSee(config('portfolio.name'));
        $response->assertSee('Turing Code Technologies');
        $response->assertSee('Adhiyamaan College of Engineering');
    }

    public function test_every_project_is_listed(): void
    {
        $response = $this->get('/');

        foreach (config('portfolio.projects.items') as $project) {
            $response->assertSee($project['title']);
        }

        $response->assertSee(config('portfolio.projects.current.title'));
    }

    public function test_contact_links_are_present(): void
    {
        $this->get('/')
            ->assertSee('mailto:'.config('portfolio.email'), false)
            ->assertSee(config('portfolio.github_url'), false)
            ->assertSee(config('portfolio.linkedin_url'), false);
    }

    public function test_placeholders_show_locally(): void
    {
        $this->app->detectEnvironment(fn () => 'local');
        config(['portfolio.experience.0.company' => null]);

        $this->get('/')->assertSee('COMPANY_NAME');
    }

    public function test_placeholders_are_hidden_in_production(): void
    {
        $this->app->detectEnvironment(fn () => 'production');
        config([
            'portfolio.experience.0.company' => null,
            'portfolio.linkedin_url' => null,
        ]);

        $this->get('/')
            ->assertOk()
            ->assertDontSee('COMPANY_NAME')
            ->assertDontSee('YOUR_LINKEDIN_URL')
            ->assertDontSee('placeholder-value', false);
    }

    public function test_unknown_page_shows_custom_404(): void
    {
        $this->get('/does-not-exist')
            ->assertNotFound()
            ->assertSeeText('Page not found.')
            ->assertSee('Back to home');
    }
}
