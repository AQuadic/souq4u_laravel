<?php

namespace App\Filament\Pages;

use App\Settings\StoreSettings as Settings;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;
use Dotswan\MapPicker\Fields\Map;
use Filament\Facades\Filament;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Pages\SettingsPage;
use Illuminate\Database\Eloquent\Model;
use MatanYadaev\EloquentSpatial\Objects\Point;
use Modules\Address\Models\Area;
use Modules\Address\Models\City;
use Modules\Address\Models\Country;

class StoreSettings extends SettingsPage
{
    use HasPageShield;
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static string $settings = Settings::class;
    protected static ?int $navigationSort =-96  ;


    public function getTitle(): string
    {
        return __('Settings');
    }

    public static function getNavigationLabel(): string
    {
        return __('Settings');
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
//                        TextInput::make('url')
//                            ->label(__('website url'))
//                            ->hint(__('https://souq4u.com'))
//                            ->placeholder('https://souq4u.com')
//                            ->prefixIcon('heroicon-o-globe-alt')
//                            ->nullable(),
                        Textarea::make('slogan')
                            ->translateLabel()
                            ->nullable(),

                        TextInput::make('phone')
                            ->label(__('phone'))
                            ->hint(__('phone'))
                            ->placeholder('Phone Number (e.g: 971--- --- ---)')
                            //    ->prefixIcon('fas-phone')
                            ->tel()
                            ->nullable(),
                        TextInput::make('subscription_pop_up_duration')
                            ->translateLabel()
                            ->placeholder(__('In seconds'))
                            ->numeric()
                            ->nullable(),
                        TextInput::make('email')
                            ->label(__('email'))
                            ->hint(__('email'))
                            ->placeholder('Email (e.g: support@souq4u.net')
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
                            ->placeholder('Facebook Page (e.g: https://facebook.com/souq4u')
                            //    ->prefixIcon('fab-facebook')
                            ->url()
                            ->nullable(),
                        TextInput::make('instagram')
                            ->label(__('instagram'))
                            ->hint(__('url'))
                            ->placeholder('Instagram Page (e.g: https://instagram.com/souq4u')
                            //    ->prefixIcon('fab-instagram')
                            ->url()
                            ->nullable(),
                        TextInput::make('tiktok')
                            ->label(__('tiktok'))
                            ->hint(__('url'))
                            ->placeholder('Tiktok Page (e.g: https://tiktok.com/souq4u')
                            //   ->prefixIcon('fab-tiktok')
                            ->url()
                            ->nullable(),
                        TextInput::make('snapchat')
                            ->label(__('snapchat'))
                            ->hint(__('url'))
                            ->placeholder('Snapchat Page (e.g: https://snapchat.com/souq4u')
                            //   ->prefixIcon('fab-snapchat')
                            ->url()
                            ->nullable(),
                        TextInput::make('twitter')
                            ->label(__('twitter'))
                            ->hint(__('url'))
                            ->placeholder('X (aka. Twitter) Page (e.g: https://twitter.com/souq4u')
                            //    ->prefixIcon('fab-x-twitter')
                            ->url()
                            ->nullable(),
                        TextInput::make('youtube')
                            ->label(__('youtube'))
                            ->hint(__('url'))
                            ->placeholder('Youtube Page (e.g: https://youtube.com/souq4u')
                            //   ->prefixIcon('fab-youtube')
                            ->url()
                            ->nullable(),
                        TextInput::make('linkedin')
                            ->label(__('linkedin'))
                            ->hint(__('url'))
                            ->placeholder('LinkedIn Page (e.g: https://linkedin.com/souq4u')
                            //   ->prefixIcon('fab-linkedin')
                            ->url()
                            ->nullable(),

                        Select::make('country_id')
                            ->label(__('Country'))
                            ->searchable()
                            ->forceSearchCaseInsensitive()
                            ->options(Country::all()->pluck('name', 'id')->toArray())
                            ->live()
                            ->afterStateUpdated(fn(callable $set) => $set('city_id', null) && $set('area_id', null)),

                        Select::make('city_id')
                            ->label(__('City'))
                            ->searchable()
                            ->forceSearchCaseInsensitive()
                            ->options(function (callable $get) {
                                $countryId = $get('country_id');
                                if (!$countryId) {
                                    return [];
                                }
                                return City::where('country_id', $countryId)->pluck('name', 'id')->toArray();
                            })
                            ->live()
                            ->disabled(fn(callable $get) => $get('country_id') === null),



                        Textarea::make('details')
                            ->translateLabel()
                            ->columnSpanFull(),


                        Map::make('location')
                            ->translateLabel()
                            ->live()
                            ->draggable(true)
                            ->showMarker()
                            ->clickable(true)
                            ->zoom(10)
                            ->minZoom(0)
                            ->maxZoom(28)
                            ->columnSpanFull()
                            ->defaultLocation(latitude: 29.98105, longitude: 31.116061)
                            ->dehydrateStateUsing(function (?array $state) {
                                if (isset($state['lat']) && isset($state['lng'])) {
                                    return ['lat' => $state['lat'], 'lng' => $state['lng']];

                                }
                                return null;
                            })
                            ->afterStateHydrated(function ($state, ?Model $record, Set $set) {
                                if ($record && $record->location) {
                                    $set('location', [
                                        'lat' => $record->location->latitude,
                                        'lng' => $record->location->longitude
                                    ]);
                                }
                            })
                            ->showFullscreenControl(true)
                            ->showZoomControl(true)
                            ->setColor('#3388ff')
                            ->setFilledColor('#cad9ec')
                            ->snappable(true, 20)
                            ->detectRetina(true)
//                        ->afterStateUpdated(function (Forms\Set $set, Forms\Get $get,$livewire) {
//                            $set('address_lat', $get('location.lat'));
//                            $set('address_lng', $get('location.lng'));
//                            $livewire->dispatch('refreshMap');
//                        })
                        ,


                    ]),
            ]);

    }
}
