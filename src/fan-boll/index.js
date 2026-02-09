import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps } from '@wordpress/block-editor';
import './style.scss'; // Assuming you are using the build process to compile SCSS

registerBlockType('create-block/fan-poll', {
    edit: () => {
        const blockProps = useBlockProps({ className: 'fan-poll-container' });
        return (
            <div { ...blockProps }>
                <div className="poll-header">
                    <span className="live-badge">LIVE POLL (Editor Preview)</span>
                    <h3>Who will win the Champions League 2026?</h3>
                </div>
                <div className="poll-options">
                    <div className="poll-btn"><span className="team-name">Real Madrid</span></div>
                    <div className="poll-btn"><span className="team-name">Manchester City</span></div>
                </div>
                <p style={{ fontSize: '10px', marginTop: '10px', color: '#999' }}>
                    * Interactive features will work on the front-end only.
                </p>
            </div>
        );
    },
    save: () => null, // We use render.php for the front-end output
});