<?php

namespace App\Filament\Pages;

use App\Models\User;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;
use Livewire\Livewire;

class ApiTokenManagerPage extends Page
{
    protected static string $view = 'filament.pages.api-token-manager';

    protected static ?string $navigationIcon = 'heroicon-o-key';

    protected static ?string $navigationGroup = 'Account';

    protected static ?int $navigationSort = 2;

    protected static ?string $title = 'API Tokens';

    public User $user;

    public function mount(): void
    {
        $this->user = Auth::user();
    }

    public function createApiToken(string $name, array $permissions): void
    {
        $this->user->createToken($name, $permissions);
        $this->notify('success', 'API token created successfully.');
    }

    public function deleteApiToken(string $name): void
    {
        $this->user->tokens()->where('name', $name)->first()->delete();
        $this->notify('success', 'API token deleted successfully.');
    }

    public function getHeading(): string
    {
        return static::$title;
    }

    public static function shouldRegisterNavigation(): bool
    {
        return true; //config('filament-jetstream.show_api_token_page');
    }
}
