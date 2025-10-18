// Alpine.js Components for Laravel App
import Alpine from 'alpinejs';

// Dark Mode Toggle
Alpine.data('darkMode', () => ({
    dark: false,
    
    init() {
        // Check for saved theme preference or default to 'light'
        this.dark = localStorage.getItem('darkMode') === 'true' || 
                   (!localStorage.getItem('darkMode') && window.matchMedia('(prefers-color-scheme: dark)').matches);
        
        this.updateTheme();
        
        // Listen for system theme changes
        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', (e) => {
            if (!localStorage.getItem('darkMode')) {
                this.dark = e.matches;
                this.updateTheme();
            }
        });
    },
    
    toggle() {
        this.dark = !this.dark;
        localStorage.setItem('darkMode', this.dark);
        this.updateTheme();
    },
    
    updateTheme() {
        if (this.dark) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    }
}));

// Navigation Menu
Alpine.data('navigation', () => ({
    open: false,
    
    toggle() {
        this.open = !this.open;
    },
    
    close() {
        this.open = false;
    }
}));

// Modal Component
Alpine.data('modal', () => ({
    show: false,
    
    open() {
        this.show = true;
        document.body.style.overflow = 'hidden';
    },
    
    close() {
        this.show = false;
        document.body.style.overflow = 'auto';
    },
    
    init() {
        // Close modal on escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && this.show) {
                this.close();
            }
        });
    }
}));

// Form Validation
Alpine.data('formValidation', () => ({
    errors: {},
    loading: false,
    
    validate(field, value, rules = {}) {
        delete this.errors[field];
        
        if (rules.required && !value) {
            this.errors[field] = 'This field is required';
            return false;
        }
        
        if (rules.email && value && !this.isValidEmail(value)) {
            this.errors[field] = 'Please enter a valid email address';
            return false;
        }
        
        if (rules.min && value && value.length < rules.min) {
            this.errors[field] = `Must be at least ${rules.min} characters`;
            return false;
        }
        
        return true;
    },
    
    isValidEmail(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    },
    
    hasError(field) {
        return this.errors[field] ? true : false;
    },
    
    getError(field) {
        return this.errors[field];
    }
}));

// Toast Notifications
Alpine.data('toast', () => ({
    messages: [],
    
    show(message, type = 'info', duration = 5000) {
        const id = Date.now();
        const toast = { id, message, type, duration };
        
        this.messages.push(toast);
        
        // Auto remove after duration
        setTimeout(() => {
            this.remove(id);
        }, duration);
    },
    
    remove(id) {
        this.messages = this.messages.filter(msg => msg.id !== id);
    },
    
    success(message) {
        this.show(message, 'success');
    },
    
    error(message) {
        this.show(message, 'error');
    },
    
    warning(message) {
        this.show(message, 'warning');
    },
    
    info(message) {
        this.show(message, 'info');
    }
}));

// Loading States
Alpine.data('loading', () => ({
    loading: false,
    
    async withLoading(fn) {
        this.loading = true;
        try {
            await fn();
        } finally {
            this.loading = false;
        }
    }
}));

// Search Component
Alpine.data('search', () => ({
    query: '',
    results: [],
    loading: false,
    showResults: false,
    
    async search() {
        if (this.query.length < 2) {
            this.results = [];
            this.showResults = false;
            return;
        }
        
        this.loading = true;
        
        try {
            // Replace with your actual search endpoint
            const response = await fetch(`/api/search?q=${encodeURIComponent(this.query)}`);
            this.results = await response.json();
            this.showResults = true;
        } catch (error) {
            console.error('Search error:', error);
            this.results = [];
        } finally {
            this.loading = false;
        }
    },
    
    selectResult(result) {
        // Handle result selection
        this.query = result.title;
        this.showResults = false;
        // Navigate or perform action with result
    },
    
    clear() {
        this.query = '';
        this.results = [];
        this.showResults = false;
    }
}));

// Accordion Component
Alpine.data('accordion', () => ({
    openItems: [],
    
    toggle(item) {
        if (this.openItems.includes(item)) {
            this.openItems = this.openItems.filter(i => i !== item);
        } else {
            this.openItems.push(item);
        }
    },
    
    isOpen(item) {
        return this.openItems.includes(item);
    }
}));

// Carousel/Slider Component
Alpine.data('carousel', () => ({
    currentSlide: 0,
    slides: [],
    autoplay: true,
    interval: null,

    init() {
        // slides may be injected via x-init from Blade
        if (this.slides.length === 0) return;
        if (this.autoplay) this.startAutoplay();
    },

    next() {
        this.currentSlide = (this.currentSlide + 1) % this.slides.length;
    },

    previous() {
        this.currentSlide = this.currentSlide === 0 ? this.slides.length - 1 : this.currentSlide - 1;
    },

    goToSlide(index) {
        this.currentSlide = index;
    },

    slideStyle(index) {
        const offset = (index - this.currentSlide) * 100;
        return `transform: translateX(${offset}%);`;
    },

    startAutoplay() {
        this.interval = setInterval(() => this.next(), 5000);
    },

    stopAutoplay() {
        if (!this.interval) return;
        clearInterval(this.interval);
        this.interval = null;
    }
}));
