<?php
$pageType = get_post_type();
$pageId = get_the_ID();

$initiativeFields = [
    'organization_name' => 'initiative_organization_organization_name',
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
            foreach ($terms as $term) {
                $return[] = $term->name;
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
                foreach ($terms as $term) {
                    $return[] = $term->name;
                }
                echo implode(', ', $return);
                ?>
            </strong>
            <?php echo $initiativeValues['organization_name']; ?>
        </td>
    </tr>
    <tr>
        <td><strong>Cand:</strong></td>
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
</table>