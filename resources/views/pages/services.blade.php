<x-layouts.app title="Services | {{ $theme['settings']['site_name'] ?? 'Nesthetix Designs' }}"
    description="Discover our comprehensive interior design services. From residential and commercial interiors to modular kitchens, we offer end-to-end design solutions tailored to your needs."
    canonical="{{ url('/services') }}">

    {{-- Hero Section --}}
    <section
        class="relative py-14 lg:py-20 px-6 lg:px-16 overflow-hidden hero-banner-section flex items-center justify-center min-h-[40vh]"
        data-animate="fade-up">
        <div class="absolute inset-0 z-0">
            <img src="https://ik.imagekit.io/AthaConstruction/assets/pexels-heyho-7535051_694fc1910371b6.19892859_OG657SCTl.jpg"
                alt="Interior Design Services" class="w-full h-full object-cover" loading="eager" />
        </div>
        {{-- Gradient Overlay for better text readability and depth --}}
        <div class="absolute inset-0 z-[5] bg-gradient-to-b from-black/70 via-black/40 to-black/70"></div>

        <div class="relative z-10 max-w-3xl mx-auto text-center">
            <p class="text-[#D4AF37] tracking-[0.3em] uppercase text-[10px] md:text-xs mb-3 font-medium"
                style="font-family: 'Satoshi', sans-serif;" data-animate="fade-up" data-delay="0.1">
                Our Expertise
            </p>
            <h1 class="font-light text-3xl md:text-4xl lg:text-5xl text-white leading-tight mb-4"
                style="font-family: 'Canela Text Trial', serif; letter-spacing: -0.02em;" data-animate="fade-up"
                data-delay="0.2">
                Curated Design Services
            </h1>
            <div class="w-16 h-px bg-gradient-to-r from-[#D4AF37] to-transparent mx-auto mb-5" data-animate="fade-up"
                data-delay="0.3"></div>
            <p class="max-w-xl mx-auto text-white/90 text-sm md:text-base font-light leading-relaxed"
                style="font-family: 'Satoshi', sans-serif;" data-animate="fade-up" data-delay="0.4">
                Comprehensive interior solutions that blend aesthetic vision with technical precision.
            </p>
        </div>
    </section>

    {{-- Services Section --}}
    <section class="relative py-20 lg:py-32 bg-[#0c0c0c] overflow-hidden" id="services-overview">
        {{-- Brand Background Pattern --}}
        <div class="absolute inset-0 bg-pattern-dark-radial opacity-40 -z-10"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-[#0c0c0c] via-transparent to-[#0c0c0c] -z-10"></div>

        <div class="max-w-[90rem] mx-auto px-6 lg:px-16" x-data="servicesPage()">
            <div class="space-y-32 lg:space-y-48">
                <template x-for="(service, index) in services" :key="index">
                    <div class="service-section group relative">
                        {{-- Background Glow --}}
                        <div
                            class="absolute -inset-x-20 -inset-y-32 bg-radial-gradient from-[#D4AF37]/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-1000 -z-10 pointer-events-none">
                        </div>

                        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">

                            {{-- Text Content Column --}}
                            <div class="lg:col-span-6 flex flex-col justify-center"
                                :class="index % 2 === 0 ? 'lg:order-1 lg:pr-12' : 'lg:order-2 lg:pl-12'">

                                {{-- Header --}}
                                <div class="relative space-y-4 mb-10">
                                    <div class="flex items-center gap-4 mb-2" data-animate="fade-up">
                                        <div class="w-10 h-px bg-[#D4AF37]/60"></div>
                                        <span class="font-medium tracking-[0.3em] text-[10px] uppercase text-[#D4AF37]"
                                            style="font-family: 'Satoshi', sans-serif;">
                                            Service <span x-text="'0' + (index + 1)"></span>
                                        </span>
                                    </div>

                                    <h2 class="text-4xl md:text-5xl lg:text-6xl font-light leading-[1.1] text-white"
                                        style="font-family: 'Canela Text Trial', serif; letter-spacing: -0.02em;"
                                        x-text="service.title" data-text="split-lines"></h2>

                                    <p class="text-base text-gray-400 leading-relaxed font-light max-w-xl"
                                        style="font-family: 'Satoshi', sans-serif;" x-text="service.description"
                                        data-animate="fade-up">
                                    </p>
                                </div>

                                {{-- Compact Scope Section --}}
                                <div class="space-y-8 border-t border-white/10 pt-8" data-animate="fade-up">
                                    <h3 class="text-[10px] font-bold uppercase tracking-[0.2em] text-[#D4AF37]/60"
                                        style="font-family: 'Satoshi', sans-serif;">Service Highlights</h3>

                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-8 gap-y-6">
                                        <template x-for="scopeItem in service.scope">
                                            <div class="group/scope transition-all duration-500">
                                                <h4 class="text-xs font-semibold text-white/90 mb-1.5 flex items-center gap-2"
                                                    style="font-family: 'Satoshi', sans-serif;">
                                                    <span
                                                        class="w-1 h-1 rounded-full bg-[#D4AF37] group-hover/scope:scale-125 transition-transform"></span>
                                                    <span x-text="scopeItem.category"></span>
                                                </h4>
                                                <p class="text-[11px] text-gray-50/[0.85] leading-relaxed font-light pl-2.5 border-l border-white/10 group-hover/scope:border-[#D4AF37]/40 transition-colors"
                                                    x-text="scopeItem.items.join(' • ')"></p>
                                            </div>
                                        </template>
                                    </div>
                                </div>

                                {{-- Attributes (Pills) --}}
                                <div class="flex flex-wrap gap-2 mt-12" data-animate="fade-up">
                                    <template x-for="define in service.defines">
                                        <span
                                            class="px-3 py-1.5 rounded-full border border-white/10 text-[9px] uppercase tracking-wider text-gray-500 hover:text-[#D4AF37] hover:border-[#D4AF37]/50 transition-all duration-300"
                                            style="font-family: 'Satoshi', sans-serif;" x-text="define"></span>
                                    </template>
                                </div>
                            </div>

                            {{-- Dynamic Image Composition --}}
                            <div class="lg:col-span-6 w-full" :class="index % 2 === 0 ? 'lg:order-2' : 'lg:order-1'">

                                <div class="relative w-full aspect-[4/5]">
                                    {{-- Main Feature Image --}}
                                    <div class="absolute inset-0 w-full h-full overflow-hidden rounded-2xl shadow-2xl border border-white/10"
                                        data-reveal="clip">
                                        <img :src="service.images[0]"
                                            class="absolute inset-x-0 -top-[10%] w-full h-[120%] object-cover transition-transform duration-[2s] ease-out group-hover:scale-110"
                                            :alt="service.title" data-parallax="0.1">
                                        <div
                                            class="absolute inset-0 bg-gradient-to-t from-[#0c0c0c] via-transparent to-transparent opacity-40">
                                        </div>
                                    </div>

                                    {{-- Accent Floating Image --}}
                                    <div class="absolute -bottom-6 w-52 h-64 rounded-xl overflow-hidden shadow-[0_40px_80px_rgba(0,0,0,0.9)] border border-white/10 z-10 hidden xl:block translate-y-4 group-hover:translate-y-0 transition-all duration-1000"
                                        x-show="service.images[1]" :class="index % 2 === 0 ? '-left-8' : '-right-8'"
                                        data-animate="fade-up">
                                        <img :src="service.images[1]"
                                            class="w-full h-full object-cover transform transition-transform duration-1000 group-hover:scale-105"
                                            loading="lazy">
                                    </div>

                                    {{-- Geometric Ornament --}}
                                    <div class="absolute -top-8 w-32 h-32 opacity-10 pointer-events-none z-0"
                                        :class="index % 2 === 0 ? '-right-8' : '-left-8'">
                                        <svg viewBox="0 0 100 100" class="w-full h-full text-[#D4AF37] fill-current">
                                            <circle cx="50" cy="50" r="48" fill="none" stroke="currentColor"
                                                stroke-width="0.5" stroke-dasharray="2 4" />
                                        </svg>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </template>
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

                        'https://ik.imagekit.io/AthaConstruction/assets/residential__1__69590f1fb09ab4.28549250_PCHj_Z-Lc.jpg',
                        'https://ik.imagekit.io/AthaConstruction/assets/residential_69590f936c81e4.52049382_XRGi-bGVS.jpg',

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
                        'https://ik.imagekit.io/AthaConstruction/assets/commercial__2__69590d8c604132.76527033_4GlNiIOfO.jpg',
                        'https://ik.imagekit.io/AthaConstruction/assets/commercial_69590f15226d43.63591292_E0Pa8qYkS.jpg',
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
                        'https://ik.imagekit.io/AthaConstruction/assets/kitchen__2__69590d6d8cc363.87693448_4ti4koydD.jpg',
                        'https://ik.imagekit.io/AthaConstruction/assets/kitchen__1__69590d5c34d476.36779215_QA-Oan8zP.jpg',

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
                        'https://ik.imagekit.io/AthaConstruction/assets/design__2__69590cf7062d27.17802019_TnaJyM3e-.jpg',
                        'https://ik.imagekit.io/AthaConstruction/assets/design__1__69590d03903133.14810402_38Spj0Xu-.jpg',
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
                        'https://ik.imagekit.io/AthaConstruction/assets/execution__2__69590cd7646d15.55430145_2wLfaaPOK.jpg',
                        'https://ik.imagekit.io/AthaConstruction/assets/execution__1__69590cea7f9fb3.45961985_38cZRAetv.jpg',
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
                        'https://ik.imagekit.io/AthaConstruction/assets/budget_69590ca89ef6c6.21087942_QDQ2i8Ibo.jpg',
                        'https://ik.imagekit.io/AthaConstruction/assets/budget__1__69590c15534e76.74473526_t6fvua93T.jpg'
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
    /* Custom Services Page Background Pattern */
    .services-page-bg-pattern {
        --s: 60px;
        /* control the size*/
        --c1: #181616;
        --c2: #000000;

        --_g: #0000 83%, var(--c1) 85% 99%, #0000 101%;
        background:
            radial-gradient(27% 29% at right, var(--_g)) calc(var(--s)/ 2) var(--s),
            radial-gradient(27% 29% at left, var(--_g)) calc(var(--s)/-2) var(--s),
            radial-gradient(29% 27% at top, var(--_g)) 0 calc(var(--s)/ 2),
            radial-gradient(29% 27% at bottom, var(--_g)) 0 calc(var(--s)/-2) var(--c2);
        background-size: calc(2*var(--s)) calc(2*var(--s));
    }

    /* Luxury Design Utilities */
    .bg-radial-gradient {
        background: radial-gradient(circle at center, var(--tw-gradient-from) 0%, var(--tw-gradient-to) 100%);
    }

    [data-animate="reveal"] {
        clip-path: inset(0 100% 0 0);
        transition: clip-path 1.2s cubic-bezier(0.77, 0, 0.175, 1);
    }

    [data-animate="reveal"].is-in-viewport {
        clip-path: inset(0 0 0 0);
    }
</style>

<style>
    /* Hero Banner Section Styles */
    .hero-banner-section {
        min-height: 40vh;
        display: flex;
        align-items: center;
    }

    .hero-banner-section .absolute img {
        filter: brightness(0.85);
    }

    @media (max-width: 768px) {
        .hero-banner-section {
            min-height: 35vh;
            padding-top: 3rem;
            padding-bottom: 3rem;
        }
    }

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
        height: 100%;
        display: flex;
        flex-direction: column;
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