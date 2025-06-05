<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JokeResource\Pages;
use App\Filament\Resources\JokeResource\RelationManagers;
use App\Models\Joke;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JokeResource extends Resource
{
    protected static ?string $model = Joke::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('setup')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('punchline')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('type')
                    ->options([
                        'dark' => 'Dark',
                        'programming' => 'Programming',
                        'dad' => 'Dad',
                        'anti-humor' => 'Anti-humor',
                        'pun' => 'Pun',
                    ])
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('setup'),
                Tables\Columns\TextColumn::make('punchline'),
                Tables\Columns\TextColumn::make('type'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListJokes::route('/'),
            'create' => Pages\CreateJoke::route('/create'),
            'edit' => Pages\EditJoke::route('/{record}/edit'),
        ];
    }
}
