<?php

namespace App\Filament\Resources\VegetableResource\Pages;

use App\Filament\Resources\VegetableResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageVegetables extends ManageRecords
{
    protected static string $resource = VegetableResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
