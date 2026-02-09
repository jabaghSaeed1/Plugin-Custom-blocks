<?php
$wrapper_attributes = get_block_wrapper_attributes( array( 'class' => 'editorial-search-block' ) );
?>
<div <?php echo $wrapper_attributes; ?>>
    <div class="search-morph-container">
        
        <button class="search-trigger">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
            <span>Search</span>
        </button>

        <div class="search-input-wrapper">
            <input type="text" class="search-field" placeholder="Search sports news..." autocomplete="off" />
            <button class="search-close" aria-label="Close search">&times;</button>
        </div>

        <div class="search-results-overlay">
            <div class="results-list"></div>
        </div>
        
    </div>
</div>