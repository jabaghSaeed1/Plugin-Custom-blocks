import { useBlockProps } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';

export default function Edit() {
    return (
        <div { ...useBlockProps({ className: 'editorial-search-block' }) }>
            <div className="search-morph-container">
                <div className="search-trigger">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2.5">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                    <span>{ __( 'Search', 'custom-design-block' ) }</span>
                </div>
            </div>
            <div style={{ fontSize: '10px', color: '#999', marginTop: '5px' }}>
                { __( 'Frontend: Button will expand on click.', 'custom-design-block' ) }
            </div>
        </div>
    );
}