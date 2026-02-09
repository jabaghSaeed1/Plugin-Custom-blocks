import { registerBlockType } from '@wordpress/blocks';
import './style.scss'; // We will create this file for CSS
import Edit from './edit';
import save from './save';
import metadata from './block.json';

registerBlockType( metadata.name, {
	edit: Edit,
	save,
} );