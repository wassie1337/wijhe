const { __ } = wp.i18n;
const { InspectorControls, RichText, URLInput, useBlockProps } = wp.blockEditor;
const { Button, PanelBody, TextControl } = wp.components;
const { createElement: el, Fragment } = wp.element;
const { registerBlockType } = wp.blocks;

const metadata = {
	apiVersion: 3,
	name: 'wijhe-studio/audience-tabs',
	title: __('Doelgroep tabs', 'wijhe-studio'),
	category: 'widgets',
	icon: 'index-card',
	description: __('Toon meerdere doelgroepen in toegankelijke tabbladen.', 'wijhe-studio'),
	attributes: {
		eyebrow: { type: 'string', default: __('Doelgroepen', 'wijhe-studio') },
		title: { type: 'string', default: __('Voor wie is deze pagina?', 'wijhe-studio') },
		tabs: {
			type: 'array',
			default: [
				{ label: __('Inwoners', 'wijhe-studio'), heading: __('Alles voor inwoners', 'wijhe-studio'), content: __('Beschrijf hier de belangrijkste route, voordelen of acties voor deze doelgroep.', 'wijhe-studio'), cta: __('Lees meer', 'wijhe-studio'), url: '#' },
				{ label: __('Ondernemers', 'wijhe-studio'), heading: __('Voor ondernemers', 'wijhe-studio'), content: __('Maak duidelijk welke informatie, diensten of vervolgstappen ondernemers kunnen verwachten.', 'wijhe-studio'), cta: __('Bekijk opties', 'wijhe-studio'), url: '#' },
				{ label: __('Bezoekers', 'wijhe-studio'), heading: __('Welkom bezoekers', 'wijhe-studio'), content: __('Gebruik compacte teksten en een duidelijke call-to-action per doelgroep.', 'wijhe-studio'), cta: __('Ontdek meer', 'wijhe-studio'), url: '#' }
			]
		}
	},
	supports: {
		align: ['wide', 'full'],
		color: { background: true, text: true },
		spacing: { margin: true, padding: true },
		typography: { fontSize: true }
	}
};

registerBlockType(metadata.name, {
	...metadata,
	edit: ({ attributes, setAttributes }) => {
		const blockProps = useBlockProps({ className: 'wijhe-audience-tabs' });
		const tabs = attributes.tabs || [];
		const updateTab = (index, key, value) => {
			const nextTabs = tabs.map((tab, tabIndex) => tabIndex === index ? { ...tab, [key]: value } : tab);
			setAttributes({ tabs: nextTabs });
		};
		const addTab = () => setAttributes({
			tabs: [
				...tabs,
				{ label: __('Nieuwe doelgroep', 'wijhe-studio'), heading: __('Nieuwe titel', 'wijhe-studio'), content: __('Beschrijf deze doelgroep.', 'wijhe-studio'), cta: __('Lees meer', 'wijhe-studio'), url: '#' }
			]
		});
		const removeTab = (index) => setAttributes({ tabs: tabs.filter((_, tabIndex) => tabIndex !== index) });

		return el(Fragment, null,
			el(InspectorControls, null,
				el(PanelBody, { title: __('Tabbladen beheren', 'wijhe-studio'), initialOpen: true },
					tabs.map((tab, index) => el('div', { className: 'wijhe-audience-tabs-editor__item', key: index },
						el(TextControl, {
							label: __('Tab label', 'wijhe-studio'),
							value: tab.label || '',
							onChange: (value) => updateTab(index, 'label', value)
						}),
						el(TextControl, {
							label: __('Knoptekst', 'wijhe-studio'),
							value: tab.cta || '',
							onChange: (value) => updateTab(index, 'cta', value)
						}),
						el('label', { className: 'wijhe-audience-tabs-editor__label' }, __('Link', 'wijhe-studio')),
						el(URLInput, {
							value: tab.url || '',
							onChange: (value) => updateTab(index, 'url', value)
						}),
						el(Button, {
							isDestructive: true,
							variant: 'secondary',
							onClick: () => removeTab(index),
							disabled: tabs.length <= 1
						}, __('Verwijder tab', 'wijhe-studio'))
					)),
					el(Button, { variant: 'primary', onClick: addTab }, __('Tab toevoegen', 'wijhe-studio'))
				)
			),
			el('section', blockProps,
				el('header', { className: 'wijhe-audience-tabs__header' },
					el(RichText, {
						tagName: 'p',
						className: 'wijhe-audience-tabs__eyebrow wijhe-kicker',
						value: attributes.eyebrow,
						onChange: (value) => setAttributes({ eyebrow: value }),
						placeholder: __('Kicker', 'wijhe-studio')
					}),
					el(RichText, {
						tagName: 'h2',
						className: 'wijhe-audience-tabs__title',
						value: attributes.title,
						onChange: (value) => setAttributes({ title: value }),
						placeholder: __('Titel', 'wijhe-studio')
					})
				),
				el('div', { className: 'wijhe-audience-tabs__shell' },
					el('div', { className: 'wijhe-audience-tabs__tablist', role: 'tablist' },
						tabs.map((tab, index) => el('button', {
							className: 'wijhe-audience-tabs__tab',
							type: 'button',
							role: 'tab',
							'aria-selected': index === 0 ? 'true' : 'false',
							key: index
						}, el('span', null, tab.label || __('Tab', 'wijhe-studio'))))
					),
					el('div', { className: 'wijhe-audience-tabs__panels' },
						tabs.map((tab, index) => el('article', { className: 'wijhe-audience-tabs__panel', key: index, hidden: index !== 0 },
							el(RichText, {
								tagName: 'h3',
								value: tab.heading,
								onChange: (value) => updateTab(index, 'heading', value),
								placeholder: __('Kop voor doelgroep', 'wijhe-studio')
							}),
							el(RichText, {
								tagName: 'p',
								value: tab.content,
								onChange: (value) => updateTab(index, 'content', value),
								placeholder: __('Beschrijving', 'wijhe-studio')
							}),
							el('span', { className: 'wijhe-audience-tabs__cta' }, tab.cta || __('Call-to-action', 'wijhe-studio'))
						))
					)
				)
			)
		);
	},
	save: () => null
});
