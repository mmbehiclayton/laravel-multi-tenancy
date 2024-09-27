<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LearnerResource\Pages;
use App\Models\Learner;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Table;

class LearnerResource extends Resource
{
    protected static ?string $model = Learner::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required(),
                Select::make('gender')
                    ->options([
                        'male' => 'Male',
                        'female' => 'Female',
                    ])
                    ->required(),
                TextInput::make('birth_certificate_number')->unique()->required(),
                DatePicker::make('date_of_birth')->required(),
                Select::make('status')
                    ->options([
                        'active' => 'Active',
                        'inactive' => 'Inactive',
                        'suspended' => 'Suspended',
                    ])
                    ->default('active')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Name')->sortable()->searchable(),
                TextColumn::make('gender')->label('Gender')->sortable(),
                TextColumn::make('birth_certificate_number')->label('Birth Certificate Number')->sortable(),
                TextColumn::make('date_of_birth')->label('Date of Birth')->date(),
                TextColumn::make('status')
                    ->badge()                    
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListLearners::route('/'),
            'create' => Pages\CreateLearner::route('/create'),
            'edit' => Pages\EditLearner::route('/{record}/edit'),
        ];
    }
}
