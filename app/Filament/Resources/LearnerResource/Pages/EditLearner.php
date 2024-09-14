<?php

namespace App\Filament\Resources\LearnerResource\Pages;

use App\Filament\Resources\LearnerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLearner extends EditRecord
{
    protected static string $resource = LearnerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
