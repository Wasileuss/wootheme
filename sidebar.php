<?php
if (!is_active_sidebar('sidebar-filters')) {
    return;
}
?>

<!-- Shop Sidebar Start -->
<div class="col-lg-3 col-md-4 wootheme-sidebar">
	<?php dynamic_sidebar('sidebar-filters'); ?>
</div>
<!-- Shop Sidebar End -->