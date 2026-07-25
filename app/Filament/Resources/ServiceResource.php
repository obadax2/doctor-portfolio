<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Models\Service;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-beaker';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Service Details')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->translatable(),
                        Forms\Components\Select::make('category')
                            ->options([
                                'Diagnosis' => 'Diagnosis',
                                'Treatment' => 'Treatment',
                                'Specialized Care' => 'Specialized Care',
                                'Preventative' => 'Preventative',
                            ])
                            ->required()
                            ->translatable(),
                        Forms\Components\TextInput::make('icon')
                            ->label('Material Icon Name')
                            ->helperText('e.g. monitor_heart, neurology, stethoscope')
                            ->maxLength(255),
                        Forms\Components\Textarea::make('description')
                            ->rows(3)
                            ->required()
                            ->translatable(),
                        Forms\Components\Textarea::make('long_description')
                            ->label('Full Description')
                            ->rows(5)
                            ->translatable(),
                        Forms\Components\FileUpload::make('image')
                            ->image()
                            ->directory('services'),
                        Forms\Components\Repeater::make('highlights')
                            ->schema([
                                Forms\Components\Textarea::make('highlight')
                                    ->rows(2),
                            ])
                            ->label('Key Highlights')
                            ->defaultItems(0)
                            ->collapsible()
                            ->translatable(),
                    ])->columns(2),

                Forms\Components\Section::make('Visibility')
                    ->schema([
                        Forms\Components\Toggle::make('is_active')
                            ->label('Active')
                            ->default(true),
                        Forms\Components\TextInput::make('sort_order')
                            ->label('Sort Order')
                            ->numeric()
                            ->default(0),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->reorderable('sort_order')
            ->defaultSort('sort_order')
            ->columns([
                Tables\Columns\TextColumn::make('title')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('category')->badge()->sortable(),
                Tables\Columns\IconColumn::make('is_active')->boolean()->sortable(),
                Tables\Columns\TextColumn::make('sort_order')->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->options([
                        'Diagnosis' => 'Diagnosis',
                        'Treatment' => 'Treatment',
                        'Specialized Care' => 'Specialized Care',
                        'Preventative' => 'Preventative',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
