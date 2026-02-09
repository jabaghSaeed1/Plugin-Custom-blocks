import { registerBlockType } from '@wordpress/blocks';
import './style.scss'; // CRITICAL: This ensures your styles compile!

registerBlockType('create-block/top-transfers', {
    edit: () => {
        return (
            <div style={{ padding: '20px', background: '#767676', color: '#fff', borderRadius: '10px' }}>
                <h3>⚽ Recent Transfers Block</h3>
                <p>Transfer data will appear on the live site.</p>
            </div>
        );
    },
    save: () => null, // Rendering is handled by render.php
});