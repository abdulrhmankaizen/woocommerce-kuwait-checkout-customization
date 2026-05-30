
/**
 * Kuwait WooCommerce Checkout Fields
 * Classic Checkout only: [woocommerce_checkout]
 */

if (!defined('ABSPATH')) {
    exit;
}

function kp_kuwait_locations() {
    return array(
        'Al-Ahmadi' => array(
            'Al-Ahmadi',
            'Al-Fahaheel',
            'Al-Mangaf',
            'Mahboula',
            'Abu Hulaifa',
            'Fintas',
            'Al-Eqaila',
            'Hadiya',
            'Al-Dhahr',
            'Al-Riqqa',
            'Fahad Al-Ahmad',
            'Al-Sabahiya',
            'Jaber Al Ali',
            'Wafra',
            'Al-Khiran',
            'Mina Abdullah',
            'Al-Shuaiba',
            'Sabah Al Ahmad City',
            'Sabah Al-Ahmad Marine City',
            'Al-Istiqlal City (South Sabah Al          Ahmad',
            'Al-Khuzama (East Sabah Al          Ahmad',
            'Al-Wafra Residential',
            'Al-Wafra Agricultural',
            'Al-Zour',
            'Nuwaiseeb',
            'Bnaider',
            'Al-Dabaia',
            'Julaia',
            'Al-Maqwa',
            'Ali Sabah Al-Salem -Umm Al Hayman'
        ),

        'Al-Farwaniya' => array(
            'Farwaniya',
            'Khaitan',
            'Abraq Khaitan',
            'Al-Tahrir (South Khaitan)',
            'Jleeb Al Shuyoukh',
            'Al-Omariya',
            'Al-Rabiya',
            'Al-Riggae',
            'Al-Andalus',
            'Ishbiliya',
            'Al-Ardiya',
            'Al-Rai',
            'Ardiya Industrial',
            'Al-Firdous',
            'Sabah Al Nasser',
            'Abdullah Al-Mubarak',
            'Al-Rehab',
            'Al-Dajeej',
            'Al-Shadadiya',
            'Sulaibiya Industrial',
            'Al-Majd West Abdullah Al Mubarak',
            'Al-Soor South Abdullah Al Mubarak',
            'South Khaitan'
        ),

        'Al-Jahra' => array(
            'Al-Jahra',
            'Old Jahra',
            'New Jahra',
            'Al-Naeem',
            'Al-Oyoun',
            'Al-Qasr',
            'Al-Waha',
            'Saad Al Abdullah',
            'Nawaf Al-Ahmad City (South Saad Al Abdullah)',
            'Sulaibiya',
            'Kabed',
            'Amghara',
            'Al-Abdali',
            'Al-Mutlaa',
            'Al-Salmi',
            'Al-Subiya',
            'Kazma',
            'Al-Rawdhatain',
            'Umm Al-Aish',
            'Taima',
            'Al-Naseem'
        ),

        'Asimah' => array(
            'Kuwait City',
            'Sharq',
            'Qibla',
            'Salhiya',
            'Watiya',
            'Mirqab',
            'Dasman',
            'Bneid Al Qar',
            'Daiya',
            'Dasma',
            'Mansouriya',
            'Abdullah Al Salem',
            'Nuzha',
            'Faiha',
            'Qadsiya',
            'Kaifan',
            'Khaldiya',
            'Qurtuba',
            'Yarmouk',
            'Shamiya',
            'Rawda',
            'Adailiya',
            'Surra',
            'Kifan',
            'Shuwaikh',
            'Shuwaikh Industrial',
            'Rai',
            'North West Sulaibikhat',
            'Sulaibikhat',
            'Doha',
            'Al-Qairawan',
            'Al-nuwair (South Qairawan)',
            'Al-Nahda',
            'Jaber Al-Ahmad City',
            'Granada'
        ),

        'Hawalli' => array(
            'Hawalli',
            'Salmiya',
            'Jabriya',
            'Bayan',
            'Mishref',
            'Rumaithiya',
            'Salwa',
            'Shaab',
            'Shaab Al Bahri',
            'Maidan Hawalli',
            'Al-Nugra',
            'Al-Zahra',
            'Hateen',
            'Al-Salam',
            'Al-Shuhada',
            'Al-Siddiq',
            'Sarra',
            'Bidaa',
            'Mubarak Al Abdullah',
            'West Mishref'
        ),

        'Mubarak Al-Kabeer' => array(
            'Sabah Al Salem',
            'Al-Adan',
            'Al-Qurain',
            'Al-A-Masayel',
            'Al-Qosour',
            'Al-Maseela',
            'Abu Futaira',
            'Funaitees',
            'Abu Al Hasaniya',
            'Sabhan',
            'Mubarak Al-Kabeer',
            'West Abu Ftaira'
        ),
    );
}

