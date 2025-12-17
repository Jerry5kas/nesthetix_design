{{-- ============================================
    CONSULTATION FORM LIGHTBOX COMPONENT
    Compact & Mobile-Optimized Version
    Usage: <x-consultation-form />
    Trigger: Add data-consultation-trigger to any element
    ============================================ --}}

{{-- Lightbox Overlay --}}
<div id="consultationLightbox" class="consultation-lightbox fixed inset-0 z-[9999] hidden">
    {{-- Backdrop --}}
    <div class="lightbox-backdrop absolute inset-0 bg-black/60 backdrop-blur-sm" data-consultation-close></div>
    
    {{-- Modal Container --}}
    <div class="lightbox-container absolute inset-0 flex items-center justify-center p-4">
        {{-- Modal Content --}}
        <div class="lightbox-content relative w-full max-w-md bg-white rounded-xl shadow-2xl">
            {{-- Close Button --}}
            <button type="button" class="absolute -top-2 -right-2 z-10 w-8 h-8 flex items-center justify-center rounded-full bg-white shadow-lg hover:bg-gray-100 transition-colors" data-consultation-close aria-label="Close">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            {{-- Header --}}
            <div class="px-5 pt-5 pb-3 text-center border-b border-gray-100">
                <div class="flex items-center justify-center gap-2 mb-1">
                    <div class="w-8 h-8 rounded-lg flex items-center justify-center" style="background-color: var(--color-primary);">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold" style="color: var(--color-primary);">
                        Free Consultation
                    </h3>
                </div>
                <p class="text-gray-400 text-xs">We'll get back to you within 24 hours</p>
            </div>

            {{-- Form --}}
            <form id="consultationForm" class="p-5 space-y-3" method="POST" action="#">
                @csrf
                
                {{-- Name & Phone Row --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    {{-- Name Field --}}
                    <div>
                        <label for="consultation_name" class="block text-xs font-medium text-gray-600 mb-1">
                            Name <span class="text-red-400">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="consultation_name" 
                            name="name" 
                            required
                            placeholder="Your name"
                            class="consultation-input w-full px-3 py-2 text-sm border border-gray-200 rounded-lg focus:ring-2 focus:border-transparent transition-all text-gray-700 placeholder-gray-300"
                        />
                    </div>

                    {{-- Phone Field --}}
                    <div>
                        <label for="consultation_phone" class="block text-xs font-medium text-gray-600 mb-1">
                            Phone <span class="text-red-400">*</span>
                        </label>
                        <input 
                            type="tel" 
                            id="consultation_phone" 
                            name="phone" 
                            required
                            placeholder="Your phone"
                            class="consultation-input w-full px-3 py-2 text-sm border border-gray-200 rounded-lg focus:ring-2 focus:border-transparent transition-all text-gray-700 placeholder-gray-300"
                        />
                    </div>
                </div>

                {{-- Email Field --}}
                <div>
                    <label for="consultation_email" class="block text-xs font-medium text-gray-600 mb-1">
                        Email <span class="text-red-400">*</span>
                    </label>
                    <input 
                        type="email" 
                        id="consultation_email" 
                        name="email" 
                        required
                        placeholder="your@email.com"
                        class="consultation-input w-full px-3 py-2 text-sm border border-gray-200 rounded-lg focus:ring-2 focus:border-transparent transition-all text-gray-700 placeholder-gray-300"
                    />
                </div>

                {{-- Message Field --}}
                <div>
                    <label for="consultation_message" class="block text-xs font-medium text-gray-600 mb-1">
                        Message <span class="text-gray-300">(optional)</span>
                    </label>
                    <textarea 
                        id="consultation_message" 
                        name="message" 
                        rows="2"
                        placeholder="Tell us about your project..."
                        class="consultation-input w-full px-3 py-2 text-sm border border-gray-200 rounded-lg focus:ring-2 focus:border-transparent transition-all text-gray-700 placeholder-gray-300 resize-none"
                    ></textarea>
                </div>

                {{-- Submit Button --}}
                <button 
                    type="submit" 
                    class="consultation-submit w-full py-2.5 rounded-lg font-medium text-white text-sm transition-all duration-300 flex items-center justify-center gap-2"
                    style="background-color: var(--color-primary);"
                >
                    <span>Send Request</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </button>

                {{-- Privacy Note --}}
                <p class="text-center text-[10px] text-gray-300">
                    By submitting, you agree to our <a href="#" class="underline hover:text-gray-500">Privacy Policy</a>
                </p>
            </form>

            {{-- Success Message (Hidden by default) --}}
            <div id="consultationSuccess" class="hidden p-8 text-center">
                <div class="w-14 h-14 mx-auto mb-4 rounded-full bg-green-100 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-800 mb-1">Thank You!</h3>
                <p class="text-gray-400 text-sm mb-4">We'll contact you within 24 hours.</p>
                <button type="button" class="px-5 py-2 rounded-lg text-sm font-medium text-white" style="background-color: var(--color-primary);" data-consultation-close>
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

{{-- Component Styles --}}
<style>
    /* Lightbox Animations */
    .consultation-lightbox {
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.25s ease, visibility 0.25s ease;
    }
    
    .consultation-lightbox.active {
        opacity: 1;
        visibility: visible;
    }
    
    .consultation-lightbox .lightbox-content {
        transform: scale(0.95) translateY(10px);
        opacity: 0;
        transition: transform 0.3s cubic-bezier(0.19, 1, 0.22, 1), opacity 0.25s ease;
    }
    
    .consultation-lightbox.active .lightbox-content {
        transform: scale(1) translateY(0);
        opacity: 1;
    }
    
    /* Input Focus */
    .consultation-input:focus {
        outline: none;
        border-color: var(--color-primary);
        box-shadow: 0 0 0 2px rgba(50, 1, 47, 0.08);
    }
    
    /* Submit Button */
    .consultation-submit:hover {
        opacity: 0.9;
        transform: translateY(-1px);
    }
    
    .consultation-submit:active {
        transform: translateY(0);
    }
    
    /* Loading State */
    .consultation-submit.loading {
        pointer-events: none;
        opacity: 0.7;
    }
    
    .consultation-submit.loading span,
    .consultation-submit.loading svg {
        display: none;
    }
    
    .consultation-submit.loading::after {
        content: '';
        width: 16px;
        height: 16px;
        border: 2px solid transparent;
        border-top-color: white;
        border-radius: 50%;
        animation: spin 0.6s linear infinite;
    }
    
    @keyframes spin {
        to { transform: rotate(360deg); }
    }

    /* Mobile Optimizations */
    @media (max-width: 480px) {
        .lightbox-container {
            padding: 1rem;
        }
        
        .lightbox-content {
            max-height: calc(100vh - 2rem);
            overflow-y: auto;
        }
    }
</style>

{{-- Component JavaScript --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    const lightbox = document.getElementById('consultationLightbox');
    const form = document.getElementById('consultationForm');
    const successMessage = document.getElementById('consultationSuccess');
    
    // Open lightbox
    document.querySelectorAll('[data-consultation-trigger]').forEach(trigger => {
        trigger.addEventListener('click', function(e) {
            e.preventDefault();
            openConsultationLightbox();
        });
    });
    
    // Close lightbox
    document.querySelectorAll('[data-consultation-close]').forEach(closeBtn => {
        closeBtn.addEventListener('click', closeConsultationLightbox);
    });
    
    // Close on Escape
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && lightbox.classList.contains('active')) {
            closeConsultationLightbox();
        }
    });
    
    // Form submission
    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const submitBtn = form.querySelector('.consultation-submit');
            submitBtn.classList.add('loading');
            
            // Simulate submission
            setTimeout(() => {
                submitBtn.classList.remove('loading');
                form.style.display = 'none';
                document.querySelector('.lightbox-content > div:first-child').style.display = 'none';
                successMessage.classList.remove('hidden');
                form.reset();
            }, 1000);
        });
    }
    
    function openConsultationLightbox() {
        lightbox.classList.remove('hidden');
        requestAnimationFrame(() => lightbox.classList.add('active'));
        document.body.style.overflow = 'hidden';
    }
    
    function closeConsultationLightbox() {
        lightbox.classList.remove('active');
        setTimeout(() => {
            lightbox.classList.add('hidden');
            if (form) form.style.display = 'block';
            const header = document.querySelector('.lightbox-content > div:first-child');
            if (header) header.style.display = 'block';
            if (successMessage) successMessage.classList.add('hidden');
        }, 250);
        document.body.style.overflow = '';
    }
    
    window.openConsultationLightbox = openConsultationLightbox;
    window.closeConsultationLightbox = closeConsultationLightbox;
});
</script>
