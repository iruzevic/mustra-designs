import { __ } from '@wordpress/i18n';
import { getOption, checkAttr, getAttrKey, props, getOptions, wpSearchRoute, getHiddenOptions } from '@eightshift/frontend-libs-tailwind/scripts';
import { IconOptions } from '../../icon/components/icon-options';
import { ButtonGroup, ColorPicker, ComponentToggle, HStack, InputField, LinkInput, OptionSelect, Spacer, Toggle } from '@eightshift/ui-components';
import { icons } from '@eightshift/ui-components/icons';
import { upperFirst } from '@eightshift/ui-components/utilities';
import manifest from './../manifest.json';

export const ButtonOptions = (attributes) => {
	const { setAttributes, hideOptions, ...rest } = attributes;

	const hiddenOptions = getHiddenOptions(hideOptions);

	const buttonId = checkAttr('buttonId', attributes, manifest);
	const buttonAriaLabel = checkAttr('buttonAriaLabel', attributes, manifest);
	const buttonUrl = checkAttr('buttonUrl', attributes, manifest);
	const buttonIsAnchor = checkAttr('buttonIsAnchor', attributes, manifest);
	const buttonIsNewTab = checkAttr('buttonIsNewTab', attributes, manifest);
	const buttonVariant = checkAttr('buttonVariant', attributes, manifest);
	const buttonColor = checkAttr('buttonColor', attributes, manifest);
	const buttonUse = checkAttr('buttonUse', attributes, manifest);

	return (
		<ComponentToggle
			label={manifest.title}
			icon={icons.buttonOutline}
			onChange={(value) => setAttributes({ [getAttrKey('buttonUse', attributes, manifest)]: value })}
			useComponent={buttonUse}
			{...rest}
		>
			<HStack hidden={hiddenOptions?.variant && hiddenOptions?.color && hiddenOptions?.icon}>
				<ButtonGroup hidden={hiddenOptions?.variant && hiddenOptions?.color}>
					<OptionSelect
						aria-label={__('Style', 'mustra-designs')}
						value={buttonVariant}
						onChange={(value) => setAttributes({ [getAttrKey('buttonVariant', attributes, manifest)]: value })}
						options={getOption('buttonVariant', attributes, manifest)}
						type='menu'
						hidden={hiddenOptions?.variant}
					/>

					<ColorPicker
						aria-label={__('Color', 'mustra-designs')}
						value={buttonColor}
						onChange={(value) => setAttributes({ [getAttrKey('buttonColor', attributes, manifest)]: value })}
						colors={getOption(`buttonColor${upperFirst(buttonVariant)}`, attributes, manifest, true)}
						hidden={hiddenOptions?.color}
					/>
				</ButtonGroup>

				<IconOptions
					{...props('icon', attributes, {
						options: getOptions(attributes, manifest),
					})}
					hidden={hiddenOptions?.icon}
					hideOptions='size'
					design='compactLabel'
				/>
			</HStack>

			<Spacer hidden={hiddenOptions?.link} />

			<LinkInput
				icon={buttonIsAnchor ? icons.globeAnchor : icons.globe}
				url={buttonUrl}
				onChange={({ url, isAnchor }) => {
					setAttributes({
						[getAttrKey('buttonUrl', attributes, manifest)]: url,
						[getAttrKey('buttonIsAnchor', attributes, manifest)]: isAnchor ?? false,
					});
				}}
				fetchSuggestions={wpSearchRoute}
				hidden={hiddenOptions?.link}
			/>

			<Toggle
				icon={icons.newTab}
				label={__('Open in new tab', 'mustra-designs')}
				checked={buttonIsNewTab}
				onChange={(value) => setAttributes({ [getAttrKey('buttonIsNewTab', attributes, manifest)]: value })}
				hidden={hiddenOptions?.link || hiddenOptions?.newTab}
			/>

			<Spacer hidden={hiddenOptions?.ariaLabel} />
			<Spacer
				icon={icons.a11y}
				text={__('Accessibility', 'mustra-designs')}
				border
				hidden={hiddenOptions?.ariaLabel}
			/>
			<InputField
				icon={icons.ariaLabel}
				label={__('ARIA label', 'mustra-designs')}
				value={buttonAriaLabel}
				onChange={(value) => setAttributes({ [getAttrKey('buttonAriaLabel', attributes, manifest)]: value })}
				help={__('Description of the button.', 'mustra-designs')}
				hidden={hiddenOptions?.ariaLabel}
			/>

			<Spacer hidden={hiddenOptions?.uniqueId} />
			<Spacer
				icon={icons.pointerHand}
				text={__('Advanced', 'mustra-designs')}
				border
				hidden={hiddenOptions?.uniqueId}
			/>
			<InputField
				icon={icons.id}
				label={__('Unique identifier', 'mustra-designs')}
				value={buttonId}
				onChange={(value) => setAttributes({ [getAttrKey('buttonId', attributes, manifest)]: value })}
				hidden={hiddenOptions?.uniqueId}
			/>
		</ComponentToggle>
	);
};