add_filter('woocommerce_checkout_fields', 'kp_kuwait_checkout_fields', 20);
function kp_kuwait_checkout_fields($fields) {
    $governorates = array('' => 'Choose Governorate');

    foreach (kp_kuwait_locations() as $governorate => $areas) {
        $governorates[$governorate] = $governorate;
    }

    unset($fields['billing']['billing_address_1']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_city']);
    unset($fields['billing']['billing_postcode']);
    unset($fields['shipping']);

    $fields['billing']['billing_governorate'] = array(
        'type'     => 'select',
        'label'    => 'Governorate',
        'required' => true,
        'class'    => array('form-row-first'),
        'options'  => $governorates,
        'priority' => 55,
    );

    $fields['billing']['billing_area'] = array(
        'type'     => 'select',
        'label'    => 'Area',
        'required' => true,
        'class'    => array('form-row-last'),
        'options'  => array('' => 'Choose Area'),
        'priority' => 56,
    );

    $fields['billing']['billing_block'] = array(
        'type'        => 'text',
        'label'       => 'Block',
        'placeholder' => 'Block',
        'required'    => true,
        'class'       => array('form-row-first'),
        'priority'    => 57,
    );

    $fields['billing']['billing_street_custom'] = array(
        'type'        => 'text',
        'label'       => 'Street',
        'placeholder' => 'Street',
        'required'    => true,
        'class'       => array('form-row-last'),
        'priority'    => 58,
    );

    $fields['billing']['billing_house'] = array(
        'type'        => 'text',
        'label'       => 'House / Building',
        'placeholder' => 'House / Building',
        'required'    => true,
        'class'       => array('form-row-wide'),
        'priority'    => 59,
    );

    $fields['billing']['billing_avenue'] = array(
        'type'        => 'text',
        'label'       => 'Avenue',
        'placeholder' => 'Avenue',
        'required'    => false,
        'class'       => array('form-row-first'),
        'priority'    => 60,
    );

    $fields['billing']['billing_floor'] = array(
        'type'        => 'text',
        'label'       => 'Floor',
        'placeholder' => 'Floor',
        'required'    => false,
        'class'       => array('form-row-last'),
        'priority'    => 61,
    );

    $fields['billing']['billing_apartment'] = array(
        'type'        => 'text',
        'label'       => 'Apartment',
        'placeholder' => 'Apartment',
        'required'    => false,
        'class'       => array('form-row-wide'),
        'priority'    => 62,
    );

    $fields['billing']['billing_phone'] = array(
        'type'        => 'tel',
        'label'       => 'Phone',
        'placeholder' => 'Phone Number',
        'required'    => true,
        'class'       => array('form-row-wide'),
        'priority'    => 63,
    );

    return $fields;
}

add_action('wp_footer', 'kp_kuwait_checkout_area_script');
function kp_kuwait_checkout_area_script() {
    if (!is_checkout() || is_wc_endpoint_url()) {
        return;
    }

    $locations = kp_kuwait_locations();
    ?>
    <script>
        jQuery(function($) {
            const locations = <?php echo wp_json_encode($locations); ?>;
            const governorateField = 'select[name="billing_governorate"]';
            const areaField = 'select[name="billing_area"]';

            function refreshAreas() {
                const selectedGovernorate = $(governorateField).val();
                let options = '<option value="">Choose Area</option>';

                if (locations[selectedGovernorate]) {
                    $.each(locations[selectedGovernorate], function(index, area) {
                        options += '<option value="' + area + '">' + area + '</option>';
                    });
                }

                $(areaField).html(options);
            }

            refreshAreas();

            $('form.checkout').on('change', governorateField, function() {
                refreshAreas();
            });
        });
    </script>
    <?php
}

add_filter('woocommerce_billing_fields', 'kp_force_phone_required', 9999);
function kp_force_phone_required($fields) {
    if (isset($fields['billing_phone'])) {
        $fields['billing_phone']['required'] = true;
        $fields['billing_phone']['label'] = 'Phone';
        $fields['billing_phone']['class'] = array('form-row-wide');
        $fields['billing_phone']['priority'] = 63;
    }

    return $fields;
}

add_action('woocommerce_checkout_process', 'kp_validate_phone_required');
function kp_validate_phone_required() {
    if (empty($_POST['billing_phone'])) {
        wc_add_notice('Please enter your phone number.', 'error');
    }
}

add_filter('woocommerce_form_field', 'kp_remove_optional_text', 10, 4);
function kp_remove_optional_text($field, $key, $args, $value) {
    return str_replace('(optional)', '', $field);
}

add_filter('woocommerce_cart_needs_shipping_address', '__return_false');
add_filter('woocommerce_ship_to_different_address_checked', '__return_false');

add_action('wp_head', 'kp_checkout_mobile_and_shipping_fix');
function kp_checkout_mobile_and_shipping_fix() {
    ?>
    <style>
        #ship-to-different-address,
        .shipping_address {
            display: none !important;
        }

        .woocommerce-checkout input,
        .woocommerce-checkout select,
        .woocommerce-checkout textarea {
            font-size: 16px !important;
        }

        @media (max-width: 768px) {
            .woocommerce-checkout input,
            .woocommerce-checkout select,
            .woocommerce-checkout textarea {
                font-size: 16px !important;
                min-height: 52px;
            }
        }
    </style>
    <?php
}

add_action('woocommerce_checkout_create_order', 'kp_save_kuwait_checkout_fields', 10, 2);
function kp_save_kuwait_checkout_fields($order, $data) {
    $custom_fields = array(
        'billing_governorate',
        'billing_area',
        'billing_block',
        'billing_street_custom',
        'billing_house',
        'billing_avenue',
        'billing_floor',
        'billing_apartment',
    );

    foreach ($custom_fields as $field) {
        if (isset($_POST[$field])) {
            $order->update_meta_data('_' . $field, sanitize_text_field(wp_unslash($_POST[$field])));
        }
    }
}

add_action('woocommerce_admin_order_data_after_billing_address', 'kp_show_kuwait_fields_admin');
function kp_show_kuwait_fields_admin($order) {
    $labels = array(
        '_billing_governorate'   => 'Governorate',
        '_billing_area'          => 'Area',
        '_billing_block'         => 'Block',
        '_billing_street_custom' => 'Street',
        '_billing_house'         => 'House / Building',
        '_billing_avenue'        => 'Avenue',
        '_billing_floor'         => 'Floor',
        '_billing_apartment'     => 'Apartment',
    );

    echo '<div style="margin-top:15px;"><h4>Kuwait Address Details</h4>';

    foreach ($labels as $key => $label) {
        $value = $order->get_meta($key);

        if (!empty($value)) {
            echo '<p><strong>' . esc_html($label) . ':</strong> ' . esc_html($value) . '</p>';
        }
    }

    echo '</div>';
}

add_action('wp_head', function() {
?>
<style>

.woocommerce-checkout input,
.woocommerce-checkout select,
.woocommerce-checkout textarea {

    border-radius: 18px !important;
    border: 1px solid #e5e7eb !important;
    padding: 14px 16px !important;
    background: #fff !important;

}

</style>
<?php
});

add_action('wp_head', function() {
?>
<style>

body.woocommerce-checkout {
    background: #f5f5f7 !important;
}

.woocommerce-checkout .form-row {
    margin-bottom: 24px !important;
}

.woocommerce-checkout label {

    font-size: 13px !important;
    font-weight: 600 !important;
    color: #374151 !important;
    margin-bottom: 10px !important;
    letter-spacing: -.2px;

}

.woocommerce-checkout input,
.woocommerce-checkout select,
.woocommerce-checkout textarea {

    background: #ffffff !important;
    border: 1px solid #e5e7eb !important;
    border-radius: 20px !important;
    min-height: 58px !important;

    padding: 14px 18px !important;

    font-size: 17px !important;
    font-weight: 500 !important;

    color: #111827 !important;

    box-shadow:
    0 1px 2px rgba(0,0,0,.02),
    0 8px 24px rgba(0,0,0,.04);

    transition: all .2s ease;

}

.woocommerce-checkout input:focus,
.woocommerce-checkout select:focus,
.woocommerce-checkout textarea:focus {

    border-color: #111827 !important;

    box-shadow:
    0 0 0 4px rgba(17,24,39,.06),
    0 10px 25px rgba(0,0,0,.06);

    outline: none !important;

}

.woocommerce-billing-fields h3 {

    font-size: 36px !important;
    font-weight: 800 !important;
    letter-spacing: -1px !important;

    color: #111827 !important;

    margin-bottom: 40px !important;

}

</style>
<?php
});

add_action('wp_head', function() {
?>
<style>

.woocommerce-checkout select {
    appearance: auto !important;
    -webkit-appearance: menulist !important;
    -moz-appearance: menulist !important;

    background-image: none !important;
    padding-right: 18px !important;

    font-size: 15px !important;
    font-weight: 600 !important;
    min-height: 62px !important;
    border-radius: 22px !important;
}

</style>
<?php
});
