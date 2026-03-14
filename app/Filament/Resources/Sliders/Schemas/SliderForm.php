<?php

namespace App\Filament\Resources\Sliders\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SliderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->default(null),
                FileUpload::make('image')
                    ->image()
                    ->directory('slider')
                    ->disk('public'),
                TextInput::make('hashtag')
                            ->default(null),
                    ]);
    }
}
