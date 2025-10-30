<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubscribeResource\Pages;
use App\Filament\Resources\SubscribeResource\RelationManagers;

use App\Models\SubscribeUs;
use AQuadic\CommonTraits\Filament\FilamentCountBadgeResource;
use AQuadic\CommonTraits\Filament\FilamentTranslatedLabelResource;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SubscribeResource extends Resource
{
    use  FilamentCountBadgeResource, FilamentTranslatedLabelResource;

    protected static ?int $navigationSort = 80;
    protected static ?string $model = SubscribeUs::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationGroup(): ?string
    {
        return __('Marketing');
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                TextEntry::make('phone')->visible(fn($record) => $record->email ? 0 : 1)->translateLabel(),
                TextEntry::make('email')->visible(fn($record) => $record->phone ? 0 : 1)->translateLabel(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('email')->translateLabel(),
                Tables\Columns\TextColumn::make('phone')->translateLabel(),
                Tables\Columns\TextColumn::make('created_at')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->dateTime()
                    ->dateTimeTooltip(fn($state) => $state)
                    ->translateLabel()
                    ->description(fn($state) => $state ? $state->diffForHumans() : null)
                ,
            ])
            ->filters([
                //
            ])
            ->actions([
//                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSubscribes::route('/'),
//            'create' => Pages\CreateSubscribe::route('/create'),
//            'edit' => Pages\EditSubscr ibe::route('/{record}/edit'),
            'view' => Pages\ViewSubscribe::route('/{record}'),
        ];
    }
}
