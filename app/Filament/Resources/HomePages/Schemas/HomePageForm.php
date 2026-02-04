<?php

namespace App\Filament\Resources\HomePages\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class HomePageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('المحتوى الرئيسي')
                    ->schema([
                        TextInput::make('main_title')
                            ->label('العنوان الرئيسي')
                            ->required()
                            ->maxLength(255)
                            ->default('مجموعة بلقيس'),

                        TextInput::make('main_subtitle')
                            ->label('العنوان الفرعي')
                            ->required()
                            ->maxLength(255)
                            ->default('للاستثمارات الفاخرة'),

                        Textarea::make('main_description')
                            ->label('الوصف')
                            ->rows(4)
                            ->columnSpanFull(),

                        TextInput::make('main_badge_text')
                            ->label('نص الشارة')
                            ->maxLength(255)
                            ->nullable()
                            ->default('التميز والفخامة'),
                        
                        TextInput::make('main_badge_icon')
                            ->label('أيقونة الشارة (Material Icons)')
                            ->maxLength(255)
                            ->nullable()
                            ->default('stars')
                            ->helperText('مثال: stars, home_work, trending_up'),

                        FileUpload::make('main_background_image')
                            ->label('صورة الخلفية الرئيسية')
                            ->image()
                            ->directory('home-page')
                            ->visibility('public')
                            ->columnSpanFull(),

                        TextInput::make('cta_button_text')
                            ->label('نص زر الدعوة للإجراء')
                            ->maxLength(255)
                            ->nullable()
                            ->default('استكشف خدماتنا'),
                        
                        TextInput::make('video_button_text')
                            ->label('نص زر الفيديو')
                            ->maxLength(255)
                            ->nullable()
                            ->default('شاهد الفيديو'),
                    ])
                    ->columns(2),

                Section::make('الخدمات')
                    ->schema([
                        Repeater::make('services')
                            ->relationship()
                            ->schema([
                                Select::make('service_key')
                                    ->label('مفتاح الخدمة')
                                    ->options([
                                        'tourism' => 'السياحة',
                                        'realestate' => 'العقارات',
                                        'investment' => 'الاستثمار',
                                    ])
                                    ->required()
                                    ->unique(ignoreRecord: true)
                                    ->disabled(fn ($record) => $record !== null),

                                TextInput::make('title')
                                    ->label('العنوان')
                                    ->required()
                                    ->maxLength(255),

                                TextInput::make('subtitle')
                                    ->label('العنوان الفرعي')
                                    ->required()
                                    ->maxLength(255),

                                Textarea::make('description')
                                    ->label('الوصف')
                                    ->required()
                                    ->rows(3)
                                    ->columnSpanFull(),

                                TextInput::make('badge_text')
                                    ->label('نص الشارة')
                                    ->maxLength(255),

                                TextInput::make('badge_icon')
                                    ->label('أيقونة الشارة')
                                    ->maxLength(255),

                                FileUpload::make('background_image')
                                    ->label('صورة الخلفية')
                                    ->image()
                                    ->directory('home-page/services')
                                    ->visibility('public')
                                    ->columnSpanFull(),

                                FileUpload::make('card_image')
                                    ->label('صورة الكارت')
                                    ->image()
                                    ->directory('home-page/services/cards')
                                    ->visibility('public')
                                    ->columnSpanFull(),

                                TextInput::make('card_title')
                                    ->label('عنوان الكارت')
                                    ->required()
                                    ->maxLength(255),

                                Textarea::make('card_description')
                                    ->label('وصف الكارت')
                                    ->required()
                                    ->rows(2),

                                TextInput::make('card_icon')
                                    ->label('أيقونة الكارت')
                                    ->maxLength(255),

                                TextInput::make('order')
                                    ->label('الترتيب')
                                    ->numeric()
                                    ->default(0)
                                    ->required(),

                                Toggle::make('is_active')
                                    ->label('نشط')
                                    ->default(true),

                                Repeater::make('stats')
                                    ->label('الإحصائيات')
                                    ->schema([
                                        TextInput::make('value')
                                            ->label('القيمة')
                                            ->required(),

                                        TextInput::make('label')
                                            ->label('التسمية')
                                            ->required(),
                                    ])
                                    ->defaultItems(3)
                                    ->columns(2)
                                    ->columnSpanFull(),
                            ])
                            ->columns(2)
                            ->defaultItems(3)
                            ->collapsible()
                            ->itemLabel(fn (array $state): ?string => $state['card_title'] ?? null),
                    ]),
            ]);
    }
}
