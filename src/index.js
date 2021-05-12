/**
 * External dependencies
 */
import {
	WooRemotePayment,
	WooRemotePaymentSettings,
} from '@woocommerce/components';
import { registerPlugin } from '@wordpress/plugins';

registerPlugin( 'wc-remote-payments', {
	render: () => (
		<>
			<WooRemotePayment id="payfast">
				{ ( { defaultStepper: DefaultStepper } ) => (
					<>
						<h3>Custom Top Heading</h3>
						<DefaultStepper />
					</>
				) }
			</WooRemotePayment>
			<WooRemotePaymentSettings id="payfast">
				{ ( { defaultSettings: DefaultSettings, markConfigured } ) => (
					<>
						<h4>Custom Sub-Heading</h4>
						<DefaultSettings
							onSubmit={ () => {
								console.info(
									'Custom update function, marking configured'
								);
								markConfigured();
							} }
						/>
					</>
				) }
			</WooRemotePaymentSettings>
		</>
	),
} );
