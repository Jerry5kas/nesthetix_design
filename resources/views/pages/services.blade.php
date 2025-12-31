<x-layouts.app 
    title="Services | {{ $theme['settings']['site_name'] ?? 'Nesthetix Designs' }}"
    description="Discover our comprehensive interior design services. From residential and commercial interiors to modular kitchens, we offer end-to-end design solutions tailored to your needs."
    canonical="{{ url('/services') }}">
    
    {{-- Hero Section --}}
    <section class="relative py-20 px-6 lg:px-16 overflow-hidden bg-gradient-to-b from-white to-gray-50" data-animate="fade-up">
        <div class="max-w-7xl mx-auto">
            <div class="text-center max-w-4xl mx-auto">
                {{-- Subheading Badge --}}
                <p 
                    class="text-theme-muted tracking-[0.3em] uppercase text-xs mb-3 font-medium"
                    style="font-family: 'Satoshi', sans-serif;"
                    data-animate="fade-up"
                    data-delay="0.1"
                >
                    What We Offer
                </p>

                {{-- Main Heading --}}
                <h1
                    class="font-light text-4xl md:text-5xl lg:text-6xl text-theme-primary leading-tight mb-4"
                    style="font-family: 'Canela Text Trial', serif; letter-spacing: -0.02em;"
                    data-animate="fade-up"
                    data-delay="0.2"
                >
                    Our Services
                </h1>

                {{-- Primary Divider --}}
                <div 
                    class="w-20 h-px bg-gradient-to-r from-[var(--color-primary)] to-transparent mx-auto mb-6"
                    data-animate="fade-up"
                    data-delay="0.3"
                ></div>

                {{-- Description --}}
                <p 
                    class="max-w-4xl mx-auto text-gray-700 text-base md:text-lg leading-relaxed mb-8"
                    style="font-family: 'Satoshi', sans-serif;"
                    data-animate="fade-up"
                    data-delay="0.4"
                >
                    At Nesthetix Designs, we provide comprehensive interior design solutions that transform spaces into beautiful, functional environments. Our services span from initial concept to final execution.
                </p>
            </div>
        </div>
    </section>

    {{-- Services Overview Section --}}
    <section class="relative py-12 px-6 lg:px-16 bg-white" id="services-overview">
        <div class="max-w-7xl mx-auto">
            <div x-data="servicesPage()" class="services-page-container">
                {{-- Service Navigation Tabs --}}
                <div class="service-tabs mb-12">
                    <div class="flex flex-wrap justify-center gap-3 md:gap-4">
                        <template x-for="(service, index) in services" :key="index">
                            <button
                                @click="activeService = index"
                                :class="activeService === index 
                                    ? 'bg-[var(--color-primary)] text-white shadow-lg' 
                                    : 'bg-gray-100 text-gray-700 hover:bg-gray-200'"
                                class="px-6 py-3 rounded-lg font-medium transition-all duration-300 text-sm md:text-base"
                                style="font-family: 'Satoshi', sans-serif;"
                                x-text="service.title"
                            ></button>
                        </template>
                    </div>
                </div>

                {{-- Service Details Section --}}
                <div class="service-details-container">
                    <template x-for="(service, index) in services" :key="index">
                        <div 
                            x-show="activeService === index"
                            x-transition:enter="transition ease-out duration-500"
                            x-transition:enter-start="opacity-0 translate-y-4"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            class="service-detail-section"
                        >
                            {{-- Service Header --}}
                            <div class="service-header mb-8">
                                <h2 
                                    class="text-3xl md:text-4xl lg:text-5xl font-light text-theme-primary mb-4"
                                    style="font-family: 'Canela Text Trial', serif; letter-spacing: -0.02em;"
                                    x-text="service.title"
                                ></h2>
                                <p 
                                    class="text-lg md:text-xl text-gray-700 leading-relaxed mb-6"
                                    style="font-family: 'Satoshi', sans-serif;"
                                    x-text="service.shortDescription"
                                ></p>
                                <div class="w-20 h-px bg-gradient-to-r from-[var(--color-primary)] to-transparent"></div>
                            </div>

                            {{-- Service Images Gallery --}}
                            <div class="service-images mb-12" x-show="service.images && service.images.length > 0">
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">
                                    <template x-for="(image, imgIndex) in service.images" :key="imgIndex">
                                        <div class="service-image-wrapper group">
                                            <img 
                                                :src="image" 
                                                :alt="service.title + ' - Image ' + (imgIndex + 1)"
                                                class="w-full h-64 object-cover rounded-lg transition-transform duration-500 group-hover:scale-105"
                                                loading="lazy"
                                            />
                                        </div>
                                    </template>
                                </div>
                            </div>

                            {{-- Service Description --}}
                            <div class="service-description mb-12">
                                <p 
                                    class="text-gray-700 text-base md:text-lg leading-relaxed"
                                    style="font-family: 'Satoshi', sans-serif;"
                                    x-text="service.description"
                                ></p>
                            </div>

                            {{-- Service Scope --}}
                            <div class="service-scope mb-12" x-show="service.scope && service.scope.length > 0">
                                <h3 
                                    class="text-2xl md:text-3xl font-light text-theme-primary mb-8"
                                    style="font-family: 'Canela Text Trial', serif;"
                                >
                                    Scope of <span x-text="service.title"></span>
                                </h3>
                                
                                <div class="space-y-8">
                                    <template x-for="(scopeItem, scopeIndex) in service.scope" :key="scopeIndex">
                                        <div class="scope-category">
                                            <h4 
                                                class="text-xl md:text-2xl font-semibold text-theme-secondary mb-4"
                                                style="font-family: 'Satoshi', sans-serif;"
                                                x-text="scopeItem.category"
                                            ></h4>
                                            <ul class="space-y-2">
                                                <template x-for="(item, itemIndex) in scopeItem.items" :key="itemIndex">
                                                    <li 
                                                        class="flex items-start gap-3 text-gray-700"
                                                        style="font-family: 'Satoshi', sans-serif;"
                                                    >
                                                        <svg class="w-5 h-5 text-[var(--color-primary)] mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                                        </svg>
                                                        <span x-text="item"></span>
                                                    </li>
                                                </template>
                                            </ul>
                                        </div>
                                    </template>
                                </div>
                            </div>

                            {{-- What Defines Section --}}
                            <div class="service-defines" x-show="service.defines && service.defines.length > 0">
                                <h3 
                                    class="text-2xl md:text-3xl font-light text-theme-primary mb-8"
                                    style="font-family: 'Canela Text Trial', serif;"
                                >
                                    What Defines Our <span x-text="service.title"></span>
                                </h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <template x-for="(define, defineIndex) in service.defines" :key="defineIndex">
                                        <div class="flex items-start gap-3 p-4 bg-gray-50 rounded-lg">
                                            <svg class="w-6 h-6 text-[var(--color-primary)] mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                            </svg>
                                            <span 
                                                class="text-gray-700 font-medium"
                                                style="font-family: 'Satoshi', sans-serif;"
                                                x-text="define"
                                            ></span>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </section>

    {{-- Why Choose Section --}}
    <x-why-choose />

