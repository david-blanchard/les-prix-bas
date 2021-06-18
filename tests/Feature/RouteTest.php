<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class RouteTest extends TestCase
{
    // use RefreshDatabase;

    /**
     * Test Mode Femme page
     *
     * @return void
     */
    public function test_modeFemmePage()
    {
        $response = $this->get('/mode-femme/');

        $response->assertStatus(200);
    }

   /**
     * Test Mode Femme page
     *
     * @return void
     */
    public function test_modeFemmePageWithValidSlugVesteOneOfThree()
    {
        $response = $this->get('/mode-femme/veste');

        $response->assertStatus(200);
    }

    public function test_modeFemmePageWithValidSlugRobeTwoOfThree()
    {
        $response = $this->get('/mode-femme/robe');

        $response->assertStatus(200);
    }

    public function test_modeFemmePageWithValidSlugMailleThreeOfThree()
    {
        $response = $this->get('/mode-femme/maille');

        $response->assertStatus(200);
    }

    public function test_modeFemmePageWithInvalidSlugPantalon()
    {
        $response = $this->get('/mode-femme/pantalon');

        $response->assertStatus(200);
    }

    /**
     * Test Admin UI access with simple user role
     *
     * @return void
     */
    public function test_adminUiRedirectToLoginAsGuest()
    {
        $response = $this->get('/admin/products');

        $response->assertRedirect('/login');
    }

    /**
     * Test Admin UI access with simple user role
     *
     * @return void
     */
    public function test_adminUiRequestAsAdmin()
    {
        // $this->createAdmin();

        $admin = Auth::loginUsingId(1);
        $this->actingAs($admin);
        $response = $this->get('/admin/');

        $response->assertStatus(200);
    }

        /**
     * Test Admin UI access with simple user role
     *
     * @return void
     */
    public function test_adminUiEditProductOne()
    {
        // $this->createAdmin();

        $admin = Auth::loginUsingId(1);
        $this->actingAs($admin);
        $response = $this->get('/admin/products/1/edit');
        $response->assertStatus(200);
    }

}
