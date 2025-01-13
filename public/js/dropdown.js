document.addEventListener('DOMContentLoaded', function() {
    // Desktop dropdown
    const dropdownButton = document.getElementById('dropdownButton');
    const dropdownContent = document.getElementById('dropdownContent');
    
    // Mobile dropdown
    const dropdownMobileButton = document.getElementById('dropdownMobileButton');
    const dropdownContentMobile = document.getElementById('dropdownContentMobile');

    // Toggle mobile dropdown
    dropdownMobileButton?.addEventListener('click', function(e) {
        e.stopPropagation();
        dropdownContentMobile.classList.toggle('show');
        this.querySelector('.dropdown-arrow').style.transform = 
            dropdownContentMobile.classList.contains('show') ? 'rotate(180deg)' : 'rotate(0)';
    });

    // Close dropdowns when clicking outside
    document.addEventListener('click', function(e) {
        if (!dropdownButton?.contains(e.target) && !dropdownContent?.contains(e.target)) {
            dropdownContent?.classList.remove('show');
        }
        
        if (!dropdownMobileButton?.contains(e.target) && !dropdownContentMobile?.contains(e.target)) {
            dropdownContentMobile?.classList.remove('show');
            const mobileArrow = dropdownMobileButton?.querySelector('.dropdown-arrow');
            if (mobileArrow) {
                mobileArrow.style.transform = 'rotate(0)';
            }
        }
    });

    // Add hover effect for desktop
    if (window.innerWidth >= 768) {
        dropdownButton?.addEventListener('mouseenter', function() {
            dropdownContent?.classList.add('show');
            this.querySelector('.dropdown-arrow').style.transform = 'rotate(180deg)';
        });

        dropdownButton?.addEventListener('mouseleave', function() {
            dropdownContent?.classList.remove('show');
            this.querySelector('.dropdown-arrow').style.transform = 'rotate(0)';
        });
    }

    // Handle window resize
    window.addEventListener('resize', function() {
        if (window.innerWidth >= 768) {
            dropdownContentMobile?.classList.remove('show');
            const mobileArrow = dropdownMobileButton?.querySelector('.dropdown-arrow');
            if (mobileArrow) {
                mobileArrow.style.transform = 'rotate(0)';
            }
        }
    });
});