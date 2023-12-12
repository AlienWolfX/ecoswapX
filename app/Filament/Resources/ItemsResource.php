<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Items;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ItemsResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ItemsResource\RelationManagers;
use Tapp\FilamentAuditing\RelationManagers\AuditsRelationManager;

class ItemsResource extends Resource
{
    protected static ?string $model = Items::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required(),
                Forms\Components\TextInput::make('description')
                ->required()
                ->maxLength(255)
                ->columnSpan('full'),
                Forms\Components\TextInput::make('category')->required(),
                Forms\Components\TextInput::make('condition')->required(),
                Forms\Components\TextInput::make('swap_for_item')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\TextColumn::make('category'),
                Tables\Columns\TextColumn::make('condition'),
                Tables\Columns\TextColumn::make('swap_for_item'),
            ])
            ->filters([

            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            AuditsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListItems::route('/'),
            'create' => Pages\CreateItems::route('/create'),
            'edit' => Pages\EditItems::route('/{record}/edit'),
        ];
    }
}
