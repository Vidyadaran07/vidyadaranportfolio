<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomePageTest extends TestCase
{
    public function test_home_page_shows_every_section(): void
    {
        $response = $this->get('/');

        $response->assertOk();

        foreach (['home', 'about', 'skills', 'experience', 'projects', 'services', 'contact'] as $id) {
            $response->assertSee('id="'.$id.'"', false);
        }

        $response->assertSee(config('portfolio.name'));
        $response->assertSee('Turing Code Technologies');
        $response->assertSee('WMP Create Agency');
        $response->assertSee(config('portfolio.total_experience'));
    }

    public function test_every_project_is_listed(): void
    {
        $response = $this->get('/');

        foreach (config('portfolio.projects.items') as $project) {
            $response->assertSee($project['short_title']);
        }
    }

    public function test_real_work_projects_are_listed(): void
    {
        $response = $this->get('/');

        $response->assertSee('id="work"', false);

        foreach (config('portfolio.work.items') as $item) {
            $response->assertSee($item['title']);
        }
    }

    public function test_hero_and_about_use_their_own_photos(): void
    {
        $this->get('/')
            ->assertSee('images/profile-hero.webp', false)
            ->assertSee('images/profile-about.webp', false);
    }

    public function test_about_falls_back_to_the_hero_photo_then_initials(): void
    {
        config(['portfolio.about_photo' => 'images/missing.webp']);
        $this->get('/')->assertDontSee('images/missing.webp', false)
            ->assertSee('class="about-photo" src="'.asset('images/profile-hero.webp').'"', false);

        config(['portfolio.photo' => 'images/missing.webp']);
        $this->get('/')->assertSee('photo-initials', false)->assertSee('about-photo-initials', false);
    }

    public function test_solutions_are_labelled_as_sample_concepts(): void
    {
        $response = $this->get('/');

        foreach (config('portfolio.projects.items') as $project) {
            $response->assertSee('images/projects/'.$project['slug'].'-preview.webp', false);
        }

        $response->assertSee('Solutions I Can Build For You')
            ->assertSee('Sample concept')
            ->assertSee('This is a sample concept.')
            ->assertDontSee('I developed each of these applications');
    }

    public function test_each_offered_solution_has_a_build_button_and_details(): void
    {
        $response = $this->get('/');

        foreach (config('portfolio.projects.items') as $project) {
            if (empty($project['features'])) {
                // Upcoming: an "Ask about this" button, but no details dialog.
                $response->assertSee('data-interest="'.$project['short_title'].'"', false)
                    ->assertSee($project['status'])
                    ->assertDontSee('id="project-'.$project['slug'].'"', false);

                continue;
            }

            $response->assertSee('data-interest="'.$project['short_title'].'"', false)
                ->assertSee('id="project-'.$project['slug'].'"', false)
                ->assertSee($project['ideal_for'])
                ->assertSee($project['timeline']);
        }
    }

    public function test_how_it_works_steps_are_shown(): void
    {
        $response = $this->get('/');

        foreach (config('portfolio.process') as $step) {
            $response->assertSee($step['title']);
        }
    }

    public function test_a_real_screenshot_replaces_the_illustration(): void
    {
        $path = public_path('images/projects/crm.png');
        copy(public_path('images/projects/crm-preview.webp'), $path);

        try {
            $this->get('/')
                ->assertSee('images/projects/crm.png', false)
                ->assertDontSee('images/projects/crm-preview.webp', false)
                ->assertSee('Screenshot of CRM System');
        } finally {
            unlink($path);
        }
    }

    public function test_every_service_is_listed(): void
    {
        $response = $this->get('/');

        foreach (config('portfolio.services') as $service) {
            $response->assertSee($service['title']);
        }
    }

    public function test_why_work_with_me_replaces_job_seeker_content(): void
    {
        $response = $this->get('/');

        foreach (config('portfolio.why.points') as $point) {
            $response->assertSee($point);
        }

        $response->assertDontSee('Career Objective')
            ->assertDontSee('Download Resume');
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
            ->assertSee('Back to Home');
    }
}
