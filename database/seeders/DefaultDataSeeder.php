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
        // Settings
        Setting::create([
            'clinic_name' => 'StellarClinic',
            'tagline' => 'Your Health Is Our First Priority',
            'description' => 'Experience world-class healthcare tailored to your needs. Our dedicated team of specialists combines expertise with compassionate care.',
            'phone' => '+1 (555) 123-4567',
            'email' => 'care@stellarclinic.com',
            'address' => '123 Medical Plaza, Suite 400, Healthcare City, HC 90210',
            'emergency' => '+1 (555) 911-0000',
            'whatsapp' => 'https://wa.me/15551234567',
            'facebook' => '#',
            'instagram' => '#',
            'stats' => [
                ['value' => '2,400+', 'label' => 'Happy Patients'],
                ['value' => '15+', 'label' => 'Years Experience'],
                ['value' => '24/7', 'label' => 'Emergency Care'],
                ['value' => '4.9', 'label' => 'Patient Rating'],
            ],
            'hours' => [
                ['day' => 'Monday', 'hours' => '09:00 - 18:00'],
                ['day' => 'Tuesday', 'hours' => '09:00 - 18:00'],
                ['day' => 'Wednesday', 'hours' => '09:00 - 18:00'],
                ['day' => 'Thursday', 'hours' => '09:00 - 18:00'],
                ['day' => 'Friday', 'hours' => '09:00 - 17:00'],
                ['day' => 'Saturday', 'hours' => '10:00 - 14:00'],
                ['day' => 'Sunday', 'hours' => 'Closed'],
            ],
            'features' => [
                'State-of-the-art medical facilities and technology.',
                'A multidisciplinary team of renowned specialists.',
                'Personalized treatment plans tailored to your specific needs.',
            ],
            'about_story' => [
                'Founded with a vision to redefine healthcare delivery, StellarClinic began as a small boutique practice dedicated to personalized medicine. Over the decades, we have grown into a premier medical institution, yet our core philosophy remains unchanged: to treat every patient with the empathy, respect, and meticulous attention they deserve.',
                'Our hybrid approach merges the rigorous intellectual standards of traditional medical tradition with the comfort and accessibility of modern digital interfaces. We believe that a healing environment should feel less like a sterile institution and more like a supportive sanctuary.',
            ],
            'about_established' => 1998,
            'about_mission' => [
                'title' => 'Our Mission',
                'description' => 'To deliver authoritative yet empathetic medical care, ensuring every patient journey is guided by precision, innovation, and an unwavering commitment to individual wellbeing.',
            ],
            'about_vision' => [
                'title' => 'Our Vision',
                'description' => 'To set the standard for modern healthcare experiences, where advanced medical science meets the calm confidence of a boutique healing environment.',
            ],
            'about_values' => [
                'title' => 'Our Values',
                'description' => 'Integrity, empathy, and excellence. We prioritize transparent communication, patient comfort, and continuous advancement in our clinical practices.',
            ],
            'hero_title' => 'Your Health Is Our First Priority',
            'hero_subtitle' => 'Specialized Medical Care',
        ]);

        // Profile
        Profile::create([
            'name' => 'Dr. Sarah Jenkins',
            'title' => 'Chief Medical Officer',
            'bio' => 'Dedicated to advancing patient wellness through integrative, evidence-based medicine. Dr. Jenkins combines over a decade of clinical excellence with a compassionate, patient-first approach.',
            'qualifications' => 'Board Certified in Internal Medicine',
            'experience' => 'Over 15 years of clinical experience',
            'education' => [
                ['period' => '2010 - 2014', 'degree' => 'Doctor of Medicine (M.D.)', 'school' => 'Harvard Medical School, Boston, MA'],
                ['period' => '2006 - 2010', 'degree' => 'B.S. in Biology', 'school' => 'Stanford University, Stanford, CA'],
            ],
            'credentials' => [
                ['icon' => 'verified', 'title' => 'Board Certified', 'description' => 'American Board of Internal Medicine'],
                ['icon' => 'medical_services', 'title' => 'Fellowship', 'description' => 'Cardiovascular Disease, Mayo Clinic'],
                ['icon' => 'local_hospital', 'title' => 'ACLS Certified', 'description' => 'Advanced Cardiovascular Life Support'],
                ['icon' => 'science', 'title' => 'Research Lead', 'description' => 'Clinical Trials Institute'],
            ],
            'expertise' => [
                ['title' => 'Comprehensive Cardiac Assessments', 'description' => 'Detailed evaluations utilizing state-of-the-art imaging and diagnostic tools.'],
                ['title' => 'Chronic Disease Management', 'description' => 'Personalized treatment plans for hypertension, diabetes, and related risk factors.'],
                ['title' => 'Preventative Wellness Programs', 'description' => 'Proactive strategies focusing on lifestyle modifications and tailored exercise regimens.'],
                ['title' => 'Advanced Diagnostic Interpretation', 'description' => 'Expert analysis of ECGs, echocardiograms, and stress tests.'],
            ],
            'expertise_tags' => ['Cardiology', 'Internal Medicine', 'Preventative Care', 'Diagnostics'],
            'stats' => [
                ['value' => '15+', 'label' => 'Years Exp.'],
                ['value' => '10k+', 'label' => 'Patients'],
                ['value' => '4', 'label' => 'Specialties'],
            ],
        ]);

        // Services
        $services = [
            [
                'title' => 'Cardiology Assessment',
                'icon' => 'monitor_heart',
                'description' => 'Advanced diagnostics and personalized care plans for cardiovascular health.',
                'long_description' => 'Our cardiology department offers comprehensive heart health evaluations using the latest diagnostic technology. From initial screening to advanced interventional planning, our board-certified cardiologists provide personalized care for every stage of cardiovascular wellness.',
                'category' => 'Diagnosis',
                'highlights' => [
                    'State-of-the-art ECG, echocardiogram, and stress testing',
                    '24-hour Holter monitoring and event recording',
                    'Personalized cardiovascular risk assessment and management',
                    'Collaborative care with our team of cardiac specialists',
                ],
                'sort_order' => 1,
            ],
            [
                'title' => 'Neurology Consultation',
                'icon' => 'neurology',
                'description' => 'Comprehensive neurological evaluations focusing on nervous system disorders.',
                'long_description' => 'Our neurology service provides expert diagnosis and management of disorders affecting the brain, spinal cord, and nervous system. Using advanced imaging and electrodiagnostic studies, our neurologists develop comprehensive treatment strategies.',
                'category' => 'Specialized Care',
                'highlights' => [
                    'Advanced MRI and CT imaging for precise neurological diagnosis',
                    'Electromyography (EMG) and nerve conduction studies',
                    'Comprehensive headache and migraine management programs',
                    'Integrated care for neurodegenerative conditions',
                ],
                'sort_order' => 2,
            ],
            [
                'title' => 'Orthopedic Treatment',
                'icon' => 'orthopedics',
                'description' => 'Expert care for musculoskeletal conditions, from sports injuries to joint replacement.',
                'long_description' => 'Our orthopedic team specializes in the diagnosis and treatment of musculoskeletal conditions, helping patients regain mobility and reduce pain. From conservative management to surgical interventions.',
                'category' => 'Treatment',
                'highlights' => [
                    'Sports injury assessment and treatment',
                    'Joint preservation and replacement surgery',
                    'Non-surgical pain management and physical therapy',
                    'Post-operative rehabilitation and recovery programs',
                ],
                'sort_order' => 3,
            ],
            [
                'title' => 'General Practice',
                'icon' => 'stethoscope',
                'description' => 'Comprehensive routine check-ups, preventative care, and management of acute conditions.',
                'long_description' => 'Our general practice service serves as the foundation of your healthcare journey. We provide comprehensive primary care services including routine check-ups, preventative screenings, and management of both acute and chronic conditions.',
                'category' => 'Preventative',
                'highlights' => [
                    'Annual physical examinations and health screenings',
                    'Chronic disease management (diabetes, hypertension, etc.)',
                    'Vaccinations and preventative care programs',
                    'Same-day sick visits and urgent care services',
                ],
                'sort_order' => 4,
            ],
            [
                'title' => 'Mental Health Support',
                'icon' => 'psychology',
                'description' => 'Compassionate psychological support, counseling, and psychiatric evaluations.',
                'long_description' => 'Our mental health services provide compassionate, confidential care in a supportive environment. We offer comprehensive psychiatric evaluations, individual and group therapy, and medication management.',
                'category' => 'Specialized Care',
                'highlights' => [
                    'Comprehensive psychiatric evaluations and assessments',
                    'Individual, couples, and group therapy sessions',
                    'Medication management and monitoring',
                    'Crisis intervention and ongoing support services',
                ],
                'sort_order' => 5,
            ],
            [
                'title' => 'Pediatric Care',
                'icon' => 'pediatrics',
                'description' => 'Gentle, expert care for infants, children, and adolescents.',
                'long_description' => 'Our pediatric care team provides expert, compassionate healthcare for children from infancy through adolescence. We focus on preventive care, developmental monitoring, and the treatment of childhood illnesses.',
                'category' => 'Treatment',
                'highlights' => [
                    'Well-child visits and developmental screenings',
                    'Childhood immunization programs',
                    'Acute illness diagnosis and treatment',
                    'Adolescent health and wellness counseling',
                ],
                'sort_order' => 6,
            ],
        ];

        foreach ($services as $svc) {
            Service::create($svc);
        }

        // Testimonials
        Testimonial::create([
            'name' => 'Michael R.',
            'message' => 'The level of care I received was outstanding. The staff is incredibly professional, and Dr. Jenkins took the time to listen to all my concerns.',
            'rating' => 5,
            'patient_since' => '2021',
        ]);

        Testimonial::create([
            'name' => 'Emily S.',
            'message' => 'Finding a good clinic can be stressful, but StellarClinic makes it easy. The facilities are pristine, the wait times are minimal, and the care is top-notch.',
            'rating' => 5,
            'patient_since' => '2023',
        ]);

        Testimonial::create([
            'name' => 'Robert T.',
            'message' => "I've been to many doctors over the years, but the team here is by far the most attentive. They explain everything clearly and really care about your long-term health.",
            'rating' => 5,
            'patient_since' => '2019',
        ]);
    }
}