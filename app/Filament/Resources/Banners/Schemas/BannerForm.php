<?php

namespace App\Filament\Resources\Banners\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BannerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->default(null),
            ]);
    }
}
