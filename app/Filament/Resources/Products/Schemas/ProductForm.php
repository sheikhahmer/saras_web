<?php

namespace App\Filament\Resources\Products\Schemas;

use App\Models\Category;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(3)
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
                RichEditor::make('description')
                    ->default(null)
                    ->toolbarButtons([
                        'blockquote',
                        'bold',
                        'bulletList',
                        'codeBlock',
                        'h2',
                        'h3',
                        'italic',
                        'link',
                        'orderedList',
                        'redo',
                        'strike',
                        'underline',
                        'undo',
                    ])
                    ->columnSpanFull(),

                TextInput::make('price')
                    ->numeric()
                    ->default(null)
                    ->prefix('Rs')
                    ->hidden(fn ($get) => $get('has_offer') === true),

                Toggle::make('has_offer')
                    ->label('Has Offer')
                    ->reactive()
                    ->afterStateUpdated(function ($set, $get) {
                        if (!$get('has_offer')) {
                            $set('old_price', null);
                            $set('new_price', null);
                        }
                    }),

                TextInput::make('old_price')
                    ->numeric()
                    ->default(null)
                    ->prefix('Rs')
                    ->label('Old Price')
                    ->visible(fn ($get) => $get('has_offer') === true),

                TextInput::make('new_price')
                    ->numeric()
                    ->default(null)
                    ->prefix('Rs')
                    ->label('New Price')
                    ->visible(fn ($get) => $get('has_offer') === true),


                FileUpload::make('image')
                    ->image()
                    ->multiple()
                    ->directory('product')
                    ->columnSpanFull()
                    ->disk('public'),
            ]);
    }}
