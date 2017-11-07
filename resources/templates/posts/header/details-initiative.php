<?php
$pageType = get_post_type();
$pageId = get_the_ID();

$initiativeFields = ['initiative_name', 'organization_name', 'initiative_date', 'initiative_location'];
$initiativeValues = [];

foreach ($initiativeFields as $field) {
    $metaName = 'givewp_'.$pageType.'_options_'.$field;
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
        <td><?php echo $initiativeValues['initiative_name'];?> </td>
        <td style="width: 50px; word-wrap: break-word;"><strong>Cine:</strong></td>
        <td><?php echo $initiativeValues['organization_name'];?> </td>
    </tr>
    <tr>
        <td><strong>Cand:</strong></td>
        <td><?php echo $initiativeValues['initiative_date'];?> </td>
        <td><strong>Unde:</strong></td>
        <td><?php echo $initiativeValues['initiative_location'];?> </td>
    </tr>
</table>