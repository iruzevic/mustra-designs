import { __ } from '@wordpress/i18n';
import { props, getOptions, checkAttr, getOption, getAttrKey } from '@eightshift/frontend-libs-tailwind/scripts';
import { ImageOptions } from '../../image/components/image-options';
import { HeadingOptions } from '../../heading/components/heading-options';
import { ParagraphOptions } from '../../paragraph/components/paragraph-options';
import { ButtonOptions } from '../../button/components/button-options';
import { OptionSelect } from '@eightshift/ui-components';
import manifest from './../manifest.json';

export const CardOptions = (attributes) => {
	const { setAttributes } = attributes;

	const cardAlign = checkAttr('cardAlign', attributes, manifest);

	return (
		<>
			<OptionSelect
				value={cardAlign}
				options={getOption('cardAlign', attributes, manifest)}
				onChange={(value) => setAttributes({ [getAttrKey('cardAlign', attributes, manifest)]: value })}
				aria-label={__('Card align', 'mustra-designs')}
				noItemLabel
			/>

			<div>
				<ImageOptions
					{...props('image', attributes)}
					hideOptions='borderRadius'
				/>

				<ParagraphOptions
					{...props('intro', attributes, { options: getOptions(attributes, manifest) })}
					label={__('Intro', 'mustra-designs')}
					expandButtonDisabled
				/>

				<HeadingOptions
					{...props('heading', attributes, { options: getOptions(attributes, manifest) })}
					hideOptions='size'
				/>

				<ParagraphOptions
					{...props('paragraph', attributes, { options: getOptions(attributes, manifest) })}
					expandButtonDisabled
				/>

				<ButtonOptions
					{...props('button', attributes, { options: getOptions(attributes, manifest) })}
					label={__('Call to action', 'mustra-designs')}
					hideOptions='variant,color'
				/>
			</div>
		</>
	);
};
