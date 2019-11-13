<?php
$pageType = get_post_type();
$pageId = get_the_ID();

$initiativeFields = [
    'organization_name' => 'initiative_organization_organization_name',
    'contact_public' => 'initiative_organization_contact_public',
    'contact_phone' => 'initiative_organization_contact_phone',
    'contact_email' => 'initiative_organization_contact_email',
    'contact_name' => 'initiative_organization_contact_name',
    'initiative_date' => 'initiative_options_initiative_date',
    'initiative_address' => 'initiative_options_initiative_address',
    'initiative_city' => 'initiative_options_initiative_city',
    'initiative_county' => 'initiative_options_initiative_county',
];
$initiativeValues = [];

foreach ($initiativeFields as $field => $optionName) {
    $metaName = 'givewp_'.$optionName;
    $value = null;
    if (metadata_exists('post', $pageId, $metaName)) {
        $value = get_post_meta($pageId, $metaName, true);
    }
    $initiativeValues[$field] = $value;
}
?>
<table class="table">
    <tr>
        <td style="width: 50px; word-wrap: break-word;"><strong>Ce:</strong></td>
        <td>
            <?php
            $return = [];
            $terms = get_the_terms($pageId, 'initiative-type');
            if (is_array($terms)) {
                foreach ($terms as $term) {
                    $return[] = $term->name;
                }
            }
            echo implode(', ', $return);
            ?>
        </td>
        <td style="width: 50px; word-wrap: break-word;"><strong>Cine:</strong></td>
        <td>
            <strong>
                <?php
                $return = [];
                $terms = get_the_terms($pageId, 'initiator-type');
                if (is_array($terms)) {
                    foreach ($terms as $term) {
                        $return[] = $term->name;
                    }
                }
                echo implode(', ', $return);
                ?>
            </strong>
            <?php echo $initiativeValues['organization_name']; ?>
        </td>
    </tr>
    <tr>
        <td>
            <strong>
                <?php echo __('When', 'give'); ?>:
            </strong>
        </td>
        <td>
            <?php echo $initiativeValues['initiative_date']; ?>
        </td>
        <td><strong>Unde:</strong></td>
        <td>
            <?php echo $initiativeValues['initiative_address']; ?>
            <?php echo $initiativeValues['initiative_city']; ?>
            <?php echo $initiativeValues['initiative_county']; ?>
        </td>
    </tr>
    <?php if ($initiativeValues['contact_public'] == 'yes') { ?>
        <tr>
            <td rowspan="2"><strong>Persoană de contact:</strong></td>
            <td rowspan="2">
                <?php echo $initiativeValues['contact_name']; ?>
            </td>
            <td>
                <strong>Telefon:</strong>
            </td>
            <td>
                <?php echo $initiativeValues['contact_phone']; ?>
            </td>
        </tr>
        <tr>
            <td>
                <strong>Email:</strong>
            </td>
            <td>
                <?php echo $initiativeValues['contact_email']; ?>
            </td>
        </tr>
    <?php } ?>
</table>