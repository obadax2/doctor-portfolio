<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProfileResource\Pages;
use App\Models\Profile;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProfileResource extends Resource
{
    protected static ?string $model = Profile::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $navigationLabel = 'Doctor Profile';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Basic Info')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('title')
                            ->maxLength(255),
                        Forms\Components\Textarea::make('bio')
                            ->rows(4),
                        Forms\Components\FileUpload::make('image')
                            ->image()
                            ->directory('profile'),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('phone')
                            ->maxLength(255),
                    ])->columns(2),

                Forms\Components\Section::make('Qualifications')
                    ->schema([
                        Forms\Components\Textarea::make('qualifications')
                            ->rows(3),
                        Forms\Components\Textarea::make('experience')
                            ->rows(3),
                    ])->columns(2),

                Forms\Components\Section::make('Education')
                    ->schema([
                        Forms\Components\Repeater::make('education')
                            ->schema([
                                Forms\Components\TextInput::make('period')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('degree')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('school')
                                    ->maxLength(255),
                            ])
                            ->defaultItems(0)
                            ->collapsible(),
                    ]),

                Forms\Components\Section::make('Credentials')
                    ->schema([
                        Forms\Components\Repeater::make('credentials')
                            ->schema([
                                Forms\Components\TextInput::make('icon')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('title')
                                    ->maxLength(255),
                                Forms\Components\Textarea::make('description')
                                    ->rows(2),
                            ])
                            ->defaultItems(0)
                            ->collapsible(),
                    ]),

                Forms\Components\Section::make('Expertise')
                    ->schema([
                        Forms\Components\Repeater::make('expertise')
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->maxLength(255),
                                Forms\Components\Textarea::make('description')
                                    ->rows(2),
                            ])
                            ->defaultItems(0)
                            ->collapsible(),
                        Forms\Components\TagsInput::make('expertise_tags'),
                    ]),

                Forms\Components\Section::make('Stats')
                    ->schema([
                        Forms\Components\Repeater::make('stats')
                            ->schema([
                                Forms\Components\TextInput::make('value')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('label')
                                    ->maxLength(255),
                            ])
                            ->defaultItems(3)
                            ->collapsible(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\ImageColumn::make('image')->circular(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProfiles::route('/'),
            'create' => Pages\CreateProfile::route('/create'),
            'edit' => Pages\EditProfile::route('/{record}/edit'),
        ];
    }
}