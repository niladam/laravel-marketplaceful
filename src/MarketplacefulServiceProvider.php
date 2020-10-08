<?php

namespace Marketplaceful;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;
use Livewire\Livewire;
use Marketplaceful\Console\InstallCommand;
use Marketplaceful\Http\Livewire\CreateListingForm;
use Marketplaceful\Http\Livewire\CreateTagForm;
use Marketplaceful\Http\Livewire\DeleteListingForm;
use Marketplaceful\Http\Livewire\DeleteTagForm;
use Marketplaceful\Http\Livewire\DeleteUserForm;
use Marketplaceful\Http\Livewire\ListingList;
use Marketplaceful\Http\Livewire\SuspendUserForm;
use Marketplaceful\Http\Livewire\TagList;
use Marketplaceful\Http\Livewire\UnSuspendUserForm;
use Marketplaceful\Http\Livewire\UpdateListingForm;
use Marketplaceful\Http\Livewire\UpdateTagForm;
use Marketplaceful\Http\Livewire\UpdateUserForm;
use Marketplaceful\Http\Livewire\UserList;

class MarketplacefulServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/marketplaceful.php', 'marketplaceful');

        $this->app->afterResolving(BladeCompiler::class, function () {
            Livewire::component('marketplaceful::tags.tag-list', TagList::class);
            Livewire::component('marketplaceful::tags.create-tag-form', CreateTagForm::class);
            Livewire::component('marketplaceful::tags.update-tag-form', UpdateTagForm::class);
            Livewire::component('marketplaceful::tags.delete-tag-form', DeleteTagForm::class);
            Livewire::component('marketplaceful::listings.listing-list', ListingList::class);
            Livewire::component('marketplaceful::listings.create-listing-form', CreateListingForm::class);
            Livewire::component('marketplaceful::listings.update-listing-form', UpdateListingForm::class);
            Livewire::component('marketplaceful::listings.delete-listing-form', DeleteListingForm::class);
            Livewire::component('marketplaceful::users.user-list', UserList::class);
            Livewire::component('marketplaceful::users.update-user-form', UpdateUserForm::class);
            Livewire::component('marketplaceful::users.delete-user-form', DeleteUserForm::class);
            Livewire::component('marketplaceful::users.suspend-user-form', SuspendUserForm::class);
            Livewire::component('marketplaceful::users.un-suspend-user-form', UnSuspendUserForm::class);
        });
    }

    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'marketplaceful');

        $this->configureComponents();
        $this->configurePublishing();
        $this->configureRoutes();
        $this->configureCommands();
    }

    protected function configureComponents()
    {
        $this->callAfterResolving(BladeCompiler::class, function () {
            $this->registerComponent('action-message');
            $this->registerComponent('action-section');
            $this->registerComponent('application-mark');
            $this->registerComponent('button-link');
            $this->registerComponent('button');
            $this->registerComponent('confirmation-modal');
            $this->registerComponent('danger-button');
            $this->registerComponent('dashboard-layout');
            $this->registerComponent('form-section');
            $this->registerComponent('input-error');
            $this->registerComponent('input');
            $this->registerComponent('label');
            $this->registerComponent('modal');
            $this->registerComponent('multiselect');
            $this->registerComponent('nav-link');
            $this->registerComponent('navbar');
            $this->registerComponent('page-header');
            $this->registerComponent('page-heading-with-actions');
            $this->registerComponent('responsive-nav-link');
            $this->registerComponent('role-badge');
            $this->registerComponent('secondary-button');
            $this->registerComponent('section-border');
            $this->registerComponent('section-title');
            $this->registerComponent('select');
            $this->registerComponent('textarea');
        });
    }

    protected function registerComponent(string $component)
    {
        Blade::component('marketplaceful::components.'.$component, 'mkt-'.$component);
    }

    protected function configurePublishing()
    {
        if (! $this->app->runningInConsole()) {
            return;
        }

        $this->publishes([
            __DIR__ . '/../config/marketplaceful.php' => config_path('marketplaceful.php'),
        ], 'marketplaceful-config');

        $this->publishes([
            __DIR__ . '/../resources/views' => base_path('resources/views/vendor/marketplaceful'),
        ], 'marketplaceful-views');

        $this->publishes([
            __DIR__.'/../database/migrations' => database_path('migrations'),
        ], 'marketplaceful-migrations');

        $this->publishes([
            __DIR__.'/../routes/web.php' => base_path('routes/marketplaceful.php'),
        ], 'marketplaceful-routes');

        $this->publishes([
            __DIR__.'/../resources/dist' => public_path('vendor/marketplaceful/dashboard'),
        ], 'marketplaceful-dashboard');
    }

    protected function configureRoutes()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
    }

    protected function configureCommands()
    {
        if (! $this->app->runningInConsole()) {
            return;
        }

        $this->commands([
            InstallCommand::class,
        ]);
    }
}
