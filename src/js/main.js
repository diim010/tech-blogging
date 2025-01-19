
// src/js/main.js
document.addEventListener('DOMContentLoaded', function() {
    // Table of Contents Generation
    const content = document.querySelector('.entry-content');
    const tocContainer = document.getElementById('toc-container');
    
    if (content && tocContainer) {
        const headings = content.querySelectorAll('h2');
        const toc = document.createElement('ol');
        
        headings.forEach((heading, index) => {
            const id = `heading-${index}`;
            heading.id = id;
            
            const listItem = document.createElement('li');
            const link = document.createElement('a');
            link.href = `#${id}`;
            link.textContent = heading.textContent;
            
            listItem.appendChild(link);
            toc.appendChild(listItem);
        });
        
        tocContainer.appendChild(toc);
    }
    
    // Show More Features functionality
    const showMoreButtons = document.querySelectorAll('.show-more-features');
    showMoreButtons.forEach(button => {
        button.addEventListener('click', function() {
            const featuresList = this.nextElementSibling;
            featuresList.classList.toggle('visible');
            this.textContent = featuresList.classList.contains('visible') ? 
                'Show less' : 'Show more';
        });
    });
});
