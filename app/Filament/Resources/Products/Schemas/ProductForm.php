<?php

namespace App\Filament\Resources\Products\Schemas;

use App\Models\Category;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('category_id')
                    ->label('Category')
                    ->options(Category::all()->pluck('name', 'id')->toArray())
                    ->required()
                    ->searchable()
                    ->placeholder('Select a category'),
                Select::make('is_featured')
                    ->label('Product Status')
                    ->options([
                        'best_seller' => 'Best Seller',
                        'new_arrival' => 'New Arrival',
                        'featured' => 'Featured',
                    ])
                    ->required()
                    ->searchable()
                    ->placeholder('Select status'),
                TextInput::make('title')
                    ->default(null),
                Textarea::make('description')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('price')
                    ->numeric()
                    ->default(null)
                    ->prefix('Rs'),
                FileUpload::make('image')
                    ->image()
                    ->multiple()
                    ->directory('product')
                    ->disk('public'),
            ]);
    }
}
