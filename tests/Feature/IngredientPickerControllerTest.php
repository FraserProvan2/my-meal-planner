<?php

namespace Tests\Feature;

use App\Models\MealHasIngredient;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IngredientPickerControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function get_ingredients_returns_ingredients()
    {
        $this->seedDatabase();
        $this->actingAs(User::find(1))->assertAuthenticated();

        $content = $this->get('/ingredient-picker')
            ->assertStatus(200)
            ->decodeResponseJson();

        $content->assertCount(4);
    }

    /** @test */
    public function get_meals_ingredients_returns_ingredients()
    {
        $this->seedDatabase();
        $this->actingAs(User::find(1))->assertAuthenticated();

        $content = $this->get('/meals-ingredients/1')
            ->assertStatus(200)
            ->decodeResponseJson();

        $content->assertCount(4);
    }

    /** @test */
    public function author_can_add_ingredient()
    {
        $this->seedDatabase();
        $this->actingAs(User::find(1))->assertAuthenticated();

        $data = [
            'meal_id' => 1,
            'ingredient_id' => 1,
            'qty' => 1
        ];
        $this->post('/ingredient-picker/add', $data)
            ->assertSee('Ingredient Added')
            ->assertStatus(201);

        $this->assertDatabaseHas('meal_has_ingredients', $data);
    }

    /** @test */
    public function non_author_can_add_ingredient()
    {
        $this->seedDatabase();
        $this->actingAs(User::find(2))->assertAuthenticated();

        $data = [
            'meal_id' => 1,
            'ingredient_id' => 1,
            'qty' => 1
        ];

        // User#2 is not author of Meal#1
        $this->post('/ingredient-picker/add', $data)
            ->assertStatus(302);

        $this->assertDatabaseMissing('meal_has_ingredients', $data);
    }

    /** @test */
    public function author_can_remove_ingredient()
    {
        $this->seedDatabase();
        $this->actingAs(User::find(1))->assertAuthenticated();

        $meal_has_ingredient = new MealHasIngredient();
        $meal_has_ingredient->meal_id = '1';
        $meal_has_ingredient->ingredient_id = '1';
        $meal_has_ingredient->qty = '1';
        $meal_has_ingredient->save();

        $this->post('/ingredient-picker/remove', [
            'meal_id' => 1,
            'ingredient_id' => 1,
            'link_id' => 12
        ])
            ->assertSee('Ingredient Removed')
            ->assertStatus(200);

        $this->assertDatabaseMissing('meal_has_ingredients', [
            'id' => 12,
            'meal_id' => 1,
            'ingredient_id' => 1
        ]);
    }

    /** @test */
    public function non_author_cant_remove_ingredient()
    {
        $this->seedDatabase();
        $this->actingAs(User::find(2))->assertAuthenticated();

        $meal_has_ingredient = new MealHasIngredient();
        $meal_has_ingredient->meal_id = '1';
        $meal_has_ingredient->ingredient_id = '1';
        $meal_has_ingredient->qty = '1';
        $meal_has_ingredient->save();

        // User#2 is not author of Meal#1
        $this->post('/ingredient-picker/remove', [
            'meal_id' => 1,
            'ingredient_id' => 1,
            'link_id' => 12
        ])
            ->assertDontSee('Ingredient Removed')
            ->assertStatus(302);

        $this->assertDatabaseHas('meal_has_ingredients', [
            'id' => 12,
            'meal_id' => 1,
            'ingredient_id' => 1
        ]);
    }
}
