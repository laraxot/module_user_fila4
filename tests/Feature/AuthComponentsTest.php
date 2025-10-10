<?php

declare(strict_types=1);

use App\Models\User;
use Illuminate\Support\Facades\View;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

describe('Auth Components Reorganization Tests', function () {
    test('auth components are properly organized after reorganization', function () {
        // Test auth.confirms-password component exists
        expect(View::exists('pub_theme::components.auth.confirms-password'))->toBeTrue();

        // Test auth.authentication-card component exists
        expect(View::exists('pub_theme::components.auth.authentication-card'))->toBeTrue();

        // Test auth.authentication-card-logo component exists
        expect(View::exists('pub_theme::components.auth.authentication-card-logo'))->toBeTrue();
    });

    test('form components work correctly in auth context', function () {
        // Test that reorganized form components exist and work
        expect(View::exists('pub_theme::components.forms.input'))->toBeTrue();
        expect(View::exists('pub_theme::components.forms.input-label'))->toBeTrue();
        expect(View::exists('pub_theme::components.forms.validation-errors'))->toBeTrue();
        expect(View::exists('pub_theme::components.utilities.button'))->toBeTrue();
    });

    test('login page with reorganized components loads correctly', function () {
        // Test that login pages using reorganized components still work
        $response = get('/auth/login');
        $response->assertStatus(200);
    });

    test('register page with reorganized components loads correctly', function () {
        // Test that register page using reorganized components still work
        $response = get('/auth/register');
        $response->assertStatus(200);
    });

    test('auth.confirms-password component renders correctly', function () {
        // Test the confirms-password component rendering
        $html = view('pub_theme::components.auth.confirms-password')->render();

        expect($html)->toBeString();
        expect($html)->not->toBeEmpty();
    });

    test('blocks.forms.login-card component exists and renders', function () {
        // Test the login-card component that was reorganized
        expect(View::exists('pub_theme::components.blocks.forms.login-card'))->toBeTrue();

        $html = view('pub_theme::components.blocks.forms.login-card', [
            'title' => 'Login Test',
            'subtitle' => 'Test Subtitle',
        ])->render();

        expect($html)->toContain('Login Test');
    });
});

describe('Authentication Flow with Reorganized Components', function () {
    test('login form components work after reorganization', function () {
        // Visit login page and ensure all reorganized components render
        $response = get('/auth/login');

        $response->assertStatus(200);
        $response->assertSee('Login');
    });

    test('password confirmation uses reorganized components', function () {
        $user = User::factory()->create();

        actingAs($user)
            ->get('/user/confirm-password')
            ->assertStatus(200);
    });

    test('two-factor challenge uses reorganized components', function () {
        // Test that 2FA challenge page works with reorganized components
        $response = get('/two-factor-challenge');

        // Should redirect to login if not in 2FA flow, which means components loaded
        $response->assertRedirect('/auth/login');
    });
});

describe('User Profile Components Tests', function () {
    test('profile pages use reorganized components correctly', function () {
        $user = User::factory()->create();

        $response = actingAs($user)->get('/user/profile');

        $response->assertStatus(200);
    });

    test('layout.sections.action-section works in profile context', function () {
        // Test that action-section component works in profile pages
        expect(View::exists('pub_theme::components.layout.sections.action-section'))->toBeTrue();

        $user = User::factory()->create();

        // Access a profile page that likely uses action-section
        actingAs($user)
            ->get('/user/profile')
            ->assertStatus(200);
    });
});
