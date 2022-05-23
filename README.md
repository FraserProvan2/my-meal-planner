# MyMeals
Weekly meal planner to store cooking steps and create accurate shopping lists, built in Laravel 8 and Vue.js.

## Features

Save and organise meals to be included in the Meal Plan.
![ScreenShot](/showcases/meal-list.png)

View meal, specify which meal slots the meal will appear in. You can click through to here from the Meal Plan so its recommended to add high quality data to steps for when its time to cook.
![ScreenShot](/showcases/meal-view.png)

Randomly create Meal Plans based on your created meals.
![ScreenShot](/showcases/plan.png)

Tweaks your Template to fit your schedule, going into the office one day? Parents for a roast? Disable the meal slots accordingly. 
![ScreenShot](/showcases/plan-template.png)

View the total ingredients you will need for your Meal Plan, it calculates this from your Meals, so be accurate.
![ScreenShot](/showcases/shopping-list.png)

## Getting Started
#### Install Composer/Dependencies with (In Order):
1. `composer install`
2. `npm install`

#### Local Server Commands:
- Start: `./vendor/bin/sail up` (http://localhost)
- Stop: `./vendor/bin/sail down`

## Common Development Commands:
#### SCSS/JS Compiling:
- Build: `npm run dev` 
- Watch: `npm run watch`

#### Tests:
- `php artisan test`
