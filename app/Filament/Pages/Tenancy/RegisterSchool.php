<?php 
namespace App\Filament\Pages\Tenancy;
 
use App\Models\School;
use App\Models\User;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Tenancy\RegisterTenant;

class RegisterSchool extends RegisterTenant
{
    public static function getLabel(): string
    {
        return 'Register school';
    }
 
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name'),

                TextInput::make('slug'),
                // ...
            ]);
    }
 
    protected function handleRegistration(array $data): School
    {
        $school = School::create($data);

        $school->users()->attach(auth()->user()); 
 
        return $school;
    }
}