<?php

namespace App\Filament\Resources\LearnerResource\Pages;

use App\Filament\Resources\LearnerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLearners extends ListRecords
{
    protected static string $resource = LearnerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
