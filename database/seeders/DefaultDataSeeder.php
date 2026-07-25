<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\Setting;
use Illuminate\Database\Seeder;

class DefaultDataSeeder extends Seeder
{
    public function run(): void
    {
        // Clear existing data first (order matters for FK constraints)
        Testimonial::truncate();
        Service::truncate();
        Profile::truncate();
        Setting::truncate();

        // Settings
        Setting::create([
            'clinic_name' => [
                'en' => 'StellarClinic',
                'ar' => 'عيادة ستيلار',
            ],
            'tagline' => [
                'en' => 'Your Health Is Our First Priority',
                'ar' => 'صحتك هي أولويتنا الأولى',
            ],
            'description' => [
                'en' => 'Experience world-class healthcare tailored to your needs. Our dedicated team of specialists combines expertise with compassionate care.',
                'ar' => 'اختبر رعاية صحية عالمية المستوى مصممة خصيصًا لاحتياجاتك. يجمع فريقنا المخلص من المتخصصين بين الخبرة والرعاية الرحيمة.',
            ],
            'phone' => '+1 (555) 123-4567',
            'email' => 'care@stellarclinic.com',
            'address' => [
                'en' => '123 Medical Plaza, Suite 400, Healthcare City, HC 90210',
                'ar' => '١٢٣ بلازا الطبية، جناح ٤٠٠، مدينة الرعاية الصحية',
            ],
            'emergency' => '+1 (555) 911-0000',
            'whatsapp' => 'https://wa.me/15551234567',
            'facebook' => '#',
            'instagram' => '#',
            'stats' => [
                'en' => [
                    ['value' => '2,400+', 'label' => 'Happy Patients'],
                    ['value' => '15+', 'label' => 'Years Experience'],
                    ['value' => '24/7', 'label' => 'Emergency Care'],
                    ['value' => '4.9', 'label' => 'Patient Rating'],
                ],
                'ar' => [
                    ['value' => '٢٬٤٠٠+', 'label' => 'مرضى سعداء'],
                    ['value' => '١٥+', 'label' => 'سنوات خبرة'],
                    ['value' => '٢٤/٧', 'label' => 'رعاية طوارئ'],
                    ['value' => '٤.٩', 'label' => 'تقييم المرضى'],
                ],
            ],
            'hours' => [
                'en' => [
                    ['day' => 'Monday', 'hours' => '09:00 - 18:00', 'is_today' => false],
                    ['day' => 'Tuesday', 'hours' => '09:00 - 18:00', 'is_today' => false],
                    ['day' => 'Wednesday', 'hours' => '09:00 - 18:00', 'is_today' => false],
                    ['day' => 'Thursday', 'hours' => '09:00 - 18:00', 'is_today' => false],
                    ['day' => 'Friday', 'hours' => '09:00 - 17:00', 'is_today' => false],
                    ['day' => 'Saturday', 'hours' => '10:00 - 14:00', 'is_today' => false],
                    ['day' => 'Sunday', 'hours' => 'Closed', 'is_today' => false],
                ],
                'ar' => [
                    ['day' => 'الإثنين', 'hours' => '٠٩:٠٠ - ١٨:٠٠', 'is_today' => false],
                    ['day' => 'الثلاثاء', 'hours' => '٠٩:٠٠ - ١٨:٠٠', 'is_today' => false],
                    ['day' => 'الأربعاء', 'hours' => '٠٩:٠٠ - ١٨:٠٠', 'is_today' => false],
                    ['day' => 'الخميس', 'hours' => '٠٩:٠٠ - ١٨:٠٠', 'is_today' => false],
                    ['day' => 'الجمعة', 'hours' => '٠٩:٠٠ - ١٧:٠٠', 'is_today' => false],
                    ['day' => 'السبت', 'hours' => '١٠:٠٠ - ١٤:٠٠', 'is_today' => false],
                    ['day' => 'الأحد', 'hours' => 'مغلق', 'is_today' => false],
                ],
            ],
            'features' => [
                'en' => [
                    'State-of-the-art medical facilities and technology.',
                    'A multidisciplinary team of renowned specialists.',
                    'Personalized treatment plans tailored to your specific needs.',
                ],
                'ar' => [
                    'مرافق طبية وتقنيات متطورة.',
                    'فريق متعدد التخصصات من المتخصصين المرموقين.',
                    'خطط علاجية مخصصة تناسب احتياجاتك الخاصة.',
                ],
            ],
            'about_story' => [
                'en' => [
                    'Founded with a vision to redefine healthcare delivery, StellarClinic began as a small boutique practice dedicated to personalized medicine. Over the decades, we have grown into a premier medical institution, yet our core philosophy remains unchanged: to treat every patient with the empathy, respect, and meticulous attention they deserve.',
                    'Our hybrid approach merges the rigorous intellectual standards of traditional medical tradition with the comfort and accessibility of modern digital interfaces. We believe that a healing environment should feel less like a sterile institution and more like a supportive sanctuary.',
                ],
                'ar' => [
                    'تأسست عيادة ستيلار برؤية لإعادة تعريف تقديم الرعاية الصحية، وبدأت كممارسة صغيرة مخصصة للطب الشخصي. على مر العقود، نمونا لنصبح مؤسسة طبية متميزة، لكن فلسفتنا الأساسية لم تتغير: معاملة كل مريض بالتعاطف والاحترام والاهتمام الدقيق الذي يستحقه.',
                    'يجمع نهجنا المختلط بين المعايير الفكرية الصارمة للتقاليد الطبية التقليدية والراحة وسهولة الوصول للواجهات الرقمية الحديثة. نؤمن بأن بيئة الشفاء يجب أن تكون أشبه بملاذ داعم وأقل شبهاً بمؤسسة معقمة.',
                ],
            ],
            'about_established' => 1998,
            'about_mission' => [
                'en' => [
                    'title' => 'Our Mission',
                    'description' => 'To deliver authoritative yet empathetic medical care, ensuring every patient journey is guided by precision, innovation, and an unwavering commitment to individual wellbeing.',
                ],
                'ar' => [
                    'title' => 'رسالتنا',
                    'description' => 'تقديم رعاية طبية موثوقة ومتعاطفة، وضمان أن كل رحلة مريض توجهها الدقة والابتكار والالتزام الثابت بالرفاهية الفردية.',
                ],
            ],
            'about_vision' => [
                'en' => [
                    'title' => 'Our Vision',
                    'description' => 'To set the standard for modern healthcare experiences, where advanced medical science meets the calm confidence of a boutique healing environment.',
                ],
                'ar' => [
                    'title' => 'رؤيتنا',
                    'description' => 'وضع المعيار لتجارب الرعاية الصحية الحديثة، حيث يلتقي العلم الطبي المتقدم بالثقة الهادئة لبيئة شفاء متميزة.',
                ],
            ],
            'about_values' => [
                'en' => [
                    'title' => 'Our Values',
                    'description' => 'Integrity, empathy, and excellence. We prioritize transparent communication, patient comfort, and continuous advancement in our clinical practices.',
                ],
                'ar' => [
                    'title' => 'قيمنا',
                    'description' => 'النزاهة والتعاطف والتميز. نعطي الأولوية للتواصل الشفاف وراحة المريض والتقدم المستمر في ممارساتنا السريرية.',
                ],
            ],
            'hero_title' => [
                'en' => 'Your Health Is Our First Priority',
                'ar' => 'صحتك هي أولويتنا الأولى',
            ],
            'hero_subtitle' => [
                'en' => 'Specialized Medical Care',
                'ar' => 'رعاية طبية متخصصة',
            ],
            'page_content' => [
                'en' => [
                    'navbar' => [
                        'cta_label' => 'Book Now',
                    ],
                    'home' => [
                        'hero_heading_highlight' => 'First Priority',
                        'hero_badge_accepting' => 'Accepting New Patients',
                        'hero_review_text' => '4.9/5 from 1,000+ Reviews',
                        'hero_patients_count' => '+2k',
                        'hero_cta_primary' => 'Book an Appointment',
                        'hero_cta_secondary' => 'Learn More',
                        'about_heading' => 'Modern Medicine with a Human Touch',
                        'about_text' => 'At StellarClinic, we believe that exceptional healthcare goes beyond advanced treatments. We focus on building lasting relationships with our patients, ensuring you feel heard, respected, and expertly cared for in a calm, welcoming environment.',
                        'about_link_label' => 'Discover Our Clinic Story',
                        'services_heading' => 'Comprehensive Care Solutions',
                        'services_text' => 'We offer a wide range of specialized services designed to meet all your healthcare needs under one roof.',
                        'services_view_all_label' => 'View All Services',
                        'doctor_badge_label' => 'Meet Our Lead Specialist',
                        'doctor_profile_label' => 'Read Full Profile',
                        'testimonials_heading' => 'What Our Patients Say',
                        'testimonials_text' => 'Real stories from people who trust us with their health journey.',
                        'cta_heading' => 'Ready to Prioritize Your Health?',
                        'cta_text' => 'Booking an appointment is quick and easy. Secure your spot online or reach out to us directly via WhatsApp for immediate assistance.',
                        'cta_primary_label' => 'Book Online',
                        'cta_secondary_label' => 'WhatsApp Us',
                    ],
                    'services_page' => [
                        'heading' => 'Our Services',
                        'subtitle' => 'Comprehensive medical care blending scholarly expertise with modern empathy, tailored for your wellbeing.',
                        'cta_text' => 'Book This Service',
                        'empty_text' => 'No services found for this category.',
                        'virtual_badge' => 'New',
                        'virtual_heading' => 'Virtual Care at Your Fingertips',
                        'virtual_text' => 'Connect with our top specialists from the comfort of your home. Secure, private, and seamlessly integrated into your care plan.',
                        'virtual_cta' => 'Start Consultation',
                    ],
                    'service_detail' => [
                        'benefits_heading' => 'Key Benefits & Services',
                        'why_heading' => 'Why Choose StellarClinic?',
                        'why_text' => 'At StellarClinic, we combine cutting-edge medical technology with compassionate, patient-centered care. Our specialists are leaders in their fields, and every treatment plan is tailored to your unique needs and health goals.',
                        'why_tags' => [
                            ['icon' => 'verified', 'label' => 'Board Certified'],
                            ['icon' => 'groups', 'label' => 'Expert Team'],
                            ['icon' => 'monitor_heart', 'label' => 'Modern Tech'],
                            ['icon' => 'favorite', 'label' => 'Patient Focused'],
                        ],
                        'info_heading' => 'Service Info',
                        'info_hours' => 'Mon - Sat, 09:00 - 18:00',
                        'info_specialist' => 'Specialist Consultation',
                        'book_heading' => 'Ready to Book?',
                        'book_cta' => 'Book Now',
                        'whatsapp_cta' => 'WhatsApp Us',
                        'other_heading' => 'Other Services',
                        'other_text' => 'Explore more of our comprehensive medical services.',
                        'questions_heading' => 'Have Questions?',
                        'contact_cta' => 'Contact Us',
                    ],
                    'about_page' => [
                        'heading' => 'About Our Clinic',
                        'subtitle' => 'A legacy of compassionate care and medical excellence, dedicated to your wellbeing.',
                        'story_heading' => 'Our Story',
                        'mission_icon' => 'track_changes',
                        'vision_icon' => 'visibility',
                        'values_icon' => 'favorite',
                    ],
                    'doctor_page' => [
                        'heading' => 'Meet Our Doctor',
                        'subtitle' => 'Providing expert care with a compassionate touch.',
                        'education_heading' => 'Education',
                        'credentials_heading' => 'Credentials',
                        'expertise_heading' => 'Areas of Expertise',
                    ],
                    'contact_page' => [
                        'heading' => 'Contact Us',
                        'subtitle' => 'Reach out to our dedicated medical team. We are here to answer your questions and provide the exceptional care you deserve.',
                        'location_label' => 'Location',
                        'phone_label' => 'Phone',
                        'emergency_label' => 'Emergency:',
                        'email_label' => 'Email',
                        'reply_text' => 'Replies within 24hrs',
                        'follow_us_text' => 'Follow Us',
                        'form_heading' => 'Send Us a Message',
                        'success_title' => 'Message Sent!',
                        'success_text' => 'Thank you for reaching out. We\'ll get back to you within 24 hours.',
                        'success_cta' => 'Send Another',
                        'submit_label' => 'Send Message',
                        'submitting_label' => 'Sending...',
                    ],
                    'book_page' => [
                        'heading' => 'Book Your Appointment',
                        'subtitle' => 'Schedule your visit with our clinic. We offer both in-clinic consultations and secure online telehealth appointments.',
                        'tab_in_clinic' => 'In-Clinic',
                        'tab_online' => 'Online',
                        'whatsapp_heading' => 'Quick Book via WhatsApp',
                        'whatsapp_text' => 'Prefer chatting? Message our front desk directly.',
                        'whatsapp_cta' => 'Message Us',
                        'hours_heading' => 'Clinic Hours',
                        'success_title' => 'Request Submitted!',
                        'success_text' => 'Thank you! We\'ll confirm your appointment shortly via phone or WhatsApp.',
                        'success_cta' => 'Book Another',
                        'submit_label' => 'Submit Request',
                        'submitting_label' => 'Submitting...',
                    ],
                    'footer' => [
                        'tagline' => 'Professional Care for Your Wellbeing.',
                        'quicklinks_heading' => 'Quick Links',
                        'resources_heading' => 'Patient Resources',
                        'contact_heading' => 'Contact Us',
                        'privacy_label' => 'Privacy Policy',
                        'terms_label' => 'Terms of Service',
                    ],
                ],
                'ar' => [
                    'navbar' => [
                        'cta_label' => 'احجز الآن',
                    ],
                    'home' => [
                        'hero_heading_highlight' => 'أولوية أولى',
                        'hero_badge_accepting' => 'نستقبل مرضى جدد',
                        'hero_review_text' => '٤.٩/٥ من أكثر من ١٠٠٠ تقييم',
                        'hero_patients_count' => '+٢ك',
                        'hero_cta_primary' => 'احجز موعدًا',
                        'hero_cta_secondary' => 'اعرف المزيد',
                        'about_heading' => 'طب حديث بلمسة إنسانية',
                        'about_text' => 'في عيادة ستيلار، نؤمن بأن الرعاية الصحية المتميزة تتجاوز العلاجات المتقدمة. نركز على بناء علاقات دائمة مع مرضانا، لضمان شعورك بالاستماع والاحترام والرعاية المتخصصة في بيئة هادئة ومرحبة.',
                        'about_link_label' => 'اكتشف قصة عيادتنا',
                        'services_heading' => 'حلول رعاية شاملة',
                        'services_text' => 'نقدم مجموعة واسعة من الخدمات المتخصصة المصممة لتلبية جميع احتياجاتك الصحية تحت سقف واحد.',
                        'services_view_all_label' => 'عرض جميع الخدمات',
                        'doctor_badge_label' => 'تعرف على أخصائينا الرئيسي',
                        'doctor_profile_label' => 'اقرأ الملف الشخصي',
                        'testimonials_heading' => 'ماذا يقول مرضانا',
                        'testimonials_text' => 'قصص حقيقية من أشخاص يثقون بنا في رحلتهم الصحية.',
                        'cta_heading' => 'مستعد لتحديد أولويات صحتك؟',
                        'cta_text' => 'حجز موعد سهل وسريع. احجز مكانك عبر الإنترنت أو تواصل معنا مباشرة عبر واتساب للحصول على مساعدة فورية.',
                        'cta_primary_label' => 'احجز عبر الإنترنت',
                        'cta_secondary_label' => 'واتساب',
                    ],
                    'services_page' => [
                        'heading' => 'خدماتنا',
                        'subtitle' => 'رعاية طبية شاملة تمزج بين الخبرة العلمية والتعاطف الحديث، مصممة لراحتك.',
                        'cta_text' => 'احجز هذه الخدمة',
                        'empty_text' => 'لا توجد خدمات في هذا التصنيف.',
                        'virtual_badge' => 'جديد',
                        'virtual_heading' => 'رعاية افتراضية بين يديك',
                        'virtual_text' => 'تواصل مع أفضل أخصائينا من راحة منزلك. آمن وخاص ومتكامل بسلاسة في خطة رعايتك.',
                        'virtual_cta' => 'ابدأ الاستشارة',
                    ],
                    'service_detail' => [
                        'benefits_heading' => 'الفوائد والخدمات الرئيسية',
                        'why_heading' => 'لماذا تختار عيادة ستيلار؟',
                        'why_text' => 'في عيادة ستيلار، نجمع بين التكنولوجيا الطبية المتطورة والرعاية الرحيمة التي تركز على المريض. أخصائونا هم قادة في مجالاتهم، وكل خطة علاجية مصممة خصيصًا لاحتياجاتك وأهدافك الصحية الفريدة.',
                        'why_tags' => [
                            ['icon' => 'verified', 'label' => 'معتمد رسميًا'],
                            ['icon' => 'groups', 'label' => 'فريق خبير'],
                            ['icon' => 'monitor_heart', 'label' => 'تقنية حديثة'],
                            ['icon' => 'favorite', 'label' => 'التركيز على المريض'],
                        ],
                        'info_heading' => 'معلومات الخدمة',
                        'info_hours' => 'الإثنين - السبت، ٠٩:٠٠ - ١٨:٠٠',
                        'info_specialist' => 'استشارة أخصائي',
                        'book_heading' => 'مستعد للحجز؟',
                        'book_cta' => 'احجز الآن',
                        'whatsapp_cta' => 'واتساب',
                        'other_heading' => 'خدمات أخرى',
                        'other_text' => 'استكشف المزيد من خدماتنا الطبية الشاملة.',
                        'questions_heading' => 'لديك أسئلة؟',
                        'contact_cta' => 'اتصل بنا',
                    ],
                    'about_page' => [
                        'heading' => 'حول عيادتنا',
                        'subtitle' => 'إرث من الرعاية الرحيمة والتميز الطبي، المكرس لراحتك.',
                        'story_heading' => 'قصتنا',
                        'mission_icon' => 'track_changes',
                        'vision_icon' => 'visibility',
                        'values_icon' => 'favorite',
                    ],
                    'doctor_page' => [
                        'heading' => 'تعرف على طبيبنا',
                        'subtitle' => 'تقديم رعاية خبيرة بلمسة رحيمة.',
                        'education_heading' => 'التعليم',
                        'credentials_heading' => 'الشهادات',
                        'expertise_heading' => 'مجالات الخبرة',
                    ],
                    'contact_page' => [
                        'heading' => 'اتصل بنا',
                        'subtitle' => 'تواصل مع فريقنا الطبي المخلص. نحن هنا للإجابة على أسئلتك وتقديم الرعاية الاستثنائية التي تستحقها.',
                        'location_label' => 'الموقع',
                        'phone_label' => 'الهاتف',
                        'emergency_label' => 'طوارئ:',
                        'email_label' => 'البريد الإلكتروني',
                        'reply_text' => 'نرد خلال ٢٤ ساعة',
                        'follow_us_text' => 'تابعنا',
                        'form_heading' => 'أرسل لنا رسالة',
                        'success_title' => 'تم إرسال الرسالة!',
                        'success_text' => 'شكرًا لتواصلك معنا. سنعود إليك خلال ٢٤ ساعة.',
                        'success_cta' => 'أرسل رسالة أخرى',
                        'submit_label' => 'إرسال الرسالة',
                        'submitting_label' => 'جارٍ الإرسال...',
                    ],
                    'book_page' => [
                        'heading' => 'احجز موعدك',
                        'subtitle' => 'جدول زيارتك للعيادة. نقدم استشارات داخل العيادة ومواعيد رعاية صحية عن بُعد آمنة.',
                        'tab_in_clinic' => 'داخل العيادة',
                        'tab_online' => 'عبر الإنترنت',
                        'whatsapp_heading' => 'حجز سريع عبر واتساب',
                        'whatsapp_text' => 'تفضل الدردشة؟ راسل مكتب الاستقبال مباشرة.',
                        'whatsapp_cta' => 'راسلنا',
                        'hours_heading' => 'ساعات العمل',
                        'success_title' => 'تم تقديم الطلب!',
                        'success_text' => 'شكرًا لك! سنؤكد موعدك قريبًا عبر الهاتف أو واتساب.',
                        'success_cta' => 'احجز موعدًا آخر',
                        'submit_label' => 'إرسال الطلب',
                        'submitting_label' => 'جارٍ الإرسال...',
                    ],
                    'footer' => [
                        'tagline' => 'رعاية مهنية لراحتك.',
                        'quicklinks_heading' => 'روابط سريعة',
                        'resources_heading' => 'موارد المرضى',
                        'contact_heading' => 'اتصل بنا',
                        'privacy_label' => 'سياسة الخصوصية',
                        'terms_label' => 'شروط الخدمة',
                    ],
                ],
            ],
        ]);

        // Profile
        Profile::create([
            'name' => [
                'en' => 'Dr. Sarah Jenkins',
                'ar' => 'د. سارة جينكينز',
            ],
            'title' => [
                'en' => 'Chief Medical Officer',
                'ar' => 'كبير المسؤولين الطبيين',
            ],
            'bio' => [
                'en' => 'Dedicated to advancing patient wellness through integrative, evidence-based medicine. Dr. Jenkins combines over a decade of clinical excellence with a compassionate, patient-first approach.',
                'ar' => 'مكرسة لتعزيز صحة المرضى من خلال الطب التكاملي القائم على الأدلة. تجمع الدكتورة جينكينز بين أكثر من عقد من التميز السريري ونهج رحيم يركز على المريض أولاً.',
            ],
            'qualifications' => [
                'en' => 'Board Certified in Internal Medicine',
                'ar' => 'معتمدة في الطب الباطني',
            ],
            'experience' => [
                'en' => 'Over 15 years of clinical experience',
                'ar' => 'أكثر من ١٥ عامًا من الخبرة السريرية',
            ],
            'education' => [
                'en' => [
                    ['period' => '2010 - 2014', 'degree' => 'Doctor of Medicine (M.D.)', 'school' => 'Harvard Medical School, Boston, MA'],
                    ['period' => '2006 - 2010', 'degree' => 'B.S. in Biology', 'school' => 'Stanford University, Stanford, CA'],
                ],
                'ar' => [
                    ['period' => '٢٠١٠ - ٢٠١٤', 'degree' => 'دكتور في الطب', 'school' => 'كلية الطب بجامعة هارفارد، بوسطن'],
                    ['period' => '٢٠٠٦ - ٢٠١٠', 'degree' => 'بكالوريوس في علم الأحياء', 'school' => 'جامعة ستانفورد، كاليفورنيا'],
                ],
            ],
            'credentials' => [
                'en' => [
                    ['icon' => 'verified', 'title' => 'Board Certified', 'description' => 'American Board of Internal Medicine'],
                    ['icon' => 'medical_services', 'title' => 'Fellowship', 'description' => 'Cardiovascular Disease, Mayo Clinic'],
                    ['icon' => 'local_hospital', 'title' => 'ACLS Certified', 'description' => 'Advanced Cardiovascular Life Support'],
                    ['icon' => 'science', 'title' => 'Research Lead', 'description' => 'Clinical Trials Institute'],
                ],
                'ar' => [
                    ['icon' => 'verified', 'title' => 'معتمدة', 'description' => 'المجلس الأمريكي للطب الباطني'],
                    ['icon' => 'medical_services', 'title' => 'زميلة', 'description' => 'أمراض القلب والأوعية الدموية، مايو كلينك'],
                    ['icon' => 'local_hospital', 'title' => 'معتمدة في ACLS', 'description' => 'دعم الحياة القلبي الوعائي المتقدم'],
                    ['icon' => 'science', 'title' => 'رئيسة أبحاث', 'description' => 'معهد التجارب السريرية'],
                ],
            ],
            'expertise' => [
                'en' => [
                    ['title' => 'Comprehensive Cardiac Assessments', 'description' => 'Detailed evaluations utilizing state-of-the-art imaging and diagnostic tools.'],
                    ['title' => 'Chronic Disease Management', 'description' => 'Personalized treatment plans for hypertension, diabetes, and related risk factors.'],
                    ['title' => 'Preventative Wellness Programs', 'description' => 'Proactive strategies focusing on lifestyle modifications and tailored exercise regimens.'],
                    ['title' => 'Advanced Diagnostic Interpretation', 'description' => 'Expert analysis of ECGs, echocardiograms, and stress tests.'],
                ],
                'ar' => [
                    ['title' => 'تقييمات القلب الشاملة', 'description' => 'تقييمات مفصلة باستخدام أحدث أدوات التصوير والتشخيص.'],
                    ['title' => 'إدارة الأمراض المزمنة', 'description' => 'خطط علاجية مخصصة لارتفاع ضغط الدم والسكري وعوامل الخطر ذات الصلة.'],
                    ['title' => 'برامج العافية الوقائية', 'description' => 'استراتيجيات استباقية تركز على تعديلات نمط الحياة وتمارين مخصصة.'],
                    ['title' => 'تفسير تشخيصي متقدم', 'description' => 'تحليل خبير لتخطيط القلب (ECG) ومخطط صدى القلب واختبارات الإجهاد.'],
                ],
            ],
            'expertise_tags' => [
                'en' => ['Cardiology', 'Internal Medicine', 'Preventative Care', 'Diagnostics'],
                'ar' => ['أمراض القلب', 'الطب الباطني', 'الرعاية الوقائية', 'التشخيص'],
            ],
            'stats' => [
                'en' => [
                    ['value' => '15+', 'label' => 'Years Exp.'],
                    ['value' => '10k+', 'label' => 'Patients'],
                    ['value' => '4', 'label' => 'Specialties'],
                ],
                'ar' => [
                    ['value' => '١٥+', 'label' => 'سنوات خبرة'],
                    ['value' => '١٠ك+', 'label' => 'مرضى'],
                    ['value' => '٤', 'label' => 'تخصصات'],
                ],
            ],
        ]);

        // Services
        $services = [
            [
                'title' => [
                    'en' => 'Cardiology Assessment',
                    'ar' => 'تقييم أمراض القلب',
                ],
                'icon' => 'monitor_heart',
                'slug' => 'cardiology',
                'description' => [
                    'en' => 'Advanced diagnostics and personalized care plans for cardiovascular health.',
                    'ar' => 'تشخيصات متقدمة وخطط رعاية شخصية لصحة القلب والأوعية الدموية.',
                ],
                'long_description' => [
                    'en' => 'Our cardiology department offers comprehensive heart health evaluations using the latest diagnostic technology. From initial screening to advanced interventional planning, our board-certified cardiologists provide personalized care for every stage of cardiovascular wellness.',
                    'ar' => 'يقدم قسم أمراض القلب لدينا تقييمات شاملة لصحة القلب باستخدام أحدث تقنيات التشخيص. من الفحص الأولي إلى التخطيط التداخلي المتقدم، يقدم أخصائيو القلب المعتمدون لدينا رعاية شخصية لكل مرحلة من مراحل صحة القلب والأوعية الدموية.',
                ],
                'category' => [
                    'en' => 'Diagnosis',
                    'ar' => 'تشخيص',
                ],
                'highlights' => [
                    'en' => [
                        'State-of-the-art ECG, echocardiogram, and stress testing',
                        '24-hour Holter monitoring and event recording',
                        'Personalized cardiovascular risk assessment and management',
                        'Collaborative care with our team of cardiac specialists',
                    ],
                    'ar' => [
                        'تخطيط قلب (ECG) ومخطط صدى القلب واختبارات الإجهاد المتطورة',
                        'مراقبة هولتر على مدار ٢٤ ساعة وتسجيل الأحداث',
                        'تقييم وإدارة مخاطر القلب والأوعية الدموية الشخصية',
                        'رعاية تعاونية مع فريق أخصائيي القلب لدينا',
                    ],
                ],
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => [
                    'en' => 'Neurology Consultation',
                    'ar' => 'استشارة أمراض الأعصاب',
                ],
                'icon' => 'neurology',
                'slug' => 'neurology',
                'description' => [
                    'en' => 'Comprehensive neurological evaluations focusing on nervous system disorders.',
                    'ar' => 'تقييمات عصبية شاملة تركز على اضطرابات الجهاز العصبي.',
                ],
                'long_description' => [
                    'en' => 'Our neurology service provides expert diagnosis and management of disorders affecting the brain, spinal cord, and nervous system. Using advanced imaging and electrodiagnostic studies, our neurologists develop comprehensive treatment strategies.',
                    'ar' => 'تقدم خدمة الأعصاب لدينا تشخيصًا خبيرًا وإدارة الاضطرابات التي تؤثر على الدماغ والحبل الشوكي والجهاز العصبي. باستخدام التصوير المتقدم والدراسات الكهربية التشخيصية، يطور أخصائيو الأعصاب لدينا استراتيجيات علاجية شاملة.',
                ],
                'category' => [
                    'en' => 'Specialized Care',
                    'ar' => 'رعاية متخصصة',
                ],
                'highlights' => [
                    'en' => [
                        'Advanced MRI and CT imaging for precise neurological diagnosis',
                        'Electromyography (EMG) and nerve conduction studies',
                        'Comprehensive headache and migraine management programs',
                        'Integrated care for neurodegenerative conditions',
                    ],
                    'ar' => [
                        'التصوير بالرنين المغناطيسي (MRI) والأشعة المقطعية المتقدمة للتشخيص العصبي الدقيق',
                        'تخطيط كهربية العضلات (EMG) ودراسات توصيل الأعصاب',
                        'برامج شاملة لإدارة الصداع والصداع النصفي',
                        'رعاية متكاملة للحالات العصبية التنكسية',
                    ],
                ],
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'title' => [
                    'en' => 'Orthopedic Treatment',
                    'ar' => 'علاج العظام',
                ],
                'icon' => 'orthopedics',
                'slug' => 'orthopedics',
                'description' => [
                    'en' => 'Expert care for musculoskeletal conditions, from sports injuries to joint replacement.',
                    'ar' => 'رعاية خبيرة للحالات العضلية الهيكلية، من إصابات الرياضة إلى استبدال المفاصل.',
                ],
                'long_description' => [
                    'en' => 'Our orthopedic team specializes in the diagnosis and treatment of musculoskeletal conditions, helping patients regain mobility and reduce pain. From conservative management to surgical interventions.',
                    'ar' => 'يتخصص فريق العظام لدينا في تشخيص وعلاج الحالات العضلية الهيكلية، ومساعدة المرضى على استعادة الحركة وتقليل الألم. من الإدارة التحفظية إلى التدخلات الجراحية.',
                ],
                'category' => [
                    'en' => 'Treatment',
                    'ar' => 'علاج',
                ],
                'highlights' => [
                    'en' => [
                        'Sports injury assessment and treatment',
                        'Joint preservation and replacement surgery',
                        'Non-surgical pain management and physical therapy',
                        'Post-operative rehabilitation and recovery programs',
                    ],
                    'ar' => [
                        'تقييم وعلاج إصابات الرياضة',
                        'جراحة الحفاظ على المفاصل واستبدالها',
                        'إدارة الألم غير الجراحية والعلاج الطبيعي',
                        'برامج إعادة التأهيل والتعافي بعد العمليات الجراحية',
                    ],
                ],
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'title' => [
                    'en' => 'General Practice',
                    'ar' => 'الطب العام',
                ],
                'icon' => 'stethoscope',
                'slug' => 'general-practice',
                'description' => [
                    'en' => 'Comprehensive routine check-ups, preventative care, and management of acute conditions.',
                    'ar' => 'فحوصات روتينية شاملة ورعاية وقائية وإدارة الحالات الحادة.',
                ],
                'long_description' => [
                    'en' => 'Our general practice service serves as the foundation of your healthcare journey. We provide comprehensive primary care services including routine check-ups, preventative screenings, and management of both acute and chronic conditions.',
                    'ar' => 'خدمة الطب العام لدينا هي أساس رحلتك الصحية. نقدم خدمات رعاية أولية شاملة تشمل الفحوصات الروتينية والفحوصات الوقائية وإدارة الحالات الحادة والمزمنة.',
                ],
                'category' => [
                    'en' => 'Preventative',
                    'ar' => 'وقائي',
                ],
                'highlights' => [
                    'en' => [
                        'Annual physical examinations and health screenings',
                        'Chronic disease management (diabetes, hypertension, etc.)',
                        'Vaccinations and preventative care programs',
                        'Same-day sick visits and urgent care services',
                    ],
                    'ar' => [
                        'الفحوصات البدنية السنوية والفحوصات الصحية',
                        'إدارة الأمراض المزمنة (السكري، ارتفاع ضغط الدم، إلخ)',
                        'برامج التطعيم والرعاية الوقائية',
                        'زيارات المرضى في نفس اليوم وخدمات الرعاية العاجلة',
                    ],
                ],
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'title' => [
                    'en' => 'Mental Health Support',
                    'ar' => 'دعم الصحة النفسية',
                ],
                'icon' => 'psychology',
                'slug' => 'mental-health',
                'description' => [
                    'en' => 'Compassionate psychological support, counseling, and psychiatric evaluations.',
                    'ar' => 'دعم نفسي رحيم واستشارات وتقييمات نفسية.',
                ],
                'long_description' => [
                    'en' => 'Our mental health services provide compassionate, confidential care in a supportive environment. We offer comprehensive psychiatric evaluations, individual and group therapy, and medication management.',
                    'ar' => 'تقدم خدمات الصحة النفسية لدينا رعاية رحيمة وسرية في بيئة داعمة. نقدم تقييمات نفسية شاملة وعلاجًا فرديًا وجماعيًا وإدارة الأدوية.',
                ],
                'category' => [
                    'en' => 'Specialized Care',
                    'ar' => 'رعاية متخصصة',
                ],
                'highlights' => [
                    'en' => [
                        'Comprehensive psychiatric evaluations and assessments',
                        'Individual, couples, and group therapy sessions',
                        'Medication management and monitoring',
                        'Crisis intervention and ongoing support services',
                    ],
                    'ar' => [
                        'تقييمات نفسية شاملة',
                        'جلسات علاج فردية وللأزواج وجماعية',
                        'إدارة ومراقبة الأدوية',
                        'التدخل في الأزمات وخدمات الدعم المستمر',
                    ],
                ],
                'sort_order' => 5,
                'is_active' => true,
            ],
            [
                'title' => [
                    'en' => 'Pediatric Care',
                    'ar' => 'رعاية الأطفال',
                ],
                'icon' => 'pediatrics',
                'slug' => 'pediatrics',
                'description' => [
                    'en' => 'Gentle, expert care for infants, children, and adolescents.',
                    'ar' => 'رعاية لطيفة وخبيرة للرضع والأطفال والمراهقين.',
                ],
                'long_description' => [
                    'en' => 'Our pediatric care team provides expert, compassionate healthcare for children from infancy through adolescence. We focus on preventive care, developmental monitoring, and the treatment of childhood illnesses.',
                    'ar' => 'يقدم فريق رعاية الأطفال لدينا رعاية صحية خبيرة ورحيمة للأطفال من الرضاعة حتى المراهقة. نركز على الرعاية الوقائية ومراقبة النمو وعلاج أمراض الطفولة.',
                ],
                'category' => [
                    'en' => 'Treatment',
                    'ar' => 'علاج',
                ],
                'highlights' => [
                    'en' => [
                        'Well-child visits and developmental screenings',
                        'Childhood immunization programs',
                        'Acute illness diagnosis and treatment',
                        'Adolescent health and wellness counseling',
                    ],
                    'ar' => [
                        'زيارات الطفل السليم وفحوصات النمو',
                        'برامج تطعيم الأطفال',
                        'تشخيص وعلاج الأمراض الحادة',
                        'استشارات صحة المراهقين والعافية',
                    ],
                ],
                'sort_order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($services as $svc) {
            Service::create($svc);
        }

        // Testimonials
        Testimonial::create([
            'name' => [
                'en' => 'Michael R.',
                'ar' => 'مايكل ر.',
            ],
            'message' => [
                'en' => 'The level of care I received was outstanding. The staff is incredibly professional, and Dr. Jenkins took the time to listen to all my concerns.',
                'ar' => 'مستوى الرعاية الذي تلقيته كان رائعًا. الموظفون محترفون بشكل لا يصدق، وخصصت الدكتورة جينكينز الوقت للاستماع إلى جميع مخاوفي.',
            ],
            'rating' => 5,
            'patient_since' => '2021',
        ]);

        Testimonial::create([
            'name' => [
                'en' => 'Emily S.',
                'ar' => 'إميلي س.',
            ],
            'message' => [
                'en' => 'Finding a good clinic can be stressful, but StellarClinic makes it easy. The facilities are pristine, the wait times are minimal, and the care is top-notch.',
                'ar' => 'العثور على عيادة جيدة قد يكون مرهقًا، لكن عيادة ستيلار تجعله سهلاً. المرافق نظيفة، وأوقات الانتظار ضئيلة، والرعاية من الدرجة الأولى.',
            ],
            'rating' => 5,
            'patient_since' => '2023',
        ]);

        Testimonial::create([
            'name' => [
                'en' => 'Robert T.',
                'ar' => 'روبرت ت.',
            ],
            'message' => [
                'en' => 'I\'ve been to many doctors over the years, but the team here is by far the most attentive. They explain everything clearly and really care about your long-term health.',
                'ar' => 'لقد زرت العديد من الأطباء على مر السنين، لكن الفريق هنا هو الأكثر انتباهاً بفارق كبير. يشرحون كل شيء بوضوح ويهتمون حقًا بصحتك على المدى الطويل.',
            ],
            'rating' => 5,
            'patient_since' => '2019',
        ]);
    }
}
