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
                                    ->maxLength(255)
                                    ->translatable(),
                                Forms\Components\TextInput::make('tagline')
                                    ->maxLength(255)
                                    ->translatable(),
                                Forms\Components\Textarea::make('description')
                                    ->rows(3)
                                    ->translatable(),
                                Forms\Components\TextInput::make('hero_title')
                                    ->label('Hero Title')
                                    ->maxLength(255)
                                    ->translatable(),
                                Forms\Components\TextInput::make('hero_subtitle')
                                    ->label('Hero Subtitle')
                                    ->maxLength(255)
                                    ->translatable(),
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
                                    ->rows(3)
                                    ->translatable(),
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
                                    ->collapsible()
                                    ->translatable(),
                                Forms\Components\Repeater::make('hours')
                                    ->schema([
                                        Forms\Components\TextInput::make('day')
                                            ->maxLength(255),
                                        Forms\Components\TextInput::make('hours')
                                            ->maxLength(255),
                                        Forms\Components\Toggle::make('is_today')
                                            ->label('Today?'),
                                    ])
                                    ->defaultItems(7)
                                    ->collapsible()
                                    ->translatable(),
                                Forms\Components\Repeater::make('features')
                                    ->schema([
                                        Forms\Components\Textarea::make('feature')
                                            ->rows(2),
                                    ])
                                    ->defaultItems(3)
                                    ->collapsible()
                                    ->translatable(),
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
                                    ->collapsible()
                                    ->translatable(),
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
                        Forms\Components\Tabs\Tab::make('Page Content')
                            ->schema([
                                Forms\Components\Tabs::make('PageContent')
                                    ->tabs([
                                        Forms\Components\Tabs\Tab::make('Navbar')
                                            ->schema([
                                                Forms\Components\TextInput::make('page_content.navbar.cta_label')
                                                    ->label('Book CTA Label')
                                                    ->default('Book Now'),
                                            ]),
                                        Forms\Components\Tabs\Tab::make('Home Hero')
                                            ->schema([
                                                Forms\Components\TextInput::make('page_content.home.hero_heading_highlight')
                                                    ->label('Hero Heading Highlight (span)')
                                                    ->default('First Priority'),
                                                Forms\Components\TextInput::make('page_content.home.hero_badge_accepting')
                                                    ->label('Accepting Patients Badge')
                                                    ->default('Accepting New Patients'),
                                                Forms\Components\TextInput::make('page_content.home.hero_review_text')
                                                    ->label('Review Text')
                                                    ->default('4.9/5 from 1,000+ Reviews'),
                                                Forms\Components\TextInput::make('page_content.home.hero_patients_count')
                                                    ->label('Patients Count Badge')
                                                    ->default('+2k'),
                                                Forms\Components\TextInput::make('page_content.home.hero_cta_primary')
                                                    ->label('Primary CTA')
                                                    ->default('Book an Appointment'),
                                                Forms\Components\TextInput::make('page_content.home.hero_cta_secondary')
                                                    ->label('Secondary CTA')
                                                    ->default('Learn More'),
                                            ])->columns(2),
                                        Forms\Components\Tabs\Tab::make('Home About')
                                            ->schema([
                                                Forms\Components\TextInput::make('page_content.home.about_heading')
                                                    ->label('Heading')
                                                    ->default('Modern Medicine with a Human Touch'),
                                                Forms\Components\Textarea::make('page_content.home.about_text')
                                                    ->label('Text')
                                                    ->rows(2)
                                                    ->default('At StellarClinic, we believe that exceptional healthcare goes beyond advanced treatments.'),
                                                Forms\Components\TextInput::make('page_content.home.about_link_label')
                                                    ->label('Link Label')
                                                    ->default('Discover Our Clinic Story'),
                                            ]),
                                        Forms\Components\Tabs\Tab::make('Home Services')
                                            ->schema([
                                                Forms\Components\TextInput::make('page_content.home.services_heading')
                                                    ->label('Heading')
                                                    ->default('Comprehensive Care Solutions'),
                                                Forms\Components\Textarea::make('page_content.home.services_text')
                                                    ->label('Text')
                                                    ->rows(2)
                                                    ->default('We offer a wide range of specialized services designed to meet all your healthcare needs under one roof.'),
                                                Forms\Components\TextInput::make('page_content.home.services_view_all_label')
                                                    ->label('View All Label')
                                                    ->default('View All Services'),
                                            ]),
                                        Forms\Components\Tabs\Tab::make('Home Doctor')
                                            ->schema([
                                                Forms\Components\TextInput::make('page_content.home.doctor_badge_label')
                                                    ->label('Badge Label')
                                                    ->default('Meet Our Lead Specialist'),
                                                Forms\Components\TextInput::make('page_content.home.doctor_profile_label')
                                                    ->label('Profile Link Label')
                                                    ->default('Read Full Profile'),
                                            ]),
                                        Forms\Components\Tabs\Tab::make('Home Testimonials')
                                            ->schema([
                                                Forms\Components\TextInput::make('page_content.home.testimonials_heading')
                                                    ->label('Heading')
                                                    ->default('What Our Patients Say'),
                                                Forms\Components\Textarea::make('page_content.home.testimonials_text')
                                                    ->label('Text')
                                                    ->rows(2)
                                                    ->default('Real stories from people who trust us with their health journey.'),
                                            ]),
                                        Forms\Components\Tabs\Tab::make('Home CTA')
                                            ->schema([
                                                Forms\Components\TextInput::make('page_content.home.cta_heading')
                                                    ->label('Heading')
                                                    ->default('Ready to Prioritize Your Health?'),
                                                Forms\Components\Textarea::make('page_content.home.cta_text')
                                                    ->label('Text')
                                                    ->rows(2)
                                                    ->default('Booking an appointment is quick and easy.'),
                                                Forms\Components\TextInput::make('page_content.home.cta_primary_label')
                                                    ->label('Primary Button')
                                                    ->default('Book Online'),
                                                Forms\Components\TextInput::make('page_content.home.cta_secondary_label')
                                                    ->label('Secondary Button')
                                                    ->default('WhatsApp Us'),
                                            ]),
                                        Forms\Components\Tabs\Tab::make('Services Page')
                                            ->schema([
                                                Forms\Components\TextInput::make('page_content.services_page.heading')
                                                    ->label('Heading')
                                                    ->default('Our Services'),
                                                Forms\Components\Textarea::make('page_content.services_page.subtitle')
                                                    ->label('Subtitle')
                                                    ->rows(2)
                                                    ->default('Comprehensive medical care blending scholarly expertise with modern empathy.'),
                                                Forms\Components\TextInput::make('page_content.services_page.cta_text')
                                                    ->label('Service Card CTA')
                                                    ->default('Book This Service'),
                                                Forms\Components\TextInput::make('page_content.services_page.empty_text')
                                                    ->label('Empty Filter Text')
                                                    ->default('No services found for this category.'),
                                                Forms\Components\TextInput::make('page_content.services_page.virtual_badge')
                                                    ->label('Virtual Care Badge')
                                                    ->default('New'),
                                                Forms\Components\TextInput::make('page_content.services_page.virtual_heading')
                                                    ->label('Virtual Care Heading')
                                                    ->default('Virtual Care at Your Fingertips'),
                                                Forms\Components\Textarea::make('page_content.services_page.virtual_text')
                                                    ->label('Virtual Care Text')
                                                    ->rows(2)
                                                    ->default('Connect with our top specialists from the comfort of your home.'),
                                                Forms\Components\TextInput::make('page_content.services_page.virtual_cta')
                                                    ->label('Virtual Care CTA')
                                                    ->default('Start Consultation'),
                                            ]),
                                        Forms\Components\Tabs\Tab::make('Service Detail')
                                            ->schema([
                                                Forms\Components\TextInput::make('page_content.service_detail.benefits_heading')
                                                    ->label('Benefits Heading')
                                                    ->default('Key Benefits & Services'),
                                                Forms\Components\TextInput::make('page_content.service_detail.why_heading')
                                                    ->label('Why Choose Heading')
                                                    ->default('Why Choose StellarClinic?'),
                                                Forms\Components\Textarea::make('page_content.service_detail.why_text')
                                                    ->label('Why Choose Text')
                                                    ->rows(3)
                                                    ->default('At StellarClinic, we combine cutting-edge medical technology with compassionate, patient-centered care.'),
                                                Forms\Components\Repeater::make('page_content.service_detail.why_tags')
                                                    ->label('Why Choose Tags')
                                                    ->schema([
                                                        Forms\Components\TextInput::make('icon'),
                                                        Forms\Components\TextInput::make('label'),
                                                    ])
                                                    ->defaultItems(4)
                                                    ->collapsible()
                                                    ->default([
                                                        ['icon' => 'verified', 'label' => 'Board Certified'],
                                                        ['icon' => 'groups', 'label' => 'Expert Team'],
                                                        ['icon' => 'monitor_heart', 'label' => 'Modern Tech'],
                                                        ['icon' => 'favorite', 'label' => 'Patient Focused'],
                                                    ]),
                                                Forms\Components\TextInput::make('page_content.service_detail.info_heading')
                                                    ->label('Service Info Heading')
                                                    ->default('Service Info'),
                                                Forms\Components\TextInput::make('page_content.service_detail.info_hours')
                                                    ->label('Info Hours Text')
                                                    ->default('Mon - Sat, 09:00 - 18:00'),
                                                Forms\Components\TextInput::make('page_content.service_detail.info_specialist')
                                                    ->label('Info Specialist Text')
                                                    ->default('Specialist Consultation'),
                                                Forms\Components\TextInput::make('page_content.service_detail.book_heading')
                                                    ->label('Book Card Heading')
                                                    ->default('Ready to Book?'),
                                                Forms\Components\TextInput::make('page_content.service_detail.book_cta')
                                                    ->label('Book CTA')
                                                    ->default('Book Now'),
                                                Forms\Components\TextInput::make('page_content.service_detail.whatsapp_cta')
                                                    ->label('WhatsApp CTA')
                                                    ->default('WhatsApp Us'),
                                                Forms\Components\TextInput::make('page_content.service_detail.other_heading')
                                                    ->label('Other Services Heading')
                                                    ->default('Other Services'),
                                                Forms\Components\Textarea::make('page_content.service_detail.other_text')
                                                    ->label('Other Services Text')
                                                    ->rows(2)
                                                    ->default('Explore more of our comprehensive medical services.'),
                                                Forms\Components\TextInput::make('page_content.service_detail.questions_heading')
                                                    ->label('Questions Heading')
                                                    ->default('Have Questions?'),
                                                Forms\Components\TextInput::make('page_content.service_detail.contact_cta')
                                                    ->label('Contact CTA')
                                                    ->default('Contact Us'),
                                            ])->columns(2),
                                        Forms\Components\Tabs\Tab::make('About Page')
                                            ->schema([
                                                Forms\Components\TextInput::make('page_content.about_page.heading')
                                                    ->label('Heading')
                                                    ->default('About Our Clinic'),
                                                Forms\Components\Textarea::make('page_content.about_page.subtitle')
                                                    ->label('Subtitle')
                                                    ->rows(2)
                                                    ->default('A legacy of compassionate care and medical excellence.'),
                                                Forms\Components\TextInput::make('page_content.about_page.story_heading')
                                                    ->label('Story Heading')
                                                    ->default('Our Story'),
                                                Forms\Components\TextInput::make('page_content.about_page.mission_icon')
                                                    ->label('Mission Icon')
                                                    ->default('track_changes'),
                                                Forms\Components\TextInput::make('page_content.about_page.vision_icon')
                                                    ->label('Vision Icon')
                                                    ->default('visibility'),
                                                Forms\Components\TextInput::make('page_content.about_page.values_icon')
                                                    ->label('Values Icon')
                                                    ->default('favorite'),
                                            ])->columns(2),
                                        Forms\Components\Tabs\Tab::make('Doctor Page')
                                            ->schema([
                                                Forms\Components\TextInput::make('page_content.doctor_page.heading')
                                                    ->label('Heading')
                                                    ->default('Meet Our Doctor'),
                                                Forms\Components\Textarea::make('page_content.doctor_page.subtitle')
                                                    ->label('Subtitle')
                                                    ->rows(2)
                                                    ->default('Providing expert care with a compassionate touch.'),
                                                Forms\Components\TextInput::make('page_content.doctor_page.education_heading')
                                                    ->label('Education Heading')
                                                    ->default('Education'),
                                                Forms\Components\TextInput::make('page_content.doctor_page.credentials_heading')
                                                    ->label('Credentials Heading')
                                                    ->default('Credentials'),
                                                Forms\Components\TextInput::make('page_content.doctor_page.expertise_heading')
                                                    ->label('Expertise Heading')
                                                    ->default('Areas of Expertise'),
                                            ])->columns(2),
                                        Forms\Components\Tabs\Tab::make('Contact Page')
                                            ->schema([
                                                Forms\Components\TextInput::make('page_content.contact_page.heading')
                                                    ->label('Heading')
                                                    ->default('Contact Us'),
                                                Forms\Components\Textarea::make('page_content.contact_page.subtitle')
                                                    ->label('Subtitle')
                                                    ->rows(2),
                                                Forms\Components\TextInput::make('page_content.contact_page.location_label')
                                                    ->label('Location Label')
                                                    ->default('Location'),
                                                Forms\Components\TextInput::make('page_content.contact_page.phone_label')
                                                    ->label('Phone Label')
                                                    ->default('Phone'),
                                                Forms\Components\TextInput::make('page_content.contact_page.emergency_label')
                                                    ->label('Emergency Label')
                                                    ->default('Emergency:'),
                                                Forms\Components\TextInput::make('page_content.contact_page.email_label')
                                                    ->label('Email Label')
                                                    ->default('Email'),
                                                Forms\Components\TextInput::make('page_content.contact_page.reply_text')
                                                    ->label('Reply Text')
                                                    ->default('Replies within 24hrs'),
                                                Forms\Components\TextInput::make('page_content.contact_page.follow_us_text')
                                                    ->label('Follow Us Text')
                                                    ->default('Follow Us'),
                                                Forms\Components\TextInput::make('page_content.contact_page.form_heading')
                                                    ->label('Form Heading')
                                                    ->default('Send Us a Message'),
                                                Forms\Components\Textarea::make('page_content.contact_page.success_title')
                                                    ->label('Success Title')
                                                    ->rows(1)
                                                    ->default('Message Sent!'),
                                                Forms\Components\Textarea::make('page_content.contact_page.success_text')
                                                    ->label('Success Text')
                                                    ->rows(2),
                                                Forms\Components\TextInput::make('page_content.contact_page.success_cta')
                                                    ->label('Success CTA')
                                                    ->default('Send Another'),
                                                Forms\Components\TextInput::make('page_content.contact_page.submit_label')
                                                    ->label('Submit Label')
                                                    ->default('Send Message'),
                                                Forms\Components\TextInput::make('page_content.contact_page.submitting_label')
                                                    ->label('Submitting Label')
                                                    ->default('Sending...'),
                                            ])->columns(2),
                                        Forms\Components\Tabs\Tab::make('Book Page')
                                            ->schema([
                                                Forms\Components\TextInput::make('page_content.book_page.heading')
                                                    ->label('Heading')
                                                    ->default('Book Your Appointment'),
                                                Forms\Components\Textarea::make('page_content.book_page.subtitle')
                                                    ->label('Subtitle')
                                                    ->rows(2),
                                                Forms\Components\TextInput::make('page_content.book_page.tab_in_clinic')
                                                    ->label('In-Clinic Tab')
                                                    ->default('In-Clinic'),
                                                Forms\Components\TextInput::make('page_content.book_page.tab_online')
                                                    ->label('Online Tab')
                                                    ->default('Online'),
                                                Forms\Components\TextInput::make('page_content.book_page.whatsapp_heading')
                                                    ->label('WhatsApp Heading')
                                                    ->default('Quick Book via WhatsApp'),
                                                Forms\Components\Textarea::make('page_content.book_page.whatsapp_text')
                                                    ->label('WhatsApp Text')
                                                    ->rows(2),
                                                Forms\Components\TextInput::make('page_content.book_page.whatsapp_cta')
                                                    ->label('WhatsApp CTA')
                                                    ->default('Message Us'),
                                                Forms\Components\TextInput::make('page_content.book_page.hours_heading')
                                                    ->label('Hours Heading')
                                                    ->default('Clinic Hours'),
                                                Forms\Components\TextInput::make('page_content.book_page.success_title')
                                                    ->label('Success Title')
                                                    ->default('Request Submitted!'),
                                                Forms\Components\Textarea::make('page_content.book_page.success_text')
                                                    ->label('Success Text')
                                                    ->rows(2),
                                                Forms\Components\TextInput::make('page_content.book_page.success_cta')
                                                    ->label('Success CTA')
                                                    ->default('Book Another'),
                                                Forms\Components\TextInput::make('page_content.book_page.submit_label')
                                                    ->label('Submit Label')
                                                    ->default('Submit Request'),
                                                Forms\Components\TextInput::make('page_content.book_page.submitting_label')
                                                    ->label('Submitting Label')
                                                    ->default('Submitting...'),
                                            ])->columns(2),
                                        Forms\Components\Tabs\Tab::make('Footer')
                                            ->schema([
                                                Forms\Components\TextInput::make('page_content.footer.tagline')
                                                    ->label('Tagline')
                                                    ->default('Professional Care for Your Wellbeing.'),
                                                Forms\Components\TextInput::make('page_content.footer.quicklinks_heading')
                                                    ->label('Quick Links Heading')
                                                    ->default('Quick Links'),
                                                Forms\Components\TextInput::make('page_content.footer.resources_heading')
                                                    ->label('Resources Heading')
                                                    ->default('Patient Resources'),
                                                Forms\Components\TextInput::make('page_content.footer.contact_heading')
                                                    ->label('Contact Heading')
                                                    ->default('Contact Us'),
                                                Forms\Components\TextInput::make('page_content.footer.privacy_label')
                                                    ->label('Privacy Policy Label')
                                                    ->default('Privacy Policy'),
                                                Forms\Components\TextInput::make('page_content.footer.terms_label')
                                                    ->label('Terms of Service Label')
                                                    ->default('Terms of Service'),
                                            ])->columns(2),
                                    ])->columnSpanFull(),
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
