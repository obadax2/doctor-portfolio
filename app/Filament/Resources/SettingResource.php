<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Settings')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('General')
                            ->schema([
                                Forms\Components\TextInput::make('clinic_name')
                                    ->label('Clinic Name')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('tagline')
                                    ->maxLength(255),
                                Forms\Components\Textarea::make('description')
                                    ->rows(3),
                                Forms\Components\TextInput::make('hero_title')
                                    ->label('Hero Title')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('hero_subtitle')
                                    ->label('Hero Subtitle')
                                    ->maxLength(255),
                                Forms\Components\FileUpload::make('hero_image')
                                    ->image()
                                    ->directory('settings'),
                                Forms\Components\FileUpload::make('clinic_image')
                                    ->image()
                                    ->directory('settings'),
                                Forms\Components\Repeater::make('patient_images')
                                    ->schema([
                                        Forms\Components\FileUpload::make('image')
                                            ->image()
                                            ->directory('settings'),
                                    ])
                                    ->defaultItems(0)
                                    ->collapsible(),
                            ]),
                        Forms\Components\Tabs\Tab::make('Contact')
                            ->schema([
                                Forms\Components\TextInput::make('phone')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('email')
                                    ->email()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('emergency')
                                    ->label('Emergency Phone')
                                    ->maxLength(255),
                                Forms\Components\Textarea::make('address')
                                    ->rows(3),
                                Forms\Components\TextInput::make('whatsapp')
                                    ->label('WhatsApp Link')
                                    ->maxLength(255),
                            ])->columns(2),
                        Forms\Components\Tabs\Tab::make('Social')
                            ->schema([
                                Forms\Components\TextInput::make('facebook')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('instagram')
                                    ->maxLength(255),
                            ])->columns(2),
                        Forms\Components\Tabs\Tab::make('Stats & Hours')
                            ->schema([
                                Forms\Components\Repeater::make('stats')
                                    ->schema([
                                        Forms\Components\TextInput::make('value')
                                            ->maxLength(255),
                                        Forms\Components\TextInput::make('label')
                                            ->maxLength(255),
                                    ])
                                    ->defaultItems(4)
                                    ->collapsible(),
                                Forms\Components\Repeater::make('hours')
                                    ->schema([
                                        Forms\Components\TextInput::make('day')
                                            ->maxLength(255),
                                        Forms\Components\TextInput::make('hours')
                                            ->maxLength(255),
                                    ])
                                    ->defaultItems(7)
                                    ->collapsible(),
                                Forms\Components\Repeater::make('features')
                                    ->schema([
                                        Forms\Components\Textarea::make('feature')
                                            ->rows(2),
                                    ])
                                    ->defaultItems(3)
                                    ->collapsible(),
                            ]),
                        Forms\Components\Tabs\Tab::make('About Page')
                            ->schema([
                                Forms\Components\Repeater::make('about_story')
                                    ->schema([
                                        Forms\Components\Textarea::make('paragraph')
                                            ->rows(3),
                                    ])
                                    ->label('Story Paragraphs')
                                    ->defaultItems(2)
                                    ->collapsible(),
                                Forms\Components\TextInput::make('about_established')
                                    ->label('Established Year')
                                    ->numeric(),
                                Forms\Components\Grid::make()
                                    ->schema([
                                        Forms\Components\TextInput::make('about_mission.title')
                                            ->label('Mission Title'),
                                        Forms\Components\Textarea::make('about_mission.description')
                                            ->label('Mission Description')
                                            ->rows(2),
                                        Forms\Components\TextInput::make('about_vision.title')
                                            ->label('Vision Title'),
                                        Forms\Components\Textarea::make('about_vision.description')
                                            ->label('Vision Description')
                                            ->rows(2),
                                        Forms\Components\TextInput::make('about_values.title')
                                            ->label('Values Title'),
                                        Forms\Components\Textarea::make('about_values.description')
                                            ->label('Values Description')
                                            ->rows(2),
                                    ])->columns(2),
                            ]),
                    ])->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('clinic_name')->label('Clinic Name'),
                Tables\Columns\TextColumn::make('phone'),
                Tables\Columns\TextColumn::make('email'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSettings::route('/'),
            'create' => Pages\CreateSetting::route('/create'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }
}