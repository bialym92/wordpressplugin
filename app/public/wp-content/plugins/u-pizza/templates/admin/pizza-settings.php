<?php
$pizza_data = get_option('u_pizza_data') ? get_option('u_pizza_data') : u_pizza_get_default_data();
echo "<pre>";
print_r($pizza_data);
echo "</pre>";
?>

<div id="u-pizza-settings">
    <div class="wc-metaboxes-wrapper">
        <div class="wc-metaboxes">
            <?php foreach ($pizza_data as $group) : ?>
                <div class="wc-metabox closed">
                    <h3>
                        <strong><?php echo esc_html($group['group_name']); ?></strong>
                        <input type="hidden" name="pizza-data[<?php echo esc_attr($group['id']); ?>][id]" value="<?php echo esc_attr($group['id']); ?>">
                    </h3>
                    <div class="wc-metaboxes-content">
                        <div class="group-header">
                            <div class="form-group">
                                <label for=""><?php esc_html_e('Group name', 'u-pizza') ?></label>
                                <input type="text" name="pizza_data[<?php echo esc_attr($group['id']); ?>][group_name]" value="<?php echo esc_attr($group['group_name']); ?>">
                            </div>
                            <div class="form-group">
                                <label for=""><?php esc_html_e('Group image', 'u-pizza'); ?></label>
                                <div class="group-image">
                                    <!-- <img src="<?php echo esc_attr($group['image']); ?>" alt=""> -->
                                    <input type="text" name="pizza_data[<?php echo esc_attr($group['id']); ?>][image]" value="<?php echo esc_attr($group['image']); ?>">

                                    <input type="text" name="pizza_data[<?php echo esc_attr($group['id']); ?>][imageId]" value="<?php echo esc_attr($group['imgaeId']); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="group-components">
                            Components
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>



    <?php wp_nonce_field('u_pizza_woo_settings', '_pizzanonce') ?>
</div>