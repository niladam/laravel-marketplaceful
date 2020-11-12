<?php

namespace Marketplaceful;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;
use Livewire\Livewire;
use Marketplaceful\Actions\CreateTag;
use Marketplaceful\Console\InstallCommand;
use Marketplaceful\Console\MakeUser;
use Marketplaceful\Http\Livewire\Listings\CreateListing;
use Marketplaceful\Http\Livewire\Listings\CreateListingForm;
use Marketplaceful\Http\Livewire\Listings\DeleteListingForm;
use Marketplaceful\Http\Livewire\Listings\PublishListingForm;
use Marketplaceful\Http\Livewire\Listings\ShowListing;
use Marketplaceful\Http\Livewire\Listings\ShowListings;
use Marketplaceful\Http\Livewire\Listings\UnPublishListingForm;
use Marketplaceful\Http\Livewire\Listings\UpdateListingForm;
use Marketplaceful\Http\Livewire\Listings\UpdateListingSettingsForm;
use Marketplaceful\Http\Livewire\Tags\CreateTagForm;
use Marketplaceful\Http\Livewire\Tags\DeleteTagForm;
use Marketplaceful\Http\Livewire\Tags\ShowTag;
use Marketplaceful\Http\Livewire\Tags\ShowTags;
use Marketplaceful\Http\Livewire\Tags\UpdateTagForm;
use Marketplaceful\Http\Livewire\Users\DeleteUserForm;
use Marketplaceful\Http\Livewire\Users\ShowUser;
use Marketplaceful\Http\Livewire\Users\ShowUsers;
use Marketplaceful\Http\Livewire\Users\SuspendUserForm;
use Marketplaceful\Http\Livewire\Users\UnSuspendUserForm;
use Marketplaceful\Http\Livewire\Users\UpdateUserForm;
use Marketplaceful\Http\Livewire\Users\UserList;
use Marketplaceful\Models\Listing;
use Marketplaceful\Policies\ListingPolicy;

class MarketplacefulServiceProvider extends ServiceProvider
{
    protected $policies = [
        Listing::class => ListingPolicy::class,
    ];

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/marketplaceful.php', 'marketplaceful');

        $this->app->afterResolving(BladeCompiler::class, function () {
            Livewire::component('marketplaceful::tags.show-tags', ShowTags::class);
            Livewire::component('marketplaceful::tags.create-tag', CreateTag::class);
            Livewire::component('marketplaceful::tags.create-tag-form', CreateTagForm::class);
            Livewire::component('marketplaceful::tags.show-tag', ShowTag::class);
            Livewire::component('marketplaceful::tags.update-tag-form', UpdateTagForm::class);
            Livewire::component('marketplaceful::tags.delete-tag-form', DeleteTagForm::class);

            Livewire::component('marketplaceful::listings.create-listing-form', CreateListingForm::class);
            Livewire::component('marketplaceful::listings.update-listing-form', UpdateListingForm::class);
            Livewire::component('marketplaceful::listings.update-listing-settings-form', UpdateListingSettingsForm::class);
            Livewire::component('marketplaceful::listings.publish-listing-form', PublishListingForm::class);
            Livewire::component('marketplaceful::listings.un-publish-listing-form', UnPublishListingForm::class);
            Livewire::component('marketplaceful::listings.delete-listing-form', DeleteListingForm::class);
            Livewire::component('marketplaceful::listings.show-listings', ShowListings::class);
            Livewire::component('marketplaceful::listings.show-listing', ShowListing::class);
            Livewire::component('marketplaceful::listings.create-listing', CreateListing::class);

            Livewire::component('marketplaceful::users.user-list', UserList::class);
            Livewire::component('marketplaceful::users.update-user-form', UpdateUserForm::class);
            Livewire::component('marketplaceful::users.delete-user-form', DeleteUserForm::class);
            Livewire::component('marketplaceful::users.suspend-user-form', SuspendUserForm::class);
            Livewire::component('marketplaceful::users.un-suspend-user-form', UnSuspendUserForm::class);
            Livewire::component('marketplaceful::users.show-user', ShowUser::class);
            Livewire::component('marketplaceful::users.show-users', ShowUsers::class);
        });
    }

    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'marketplaceful');

        $this->configureComponents();
        $this->configurePublishing();
        $this->configureRoutes();
        $this->configureCommands();
        $this->configureGate();
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
            $this->registerComponent('status-badge');

            $this->registerComponent('table');
            $this->registerComponent('table.cell');
            $this->registerComponent('table.heading');
            $this->registerComponent('table.row');

            $this->registerComponent('dropdown');
            $this->registerComponent('dropdown.link');

            $this->registerComponent('icon.cog');

            $this->registerComponent('button.secondary');

            $this->registerComponent('input.checkbox');
            $this->registerComponent('input.filepond');

            Blade::component(\Marketplaceful\View\Components\Layouts\Base::class, 'mkt-layouts.base');
            Blade::component(\Marketplaceful\View\Components\Layouts\Dashboard::class, 'mkt-layouts.dashboard');
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
            MakeUser::class,
        ]);
    }

    protected function configureGate()
    {
        Gate::define('viewMarketplaceful', fn ($user = null) => app()->environment('local'));
    }
}
