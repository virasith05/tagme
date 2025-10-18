import './bootstrap';

// Alpine.js setup
import Alpine from 'alpinejs';

// Expose Alpine before components register themselves
window.Alpine = Alpine;

// Register Alpine data/components
import './components/alpine-components';

// Start Alpine
Alpine.start();
