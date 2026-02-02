<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\Research;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class IslamicFinanceContentSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('Creating Islamic Finance categories...');
        $this->createCategories();
        
        $this->command->info('Creating Islamic Finance tags...');
        $this->createTags();
        
        $this->command->info('Creating Islamic Finance pages...');
        $this->createPages();
        
        $this->command->info('Creating Islamic Finance publications...');
        $this->createPublications();
        
        $this->command->info('Islamic Finance content created successfully!');
    }

    private function createCategories(): void
    {
        $categories = [
            [
                'name' => 'Shariah Advisory',
                'slug' => 'shariah-advisory',
                'description' => 'Comprehensive Islamic finance advisory and consultancy services',
            ],
            [
                'name' => 'Sukuk & Structuring',
                'slug' => 'sukuk-structuring',
                'description' => 'Islamic bond structuring and financial instruments',
            ],
            [
                'name' => 'Halal Certification',
                'slug' => 'halal-certification',
                'description' => 'Halal product and business certification services',
            ],
            [
                'name' => 'Audit & Compliance',
                'slug' => 'audit-compliance',
                'description' => 'Shariah audit and regulatory compliance services',
            ],
            [
                'name' => 'Training & Education',
                'slug' => 'training-education',
                'description' => 'Islamic finance training programs and workshops',
            ],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(
                ['slug' => $category['slug']],
                $category
            );
        }
    }

    private function createTags(): void
    {
        $tags = [
            'Islamic Banking',
            'Takaful',
            'Sukuk',
            'Shariah Compliance',
            'Halal Business',
            'Zakat',
            'Islamic Finance',
            'Fintech',
            'Crypto & Blockchain',
            'Investment Screening',
        ];

        foreach ($tags as $tag) {
            Tag::firstOrCreate(
                ['slug' => Str::slug($tag)],
                [
                    'name' => $tag,
                    'slug' => Str::slug($tag),
                ]
            );
        }
    }

    private function createPages(): void
    {
        $pages = [
            [
                'title' => 'About HEAC',
                'slug' => 'about',
                'content' => [
                    [
                        'type' => 'heading',
                        'level' => 2,
                        'content' => 'Your Trusted Partner in Islamic Finance',
                    ],
                    [
                        'type' => 'paragraph',
                        'content' => 'HEAC was established to promote a Shariah-compliant global economy by providing innovative ethical financial solutions. We are dedicated to advancing the halal economy through comprehensive advisory services, expert guidance, and unwavering commitment to Islamic principles.',
                    ],
                    [
                        'type' => 'heading',
                        'level' => 3,
                        'content' => 'Our Mission',
                    ],
                    [
                        'type' => 'paragraph',
                        'content' => 'To encourage ethical principles in Islamic economic activity through tailored Shariah-compliant solutions that meet the highest standards of integrity and excellence. We strive to deliver customized solutions for each client, ensuring both Shariah compliance and business success.',
                    ],
                    [
                        'type' => 'heading',
                        'level' => 3,
                        'content' => 'Our Vision',
                    ],
                    [
                        'type' => 'paragraph',
                        'content' => 'To establish a robust halal economy free from riba-based constraints, where businesses and individuals can thrive while maintaining complete adherence to Islamic principles. We envision a global financial system that operates on ethical foundations.',
                    ],
                    [
                        'type' => 'heading',
                        'level' => 3,
                        'content' => 'Professional Credentials',
                    ],
                    [
                        'type' => 'paragraph',
                        'content' => 'HEAC is registered with SECP (Pakistan) and affiliated with leading Islamic finance bodies worldwide. We maintain offices and partnerships in major Islamic finance centers including Karachi, London, Dubai, and Kuala Lumpur. Our team adheres to the highest compliance standards and holds certifications from AAOIFI, ISRA, and other recognized institutions.',
                    ],
                    [
                        'type' => 'heading',
                        'level' => 3,
                        'content' => 'Our Approach',
                    ],
                    [
                        'type' => 'paragraph',
                        'content' => 'We employ a cross-disciplinary team of devoted, specialized, and prominent Shariah scholars working alongside finance experts. Our methodology combines deep Islamic scholarship with modern financial expertise to deliver solutions that are both Shariah-compliant and commercially viable.',
                    ],
                    [
                        'type' => 'list',
                        'content' => [
                            'Multi-disciplinary team of scholars and finance professionals',
                            'Multi-linguistic advisors with worldwide reach',
                            'Customized solutions tailored to each client\'s needs',
                            'Rigorous Shariah compliance processes',
                            'Industry-certified and globally recognized',
                        ],
                    ],
                ],
                'excerpt' => 'Learn about HEAC\'s mission to advance the halal economy globally through comprehensive Shariah-compliant solutions.',
                'meta_title' => 'About HEAC - Global Shariah Leadership in Islamic Finance',
                'meta_description' => 'HEAC provides comprehensive Shariah-compliant solutions for the global halal economy. Registered with SECP and affiliated with leading Islamic finance bodies worldwide.',
                'status' => 'published',
                'published_at' => now(),
            ],
            [
                'title' => 'Our Services',
                'slug' => 'services',
                'content' => [
                    [
                        'type' => 'heading',
                        'level' => 2,
                        'content' => 'Comprehensive Islamic Finance Solutions',
                    ],
                    [
                        'type' => 'paragraph',
                        'content' => 'HEAC offers a full spectrum of Shariah-compliant services designed to meet the diverse needs of our global clientele. From product structuring to audits and certification, HEAC delivers end-to-end engagement anchored in AAOIFI and international best practices.',
                    ],
                    [
                        'type' => 'heading',
                        'level' => 3,
                        'content' => 'Shariah Advisory & Consultancy',
                    ],
                    [
                        'type' => 'paragraph',
                        'content' => 'Comprehensive Islamic finance advisory services tailored to clients\' needs. Strategic guidance for Islamic banks, fintech innovators, asset managers, and halal enterprises.',
                    ],
                    [
                        'type' => 'list',
                        'content' => [
                            'Shariah-compliant product design and innovation',
                            'Regulatory reform advice and governance frameworks',
                            'Treasury and corporate structuring',
                            'Capital market advisory',
                            'Fintech and digital banking solutions',
                        ],
                    ],
                    [
                        'type' => 'heading',
                        'level' => 3,
                        'content' => 'Shariah Audit & Compliance',
                    ],
                    [
                        'type' => 'paragraph',
                        'content' => 'Effective risk-based internal and external Shariah audit and compliance services. Regular audits for banks, Takaful operators, and investment firms, ensuring all transactions and reports adhere to Shariah law.',
                    ],
                    [
                        'type' => 'list',
                        'content' => [
                            'Internal Shariah audit programs',
                            'External Shariah compliance reviews',
                            'Regulatory compliance assessments',
                            'Risk management frameworks',
                            'Compliance reporting and documentation',
                        ],
                    ],
                    [
                        'type' => 'heading',
                        'level' => 3,
                        'content' => 'Shariah Certification & Fatwa Issuance',
                    ],
                    [
                        'type' => 'paragraph',
                        'content' => 'HEAC issues formal Shariah opinions and certificates for products, as well as fatwas on new matters. We deliver comprehensive certification services for both financial and non-financial products.',
                    ],
                    [
                        'type' => 'list',
                        'content' => [
                            'Shariah certification for financial products',
                            'Halal business certification',
                            'Fatwa issuance and Islamic legal opinions',
                            'Product screening and approval',
                            'Ongoing compliance monitoring',
                        ],
                    ],
                    [
                        'type' => 'heading',
                        'level' => 3,
                        'content' => 'Islamic Finance Structuring',
                    ],
                    [
                        'type' => 'paragraph',
                        'content' => 'Expert design of complex financial instruments. Custom Shariah structures for banking, fintech, crypto, and halal businesses. Tailored product structuring that meets both Shariah requirements and market demands.',
                    ],
                    [
                        'type' => 'list',
                        'content' => [
                            'Sukuk structuring and issuance',
                            'Islamic funds and investment vehicles',
                            'Takaful and re-Takaful models',
                            'Microfinance schemes',
                            'Blockchain and crypto compliance',
                            'Fintech product development',
                        ],
                    ],
                    [
                        'type' => 'heading',
                        'level' => 3,
                        'content' => 'Investment Screening & Portfolio Advisory',
                    ],
                    [
                        'type' => 'paragraph',
                        'content' => 'Screening of equity and debt investments for Shariah compliance. Portfolio selection guidance and asset allocation strategies aligned with Islamic principles.',
                    ],
                    [
                        'type' => 'list',
                        'content' => [
                            'Equity investment screening',
                            'Portfolio Shariah compliance review',
                            'Asset allocation advisory',
                            'Mutual funds distribution',
                            'ESG and Shariah integration',
                        ],
                    ],
                    [
                        'type' => 'heading',
                        'level' => 3,
                        'content' => 'Zakat and Charity Advisory',
                    ],
                    [
                        'type' => 'paragraph',
                        'content' => 'Guidance on Zakat calculation and management for individuals, companies, and NGOs. Comprehensive Waqf and zakat planning services.',
                    ],
                    [
                        'type' => 'list',
                        'content' => [
                            'Zakat calculation and assessment',
                            'Corporate Zakat management',
                            'Waqf structuring and governance',
                            'Charity fund management',
                            'Sadaqah and endowment advisory',
                        ],
                    ],
                    [
                        'type' => 'heading',
                        'level' => 3,
                        'content' => 'Halal Business Advisory',
                    ],
                    [
                        'type' => 'paragraph',
                        'content' => 'Consultancy for non-financial halal sectors including food, travel, cosmetics, pharmaceuticals, and hospitality. Ethical and governance consulting for halal organizations.',
                    ],
                    [
                        'type' => 'list',
                        'content' => [
                            'Halal food certification',
                            'Halal cosmetics and pharmaceuticals',
                            'Halal travel and tourism',
                            'Ethical business practices',
                            'Supply chain Shariah compliance',
                        ],
                    ],
                    [
                        'type' => 'heading',
                        'level' => 3,
                        'content' => 'Shariah Training & Education',
                    ],
                    [
                        'type' => 'paragraph',
                        'content' => 'HEAC designs custom training programs and workshops designed by highly qualified professionals. Immersive learning experiences for boards, executives, and Shariah compliance teams.',
                    ],
                    [
                        'type' => 'list',
                        'content' => [
                            'Islamic Finance 101 for executives',
                            'Certified Shariah Auditor programs',
                            'Fintech & Shariah innovation labs',
                            'In-house corporate training',
                            'Public seminars and workshops',
                            'Online courses and certifications',
                        ],
                    ],
                ],
                'excerpt' => 'Explore our comprehensive range of Shariah-compliant services from advisory to certification, structuring to training.',
                'meta_title' => 'Services - Comprehensive Islamic Finance Solutions | HEAC',
                'meta_description' => 'Shariah advisory, audit & compliance, certification, Sukuk structuring, investment screening, Zakat advisory, halal business consulting, and training programs.',
                'status' => 'published',
                'published_at' => now(),
            ],
            [
                'title' => 'Training & Events',
                'slug' => 'training',
                'content' => [
                    [
                        'type' => 'heading',
                        'level' => 2,
                        'content' => 'Islamic Finance Training & Executive Education',
                    ],
                    [
                        'type' => 'paragraph',
                        'content' => 'HEAC designs custom training programs and workshops for professionals seeking to enhance their knowledge of Islamic finance and Shariah compliance. Our programs are designed by highly qualified professionals with real-world experience.',
                    ],
                    [
                        'type' => 'heading',
                        'level' => 3,
                        'content' => 'Executive Workshops',
                    ],
                    [
                        'type' => 'paragraph',
                        'content' => 'Intensive workshops designed for board members, C-suite executives, and senior management to understand Islamic finance principles and their application in modern business.',
                    ],
                    [
                        'type' => 'list',
                        'content' => [
                            'Islamic Banking Fundamentals for Executives',
                            'Shariah Governance for Board Members',
                            'Strategic Islamic Finance Leadership',
                            'Halal Business Strategy Workshop',
                        ],
                    ],
                    [
                        'type' => 'heading',
                        'level' => 3,
                        'content' => 'Professional Certification Programs',
                    ],
                    [
                        'type' => 'paragraph',
                        'content' => 'Comprehensive certification programs that provide in-depth knowledge and practical skills for Islamic finance professionals.',
                    ],
                    [
                        'type' => 'list',
                        'content' => [
                            'Certified Shariah Auditor Course',
                            'Islamic Finance Professional Certification',
                            'Sukuk Structuring Specialist Program',
                            'Halal Certification Expert Training',
                            'Takaful Operations Certification',
                        ],
                    ],
                    [
                        'type' => 'heading',
                        'level' => 3,
                        'content' => 'In-House Corporate Training',
                    ],
                    [
                        'type' => 'paragraph',
                        'content' => 'Customized training programs delivered at your organization, tailored to your specific needs and industry context.',
                    ],
                    [
                        'type' => 'list',
                        'content' => [
                            'Islamic Banking Operations',
                            'Shariah Compliance for Financial Institutions',
                            'Product Development and Structuring',
                            'Risk Management in Islamic Finance',
                            'Customer Service Excellence in Islamic Banking',
                        ],
                    ],
                    [
                        'type' => 'heading',
                        'level' => 3,
                        'content' => 'Innovation Labs & Specialized Workshops',
                    ],
                    [
                        'type' => 'paragraph',
                        'content' => 'Cutting-edge programs focusing on emerging trends and innovations in Islamic finance.',
                    ],
                    [
                        'type' => 'list',
                        'content' => [
                            'Fintech & Shariah Innovation Lab',
                            'Blockchain and Crypto Compliance Workshop',
                            'Digital Islamic Banking Transformation',
                            'ESG and Islamic Finance Integration',
                            'Sustainable Sukuk Structuring',
                        ],
                    ],
                    [
                        'type' => 'heading',
                        'level' => 3,
                        'content' => 'Online Courses',
                    ],
                    [
                        'type' => 'paragraph',
                        'content' => 'Flexible online learning options for professionals worldwide, featuring interactive content, case studies, and expert instruction.',
                    ],
                    [
                        'type' => 'list',
                        'content' => [
                            'Introduction to Islamic Finance (Online)',
                            'Shariah Audit Fundamentals (Online)',
                            'Halal Business Essentials (Online)',
                            'Islamic Investment Screening (Online)',
                        ],
                    ],
                    [
                        'type' => 'heading',
                        'level' => 3,
                        'content' => 'Upcoming Events & Seminars',
                    ],
                    [
                        'type' => 'paragraph',
                        'content' => 'Join our public seminars and conferences to network with industry leaders and stay updated on the latest developments in Islamic finance. Contact us to register or inquire about upcoming events.',
                    ],
                ],
                'excerpt' => 'Professional training programs, executive workshops, and certification courses in Islamic finance and Shariah compliance.',
                'meta_title' => 'Training & Events - Islamic Finance Education | HEAC',
                'meta_description' => 'Executive workshops, professional certifications, in-house training, and online courses on Islamic finance, Shariah compliance, and halal business.',
                'status' => 'published',
                'published_at' => now(),
            ],
            [
                'title' => 'Our Team & Scholars',
                'slug' => 'team',
                'content' => [
                    [
                        'type' => 'heading',
                        'level' => 2,
                        'content' => 'Meet Our Expert Team',
                    ],
                    [
                        'type' => 'paragraph',
                        'content' => 'Our team comprises recognized Shariah scholars, Islamic finance experts, and industry professionals with decades of combined experience serving clients worldwide. We bring together the best minds in Islamic jurisprudence and modern finance.',
                    ],
                    [
                        'type' => 'heading',
                        'level' => 3,
                        'content' => 'Leadership Team',
                    ],
                    [
                        'type' => 'paragraph',
                        'content' => 'Our leadership team includes distinguished scholars and finance professionals who guide HEAC\'s strategic direction and ensure the highest standards of Shariah compliance and professional excellence.',
                    ],
                    [
                        'type' => 'heading',
                        'level' => 3,
                        'content' => 'Shariah Advisory Board',
                    ],
                    [
                        'type' => 'paragraph',
                        'content' => 'Our Shariah Advisory Board consists of internationally recognized scholars with advanced qualifications in Islamic law and extensive experience in Islamic finance. They provide authoritative guidance on all Shariah matters.',
                    ],
                    [
                        'type' => 'list',
                        'content' => [
                            'Advanced Islamic law qualifications (PhD, Masters)',
                            'Decades of industry experience',
                            'Published research and fatwas',
                            'International recognition and affiliations',
                            'Expertise across diverse Islamic finance sectors',
                        ],
                    ],
                    [
                        'type' => 'heading',
                        'level' => 3,
                        'content' => 'Our Advisory Methodology',
                    ],
                    [
                        'type' => 'paragraph',
                        'content' => 'HEAC follows a rigorous four-step advisory process to ensure comprehensive, compliant, and commercially viable solutions:',
                    ],
                    [
                        'type' => 'list',
                        'content' => [
                            '1. Discovery - Stakeholder workshops to understand objectives, regulatory context, and operational realities',
                            '2. Research & Structuring - Develop robust Shariah-compliant models with peer benchmarking and scenario analysis',
                            '3. Review & Feedback - Collaborative refinement with client teams and Shariah board review',
                            '4. Certification - Formal Shariah opinion issuance and ongoing compliance monitoring',
                        ],
                    ],
                    [
                        'type' => 'heading',
                        'level' => 3,
                        'content' => 'Global Expertise',
                    ],
                    [
                        'type' => 'paragraph',
                        'content' => 'Our team members are based across major Islamic finance hubs and bring multi-linguistic capabilities and deep understanding of regional regulatory frameworks.',
                    ],
                    [
                        'type' => 'list',
                        'content' => [
                            'Offices in Karachi, London, Dubai, and Kuala Lumpur',
                            'Multi-linguistic advisors (Arabic, English, Urdu, Malay)',
                            'Understanding of diverse regulatory environments',
                            'Cross-border transaction expertise',
                            'Global network of partner institutions',
                        ],
                    ],
                    [
                        'type' => 'heading',
                        'level' => 3,
                        'content' => 'Professional Qualifications',
                    ],
                    [
                        'type' => 'paragraph',
                        'content' => 'Our team holds certifications and memberships from leading Islamic finance institutions and professional bodies.',
                    ],
                    [
                        'type' => 'list',
                        'content' => [
                            'AAOIFI Certified Shariah Advisors',
                            'ISRA Alumni and Fellows',
                            'CIMA Islamic Finance Qualifications',
                            'CFA Charterholders with Islamic Finance specialization',
                            'Academic affiliations with leading universities',
                        ],
                    ],
                ],
                'excerpt' => 'Meet our team of recognized Shariah scholars and Islamic finance experts serving clients worldwide.',
                'meta_title' => 'Team & Scholars - Expert Islamic Finance Professionals | HEAC',
                'meta_description' => 'Our team of internationally recognized Shariah scholars, Islamic finance experts, and industry professionals with decades of combined experience.',
                'status' => 'published',
                'published_at' => now(),
            ],
        ];

        foreach ($pages as $pageData) {
            Page::updateOrCreate(
                ['slug' => $pageData['slug']],
                $pageData
            );
        }
    }

    private function createPublications(): void
    {
        $categories = Category::all();
        $tags = Tag::all();

        $publications = [
            [
                'title' => 'Shariah-Compliant Cryptocurrency: A Comprehensive Guide',
                'slug' => 'shariah-compliant-cryptocurrency-guide',
                'abstract' => 'This comprehensive guide examines the Islamic perspective on cryptocurrency and blockchain technology, providing detailed analysis of Shariah compliance requirements for digital assets. Covers Bitcoin, Ethereum, stablecoins, and DeFi protocols.',
                'authors' => [
                    ['name' => 'Dr. Ahmad Al-Rashid', 'affiliation' => 'HEAC'],
                    ['name' => 'Sheikh Muhammad Al-Qadir', 'affiliation' => 'HEAC Shariah Board'],
                ],
                'publication_date' => now()->subMonths(1),
                'status' => 'published',
                'featured' => true,
            ],
            [
                'title' => 'Sukuk Market Analysis 2024',
                'slug' => 'sukuk-market-analysis-2024',
                'abstract' => 'An in-depth analysis of the global Sukuk market, examining trends, opportunities, and challenges in Islamic bond issuance and investment. Includes case studies from Malaysia, Saudi Arabia, and UAE.',
                'authors' => [
                    ['name' => 'Dr. Fatima Hassan', 'affiliation' => 'HEAC Research'],
                ],
                'publication_date' => now()->subMonths(2),
                'status' => 'published',
                'featured' => true,
            ],
            [
                'title' => 'Halal Business Certification Standards',
                'slug' => 'halal-business-certification-standards',
                'abstract' => 'A comprehensive overview of halal certification standards for businesses, covering food, cosmetics, pharmaceuticals, and services sectors. Aligned with international halal standards and best practices.',
                'authors' => [
                    ['name' => 'Sheikh Abdullah Al-Mansour', 'affiliation' => 'HEAC'],
                ],
                'publication_date' => now()->subMonths(3),
                'status' => 'published',
                'featured' => true,
            ],
            [
                'title' => 'Role of Sukuk in Sustainable Finance',
                'slug' => 'role-of-sukuk-in-sustainable-finance',
                'abstract' => 'Exploring the intersection of Islamic finance and sustainable development. This paper examines how Sukuk can be structured to support ESG objectives while maintaining Shariah compliance.',
                'authors' => [
                    ['name' => 'Dr. Yusuf Ibrahim', 'affiliation' => 'HEAC Research'],
                ],
                'publication_date' => now()->subMonths(4),
                'status' => 'published',
                'featured' => false,
            ],
            [
                'title' => 'Takaful Operations and Risk Management',
                'slug' => 'takaful-operations-risk-management',
                'abstract' => 'A comprehensive guide to Takaful operations, covering underwriting, claims management, investment strategies, and risk mitigation in Islamic insurance.',
                'authors' => [
                    ['name' => 'Dr. Aisha Rahman', 'affiliation' => 'HEAC'],
                ],
                'publication_date' => now()->subMonths(5),
                'status' => 'published',
                'featured' => false,
            ],
            [
                'title' => 'Islamic Finance Yearbook 2024',
                'slug' => 'islamic-finance-yearbook-2024',
                'abstract' => 'Annual review of the Islamic finance industry, featuring market statistics, regulatory developments, product innovations, and expert insights from leading practitioners worldwide.',
                'authors' => [
                    ['name' => 'HEAC Research Team', 'affiliation' => 'HEAC'],
                ],
                'publication_date' => now()->subMonths(6),
                'status' => 'published',
                'featured' => true,
            ],
            [
                'title' => 'Zakat Calculation for Modern Businesses',
                'slug' => 'zakat-calculation-modern-businesses',
                'abstract' => 'Practical guide for calculating Zakat on various business assets including inventory, receivables, investments, and digital assets. Includes examples and case studies.',
                'authors' => [
                    ['name' => 'Sheikh Omar Al-Farsi', 'affiliation' => 'HEAC Shariah Board'],
                ],
                'publication_date' => now()->subMonths(7),
                'status' => 'published',
                'featured' => false,
            ],
            [
                'title' => 'Fintech Innovation in Islamic Banking',
                'slug' => 'fintech-innovation-islamic-banking',
                'abstract' => 'Examining the impact of financial technology on Islamic banking. Covers digital wallets, robo-advisory, peer-to-peer financing, and regulatory technology (RegTech) solutions.',
                'authors' => [
                    ['name' => 'Dr. Hassan Malik', 'affiliation' => 'HEAC'],
                ],
                'publication_date' => now()->subMonths(8),
                'status' => 'published',
                'featured' => false,
            ],
        ];

        foreach ($publications as $pubData) {
            $publication = Research::updateOrCreate(
                ['slug' => $pubData['slug']],
                $pubData
            );
            
            if ($publication->wasRecentlyCreated || !$publication->categories()->count()) {
                $randomCategories = $categories->random(min(2, $categories->count()));
                $publication->categories()->sync($randomCategories->pluck('id'));
                
                $randomTags = $tags->random(min(3, $tags->count()));
                $publication->tags()->sync($randomTags->pluck('id'));
            }
        }
    }
}