</x-layouts.app>

<script>
function servicesPage() {
    return {
        activeService: 0,
        
        services: [
            {
                title: 'Luxury Interiors',
                shortDescription: 'Premium, high-end interiors crafted with bespoke design, exquisite materials, and exceptional detailing.',
                description: 'Our luxury interior services are designed for clients who seek exclusivity, refinement, and uncompromising quality. Every project is approached as a fully customized experience, where design, materials, and execution come together seamlessly.',
                images: [
                    'https://dlifeinteriors.com/wp-content/uploads/2024/12/Living-and-kitchen-design-for-studio-apartment.jpg',
                    'https://nppartners.net/wp-content/uploads/2023/02/NPP-luxury-home-interiors.png',
                    'https://brabbu.com/blog/wp-content/uploads/2019/07/Top-20-Interior-Designers-India-ZZ-Architects.jpg'
                ],
                scope: [
                    {
                        category: 'Luxury Residential Interiors',
                        items: [
                            'High-end apartment interiors',
                            'Premium villa and bungalow interiors',
                            'Independent luxury home interiors',
                            'Penthouse and duplex interiors'
                        ]
                    },
                    {
                        category: 'Bespoke Interior Design',
                        items: [
                            'Fully customized design concepts',
                            'Tailor-made layouts and space planning',
                            'Exclusive design themes curated per client',
                            'High-detail design development and styling'
                        ]
                    },
                    {
                        category: 'Custom Furniture & Joinery',
                        items: [
                            'Bespoke furniture design and manufacturing',
                            'Custom wardrobes, wall panels, and storage',
                            'Handcrafted woodwork and detailed joinery',
                            'Upholstered furniture and soft furnishings'
                        ]
                    },
                    {
                        category: 'Premium Materials & Finishes',
                        items: [
                            'Imported and premium surface finishes',
                            'Natural stone, marble, veneer, and metal detailing',
                            'High-quality laminates, paints, and textures',
                            'Luxury hardware and fittings'
                        ]
                    },
                    {
                        category: 'False Ceiling & Designer Lighting',
                        items: [
                            'High-end ceiling designs with layered detailing',
                            'Architectural and decorative lighting concepts',
                            'Mood lighting and ambient lighting planning',
                            'Statement chandeliers and feature lights'
                        ]
                    },
                    {
                        category: 'Luxury Kitchens & Wardrobes',
                        items: [
                            'High-end modular kitchens',
                            'Custom-designed luxury kitchen units',
                            'Premium wardrobes with internal accessories',
                            'Imported fittings and soft-close systems'
                        ]
                    },
                    {
                        category: 'Bathrooms & Spa-Style Spaces',
                        items: [
                            'Luxury bathroom interiors',
                            'Spa-inspired design concepts',
                            'Premium sanitaryware and fittings',
                            'Natural stone and designer tile applications'
                        ]
                    },
                    {
                        category: 'Technology & Smart Integration',
                        items: [
                            'Home automation-ready planning',
                            'Smart lighting and electrical layouts',
                            'Concealed wiring and integrated systems'
                        ]
                    },
                    {
                        category: 'Complete Turnkey Execution',
                        items: [
                            'End-to-end project execution',
                            'Skilled craftsmanship and site supervision',
                            'Vendor and material coordination',
                            'Strict quality control and detailing checks'
                        ]
                    },
                    {
                        category: 'High-Precision Project Management',
                        items: [
                            'Dedicated luxury project management',
                            'Timeline-driven execution',
                            'On-site coordination and supervision',
                            'White-glove project handover'
                        ]
                    }
                ],
                defines: [
                    'Bespoke, design-led approach',
                    'Premium and imported materials',
                    'Exceptional craftsmanship',
                    'High attention to detailing',
                    'Seamless design-to-execution delivery'
                ]
            },
            {
                title: 'Residential Interiors',
                shortDescription: 'Thoughtfully designed homes that reflect your lifestyle, culture, and everyday needs.',
                description: 'Our residential interior services are designed to deliver fully customized, functional, and aesthetically refined homes. From individual residences to large-scale housing projects, we manage the entire interior journey with clarity and precision.',
                images: [
                    'https://www.andacademy.com/resources/wp-content/uploads/2024/04/2-6.webp',
                    'https://dlifeinteriors.com/wp-content/uploads/2022/09/living-room-design-apartment-interior-project-kochi.jpg',
                    'https://media.designcafe.com/wp-content/uploads/2021/06/17170725/indian-villa-design-interiors-for-your-home.jpg',
                    'https://media.designcafe.com/wp-content/uploads/2020/07/22202124/independent-house-interior-design-with-living-room.jpg'
                ],
                scope: [
                    {
                        category: 'Complete Home Interior Solutions',
                        items: [
                            'Apartment and flat interiors',
                            'Villa and independent house interiors',
                            'Duplex and penthouse interiors',
                            'Full home renovation and upgrades'
                        ]
                    },
                    {
                        category: 'Space Planning & Layout Design',
                        items: [
                            'Detailed floor planning',
                            'Functional zoning and circulation planning',
                            'Furniture layout and placement planning',
                            'Storage and usability optimization'
                        ]
                    },
                    {
                        category: 'Living & Common Area Interiors',
                        items: [
                            'Living room and family lounge design',
                            'Dining area interiors',
                            'Foyer and entrance area design',
                            'Passage and transition space planning'
                        ]
                    },
                    {
                        category: 'Bedroom Interior Design',
                        items: [
                            'Master bedroom interiors',
                            'Guest bedroom interiors',
                            'Kids\' bedroom interiors',
                            'Wardrobe and dressing area integration'
                        ]
                    },
                    {
                        category: 'Kitchen & Utility Areas',
                        items: [
                            'Modular kitchen design and execution',
                            'Kitchen storage and workflow planning',
                            'Utility and service area design'
                        ]
                    },
                    {
                        category: 'Wardrobes & Storage Systems',
                        items: [
                            'Custom wardrobes and closets',
                            'Loft storage and concealed units',
                            'Multi-functional storage solutions'
                        ]
                    },
                    {
                        category: 'Bathroom & Toilet Interiors',
                        items: [
                            'Residential bathroom design',
                            'Premium fittings and sanitary layouts',
                            'Wet and dry area planning'
                        ]
                    },
                    {
                        category: 'False Ceiling & Lighting Design',
                        items: [
                            'Decorative and functional ceiling designs',
                            'Ambient, task, and accent lighting',
                            'Electrical layout and switch planning'
                        ]
                    },
                    {
                        category: 'Pooja & Spiritual Spaces',
                        items: [
                            'Pooja room and mandir design',
                            'Vastu-aligned layout planning',
                            'Traditional and contemporary interpretations'
                        ]
                    },
                    {
                        category: 'Balcony & Outdoor Living',
                        items: [
                            'Balcony interiors and sit-out spaces',
                            'Green balcony and relaxation zones'
                        ]
                    },
                    {
                        category: 'Home Office & Study Areas',
                        items: [
                            'Work-from-home space design',
                            'Study rooms and reading corners'
                        ]
                    },
                    {
                        category: 'Material & Finish Selection',
                        items: [
                            'Flooring, wall finishes, and textures',
                            'Paint, wallpaper, and surface selections',
                            'Hardware and accessory specification'
                        ]
                    },
                    {
                        category: 'Design Visualization & Documentation',
                        items: [
                            '3D interior views and walkthroughs',
                            'Detailed working drawings',
                            'Electrical and plumbing drawings'
                        ]
                    },
                    {
                        category: 'Turnkey Execution & Project Delivery',
                        items: [
                            'End-to-end site execution',
                            'Vendor and material coordination',
                            'Quality checks and supervision',
                            'On-time project handover'
                        ]
                    }
                ],
                defines: [
                    'Lifestyle-focused design approach',
                    'Custom layouts for Indian homes',
                    'High-quality materials and finishes',
                    'End-to-end turnkey delivery',
                    'Transparent timelines and execution'
                ]
            },
            {
                title: 'Commercial Interiors',
                shortDescription: 'Well-designed commercial environments that support productivity, efficiency, and brand identity.',
                description: 'Our commercial interior services are structured to deliver high-performance workspaces and business environments. We manage design, planning, and execution with a strong focus on functionality, technical accuracy, and brand alignment.',
                images: [
                    'https://www.cherryhill.in/blog/wp-content/uploads/2021/09/17.jpg',
                    'https://elledecor.in/wp-content/uploads/2024/09/V12_OL.jpg',
                    'https://blog.spacematrix.com/wp-content/uploads/2025/05/avendus-mumbai-work-cafe-employee-experience-1.webp',
                    'https://jumanji.livspace-cdn.com/magazine/wp-content/uploads/sites/2/2023/06/29165228/retail-interior-design-1-1.jpg',
                    'https://i0.wp.com/addindiagroup.com/wp-content/uploads/2024/04/SC408584_LR-2-scaled.jpg?fit=800%2C534&ssl=1'
                ],
                scope: [
                    {
                        category: 'Corporate & Office Interiors',
                        items: [
                            'Corporate office interior design',
                            'IT offices and corporate workspaces',
                            'Co-working and flexible office spaces',
                            'Corporate headquarters interiors'
                        ]
                    },
                    {
                        category: 'Workspace Planning & Optimization',
                        items: [
                            'Space planning and zoning',
                            'Workstation and seating layouts',
                            'Collaboration and interaction areas',
                            'Circulation and movement planning'
                        ]
                    },
                    {
                        category: 'Front-of-House & Client Areas',
                        items: [
                            'Reception and waiting areas',
                            'Visitor lounges and display spaces',
                            'Brand-oriented front office design'
                        ]
                    },
                    {
                        category: 'Meeting & Collaboration Spaces',
                        items: [
                            'Conference rooms and boardrooms',
                            'Meeting rooms and discussion zones',
                            'Training rooms and presentation spaces'
                        ]
                    },
                    {
                        category: 'Executive & Management Areas',
                        items: [
                            'Director and leadership cabins',
                            'Managerial offices and private cabins',
                            'Confidential meeting areas'
                        ]
                    },
                    {
                        category: 'Open Office & Team Zones',
                        items: [
                            'Open workstation layouts',
                            'Team collaboration spaces',
                            'Breakout and informal work zones'
                        ]
                    },
                    {
                        category: 'Pantry, Cafeteria & Break Areas',
                        items: [
                            'Office pantry design',
                            'Cafeteria and dining spaces',
                            'Employee relaxation areas'
                        ]
                    },
                    {
                        category: 'Retail & Business Interiors',
                        items: [
                            'Retail store interiors',
                            'Showrooms and display spaces',
                            'Experience centers and brand outlets'
                        ]
                    },
                    {
                        category: 'Specialized Commercial Spaces',
                        items: [
                            'Clinics and healthcare interiors',
                            'Studios, creative spaces, and agencies',
                            'Cafes, service centers, and small businesses'
                        ]
                    },
                    {
                        category: 'False Ceiling & Commercial Lighting',
                        items: [
                            'Functional and decorative ceiling systems',
                            'Task lighting, ambient lighting, and feature lighting',
                            'Energy-efficient lighting planning'
                        ]
                    },
                    {
                        category: 'MEP & Technical Services',
                        items: [
                            'Electrical planning and load management',
                            'HVAC and air-conditioning coordination',
                            'Plumbing and drainage layouts',
                            'Fire safety and compliance support'
                        ]
                    },
                    {
                        category: 'Technology & Infrastructure Planning',
                        items: [
                            'Data and networking layouts',
                            'AV and presentation systems',
                            'Access control and security planning'
                        ]
                    },
                    {
                        category: 'Turnkey Execution & Fit-Out',
                        items: [
                            'Complete commercial interior execution',
                            'Vendor and contractor coordination',
                            'Quality control and site supervision',
                            'Timely project completion'
                        ]
                    },
                    {
                        category: 'Project Management & Delivery',
                        items: [
                            'Dedicated project management',
                            'Timeline and milestone tracking',
                            'On-site coordination and reporting',
                            'Smooth handover and close-out'
                        ]
                    }
                ],
                defines: [
                    'Business-focused design approach',
                    'Strong technical and MEP coordination',
                    'Brand-aligned interiors',
                    'Scalable solutions for growing teams',
                    'Reliable timelines and execution'
                ]
            },
            {
                title: 'Modular Kitchens',
                shortDescription: 'Modern, functional kitchens designed with precision, efficiency, and refined aesthetics.',
                description: 'Our modular kitchen services are tailored to Indian cooking habits, space constraints, and modern lifestyles. We deliver end-to-end kitchen solutions that balance design, durability, and everyday functionality.',
                images: [
                    'https://bysuryavanshi.com/cdn/shop/articles/10-smart-small-modular-kitchen-design-ideas-for-in_987ad053-b8f8-4d69-a1e5-63b7709275e9.jpg?v=1749548329&width=1100',
                    'https://i.pinimg.com/originals/55/10/98/55109829f968e5e3b3ae9e13bdfe96b1.jpg',
                    'https://www.buildingmaterialreporter.com/uploads/blogs/files/ModularKitchensBMR.jpg',
                    'https://st.hzcdn.com/simgs/71d118620470598a_16-0042/home-design.jpg'
                ],
                scope: [
                    {
                        category: 'Complete Modular Kitchen Solutions',
                        items: [
                            'End-to-end modular kitchen design and execution',
                            'New kitchen interiors and kitchen renovations',
                            'Integrated kitchen and utility planning'
                        ]
                    },
                    {
                        category: 'Kitchen Layout Planning',
                        items: [
                            'L-shaped modular kitchens',
                            'U-shaped modular kitchens',
                            'Parallel kitchen layouts',
                            'Island and peninsula kitchens'
                        ]
                    },
                    {
                        category: 'Cabinetry & Storage Systems',
                        items: [
                            'Modular base and wall cabinets',
                            'Tall units and pantry systems',
                            'Drawer systems and internal accessories',
                            'Soft-close hardware and premium fittings'
                        ]
                    },
                    {
                        category: 'Countertops & Backsplashes',
                        items: [
                            'Granite, quartz, and engineered stone countertops',
                            'Backsplash design and material selection',
                            'Edge detailing and finish coordination'
                        ]
                    },
                    {
                        category: 'Shutters, Finishes & Materials',
                        items: [
                            'Laminates, acrylic, membrane, and veneer finishes',
                            'Matte, gloss, and textured surfaces',
                            'Moisture-resistant and durable materials'
                        ]
                    },
                    {
                        category: 'Appliance & Utility Integration',
                        items: [
                            'Hob, chimney, and built-in appliance planning',
                            'Microwave, oven, dishwasher integration',
                            'Sink and plumbing coordination'
                        ]
                    },
                    {
                        category: 'Lighting & Electrical Planning',
                        items: [
                            'Task lighting and under-cabinet lighting',
                            'Ambient kitchen lighting',
                            'Electrical points and switch planning'
                        ]
                    },
                    {
                        category: 'Ergonomics & Workflow Design',
                        items: [
                            'Efficient work triangle planning',
                            'Counter height and accessibility optimization',
                            'Storage zoning for Indian cooking styles'
                        ]
                    },
                    {
                        category: 'Utility & Service Area Design',
                        items: [
                            'Utility area layout planning',
                            'Washing machine and sink integration',
                            'Storage for cleaning and service items'
                        ]
                    },
                    {
                        category: 'Quality Installation & Execution',
                        items: [
                            'Factory-finished modular installation',
                            'On-site coordination and supervision',
                            'Quality checks and finishing'
                        ]
                    },
                    {
                        category: 'Project Management & Delivery',
                        items: [
                            'Timeline-based execution',
                            'Vendor coordination',
                            'Final inspection and handover'
                        ]
                    }
                ],
                defines: [
                    'Designed for Indian cooking needs',
                    'Smart storage and ergonomic layouts',
                    'Durable materials and premium fittings',
                    'Clean installation and finishing',
                    'End-to-end service under one roof'
                ]
            },
            {
                title: 'Design-Only Services',
                shortDescription: 'Professional interior design planning that transforms ideas into clear, executable design solutions.',
                description: 'Our design-only services are ideal for clients who require expert design direction without execution. We provide structured, detailed, and technically sound design documentation that enables smooth and accurate implementation.',
                images: [
                    'https://www.skygreeninterior.com/wp-content/uploads/2023/06/Interior-consulting.jpg',
                    'https://i0.wp.com/civillane.com/wp-content/uploads/2020/04/3D-Living-Room-View.jpg',
                    'https://thelittledesigncorner.com/cdn/shop/articles/Copy_of_Blog_Pinterest_Pin_2.png?v=1747169353',
                    'https://cdn.shopify.com/s/files/1/0550/1075/4765/files/room-interior-design-building-furniture-turquoise-ceiling-1632295-pxhere.com.jpg?v=1659625911'
                ],
                scope: [
                    {
                        category: 'Design Consultation & Brief Development',
                        items: [
                            'Initial design consultation',
                            'Requirement analysis and design brief formulation',
                            'Lifestyle, functional, and aesthetic assessment'
                        ]
                    },
                    {
                        category: 'Space Planning & Layout Design',
                        items: [
                            'Detailed floor plans and zoning',
                            'Furniture layout and circulation planning',
                            'Storage and usability optimization'
                        ]
                    },
                    {
                        category: 'Concept Design Development',
                        items: [
                            'Design theme and style definition',
                            'Mood boards and concept visuals',
                            'Color palette and finish direction'
                        ]
                    },
                    {
                        category: '3D Design & Visualization',
                        items: [
                            'High-quality 3D interior views',
                            'Perspective renders for key spaces',
                            'Design walkthroughs and visual presentations'
                        ]
                    },
                    {
                        category: 'Material & Finish Specification',
                        items: [
                            'Flooring, wall, and ceiling material selection',
                            'Furniture finishes and surface specifications',
                            'Hardware, fittings, and accessory recommendations'
                        ]
                    },
                    {
                        category: 'Technical Drawings & Documentation',
                        items: [
                            'Working drawings for carpentry and furniture',
                            'Electrical layout and lighting drawings',
                            'Plumbing and sanitary layouts',
                            'Ceiling and partition drawings'
                        ]
                    },
                    {
                        category: 'Kitchen & Wardrobe Design',
                        items: [
                            'Modular kitchen layout and detailing',
                            'Wardrobe and storage design drawings',
                            'Internal accessories and fittings planning'
                        ]
                    },
                    {
                        category: 'Lighting Design Planning',
                        items: [
                            'Lighting concept and fixture placement',
                            'Task, ambient, and accent lighting layouts'
                        ]
                    },
                    {
                        category: 'Budget Guidance & Design Alignment',
                        items: [
                            'Design-to-budget planning support',
                            'Material alternatives and value optimization'
                        ]
                    },
                    {
                        category: 'Design Coordination Support',
                        items: [
                            'Clarification and design explanation sessions',
                            'Vendor and contractor coordination assistance'
                        ]
                    }
                ],
                defines: [
                    'Clear and execution-ready documentation',
                    'Design solutions aligned with Indian usage patterns',
                    'Professional visualization and detailing',
                    'Flexible support for third-party execution'
                ]
            },
            {
                title: 'Execution-Only Services',
                shortDescription: 'Expert interior execution and project management for designs developed by you or a third party.',
                description: 'Our execution-only services are designed for clients who already have finalized designs and require experienced professionals to deliver them accurately. We focus on quality workmanship, precise coordination, and disciplined project management.',
                images: [
                    'https://www.decormyplace.in/servicebanner/84115881highest_rated_interior_designer_in_pune-02.jpg',
                    'https://quickinterior.in/wp-content/uploads/2021/07/Project-Management-For-Interior-Designing.jpeg',
                    'https://www.bhattacharyaandassociates.com/img/service/interior2.jpg',
                    'https://www.niveeta.in/images/products/modern-office-fitout-renovation-delhi.webp'
                ],
                scope: [
                    {
                        category: 'Interior Project Execution',
                        items: [
                            'Complete interior fit-out execution',
                            'Residential and commercial interior works',
                            'New interiors and renovation projects'
                        ]
                    },
                    {
                        category: 'Site Management & Supervision',
                        items: [
                            'Dedicated site supervision',
                            'Day-to-day execution monitoring',
                            'On-site coordination and reporting'
                        ]
                    },
                    {
                        category: 'Vendor & Contractor Coordination',
                        items: [
                            'Management of carpentry, electrical, plumbing, and finishing teams',
                            'Coordination with client-appointed vendors',
                            'Scheduling and workflow management'
                        ]
                    },
                    {
                        category: 'Carpentry & Furniture Works',
                        items: [
                            'Custom furniture execution',
                            'Modular and on-site carpentry installation',
                            'Wardrobes, cabinets, and paneling works'
                        ]
                    },
                    {
                        category: 'Electrical & Lighting Works',
                        items: [
                            'Electrical wiring and point execution',
                            'Lighting fixture installation',
                            'Switches, sockets, and control systems'
                        ]
                    },
                    {
                        category: 'Plumbing & Sanitary Works',
                        items: [
                            'Plumbing line execution',
                            'Sanitaryware and fitting installation',
                            'Wet area finishing and testing'
                        ]
                    },
                    {
                        category: 'False Ceiling & Partition Works',
                        items: [
                            'Gypsum, POP, and modular ceilings',
                            'Glass, wood, and partition installations'
                        ]
                    },
                    {
                        category: 'Surface Finishes & Detailing',
                        items: [
                            'Painting and wall finishes',
                            'Polishing, laminates, veneers, and textures',
                            'Flooring installation and finishing'
                        ]
                    },
                    {
                        category: 'Material Handling & Quality Control',
                        items: [
                            'Material inspection and approvals',
                            'Quality checks at every stage',
                            'Adherence to design and specification standards'
                        ]
                    },
                    {
                        category: 'Timeline & Cost Management',
                        items: [
                            'Execution scheduling and milestone tracking',
                            'Budget monitoring as per approved scope'
                        ]
                    },
                    {
                        category: 'Final Finishing & Handover',
                        items: [
                            'Snag list preparation and closure',
                            'Final inspections and clean handover'
                        ]
                    }
                ],
                defines: [
                    'Accurate implementation of approved designs',
                    'Skilled workforce and site discipline',
                    'Strong vendor coordination',
                    'Quality-driven execution approach',
                    'Reliable timelines and supervision'
                ]
            },
            {
                title: 'Budget-Based Interiors',
                shortDescription: 'Thoughtful interior solutions designed to deliver maximum value within a defined budget.',
                description: 'Our budget-based interior services are designed for clients who seek functional, well-designed spaces with controlled costs. We focus on intelligent planning, durable materials, and efficient execution to achieve reliable outcomes without unnecessary complexity.',
                images: [
                    'https://static.asianpaints.com/content/dam/asianpaintsbeautifulhomes/202207/10-best-tips-on-budget-friendly-home-interior-designs/living-room-designs-indian-style-low-budget.jpg',
                    'https://images.homify.com/image/upload/c_scale%2Ch_500%2Cw_500/v1518769340/p/photo/image/2438304/004_final.jpg',
                    'https://static.asianpaints.com/content/dam/asianpaintsbeautifulhomes/202207/10-best-tips-on-budget-friendly-home-interior-designs/interior-design-low-cost.jpg',
                    'https://media.designcafe.com/wp-content/uploads/2023/12/08164206/appliance-for-low-budget-small-space-modular-kitchen-design.jpg'
                ],
                scope: [
                    {
                        category: 'Complete Budget Interior Solutions',
                        items: [
                            'Budget-friendly home interior design and execution',
                            'Interiors for apartments and compact homes',
                            'Partial and full interior upgrades'
                        ]
                    },
                    {
                        category: 'Efficient Space Planning',
                        items: [
                            'Practical layout planning',
                            'Space optimization for compact homes',
                            'Functional zoning and circulation'
                        ]
                    },
                    {
                        category: 'Standardized Design Solutions',
                        items: [
                            'Clean, modern design themes',
                            'Proven layouts and design formats',
                            'Streamlined design detailing'
                        ]
                    },
                    {
                        category: 'Cost-Optimized Materials & Finishes',
                        items: [
                            'Budget-friendly laminates and surfaces',
                            'Durable flooring and wall finishes',
                            'Essential hardware and fittings'
                        ]
                    },
                    {
                        category: 'Modular Kitchens & Storage',
                        items: [
                            'Cost-efficient modular kitchen solutions',
                            'Standard cabinetry and storage systems',
                            'Practical accessories and fittings'
                        ]
                    },
                    {
                        category: 'Wardrobes & Furniture',
                        items: [
                            'Functional wardrobes and cabinets',
                            'Essential furniture design and execution'
                        ]
                    },
                    {
                        category: 'False Ceiling & Lighting',
                        items: [
                            'Basic false ceiling solutions',
                            'Essential lighting layouts for everyday use'
                        ]
                    },
                    {
                        category: 'Electrical & Plumbing Execution',
                        items: [
                            'Standard electrical and plumbing works',
                            'Efficient planning to avoid rework'
                        ]
                    },
                    {
                        category: 'Phased Execution Options',
                        items: [
                            'Stage-wise interior execution',
                            'Flexible timelines aligned with budget planning'
                        ]
                    },
                    {
                        category: 'Project Management & Delivery',
                        items: [
                            'Controlled execution process',
                            'Vendor coordination and supervision',
                            'On-time handover within approved scope'
                        ]
                    }
                ],
                defines: [
                    'Cost-conscious planning',
                    'Functional and practical design solutions',
                    'Reliable materials and workmanship',
                    'Clear scope and transparent execution',
                    'Balanced design and affordability'
                ]
            }
        ]
    }
}
</script>

