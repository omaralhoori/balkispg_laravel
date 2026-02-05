<?php

namespace App\Filament\Resources\BlogPosts\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class BlogPostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('معلومات المقال')
                    ->schema([
                        TextInput::make('title')
                            ->label('عنوان المقال')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (Set $set, $state) {
                                $set('slug', Str::slug($state));
                            })
                            ->columnSpanFull(),

                        TextInput::make('slug')
                            ->label('الرابط (Slug)')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255)
                            ->helperText('سيتم إنشاؤه تلقائياً من العنوان')
                            ->columnSpanFull(),

                        Textarea::make('excerpt')
                            ->label('الملخص')
                            ->rows(3)
                            ->maxLength(500)
                            ->helperText('ملخص قصير للمقال يظهر في صفحة المدونة')
                            ->columnSpanFull(),

                        Select::make('category')
                            ->label('التصنيف')
                            ->options([
                                'الاستثمار العقاري' => 'الاستثمار العقاري',
                                'الجنسية التركية' => 'الجنسية التركية',
                                'السياحة الفاخرة' => 'السياحة الفاخرة',
                                'الاقتصاد التركي' => 'الاقتصاد التركي',
                                'نصائح استثمارية' => 'نصائح استثمارية',
                                'أخبار المجموعة' => 'أخبار المجموعة',
                            ])
                            ->required()
                            ->searchable()
                            ->native(false),

                        FileUpload::make('featured_image')
                            ->label('الصورة الرئيسية')
                            ->image()
                            ->disk('public')
                            ->directory('blog/images')
                            ->visibility('public')
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                null,
                                '16:9',
                                '4:3',
                            ])
                            ->columnSpanFull(),

                        TextInput::make('order')
                            ->label('الترتيب')
                            ->numeric()
                            ->default(0)
                            ->required(),

                        Toggle::make('is_featured')
                            ->label('مقال مميز')
                            ->default(false)
                            ->helperText('سيظهر في أعلى صفحة المدونة'),

                        Toggle::make('is_active')
                            ->label('نشط')
                            ->default(true),

                        DateTimePicker::make('published_at')
                            ->label('تاريخ النشر')
                            ->default(now())
                            ->required()
                            ->displayFormat('d/m/Y H:i')
                            ->native(false),
                    ])
                    ->columns(2),

                Section::make('محتوى المقال')
                    ->schema([
                        RichEditor::make('content')
                            ->label('المحتوى')
                            ->toolbarButtons([
                                'attachFiles',
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
                    ]),

                Section::make('إعدادات SEO')
                    ->description('تحسين محركات البحث (SEO)')
                    ->collapsible()
                    ->schema([
                        TextInput::make('meta_title')
                            ->label('عنوان Meta')
                            ->maxLength(60)
                            ->helperText('عنوان الصفحة في نتائج البحث (يفضل 50-60 حرف)')
                            ->columnSpanFull(),

                        Textarea::make('meta_description')
                            ->label('وصف Meta')
                            ->rows(3)
                            ->maxLength(160)
                            ->helperText('وصف الصفحة في نتائج البحث (يفضل 150-160 حرف)')
                            ->columnSpanFull(),

                        Textarea::make('meta_keywords')
                            ->label('الكلمات المفتاحية')
                            ->rows(2)
                            ->helperText('الكلمات المفتاحية مفصولة بفواصل (مثال: استثمار، عقارات، تركيا)')
                            ->columnSpanFull(),

                        FileUpload::make('og_image')
                            ->label('صورة Open Graph')
                            ->image()
                            ->disk('public')
                            ->directory('blog/og-images')
                            ->visibility('public')
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                '1.91:1',
                                '1:1',
                            ])
                            ->helperText('صورة المشاركة على وسائل التواصل الاجتماعي (1200x630px موصى به)')
                            ->columnSpanFull(),

                        TextInput::make('canonical_url')
                            ->label('رابط Canonical')
                            ->url()
                            ->maxLength(255)
                            ->helperText('رابط الصفحة الأساسي (اتركه فارغاً لاستخدام الرابط الافتراضي)')
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
