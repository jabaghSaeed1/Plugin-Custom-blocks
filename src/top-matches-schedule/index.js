import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps } from '@wordpress/block-editor';
import metadata from './block.json';
import './style.scss';

registerBlockType( metadata.name, {
    edit: () => {
        const blockProps = useBlockProps({ className: 'admin-match-preview' });
        return (
            <div { ...blockProps }>
                <div style={{ padding: '20px', border: '2px dashed #ddd', textAlign: 'center' }}>
                    <strong>⚽ Match Schedule Block</strong>
                    <p style={{ margin: 0, fontSize: '12px' }}>Live matches will load on the front-end using your API Key.</p>
                </div>
            </div>
        );
    },
    save: () => null // Dynamic blocks render via PHP
} );