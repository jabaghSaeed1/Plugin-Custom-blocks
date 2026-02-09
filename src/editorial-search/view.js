document.addEventListener('DOMContentLoaded', () => {
    const blocks = document.querySelectorAll('.editorial-search-block');

    blocks.forEach(block => {
        const container = block.querySelector('.search-morph-container');
        const trigger = block.querySelector('.search-trigger');
        const close = block.querySelector('.search-close');
        const input = block.querySelector('.search-field');
        const overlay = block.querySelector('.search-results-overlay');
        const list = block.querySelector('.results-list');

        if (!container || !trigger || !input || !list) return;

        // Toggle Expand
        trigger.addEventListener('click', () => {
            container.classList.add('is-active');
            setTimeout(() => input.focus(), 200);
        });

        // Toggle Close
        close.addEventListener('click', () => {
            container.classList.remove('is-active');
            overlay.style.display = 'none';
            input.value = '';
        });

        // Search fetching with Images and Dates
        input.addEventListener('input', async (e) => {
            const query = e.target.value.trim();
            
            if (query.length < 3) {
                overlay.style.display = 'none';
                return;
            }

            overlay.style.display = 'block';
            list.innerHTML = '<div class="result-item-status">Searching news...</div>';

            try {
                // Fetch posts with _embed to get standard media
                const response = await fetch(`/wp-json/wp/v2/posts?search=${encodeURIComponent(query)}&_embed&per_page=5`);
                const posts = await response.json();

                if (!posts || posts.length === 0) {
                    list.innerHTML = '<div class="result-item-status">No results found.</div>';
                } else {
                    list.innerHTML = posts.map(post => {
                        
                        // --- THUMBNAIL LOGIC ---
                        // 1. Check for standard WordPress featured media (if embedded)
                        let thumb = post._embedded && post._embedded['wp:featuredmedia'] 
                            ? post._embedded['wp:featuredmedia'][0].source_url 
                            : null;

                        // 2. Fallback to our custom external_image_url from the API
                        if (!thumb && post.external_image_url) {
                            thumb = post.external_image_url;
                        }

                        // 3. Final fallback to a transparent placeholder
                        if (!thumb) {
                            thumb = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=';
                        }

                        // --- DATE LOGIC ---
                        const date = new Date(post.date).toLocaleDateString('en-GB', {
                            day: 'numeric',
                            month: 'short'
                        });

                        return `
                            <a href="${post.link}" class="result-item" style="display: flex; align-items: center; gap: 15px; text-decoration: none; padding: 10px; border-bottom: 1px solid #eee;">
                                <div class="result-thumb-wrapper" style="flex-shrink: 0; width: 60px; height: 60px; overflow: hidden; border-radius: 8px; background: #f0f0f0;">
                                    <img src="${thumb}" 
                                         class="result-thumb" 
                                         alt="" 
                                         style="width: 100%; height: 100%; object-fit: cover; display: block;" 
                                         onerror="this.src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII='"/>
                                </div>
                                <div class="result-info">
                                    <span class="result-title" style="display: block; font-weight: 600; color: #333; margin-bottom: 4px;">${post.title.rendered}</span>
                                    <span class="result-date" style="font-size: 0.85em; color: #888;">${date}</span>
                                </div>
                            </a>
                        `;
                    }).join('');
                }
            } catch (err) {
                console.error('Search Fetch Error:', err);
                list.innerHTML = '<div class="result-item-status">Search Error. Please try again.</div>';
            }
        });
    });
});