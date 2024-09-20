<?php

namespace App\Providers;

use App\Models\Answer;
use App\Policies\AnswerPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('update-question', function($user, $question){
            return $user->id === $question->user_id;
        });

        Gate::define('delete-question', function($user, $question){
            return $user->id === $question->user_id;
        });

        Gate::define('update-answer', function($user, $answer){
            return $user->id === $answer->user_id;
        });

        Gate::define('delete-answer', function($user, $answer){
            return $user->id === $answer->user_id;
        });
    }
}
