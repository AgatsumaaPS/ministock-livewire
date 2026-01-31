import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Toast Notification System
document.addEventListener('livewire:load', function() {
    Livewire.on('toast', (event) => {
        const { message, type = 'success' } = event;
        const icon = type === 'success' ? '✓' : '✗';
        
        const toast = document.createElement('div');
        toast.className = `mb-3 px-4 py-3 rounded-lg shadow-lg flex items-center gap-3 ${
            type === 'success' ? 'bg-green-500 text-white' : 'bg-red-500 text-white'
        }`;
        toast.innerHTML = `
            <span class="text-2xl">${icon}</span>
            <span class="font-medium">${message}</span>
        `;
        
        const container = document.getElementById('toast-container');
        if (container) {
            container.appendChild(toast);
        }
        
        setTimeout(() => {
            toast.style.opacity = '0';
            toast.style.transform = 'translateX(400px)';
            setTimeout(() => toast.remove(), 300);
        }, 3000);
    });

    Livewire.on('showNotification', (event) => {
        const { title, message, type = 'warning' } = event;
        
        const notification = document.createElement('div');
        notification.className = `mb-3 px-4 py-3 rounded-lg shadow-lg border-l-4 ${
            type === 'warning' ? 'bg-yellow-50 dark:bg-yellow-900/20 border-yellow-500 text-yellow-700 dark:text-yellow-300' : 
            'bg-red-50 dark:bg-red-900/20 border-red-500 text-red-700 dark:text-red-300'
        }`;
        notification.innerHTML = `
            <h4 class="font-semibold">${title}</h4>
            <p class="text-sm mt-1">${message}</p>
        `;
        
        const container = document.querySelector('.notifications');
        if (!container) {
            const newContainer = document.createElement('div');
            newContainer.className = 'notifications fixed top-4 right-4 z-[9999] w-80';
            newContainer.appendChild(notification);
            document.body.appendChild(newContainer);
        } else {
            container.appendChild(notification);
        }
        
        setTimeout(() => {
            notification.style.opacity = '0';
            notification.style.transform = 'translateX(400px)';
            setTimeout(() => notification.remove(), 300);
        }, 5000);
    });
});