//this script is for marking notifications as read in the admin panel

document.addEventListener('DOMContentLoaded', function () {
    const notificationItems = document.querySelectorAll('.notification-item');
    
    notificationItems.forEach(item => {
        item.addEventListener('click', function (event) {
            const notificationId = this.dataset.id;
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            if (notificationId && csrfToken) {
                fetch(`/notifications/${notificationId}/read`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                }).catch(error => console.error('Error marking notification as read:', error));
            }
        });
    });
});