<style>
.services-page-container {
    min-height: 60vh;
}

.service-tabs {
    position: sticky;
    top: 80px;
    z-index: 40;
    background: white;
    padding: 1.5rem 0;
    margin: -1.5rem 0 1.5rem;
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
}

.service-detail-section {
    animation: fadeInUp 0.6s ease-out;
}

.service-header {
    text-align: center;
}

.service-images {
    margin-top: 3rem;
}

.service-image-wrapper {
    overflow: hidden;
    border-radius: 0.5rem;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.service-description {
    max-width: 4xl;
    margin-left: auto;
    margin-right: auto;
}

.service-scope {
    background: rgba(50, 1, 47, 0.02);
    padding: 3rem;
    border-radius: 1rem;
    margin-top: 3rem;
}

.scope-category {
    background: white;
    padding: 2rem;
    border-radius: 0.75rem;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
}

.scope-category ul {
    list-style: none;
    padding: 0;
}

.service-defines {
    margin-top: 3rem;
    padding-top: 3rem;
    border-top: 1px solid rgba(0, 0, 0, 0.1);
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Responsive Design */
@media (max-width: 1024px) {
    .service-tabs {
        top: 60px;
        padding: 1rem 0;
    }
    
    .service-scope {
        padding: 2rem 1.5rem;
    }
    
    .scope-category {
        padding: 1.5rem;
    }
}

@media (max-width: 768px) {
    .service-tabs {
        position: relative;
        top: 0;
        padding: 1rem 0;
    }
    
    .service-header h2 {
        font-size: 2rem;
    }
    
    .service-images {
        margin-top: 2rem;
    }
    
    .service-scope {
        padding: 1.5rem 1rem;
        margin-top: 2rem;
    }
    
    .scope-category {
        padding: 1.25rem;
    }
    
    .scope-category h4 {
        font-size: 1.125rem;
    }
    
    .service-defines {
        margin-top: 2rem;
        padding-top: 2rem;
    }
    
    .service-defines h3 {
        font-size: 1.5rem;
    }
}

@media (max-width: 640px) {
    .service-tabs button {
        font-size: 0.75rem;
        padding: 0.5rem 1rem;
    }
    
    .service-header h2 {
        font-size: 1.75rem;
    }
    
    .service-scope {
        padding: 1rem;
    }
    
    .scope-category {
        padding: 1rem;
    }
}
</style>
