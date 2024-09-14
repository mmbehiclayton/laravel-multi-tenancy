<?php

namespace App\Filament\Resources\LearnerResource\Pages;

use App\Filament\Resources\LearnerResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateLearner extends CreateRecord
{
    protected static string $resource = LearnerResource::class;
}
