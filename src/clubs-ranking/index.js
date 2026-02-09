import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, TextControl } from '@wordpress/components';
import metadata from './block.json';
import './style.scss';

registerBlockType( metadata.name, {
    edit: ( { attributes, setAttributes } ) => {
        const { leagueId } = attributes;

        return (
            <div { ...useBlockProps() }>
                { /* Sidebar Settings */ }
                <InspectorControls>
                    <PanelBody title="API Settings">
                        <TextControl
                            label="League ID"
                            value={ leagueId || '39' }
                            onChange={ ( val ) => setAttributes( { leagueId: val } ) }
                            help="Premier League: 39, La Liga: 140, Serie A: 135"
                        />
                    </PanelBody>
                </InspectorControls>

                { /* Editor Preview Placeholder */ }
                <div style={ { 
                    padding: '24px', 
                    background: '#E9EEF2', 
                    borderRadius: '12px',
                    border: '1px dashed #333639',
                    textAlign: 'center'
                } }>
                    <strong style={{ display: 'block', marginBottom: '8px' }}>
                        Clubs Ranking Table
                    </strong>
                    <p style={{ margin: 0, fontSize: '13px', color: '#666' }}>
                        Currently fetching League ID: <strong>{ leagueId || '39' }</strong>
                    </p>
                    <p style={{ fontSize: '11px', marginTop: '10px' }}>
                        (Table renders on the front-end only)
                    </p>
                </div>
            </div>
        );
    },
    save: () => null, 
} );