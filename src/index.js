/**
 * External dependencies
 */
import { WooRemotePayment, WooRemotePaymentForm } from '@woocommerce/tasks';
import { registerPlugin } from '@wordpress/plugins';

registerPlugin( 'wc-remote-payments', {
	render: () => (
		<>
			<WooRemotePayment id="woocommerce_payments">
				{ ( { defaultStepper: DefaultStepper } ) => (
					<>
						<h3>Custom Top Heading</h3>
						<DefaultStepper />
					</>
				) }
			</WooRemotePayment>
			<WooRemotePaymentForm id="woocommerce_payments">
				{ ( { defaultForm: DefaultForm, markConfigured } ) => (
					<>
						<h4>Custom Sub-Heading</h4>
						<DefaultForm
							onSubmit={ () => {
								console.info(
									'Custom update function, marking configured'
								);
								markConfigured();
							} }
						/>
					</>
				) }
			</WooRemotePaymentForm>
		</>
	),
} );
