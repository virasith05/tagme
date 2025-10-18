@extends('layouts.app')

@section('title', 'Welcome to Laravel')

@section('content')
    <div x-data="{ active: 'connect' }" x-init="(() => { const valid=['connect','about','work','portfolio','contact']; const parse=()=> (window.location.hash || '').replace(/^#\/?/, ''); let h=parse(); if(valid.includes(h)) { active=h; document.getElementById('tabContentTop')?.scrollIntoView({behavior:'smooth'}); } window.addEventListener('hashchange', ()=>{ h=parse(); if(valid.includes(h)) { active=h; document.getElementById('tabContentTop')?.scrollIntoView({behavior:'smooth'}); } }); })()">
    <!-- Hero Carousel -->
    <section class="w-full" x-data>
        <x-ui.carousel :images="[
            asset('images/hero-1.jpg'),
            asset('images/hero-2.jpg'),
            asset('images/hero-3.jpg'),
            asset('images/hero-4.jpg'),
            asset('images/hero-5.jpg'),
        ]" height="h-[160px] md:h-[200px]" :autoplay="false" />
    </section>

    <!-- Profile Header -->
    <section class="bg-white dark:bg-dark-bg" x-data="{ fixed:false, h:0, trigger:0 }" x-init="
        $nextTick(() => {
            const wrap = $refs.stickyWrap;
            const setH = () => { h = wrap.offsetHeight };
            const calcTrigger = () => { trigger = wrap.getBoundingClientRect().top + window.scrollY };
            setH(); calcTrigger();
            window.addEventListener('resize', () => { setH(); calcTrigger(); });
            window.addEventListener('scroll', () => {
                const isDesktop = window.matchMedia('(min-width: 768px)').matches;
                fixed = isDesktop && (window.scrollY >= trigger - 56);
            });
        })
    ">
        <div class="container-responsive">
            <div x-ref="stickyWrap" :class="fixed ? 'fixed top-14 left-0 right-0 z-40 bg-white/95 dark:bg-dark-bg/95 backdrop-blur border-b border-gray-200' : 'relative'">
                <div class="container-responsive">
                <div class="md:flex md:items-center md:gap-6 md:py-4">
                    <!-- Avatar overlapping on mobile, inline on desktop with slight indent -->
                    <div :class="fixed ? 'md:static md:mt-0 md:ml-4' : 'md:absolute md:-top-10 md:left-4'" class="absolute -top-16 left-4 md:left-auto md:flex-shrink-0 z-10">
                        <img src="{{ asset('images/Virasith_Pic.jpg') }}" alt="Profile" class="w-40 h-40 rounded-full object-cover border-4 border-white shadow-lg" :class="fixed ? 'md:w-28 md:h-28' : 'md:w-36 md:h-36'" />
                    </div>

                    <!-- Mobile Follow button under photo -->
                    <div class="md:hidden pt-28 pl-2">
                        <a href="#" class="inline-flex items-center px-4 py-2 rounded-full bg-[#0E1726] text-white text-sm shadow hover:bg-black">Follow</a>
                    </div>

                    <!-- Name and meta beside avatar -->
                    <div class="pt-0 md:pt-0 -mt-32 md:mt-0 pl-48 md:flex-1" :class="fixed ? 'md:pl-0' : 'md:pl-48'">
                        <h1 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-dark-text">Shubham Agrawal</h1>
                        <div class="mt-2 text-gray-700 dark:text-dark-muted">
                            <span class="block">@shubham | Vadodara, Gujarat</span>
                            <div class="mt-1 flex items-center gap-4 text-gray-600">
                                <a href="#" aria-label="Instagram" class="hover:text-gray-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5"><path d="M7 2C4.243 2 2 4.243 2 7v10c0 2.757 2.243 5 5 5h10c2.757 0 5-2.243 5-5V7c0-2.757-2.243-5-5-5H7zm10 2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3H7a3 3 0 0 1-3-3V7a3 3 0 0 1 3-3h10zm-5 3.5a5.5 5.5 0 1 0 0 11 5.5 5.5 0 0 0 0-11zm0 2a3.5 3.5 0 1 1 0 7 3.5 3.5 0 0 1 0-7zM17.5 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/></svg>
                                </a>
                                <a href="#" aria-label="Twitter" class="hover:text-gray-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5"><path d="M20 3H4a1 1 0 0 0-1 1v16a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zm-4.72 15-3.36-4.62L7.3 18H6l5-6.87L6.48 6H9l3.16 4.35L16.7 6h1.3l-4.66 5.98L18 18h-2.72z"/></svg>
                                </a>
                                <a href="#" aria-label="YouTube" class="hover:text-gray-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5"><path d="M21.8 8.001a3.002 3.002 0 0 0-2.116-2.124C18.2 5.5 12 5.5 12 5.5s-6.2 0-7.684.377A3.002 3.002 0 0 0 2.2 8.001 31.64 31.64 0 0 0 1.8 12c-.004 1.333.096 2.666.4 3.999a3.002 3.002 0 0 0 2.116 2.124C5.8 18.5 12 18.5 12 18.5s6.2 0 7.684-.377A3.002 3.002 0 0 0 21.8 16c.304-1.333.404-2.666.4-3.999.004-1.333-.096-2.666-.4-3.999zM10 15V9l5 3-5 3z"/></svg>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Follow button on the far right -->
                    <div class="hidden md:block md:ml-auto">
                        <a href="#" class="px-5 py-2 rounded-lg bg-[#0E1726] text-white hover:bg-black">Follow</a>
                    </div>
                </div>

                <!-- Tabs -->
                <div class="mt-6 border-b border-gray-200 dark:border-dark-border sticky top-[56px] md:static z-40 bg-white/95 dark:bg-dark-bg/95 backdrop-blur relative"
                     x-data="{
                        canL:false, canR:false,
                        update(){ const el=this.$refs.tabs; this.canL=el.scrollLeft>0; this.canR=el.scrollLeft+el.clientWidth < el.scrollWidth-1; },
                        init(){ this.update(); const el=this.$refs.tabs; el.addEventListener('scroll', ()=>this.update()); window.addEventListener('resize', ()=>this.update()); }
                     }">
                    <button type="button" @click="$refs.tabs.scrollBy({left:-140, behavior:'smooth'})" x-show="canL" x-cloak class="md:hidden absolute left-1 top-1/2 -translate-y-1/2 z-10 h-8 w-8 rounded-full bg-white text-gray-700 border border-gray-300 shadow flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                    </button>
                    <button type="button" @click="$refs.tabs.scrollBy({left:140, behavior:'smooth'})" x-show="canR" x-cloak class="md:hidden absolute right-1 top-1/2 -translate-y-1/2 z-10 h-8 w-8 rounded-full bg-white text-gray-700 border border-gray-300 shadow flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                    </button>
                    <nav x-ref="tabs" class="flex gap-4 text-gray-800 dark:text-dark-text overflow-x-auto whitespace-nowrap px-6">
                        <a href="#connect" @click.prevent="active='connect'; window.location.hash='connect'; document.getElementById('tabContentTop')?.scrollIntoView({behavior:'smooth'})" :class="active==='connect' ? 'pb-2 border-b-2 border-black text-gray-900 font-semibold' : 'pb-2 text-gray-500 hover:text-gray-800'">Connect</a>
                        <a href="#about" @click.prevent="active='about'; window.location.hash='about'; document.getElementById('tabContentTop')?.scrollIntoView({behavior:'smooth'})" :class="active==='about' ? 'pb-2 border-b-2 border-black text-gray-900 font-semibold' : 'pb-2 text-gray-500 hover:text-gray-800'">About</a>
                        <a href="#work" @click.prevent="active='work'; window.location.hash='work'; document.getElementById('tabContentTop')?.scrollIntoView({behavior:'smooth'})" :class="active==='work' ? 'pb-2 border-b-2 border-black text-gray-900 font-semibold' : 'pb-2 text-gray-500 hover:text-gray-800'">Work & Services</a>
                        <a href="#portfolio" @click.prevent="active='portfolio'; window.location.hash='portfolio'; document.getElementById('tabContentTop')?.scrollIntoView({behavior:'smooth'})" :class="active==='portfolio' ? 'pb-2 border-b-2 border-black text-gray-900 font-semibold' : 'pb-2 text-gray-500 hover:text-gray-800'">Portfolio</a>
                        <a href="#contact" @click.prevent="active='contact'; window.location.hash='contact'; document.getElementById('tabContentTop')?.scrollIntoView({behavior:'smooth'})" :class="active==='contact' ? 'pb-2 border-b-2 border-black text-gray-900 font-semibold' : 'pb-2 text-gray-500 hover:text-gray-800'">Contact</a>
                </nav>
                </div>
                </div>
            </div>
            
            <!-- Anchor to scroll tab content into view -->
            <div id="tabContentTop"></div>
        </div>
    </section>

    <!-- Tab Content -->
    <section class="container-responsive pt-10 pb-0">
        <!-- About Section (moved up for visibility) -->
        <div x-show="active==='about'" x-transition>
            <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-soft border border-gray-100 p-8">
                <div class="text-xs uppercase tracking-wider text-emerald-700 mb-2">About Section</div>
                <h2 class="text-3xl font-bold text-gray-900 mb-4">About Me</h2>
                <p class="text-gray-700 leading-7">
                    Hello, I'm <span class="font-semibold">John Doe</span>, a full-stack web developer with a strong focus on building clean, scalable, and user-friendly digital solutions. I specialize in WordPress, Shopify, and Laravel. Over the past few years, I've worked with clients from different industries, helping them grow their businesses online through modern websites, e-commerce platforms, and custom web applications.
                </p>
                <h3 class="text-xl font-semibold text-gray-900 mt-8 mb-3">Core Skills</h3>
                <ul class="list-disc pl-6 space-y-2 text-gray-700">
                    <li>Custom WordPress plugin and theme development</li>
                    <li>Shopify store setup and optimization</li>
                    <li>Laravel backend systems and APIs</li>
                    <li>Responsive UI design with Tailwind CSS</li>
                    <li>SEO & performance optimization</li>
                </ul>
                <h3 class="text-xl font-semibold text-gray-900 mt-8 mb-3">What Drives Me</h3>
                <p class="text-gray-700 leading-7">I enjoy solving real-world problems with technology and turning ideas into functional solutions. My approach combines technical expertise with an understanding of business goals.</p>
                <p class="text-gray-700 leading-7 mt-3">Outside of work, I constantly explore new tools and frameworks to stay updated with the fast-evolving web ecosystem.</p>

                <!-- Credentials & Trust -->
                <h3 class="text-2xl font-semibold text-gray-900 mt-10 mb-4">Credentials & Trust</h3>
                <div class="relative pl-6">
                    <span class="absolute left-0 top-2 inline-flex items-center justify-center w-6 h-6 rounded-full bg-indigo-600 text-white text-xs">🎓</span>
                    <div class="bg-white rounded-xl shadow-soft border border-gray-100 p-5 min-h-[220px] flex flex-col">
                        <div class="text-sm font-semibold text-gray-900 mb-3">Qualifications</div>
                        <div class="space-y-3">
                            <div class="bg-indigo-50 text-gray-900 rounded-lg px-4 py-3">
                                <div class="font-semibold">B.Sc. Computer Science</div>
                                <div class="text-xs text-gray-600">XYZ University · 2016</div>
                            </div>
                            <div class="bg-indigo-50 text-gray-900 rounded-lg px-4 py-3">
                                <div class="font-semibold">M.Sc. Artificial Intelligence</div>
                                <div class="text-xs text-gray-600">ABC Institute · 2018</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Certifications -->
                <div class="relative pl-6 mt-6">
                    <span class="absolute left-0 top-2 inline-flex items-center justify-center w-6 h-6 rounded-full bg-emerald-600 text-white text-xs">🧾</span>
                    <div class="bg-white rounded-xl shadow-soft border border-gray-100 p-5">
                        <div class="text-sm font-semibold text-gray-900 mb-3">Certifications</div>
                        <div class="space-y-3">
                            <div class="bg-emerald-50 text-gray-900 rounded-lg px-4 py-3">
                                <div class="font-semibold">AWS Certified Developer</div>
                                <div class="text-xs text-gray-600">Amazon Web Services · 2019</div>
                            </div>
                            <div class="bg-emerald-50 text-gray-900 rounded-lg px-4 py-3">
                                <div class="font-semibold">Google Cloud Engineer</div>
                                <div class="text-xs text-gray-600">Google Cloud · 2020</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Awards -->
                <div class="relative pl-6 mt-6">
                    <span class="absolute left-0 top-2 inline-flex items-center justify-center w-6 h-6 rounded-full bg-amber-500 text-white text-xs">🏆</span>
                    <div class="bg-white rounded-xl shadow-soft border border-gray-100 p-5">
                        <div class="text-sm font-semibold text-gray-900 mb-3">Awards</div>
                        <div class="space-y-3">
                            <div class="bg-yellow-50 text-gray-900 rounded-lg px-4 py-3">
                                <div class="font-semibold">Best Developer Award</div>
                                <div class="text-xs text-gray-600">TechConf · 2020</div>
                            </div>
                            <div class="bg-yellow-50 text-gray-900 rounded-lg px-4 py-3">
                                <div class="font-semibold">Innovation in AI</div>
                                <div class="text-xs text-gray-600">AI Summit · 2021</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Professional Memberships -->
                <div class="relative pl-6 mt-6">
                    <span class="absolute left-0 top-2 inline-flex items-center justify-center w-6 h-6 rounded-full bg-purple-600 text-white text-xs">✳️</span>
                    <div class="bg-white rounded-xl shadow-soft border border-gray-100 p-5">
                        <div class="text-sm font-semibold text-gray-900 mb-3">Professional Memberships</div>
                        <div class="space-y-3">
                            <div class="bg-purple-50 text-gray-900 rounded-lg px-4 py-3">
                                <div class="font-semibold">Association of Software Engineers</div>
                                <div class="text-xs text-gray-600">Member Level: Senior</div>
                            </div>
                            <div class="bg-purple-50 text-gray-900 rounded-lg px-4 py-3">
                                <div class="font-semibold">International Developers Group</div>
                                <div class="text-xs text-gray-600">Member Level: Gold</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Personal & Skills -->
                <h3 class="text-2xl font-semibold text-gray-900 mt-10 mb-4">Personal & Skills</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Languages Spoken -->
                    <div class="bg-white rounded-xl shadow-soft border border-gray-100 p-6">
                        <div class="text-sm font-semibold text-gray-900 mb-3">Languages Spoken</div>
                        <div class="flex flex-wrap gap-2">
                            <span class="inline-flex items-center px-3 py-1 rounded-full bg-indigo-50 text-indigo-700 text-xs">English – Fluent</span>
                            <span class="inline-flex items-center px-3 py-1 rounded-full bg-green-50 text-green-700 text-xs">Hindi – Native</span>
                            <span class="inline-flex items-center px-3 py-1 rounded-full bg-yellow-50 text-yellow-700 text-xs">Spanish – Intermediate</span>
                        </div>
                    </div>
                    <!-- Skills & Endorsements -->
                    <div class="bg-white rounded-xl shadow-soft border border-gray-100 p-6">
                        <div class="text-sm font-semibold text-gray-900 mb-3">Skills & Endorsements</div>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1 rounded-md bg-gray-100 text-gray-700 text-xs">Web Development</span>
                            <span class="px-3 py-1 rounded-md bg-gray-100 text-gray-700 text-xs">WordPress</span>
                            <span class="px-3 py-1 rounded-md bg-gray-100 text-gray-700 text-xs">Laravel</span>
                            <span class="px-3 py-1 rounded-md bg-gray-100 text-gray-700 text-xs">Shopify</span>
                        </div>
                    </div>
                </div>

                <!-- Matrimonial Profile Details -->
                <h3 class="text-2xl font-semibold text-gray-900 mt-10 mb-4">Matrimonial Profile Details</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-stretch">
                    <!-- Basic Details -->
                    <div class="bg-white rounded-xl shadow-soft border border-gray-100 p-5 min-h-[220px] flex flex-col">
                        <div class="text-sm font-semibold text-rose-700 mb-3">Basic Details</div>
                        <div class="space-y-1 bg-rose-50 rounded-lg p-4 text-sm text-gray-800 min-h-[200px]">
                            <div><span class="font-semibold">Age:</span> 28</div>
                            <div><span class="font-semibold">Height:</span> 5'8"</div>
                            <div><span class="font-semibold">Religion:</span> Hindu</div>
                            <div><span class="font-semibold">Caste:</span> Brahmin</div>
                            <div><span class="font-semibold">Mother Tongue:</span> Hindi</div>
                        </div>
                    </div>
                    <!-- Horoscope & Astrological -->
                    <div class="bg-white rounded-xl shadow-soft border border-gray-100 p-5">
                        <div class="text-sm font-semibold text-rose-700 mb-3">Horoscope & Astrological</div>
                        <div class="space-y-1 bg-rose-50 rounded-lg p-4 text-sm text-gray-800 min-h-[200px]">
                            <div><span class="font-semibold">Time of Birth:</span> 10:30 AM</div>
                            <div><span class="font-semibold">Place of Birth:</span> Delhi, India</div>
                            <div><span class="font-semibold">Manglik Status:</span> No</div>
                        </div>
                    </div>
                    <!-- Family Details -->
                    <div class="bg-white rounded-xl shadow-soft border border-gray-100 p-5">
                        <div class="text-sm font-semibold text-rose-700 mb-3">Family Details</div>
                        <div class="space-y-1 bg-rose-50 rounded-lg p-4 text-sm text-gray-800 min-h-[200px]">
                            <div><span class="font-semibold">Father's Occupation:</span> Businessman</div>
                            <div><span class="font-semibold">Mother's Occupation:</span> Teacher</div>
                            <div><span class="font-semibold">Siblings:</span> 1 Brother, 1 Sister</div>
                            <p class="text-sm text-gray-700 mt-2">Comes from a well-educated and respected family background.</p>
                        </div>
                    </div>
                    <!-- Partner Preferences -->
                    <div class="bg-white rounded-xl shadow-soft border border-gray-100 p-5">
                        <div class="text-sm font-semibold text-rose-700 mb-3">Partner Preferences</div>
                        <div class="bg-rose-50 rounded-lg p-4 text-sm text-gray-800 min-h-[200px]">
                            Looking for a well-educated, understanding, and family-oriented partner with modern values yet rooted in tradition.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Work & Services (moved up for visibility) -->
        <div x-show="active==='work'" x-transition x-effect="if(active==='work'){ $nextTick(()=> document.getElementById('tabContentTop')?.scrollIntoView({behavior:'smooth'})) }">
            <div class="max-w-7xl mx-auto bg-white rounded-xl shadow-soft border border-gray-200 p-8 mt-4">
                <div class="text-xs uppercase tracking-wider text-blue-700 mb-2">Work & Services Section</div>
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Offerings & Products</h2>
                <div class="w-full border-t border-gray-200 mb-6"></div>

                <h3 class="text-xl font-semibold text-gray-900 mb-4">Services Offered</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
                    <div class="bg-white rounded-xl shadow-soft border border-gray-100 p-6">
                        <h4 class="font-semibold text-gray-900">Web Development</h4>
                        <p class="text-sm text-gray-600 mt-2">Building modern, responsive, and high‑performance websites tailored for your business needs.</p>
                    </div>
                    <div class="bg-white rounded-xl shadow-soft border border-gray-100 p-6">
                        <h4 class="font-semibold text-gray-900">SEO Optimization</h4>
                        <p class="text-sm text-gray-600 mt-2">Helping your brand get discovered with tailored SEO strategies and growth‑focused techniques.</p>
                    </div>
                    <div class="bg-white rounded-xl shadow-soft border border-gray-100 p-6">
                        <h4 class="font-semibold text-gray-900">App Development</h4>
                        <p class="text-sm text-gray-600 mt-2">Custom mobile and web apps crafted for scalability, performance, and great user experience.</p>
                    </div>
                </div>

                <h3 class="text-xl font-semibold text-gray-900 mb-4">Pricing & Packages</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white rounded-xl shadow-soft border border-gray-100 p-6">
                        <h4 class="font-semibold text-gray-900">Starter Package</h4>
                        <p class="text-sm text-gray-600 mt-1">Perfect for individuals and small businesses.</p>
                        <div class="mt-4 text-3xl font-bold text-blue-600">$199</div>
                        <p class="text-xs text-gray-500 mt-1">Delivery: 7 days</p>
                        <a href="#" class="btn-primary w-full mt-5 inline-flex items-center justify-center">Get Started</a>
                    </div>
                    <div class="bg-white rounded-xl shadow-soft border border-gray-100 p-6">
                        <h4 class="font-semibold text-gray-900">Pro Package</h4>
                        <p class="text-sm text-gray-600 mt-1">Best for established start‑ups.</p>
                        <div class="mt-4 text-3xl font-bold text-emerald-600">$499</div>
                        <p class="text-xs text-gray-500 mt-1">Delivery: 14 days</p>
                        <a href="#" class="w-full mt-5 bg-emerald-600 hover:bg-emerald-700 text-white font-medium px-6 py-3 rounded-lg transition-all duration-200 shadow-lg hover:shadow-xl inline-flex items-center justify-center">Choose Plan</a>
                    </div>
                    <div class="bg-white rounded-xl shadow-soft border border-gray-100 p-6">
                        <h4 class="font-semibold text-gray-900">Business Package</h4>
                        <p class="text-sm text-gray-600 mt-1">Best for established businesses.</p>
                        <div class="mt-4 text-3xl font-bold text-blue-600">$499</div>
                        <p class="text-xs text-gray-500 mt-1">Delivery: 14 days</p>
                        <a href="#" class="w-full mt-5 bg-blue-600 hover:bg-blue-700 text-white font-medium px-6 py-3 rounded-lg transition-all duration-200 shadow-lg hover:shadow-xl inline-flex items-center justify-center">Choose Plan</a>
                    </div>
                </div>

                <!-- Products & Storefront -->
                <h3 class="text-xl font-semibold text-gray-900 mt-10 mb-4">Products & Storefront</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Product 1 -->
                    <div class="bg-white rounded-xl shadow-soft border border-gray-100 overflow-hidden">
                        <div class="h-40 md:h-48 bg-gray-200 flex items-center justify-center text-gray-500 text-2xl select-none">600 × 400</div>
                        <div class="p-5">
                            <h4 class="font-semibold text-gray-900">Premium WordPress Theme</h4>
                            <p class="text-xs text-gray-500 mt-1">Theme • WordPress</p>
                            <p class="text-sm text-gray-600 mt-2">A customizable, SEO‑friendly, responsive theme for small businesses.</p>
                            <div class="mt-3 flex items-center justify-between">
                                <div>
                                    <div class="text-sm line-through text-gray-400">$99</div>
                                    <div class="text-xl font-bold text-blue-600">$49</div>
                                </div>
                                <a href="#" class="text-sm text-blue-600 hover:underline">View Store</a>
                            </div>
                        </div>
                    </div>
                    <!-- Product 2 -->
                    <div class="bg-white rounded-xl shadow-soft border border-gray-100 overflow-hidden">
                        <div class="h-40 md:h-48 bg-gray-200 flex items-center justify-center text-gray-500 text-2xl select-none">600 × 400</div>
                        <div class="p-5">
                            <h4 class="font-semibold text-gray-900">E‑commerce Plugin</h4>
                            <p class="text-xs text-gray-500 mt-1">Plugin • E‑commerce</p>
                            <p class="text-sm text-gray-600 mt-2">Boost your online sales with this easy‑to‑use WooCommerce plugin.</p>
                            <div class="mt-3 flex items-center justify-between">
                                <div>
                                    <div class="text-sm line-through text-gray-400">$89</div>
                                    <div class="text-xl font-bold text-emerald-600">$49</div>
                                </div>
                                <a href="#" class="text-sm text-blue-600 hover:underline">View Store</a>
                            </div>
                        </div>
                    </div>
                    <!-- Product 3 -->
                    <div class="bg-white rounded-xl shadow-soft border border-gray-100 overflow-hidden">
                        <div class="h-40 md:h-48 bg-gray-200 flex items-center justify-center text-gray-500 text-2xl select-none">600 × 400</div>
                        <div class="p-5">
                            <h4 class="font-semibold text-gray-900">Shopify App</h4>
                            <p class="text-xs text-gray-500 mt-1">App • Shopify</p>
                            <p class="text-sm text-gray-600 mt-2">Enhance your storefront with a simple, high‑conversion Shopify app.</p>
                            <div class="mt-3 flex items-center justify-between">
                                <div>
                                    <div class="text-sm line-through text-gray-400">$79</div>
                                    <div class="text-xl font-bold text-blue-600">$49</div>
                                </div>
                                <a href="#" class="text-sm text-blue-600 hover:underline">View Store</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Work Experience -->
                <h3 class="text-xl font-semibold text-gray-900 mt-10 mb-2">Work Experience</h3>
                <div class="space-y-8">
                    <!-- Item 1 -->
                    <div class="relative pl-6">
                        <span class="absolute left-0 top-1.5 inline-block w-2.5 h-2.5 rounded-full bg-blue-500"></span>
                        <div class="text-sm text-gray-500">2021 - Present</div>
                        <div class="mt-1 font-semibold text-gray-900">Senior Web Developer – ABC Tech</div>
                        <p class="text-sm text-gray-600 mt-1">Leading a team to build scalable SaaS applications. Responsibilities include:</p>
                        <ul class="list-disc pl-5 text-sm text-gray-700 mt-2 space-y-1">
                            <li>Architecting web applications</li>
                            <li>Client communication & requirement analysis</li>
                            <li>Mentoring junior developers</li>
                        </ul>
                    </div>
                    <!-- Item 2 -->
                    <div class="relative pl-6">
                        <span class="absolute left-0 top-1.5 inline-block w-2.5 h-2.5 rounded-full bg-blue-500"></span>
                        <div class="text-sm text-gray-500">2018 - 2021</div>
                        <div class="mt-1 font-semibold text-gray-900">Full Stack Developer – XYZ Solutions</div>
                        <p class="text-sm text-gray-600 mt-1">Worked on Laravel & React platforms delivering end‑to‑end solutions.</p>
                    </div>
                    
                </div>
                
                <!-- Team / Governing Body -->
                <h3 class="text-xl font-semibold text-gray-900 mt-10 mb-4">Team / Governing Body</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Member 1 -->
                    <div class="bg-white rounded-xl shadow-soft border border-gray-100 p-6 text-center">
                        <div class="w-40 h-40 mx-auto rounded-full bg-gray-200 flex items-center justify-center text-gray-500 select-none">250 × 250</div>
                        <div class="mt-4 font-semibold text-gray-900">John Doe</div>
                        <div class="text-sm text-gray-600">Project Manager</div>
                    </div>
                    <!-- Member 2 -->
                    <div class="bg-white rounded-xl shadow-soft border border-gray-100 p-6 text-center">
                        <div class="w-40 h-40 mx-auto rounded-full bg-gray-200 flex items-center justify-center text-gray-500 select-none">250 × 250</div>
                        <div class="mt-4 font-semibold text-gray-900">Jane Smith</div>
                        <div class="text-sm text-gray-600">UI/UX Designer</div>
                    </div>
                    <!-- Member 3 -->
                    <div class="bg-white rounded-xl shadow-soft border border-gray-100 p-6 text-center">
                        <div class="w-40 h-40 mx-auto rounded-full bg-gray-200 flex items-center justify-center text-gray-500 select-none">250 × 250</div>
                        <div class="mt-4 font-semibold text-gray-900">Alex Brown</div>
                        <div class="text-sm text-gray-600">Backend Developer</div>
                    </div>
                </div>
                
                <!-- Business & Career -->
                <h3 class="text-2xl font-semibold text-gray-900 mt-10 mb-2">Business & Career</h3>
                <h4 class="text-sm font-semibold text-gray-700 mb-4">Careers / Job Postings</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Job 1 -->
                    <div class="bg-white rounded-xl shadow-soft border border-gray-100 p-6">
                        <div class="text-lg font-semibold text-gray-900">Frontend Developer</div>
                        <div class="text-sm text-gray-600 mt-1">Company: TechVision Ltd</div>
                        <div class="text-sm text-gray-600">Location: Remote</div>
                        <p class="text-sm text-gray-700 mt-3">We're looking for a skilled frontend developer with strong knowledge in React.js, Tailwind CSS, and modern UI practices.</p>
                        <a href="#" class="mt-4 inline-flex items-center px-4 py-2 rounded-md bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-medium shadow-sm">Apply Now</a>
                    </div>
                    <!-- Job 2 -->
                    <div class="bg-white rounded-xl shadow-soft border border-gray-100 p-6">
                        <div class="text-lg font-semibold text-gray-900">UI/UX Designer</div>
                        <div class="text-sm text-gray-600 mt-1">Company: CreativeWorks</div>
                        <div class="text-sm text-gray-600">Location: Bangalore</div>
                        <p class="text-sm text-gray-700 mt-3">Join our design team to create world‑class digital experiences. Must be proficient in Figma and have a strong design portfolio.</p>
                        <a href="#" class="mt-4 inline-flex items-center px-4 py-2 rounded-md bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-medium shadow-sm">Apply Now</a>
                    </div>
                </div>

                <!-- Career Preferences -->
                <h3 class="text-xl font-semibold text-gray-900 mt-10 mb-4">Career Preferences</h3>
                <div class="bg-white rounded-xl shadow-soft border border-gray-100 p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                        <div><span class="font-semibold text-gray-900">Desired Job Type:</span> <span class="text-gray-700">Full‑Time, Freelance</span></div>
                        <div><span class="font-semibold text-gray-900">Work Mode:</span> <span class="text-gray-700">Remote / Hybrid</span></div>
                        <div><span class="font-semibold text-gray-900">Preferred Locations:</span> <span class="text-gray-700">Mumbai, Delhi, Bangalore</span></div>
                        <div><span class="font-semibold text-gray-900">Expected Salary:</span> <span class="text-gray-700">₹12 LPA – ₹18 LPA</span></div>
                        <div><span class="font-semibold text-gray-900">Notice Period:</span> <span class="text-gray-700">1 Month</span></div>
                    </div>
                </div>

                <!-- Membership Information -->
                <div class="mt-6 bg-white rounded-xl shadow-soft border border-gray-100 p-6">
                    <div class="flex items-start gap-3">
                        <div class="mt-1 w-8 h-8 rounded-full bg-indigo-100 text-indigo-700 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor"><path d="M12 12a5 5 0 1 0-5-5 5.006 5.006 0 0 0 5 5zm0 2c-3.33 0-10 1.665-10 5v1h20v-1c0-3.335-6.67-5-10-5z"/></svg>
                        </div>
                        <div class="flex-1">
                            <h4 class="text-indigo-700 font-semibold">Membership Information</h4>
                            <p class="text-sm text-gray-700 mt-1">Join our professional community to access exclusive resources, networking opportunities, and members‑only events. Enhance your career with premium benefits tailored for growth.</p>
                            <a href="#  " class="mt-4 inline-flex items-center px-4 py-2 rounded-md bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-medium shadow-sm">Join Now</a>
                        </div>
                    </div>
                </div>

                <!-- Downloadable Resources -->
                <h3 class="text-xl font-semibold text-gray-900 mt-10 mb-4">Downloadable Resources</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Resource 1 -->
                    <div class="bg-white rounded-xl shadow-soft border border-gray-100 p-6">
                        <div class="font-semibold text-gray-900">Resource Guide</div>
                        <p class="text-sm text-gray-600 mt-2">Comprehensive PDF guide to help you navigate your career growth.</p>
                        <a href="{{ asset('downloads/resource-guide.pdf') }}" download class="mt-4 inline-flex items-center gap-2 text-sm text-indigo-700 hover:underline">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor"><path d="M5 20h14v-2H5v2zm7-18-5 5h3v6h4V7h3l-5-5z"/></svg>
                            Download
                        </a>
                    </div>
                    <!-- Resource 2 -->
                    <div class="bg-white rounded-xl shadow-soft border border-gray-100 p-6">
                        <div class="font-semibold text-gray-900">Template Pack</div>
                        <p class="text-sm text-gray-600 mt-2">Download ready‑to‑use templates for business and projects.</p>
                        <a href="{{ asset('downloads/template-pack.zip') }}" download class="mt-4 inline-flex items-center gap-2 text-sm text-indigo-700 hover:underline">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor"><path d="M5 20h14v-2H5v2zm7-18-5 5h3v6h4V7h3l-5-5z"/></svg>
                            Download
                        </a>
                    </div>
                    <!-- Resource 3 -->
                    <div class="bg-white rounded-xl shadow-soft border border-gray-100 p-6">
                        <div class="font-semibold text-gray-900">Checklist</div>
                        <p class="text-sm text-gray-600 mt-2">Step‑by‑step checklist to stay organized and productive.</p>
                        <a href="{{ asset('downloads/checklist.pdf') }}" download class="mt-4 inline-flex items-center gap-2 text-sm text-indigo-700 hover:underline">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor"><path d="M5 20h14v-2H5v2zm7-18-5 5h3v6h4V7h3l-5-5z"/></svg>
                            Download
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact Section -->
        <div x-show="active==='contact'" style="display:none" x-transition>
            <h2 class="text-2xl font-semibold text-gray-900 mb-6">Contact Information</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white rounded-xl shadow-soft border border-gray-100 p-6">
                    <h3 class="text-lg font-semibold mb-4">Contact Details</h3>
                    <ul class="space-y-3 text-gray-700">
                        <li class="flex items-center gap-3"><span class="text-gray-500">📞</span> +91 98765 43210</li>
                        <li class="flex items-center gap-3"><span class="text-gray-500">📧</span> info@yourdomain.com</li>
                        <li class="flex items-center gap-3"><span class="text-gray-500">🔗</span> www.yourwebsite.com</li>
                    </ul>
                </div>
                <div class="bg-white rounded-xl shadow-soft border border-gray-100 p-6">
                    <h3 class="text-lg font-semibold mb-4">Business Hours</h3>
                    <ul class="space-y-3 text-gray-700">
                        <li class="flex items-center justify-between"><span>Monday - Friday</span><span>9:00 AM – 6:00 PM</span></li>
                        <li class="flex items-center justify-between"><span>Saturday</span><span>10:00 AM – 2:00 PM</span></li>
                        <li class="flex items-center justify-between"><span>Sunday</span><span class="text-red-600">Closed</span></li>
                    </ul>
                </div>
            </div>

            <h2 class="text-2xl font-semibold text-gray-900 mt-10 mb-4">Location & Address</h2>
            <h3 class="text-md font-medium text-gray-700 mb-3">Primary Location</h3>
            <div class="bg-white rounded-xl shadow-soft border border-gray-100 overflow-hidden">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14885.016799834354!2d73.328!3d22.299!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395fc5d8f5e7c3cf%3A0x7f2c2c6cbdc6b3f9!2sParul%20University!5e0!3m2!1sen!2sin!4v1700000000000"
                    width="100%" height="380" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <div class="p-5">
                    <h3 class="font-semibold mb-1">Primary Address</h3>
                    <p class="text-gray-700 text-sm">Parul University, Waghodia, Vadodara</p>
                    <p class="text-gray-700 text-sm">Gujarat, India 391760</p>
                    <p class="text-gray-700 text-sm mt-2">📞 +91 98765 43210</p>
                </div>
            </div>

            <!-- Branches -->
            <h2 class="text-2xl font-semibold text-gray-900 mt-10 mb-4">Branches</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Branch 1 -->
                <div class="bg-white rounded-xl shadow-soft border border-gray-100 overflow-hidden">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14885.016799834354!2d73.328!3d22.299!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395fc5d8f5e7c3cf%3A0x7f2c2c6cbdc6b3f9!2sParul%20University!5e0!3m2!1sen!2sin!4v1700000000000"
                        width="100%" height="220" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    <div class="p-5">
                        <h3 class="font-semibold mb-2">Branch 1 - North Side</h3>
                        <p class="text-gray-700 text-sm">456 Market Street, North District<br/>State, ZIP</p>
                        <p class="text-gray-700 text-sm mt-2">📞 +91 98765 43210</p>
                    </div>
                </div>
                <!-- Branch 2 -->
                <div class="bg-white rounded-xl shadow-soft border border-gray-100 overflow-hidden">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14885.016799834354!2d73.328!3d22.299!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395fc5d8f5e7c3cf%3A0x7f2c2c6cbdc6b3f9!2sParul%20University!5e0!3m2!1sen!2sin!4v1700000000000"
                        width="100%" height="220" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    <div class="p-5">
                        <h3 class="font-semibold mb-2">Branch 2 - West End</h3>
                        <p class="text-gray-700 text-sm">789 Corporate Plaza, West End<br/>State, ZIP</p>
                        <p class="text-gray-700 text-sm mt-2">📞 +91 99887 77665</p>
                    </div>
                </div>
                <!-- Branch 3 -->
                <div class="bg-white rounded-xl shadow-soft border border-gray-100 overflow-hidden">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14885.016799834354!2d73.328!3d22.299!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395fc5d8f5e7c3cf%3A0x7f2c2c6cbdc6b3f9!2sParul%20University!5e0!3m2!1sen!2sin!4v1700000000000"
                        width="100%" height="220" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    <div class="p-5">
                        <h3 class="font-semibold mb-2">Branch 3 - Tech Park</h3>
                        <p class="text-gray-700 text-sm">321 Startup Hub, Tech Park<br/>State, ZIP</p>
                        <p class="text-gray-700 text-sm mt-2">📞 +91 91234 56789</p>
                    </div>
                </div>
            </div>

            <!-- Book an Appointment / Request a Quote -->
            <div class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white rounded-xl shadow-soft border border-gray-100 p-6">
                    <h3 class="text-2xl font-semibold mb-2 text-[#212121]">Book an Appointment</h3>
                    <p class="text-[#616161] mb-5">Incididunt sint fugiat pariatur cupidatat consectetur sit cillum anim id veniam aliqua proident exceptuer commodo do ea.</p>
                    <div class="flex gap-3">
                        <a href="#appointment" class="btn-primary">Book An Appointment</a>
                        <a href="#about" class="btn-secondary">About Me →</a>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-soft border border-gray-100 p-6">
                    <h3 class="text-2xl font-semibold mb-4 text-[#212121]">Request a Quote</h3>
                    <form class="space-y-3">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                            <input class="input-field" type="text" placeholder="Your Name" />
                            <input class="input-field" type="email" placeholder="Your Email" />
                        </div>
                        <textarea class="input-field" rows="4" placeholder="Project Details"></textarea>
                        <a href="#quote" class="w-full btn-primary inline-flex items-center justify-center">Submit</a>
                    </form>
                </div>
            </div>

            <!-- FAQ -->
            <div class="mt-10">
                <h3 class="text-2xl font-semibold mb-4 text-[#212121]">FAQ</h3>
                <div class="space-y-3">
                    <details class="bg-white rounded-xl shadow-soft border border-gray-100 group">
                        <summary class="cursor-pointer list-none p-4 flex justify-between items-center">
                            <span class="text-[#212121]">What is included in the subscription?</span>
                            <svg class="w-5 h-5 text-[#616161] transition-transform group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </summary>
                        <div class="px-4 pb-4 text-[#616161]">Access to premium content, updates, and support.</div>
                    </details>

                    <details class="bg-white rounded-xl shadow-soft border border-gray-100 group">
                        <summary class="cursor-pointer list-none p-4 flex justify-between items-center">
                            <span class="text-[#212121]">Can I cancel anytime?</span>
                            <svg class="w-5 h-5 text-[#616161] transition-transform group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </summary>
                        <div class="px-4 pb-4 text-[#616161]">Yes, you can cancel your plan at any time.</div>
                    </details>

                    <details class="bg-white rounded-xl shadow-soft border border-gray-100 group">
                        <summary class="cursor-pointer list-none p-4 flex justify-between items-center">
                            <span class="text-[#212121]">Do you offer refunds?</span>
                            <svg class="w-5 h-5 text-[#616161] transition-transform group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </summary>
                        <div class="px-4 pb-4 text-[#616161]">Refunds are evaluated case‑by‑case within 14 days.</div>
                    </details>
                </div>
            </div>

            <!-- Events & Workshops -->
            <div class="mt-10">
                <h3 class="text-2xl font-semibold mb-4">Events & Workshops</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-white rounded-xl shadow-soft border border-gray-100 p-6">
                        <h4 class="font-semibold text-lg">UI/UX Masterclass</h4>
                        <p class="text-sm text-gray-600">📅 Sept 15, 2025 | 📍 New Delhi</p>
                        <p class="text-gray-700 mt-2">Hands-on design thinking and prototyping workshop.</p>
                        <a href="#register" class="btn-secondary mt-4 inline-flex items-center">Register Now →</a>
                    </div>
                    <div class="bg-white rounded-xl shadow-soft border border-gray-100 p-6">
                        <h4 class="font-semibold text-lg">Web Dev Bootcamp</h4>
                        <p class="text-sm text-gray-600">📅 Oct 05, 2025 | 🌐 Online</p>
                        <p class="text-gray-700 mt-2">Full-stack development training with projects.</p>
                        <a href="#register" class="btn-secondary mt-4 inline-flex items-center">Register Now →</a>
                    </div>
                </div>
            </div>
            
        </div>

        <!-- Matrimonial Profile Details (Contact only) -->
        <div x-show="active==='contact'" style="display:none" class="mt-10">
            <h3 class="text-2xl font-semibold mb-6 text-[#212121]">Matrimonial Profile Details</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-gray-200 rounded-lg h-64 flex items-center justify-center">
                    <span class="text-gray-500 text-lg font-medium">600 x 400</span>
                </div>
                <div class="bg-gray-200 rounded-lg h-64 flex items-center justify-center">
                    <span class="text-gray-500 text-lg font-medium">600 x 400</span>
                </div>
                <div class="bg-gray-200 rounded-lg h-64 flex items-center justify-center">
                    <span class="text-gray-500 text-lg font-medium">600 x 400</span>
                </div>
            </div>
        </div>

        <!-- Placeholder empty states for other tabs (optional) -->
        <div x-show="active==='connect'" x-transition>
            <div class="max-w-7xl mx-auto p-6">
                <div x-data="{
                        links: [{ label: 'GitHub', href: '#' }],
                        showForm: false, editIndex: null,
                        form: { label: '', href: '' },
                        startAdd(){ this.form={label:'', href:''}; this.editIndex=null; this.showForm=true; },
                        startEdit(i){ this.editIndex=i; this.form={...this.links[i]}; this.showForm=true; },
                        save(){ if(!this.form.label || !this.form.href) return; if(this.editIndex===null){ this.links.push({ ...this.form }); } else { this.links[this.editIndex]={ ...this.form }; } this.showForm=false; },
                        remove(i){ this.links.splice(i,1); },
                        cancel(){ this.showForm=false; }
                    }" class="space-y-4">
                    <template x-for="(link, idx) in links" :key="idx">
                        <div class="flex items-center gap-3">
                            <a :href="link.href" class="flex-1 block bg-yellow-100 text-gray-800 rounded-full h-12 flex items-center justify-center shadow-sm border border-yellow-200 hover:bg-yellow-200 transition">
                                <span x-text="link.label"></span>
                            </a>
                            <button type="button" @click="startEdit(idx)" class="shrink-0 p-2 rounded-md border border-gray-200 hover:bg-gray-50" title="Edit">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4"><path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34a.9959.9959 0 0 0-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/></svg>
                            </button>
                            <button type="button" @click="remove(idx)" class="shrink-0 p-2 rounded-md border border-gray-200 hover:bg-gray-50" title="Delete">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4"><path d="M16 9v10H8V9h8m-1.5-6h-5l-1 1H5v2h14V4h-3.5l-1-1z"/></svg>
                            </button>
                        </div>
                    </template>

                    <div x-show="showForm" x-cloak class="rounded-xl border border-yellow-200 bg-yellow-50 p-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                            <input x-model="form.label" type="text" class="input-field" placeholder="Name (e.g., GitHub, LinkedIn)" />
                            <input x-model="form.href" type="url" class="input-field" placeholder="https://example.com/your-link" />
                        </div>
                        <div class="mt-3 flex gap-2 justify-end">
                            <button type="button" @click="cancel()" class="btn-secondary">Cancel</button>
                            <button type="button" @click="save()" class="btn-primary">Save</button>
                        </div>
                    </div>

                    <button type="button" @click="startAdd()" class="w-full inline-flex items-center justify-center gap-2 rounded-full h-12 border border-dashed border-yellow-300 text-yellow-700 hover:bg-yellow-50">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5"><path d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"/></svg>
                        <span>Add Link</span>
                    </button>
                
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- YouTube Embed -->
                        <div class="bg-white rounded-xl shadow-soft border border-gray-100 p-2" x-data="(function(){
                                return {
                                    raw: 'https://www.youtube.com/playlist?list=PLbwfaPBgAKFEPBg-OFzmjFWmRKKrYigLi',
                                    get embed(){
                                        try {
                                            // If already an embed URL, pass through (swap to nocookie domain for privacy)
                                            if(this.raw.includes('/embed/')){
                                                return this.raw.replace('www.youtube.com','www.youtube-nocookie.com');
                                            }
                                            const u = new URL(this.raw);
                                            const host = u.hostname;
                                            const search = u.searchParams;
                                            const list = search.get('list');
                                            let id = '';
                                            // youtu.be short link
                                            if(host.includes('youtu.be')){
                                                id = u.pathname.replace(/^\//,'');
                                            }
                                            // watch URL
                                            else if(u.pathname === '/watch'){
                                                id = search.get('v') || '';
                                            }
                                            // shorts URL
                                            else if(u.pathname.startsWith('/shorts/')){
                                                id = u.pathname.split('/')[2] || '';
                                            }
                                            // playlist only
                                            if(!id && list){
                                                return `https://www.youtube-nocookie.com/embed/videoseries?list=${list}`;
                                            }
                                            if(id){
                                                const base = `https://www.youtube-nocookie.com/embed/${id}`;
                                                return list ? `${base}?list=${list}` : base;
                                            }
                                            // Fallback: return as-is (may still fail if not embeddable)
                                            return this.raw;
                                        } catch(e){
                                            return this.raw;
                                        }
                                    }
                                }
                            })()">
                            <iframe class="w-full h-56 md:h-72 rounded-lg"
                                :src="embed"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </div>
                        <!-- Spotify Playlist Embed -->
                        <div class="bg-white rounded-xl shadow-soft border border-gray-100 p-2">
                            <iframe style="border-radius:12px" 
                                src="https://open.spotify.com/embed/playlist/37i9dQZF1DX4SBhb3fqCJd?utm_source=generator" 
                                width="100%" height="320" frameborder="0" 
                                allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" 
                                loading="lazy"></iframe>
                        </div>
                    </div>
                    
                    <div class="mt-8 bg-emerald-50 border border-emerald-100 rounded-2xl p-6 md:p-8 shadow-soft">
                        <h3 class="text-3xl font-bold text-gray-900">Boost your productivity today</h3>
                        <p class="text-gray-600 mt-2">Incididunt sint fugiat pariatur cupidatat consectetur sit cillum anim id veniam aliqua proident exceptuer commodo do ea.</p>
                        <div class="mt-4 flex gap-3">
                            <a href="#" class="btn-primary">Get started</a>
                            <a href="#" class="btn-secondary">Learn more ..</a>
                        </div>
                    </div>

                    <div class="mt-10 bg-white rounded-xl shadow-soft border border-gray-100 p-8 text-center">
                        <h3 class="text-2xl font-semibold text-gray-900">Sign up for our newsletter</h3>
                        <p class="text-gray-600 mt-1">Stay up to date with the roadmap progress, announcements and exclusive discounts feel free to sign up with your email.</p>
                        <form class="mt-5 max-w-xl mx-auto flex gap-3">
                            <input type="email" class="input-field flex-1" placeholder="Enter your email.." />
                            <a href="#" class="px-5 py-2 rounded-full bg-emerald-600 hover:bg-emerald-700 text-white font-medium inline-flex items-center justify-center">Subscribe</a>
                        </form>
                    </div>

                    <div class="mt-10">
                        <h3 class="text-3xl font-semibold text-center text-gray-900">Our Products</h3>
                        <p class="text-center text-gray-600 mt-2 max-w-2xl mx-auto">Stay up to date with the roadmap progress, announcements and exclusive discounts feel free to sign up with your email.</p>
                        <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                            <!-- Product Card 1 -->
                            <div class="bg-white rounded-xl shadow-soft border border-gray-100 overflow-hidden">
                                <div class="bg-gray-200 h-60 flex items-center justify-center select-none"><span class="text-gray-500">600 × 600</span></div>
                                <div class="p-4">
                                    <div class="flex items-start justify-between">
                                        <div>
                                            <div class="font-medium text-gray-900">Basic Tee</div>
                                            <div class="text-sm text-gray-500">Black</div>
                                        </div>
                                        <div class="text-gray-900 font-medium">$35</div>
                                    </div>
                                </div>
                            </div>
                            <!-- Product Card 2 -->
                            <div class="bg-white rounded-xl shadow-soft border border-gray-100 overflow-hidden">
                                <div class="bg-gray-200 h-60 flex items-center justify-center select-none"><span class="text-gray-500">600 × 600</span></div>
                                <div class="p-4">
                                    <div class="flex items-start justify-between">
                                        <div>
                                            <div class="font-medium text-gray-900">Basic Tee</div>
                                            <div class="text-sm text-gray-500">Black</div>
                                        </div>
                                        <div class="text-gray-900 font-medium">$35</div>
                                    </div>
                                </div>
                            </div>
                            <!-- Product Card 3 -->
                            <div class="bg-white rounded-xl shadow-soft border border-gray-100 overflow-hidden">
                                <div class="bg-gray-200 h-60 flex items-center justify-center select-none"><span class="text-gray-500">600 × 600</span></div>
                                <div class="p-4">
                                    <div class="flex items-start justify-between">
                                        <div>
                                            <div class="font-medium text-gray-900">Basic Tee</div>
                                            <div class="text-sm text-gray-500">Black</div>
                                        </div>
                                        <div class="text-gray-900 font-medium">$35</div>
                                    </div>
                                </div>
                            </div>
                            <!-- Product Card 4 -->
                            <div class="bg-white rounded-xl shadow-soft border border-gray-100 overflow-hidden">
                                <div class="bg-gray-200 h-60 flex items-center justify-center select-none"><span class="text-gray-500">600 × 600</span></div>
                                <div class="p-4">
                                    <div class="flex items-start justify-between">
                                        <div>
                                            <div class="font-medium text-gray-900">Basic Tee</div>
                                            <div class="text-sm text-gray-500">Black</div>
                                        </div>
                                        <div class="text-gray-900 font-medium">$35</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-10 bg-white rounded-2xl shadow-soft border border-gray-100 p-8 text-center">
                        <h3 class="text-3xl font-semibold text-gray-900">Support Me / Tip Jar</h3>
                        <p class="text-gray-600 mt-2">If you enjoy my work, you can support me with a small tip. Every contribution helps.</p>
                        <div class="mt-5 flex flex-wrap items-center justify-center gap-3">
                            <a href="#" class="inline-flex items-center gap-2 px-4 py-2 rounded-md bg-emerald-600 text-white hover:bg-emerald-700 shadow-sm">
                                <span>☕</span>
                                <span>Buy Me a Coffee</span>
                            </a>
                            <a href="#" class="inline-flex items-center gap-2 px-4 py-2 rounded-md bg-white border border-gray-300 text-gray-800 hover:bg-gray-50 shadow-sm">
                                <span>Support via Payment Gateway →</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div x-show="active==='portfolio'" x-transition>
            <div class="max-w-7xl mx-auto bg-white rounded-xl shadow-soft border border-gray-100 p-8">
                <div class="text-xs uppercase tracking-wider text-gray-700 mb-2">Project & Media Gallery</div>
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Portfolio</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-gray-200 rounded-lg h-64 flex items-center justify-center">
                        <span class="text-gray-500 text-2xl select-none">600 × 400</span>
                    </div>
                    <div class="bg-gray-200 rounded-lg h-64 flex items-center justify-center">
                        <span class="text-gray-500 text-2xl select-none">600 × 400</span>
                    </div>
                    <div class="bg-gray-200 rounded-lg h-64 flex items-center justify-center">
                        <span class="text-gray-500 text-2xl select-none">600 × 400</span>
                    </div>
                </div>

                <h3 class="text-lg font-semibold text-gray-900 mt-8 mb-3">Video Showcase</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="w-full">
                        <iframe class="w-full h-64 rounded-lg"
                            src="https://www.youtube.com/embed/4ZkJXW0G7lU"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                    <div class="w-full">
                        <iframe class="w-full h-64 rounded-lg"
                            src="https://www.youtube.com/embed/8J2n7Z9l3l0"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                </div>

                <h3 class="text-lg font-semibold text-gray-900 mt-10 mb-3">Audio / Music Player</h3>
                <div class="space-y-4">
                    <!-- Track 1 -->
                    <div class="bg-teal-500/70 rounded-xl p-4 shadow-sm" x-data="{ playing:false, toggle(){ const a=$refs.audio1; if(a.paused){ a.play(); this.playing=true;} else { a.pause(); this.playing=false;} }, end(){ this.playing=false; } }">
                        <div class="flex items-center gap-4">
                            <button @click="toggle()" class="w-14 h-14 rounded-full bg-emerald-500 hover:bg-emerald-600 text-white flex items-center justify-center shadow">
                                <svg x-show="!playing" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6"><path d="M8 5v14l11-7z"/></svg>
                                <svg x-show="playing" x-cloak xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6"><path d="M6 5h4v14H6zM14 5h4v14h-4z"/></svg>
                            </button>
                            <div class="flex-1">
                                <div class="text-white font-semibold leading-tight">Track Title</div>
                                <div class="text-white/80 text-xs mb-2">Artist Name</div>
                                <audio x-ref="audio1" @ended="end()" controls class="w-full">
                                    <source src="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3" type="audio/mpeg">
                                </audio>
                            </div>
                        </div>
                    </div>
                    <!-- Track 2 -->
                    <div class="bg-teal-500/70 rounded-xl p-4 shadow-sm" x-data="{ playing:false, toggle(){ const a=$refs.audio2; if(a.paused){ a.play(); this.playing=true;} else { a.pause(); this.playing=false;} }, end(){ this.playing=false; } }">
                        <div class="flex items-center gap-4">
                            <button @click="toggle()" class="w-14 h-14 rounded-full bg-emerald-500 hover:bg-emerald-600 text-white flex items-center justify-center shadow">
                                <svg x-show="!playing" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6"><path d="M8 5v14l11-7z"/></svg>
                                <svg x-show="playing" x-cloak xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6"><path d="M6 5h4v14H6zM14 5h4v14h-4z"/></svg>
                            </button>
                            <div class="flex-1">
                                <div class="text-white font-semibold leading-tight">Track Title</div>
                                <div class="text-white/80 text-xs mb-2">Artist Name</div>
                                <audio x-ref="audio2" @ended="end()" controls class="w-full">
                                    <source src="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-2.mp3" type="audio/mpeg">
                                </audio>
                            </div>
                        </div>
                    </div>
                    <!-- Track 3 -->
                    <div class="bg-teal-500/70 rounded-xl p-4 shadow-sm" x-data="{ playing:false, toggle(){ const a=$refs.audio3; if(a.paused){ a.play(); this.playing=true;} else { a.pause(); this.playing=false;} }, end(){ this.playing=false; } }">
                        <div class="flex items-center gap-4">
                            <button @click="toggle()" class="w-14 h-14 rounded-full bg-emerald-500 hover:bg-emerald-600 text-white flex items-center justify-center shadow">
                                <svg x-show="!playing" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6"><path d="M8 5v14l11-7z"/></svg>
                                <svg x-show="playing" x-cloak xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6"><path d="M6 5h4v14H6zM14 5h4v14h-4z"/></svg>
                            </button>
                            <div class="flex-1">
                                <div class="text-white font-semibold leading-tight">Track Title</div>
                                <div class="text-white/80 text-xs mb-2">Artist Name</div>
                                <audio x-ref="audio3" @ended="end()" controls class="w-full">
                                    <source src="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-3.mp3" type="audio/mpeg">
                                </audio>
                            </div>
                        </div>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mt-10 mb-3">Case Studies</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-white rounded-xl shadow-soft border border-gray-100 p-6">
                        <div class="font-semibold text-gray-900">Client Name</div>
                        <div class="mt-3 text-sm text-gray-700">
                            <div class="font-semibold text-gray-800">Challenge:</div>
                            <p class="mb-3 text-gray-600">Brief description of the client's problem...</p>
                            <div class="font-semibold text-gray-800">Solution:</div>
                            <p class="mb-3 text-gray-600">How you solved it with your product/service...</p>
                            <div class="font-semibold text-gray-800">Result:</div>
                            <p class="text-gray-600">Outcome, growth stats, or success story...</p>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl shadow-soft border border-gray-100 p-6">
                        <div class="font-semibold text-gray-900">Client Name</div>
                        <div class="mt-3 text-sm text-gray-700">
                            <div class="font-semibold text-gray-800">Challenge:</div>
                            <p class="mb-3 text-gray-600">Brief description of the client's problem...</p>
                            <div class="font-semibold text-gray-800">Solution:</div>
                            <p class="mb-3 text-gray-600">How you solved it with your product/service...</p>
                            <div class="font-semibold text-gray-800">Result:</div>
                            <p class="text-gray-600">Outcome, growth stats, or success story...</p>
                        </div>
                    </div>
                </div>

                <h3 class="text-lg font-semibold text-gray-900 mt-10 mb-3">Client List</h3>
                <div class="grid grid-cols-2 md:grid-cols-6 gap-4">
                    <div class="bg-gray-200 rounded-lg h-40 flex items-center justify-center"><span class="text-gray-500">400 × 400</span></div>
                    <div class="bg-gray-200 rounded-lg h-40 flex items-center justify-center"><span class="text-gray-500">400 × 400</span></div>
                    <div class="bg-gray-200 rounded-lg h-40 flex items-center justify-center"><span class="text-gray-500">400 × 400</span></div>
                    <div class="bg-gray-200 rounded-lg h-40 flex items-center justify-center"><span class="text-gray-500">400 × 400</span></div>
                    <div class="bg-gray-200 rounded-lg h-40 flex items-center justify-center"><span class="text-gray-500">400 × 400</span></div>
                    <div class="bg-gray-200 rounded-lg h-40 flex items-center justify-center"><span class="text-gray-500">400 × 400</span></div>
                </div>
                
                <h3 class="text-2xl font-bold text-gray-900 mt-10 mb-4">Press & Media Mentions</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-white rounded-xl shadow-soft border border-gray-100 p-6">
                        <div class="text-sm font-semibold text-gray-900">Publication Name</div>
                        <div class="mt-2 text-gray-700 italic">"Article Title"</div>
                        <a href="#" class="mt-3 inline-block text-sm text-indigo-700 hover:underline">Read Article →</a>
                    </div>
                    <div class="bg-white rounded-xl shadow-soft border border-gray-100 p-6">
                        <div class="text-sm font-semibold text-gray-900">Publication Name</div>
                        <div class="mt-2 text-gray-700 italic">"Article Title"</div>
                        <a href="#" class="mt-3 inline-block text-sm text-indigo-700 hover:underline">Read Article →</a>
                    </div>
                </div>

                <h3 class="text-2xl font-bold text-gray-900 mt-10 mb-4">Blog / Articles</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white rounded-xl shadow-soft border border-gray-100 p-6">
                        <div class="font-semibold text-gray-900">Article Title</div>
                        <p class="text-sm text-gray-600 mt-2">Short description or excerpt goes here...</p>
                        <a href="#" class="mt-3 inline-block text-sm text-indigo-700 hover:underline">Read More →</a>
                    </div>
                    <div class="bg-white rounded-xl shadow-soft border border-gray-100 p-6">
                        <div class="font-semibold text-gray-900">Article Title</div>
                        <p class="text-sm text-gray-600 mt-2">Short description or excerpt goes here...</p>
                        <a href="#" class="mt-3 inline-block text-sm text-indigo-700 hover:underline">Read More →</a>
                    </div>
                    <div class="bg-white rounded-xl shadow-soft border border-gray-100 p-6">
                        <div class="font-semibold text-gray-900">Article Title</div>
                        <p class="text-sm text-gray-600 mt-2">Short description or excerpt goes here...</p>
                        <a href="#" class="mt-3 inline-block text-sm text-indigo-700 hover:underline">Read More →</a>
                    </div>
                </div>
                </div>
                </div>
            <div x-show="fixed" x-cloak class="hidden md:block" :style="'height:'+h+'px'"></div>
        </div>
    </section>
        </div>
        @endsection