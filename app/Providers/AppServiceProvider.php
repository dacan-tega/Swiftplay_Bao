<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Illuminate\Pagination\Paginator;
use App\Models\Setting;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // dd(config('app.providers'));
        // dd(url()->current());
        if ($this->app->environment('production')) {
            $this->app['request']->server->set('HTTPS', true);
        }
        // $aa = url()->current();
        // $bb = config('app.providers');
        // // if (!strpos($aa,"admin") || strpos($aa,"livewire")) {
        // if (!strpos($aa, "api")) {
        //     $this->app->register(
        //         \App\Providers\Filament\AdminPanelProvider::class,
        //     );
        //     $this->app->register(
        //         \App\Providers\SettingServiceProvider::class,
        //     );
        //     // unset($cars[1]);
        //     // dd($this->app);
        //     // dd($this->app);
        // }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // $setting = Setting::first();
        // if ($setting) {
        //     $language = $setting->language;
        //     app()->setLocale($language);    
        // }    


        Paginator::useBootstrapFive();
        Schema::defaultStringLength(191);

        Builder::macro('whereLike', function ($attributes, string $searchTerm) {
            $this->where(function (Builder $query) use ($attributes, $searchTerm) {
                foreach (Arr::wrap($attributes) as $attribute) {
                    $query->when(
                        str_contains($attribute, '.'),
                        function (Builder $query) use ($attribute, $searchTerm) {
                            $buffer = explode('.', $attribute);
                            $attributeField = array_pop($buffer);
                            $relationPath = implode('.', $buffer);
                            $query->orWhereHas($relationPath, function (Builder $query) use ($attributeField, $searchTerm) {
                                $query->where($attributeField, 'LIKE', "%{$searchTerm}%");
                            });
                        },
                        function (Builder $query) use ($attribute, $searchTerm) {
                            $query->orWhere($attribute, 'LIKE', "%{$searchTerm}%");
                        }
                    );
                }
            });
            return $this;
        });
    }
}
