<?php

namespace App\Filament\Pages;

use App\Settings\SocialSettings;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;
use Filament\Facades\Filament;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;
use Filament\Resources\Concerns\Translatable;

class Social
{
    use HasPageShield;
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static string $settings = SocialSettings::class;
    protected static ?int $navigationSort =-96  ;

    public static function shouldRegisterNavigation(): bool
    {
        $business = Filament::getTenant();
        if (!$business || !is_array($business->assign) || !array_key_exists('app_module', $business->assign)) {
            return false;
        }
        return $business->assign['app_module'] === true;
    }
    public function getTitle(): string
    {
        return __('Social Media Settings');
    }

    public static function getNavigationLabel(): string
    {
        return __('Social Media Settings');
    }

    /**
     * @return string|null
     */
    public static function getNavigationGroup(): ?string
    {
        return  __('General Settings');
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make(__('contact_us'))
                    ->columns(2)
                    ->schema([
                        TextInput::make('url')
                            ->label(__('website url'))
                            ->hint(__('https://aarluxe.ae'))
                            ->placeholder('https://aarluxe.ae')
                            ->prefixIcon('heroicon-o-globe-alt')
                            ->nullable(),
                        TextInput::make('phone')
                            ->label(__('phone'))
                            ->hint(__('phone'))
                            ->placeholder('Phone Number (e.g: 971--- --- ---)')
                            //    ->prefixIcon('fas-phone')
                            ->tel()
                            ->nullable(),
                        TextInput::make('whatsapp')
                            ->label(__('whatsapp'))
                            ->hint(__('phone'))
                            ->placeholder('Whatsapp Number (e.g: 971--- --- ---)')
                            // ->prefixIcon('fab-whatsapp')
                            ->tel()
                            ->nullable(),
                        TextInput::make('email')
                            ->label(__('email'))
                            ->hint(__('email'))
                            ->placeholder('Email (e.g: support@aarluxe.net')
                            //    ->prefixIcon('far-envelope')
                            ->email()
                            ->nullable(),
                    ]),

                Section::make(__('Social Media'))
                    ->columns(2)
                    ->schema([
                        TextInput::make('facebook')
                            ->label(__('facebook'))
                            ->hint(__('url'))
                            ->placeholder('Facebook Page (e.g: https://facebook.com/aarluxe')
                            //    ->prefixIcon('fab-facebook')
                            ->url()
                            ->nullable(),
                        TextInput::make('instagram')
                            ->label(__('instagram'))
                            ->hint(__('url'))
                            ->placeholder('Instagram Page (e.g: https://instagram.com/aarluxe')
                            //    ->prefixIcon('fab-instagram')
                            ->url()
                            ->nullable(),
                        TextInput::make('tiktok')
                            ->label(__('tiktok'))
                            ->hint(__('url'))
                            ->placeholder('Tiktok Page (e.g: https://tiktok.com/aarluxe')
                            //   ->prefixIcon('fab-tiktok')
                            ->url()
                            ->nullable(),
                        TextInput::make('snapchat')
                            ->label(__('snapchat'))
                            ->hint(__('url'))
                            ->placeholder('Snapchat Page (e.g: https://snapchat.com/aarluxe')
                            //   ->prefixIcon('fab-snapchat')
                            ->url()
                            ->nullable(),
                        TextInput::make('twitter')
                            ->label(__('twitter'))
                            ->hint(__('url'))
                            ->placeholder('X (aka. Twitter) Page (e.g: https://twitter.com/aarluxe')
                            //    ->prefixIcon('fab-x-twitter')
                            ->url()
                            ->nullable(),
                        TextInput::make('youtube')
                            ->label(__('youtube'))
                            ->hint(__('url'))
                            ->placeholder('Youtube Page (e.g: https://youtube.com/aarluxe')
                            //   ->prefixIcon('fab-youtube')
                            ->url()
                            ->nullable(),
                        TextInput::make('linkedin')
                            ->label(__('linkedin'))
                            ->hint(__('url'))
                            ->placeholder('LinkedIn Page (e.g: https://linkedin.com/aarluxe')
                            //   ->prefixIcon('fab-linkedin')
                            ->url()
                            ->nullable(),
                    ]),
            ]);

    }
}
