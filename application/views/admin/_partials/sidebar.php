<style type="text/css">
	html:not(.sidebar) .sidebar-offcanvas .nav .nav-item.open>.nav-link,
	.sidebar.sidebar-hover.sidebar-offcanvas .nav .nav-item.open>.nav-link,
	html:not(.sidebar) .sidebar-icon-only .nav .nav-item.open>.nav-link>.menu-title,
	.sidebar.sidebar-hover.sidebar-icon-only .nav .nav-item.open>.nav-link>.menu-title,
	html:not(.sidebar) .sidebar-offcanvas .nav .nav-item .nav-link:not(.active):hover,
	.sidebar-hover.sidebar .sidebar-offcanvas .nav .nav-item .nav-link:not(.active):hover {
		background-color: rgba(87, 182, 87, 1);
	}
	
	html:not(.sidebar) .sidebar-icon-only .nav .nav-item .nav-link .menu-title:not(.active):hover,
	.sidebar-hover.sidebar .sidebar-icon-only .nav .nav-item .nav-link .menu-title:not(.active):hover {
		background-color: rgba(87, 182, 87, 1);
	}

	.sidebar-offcanvas .nav>.nav-item.active>.nav-link {
		background-color: rgba(87, 182, 87, 1) !important;
	}

	.sidebar-icon-only .nav>.nav-item.active {
		background-color: rgba(87, 182, 87, 1) !important;
	}

	/* .sidebar-icon-only .nav>.nav-item>.nav-link>.menu-title {
		background-color: rgba(87, 182, 87, 1) !important;
	} */

	.sidebar-icon-only .nav>.nav-item.active>.nav-link>.menu-title {
		background-color: rgba(87, 182, 87, 1) !important;
	}

	/* .sidebar-icon-only .nav>.nav-item>.nav-link>.menu-title {
		background-color: rgba(162, 245, 162, 1) !important;
	} */

	/* .sidebar-offcanvas .nav>.nav-item.active:before {
		background-color: rgba(87, 182, 87, 1) !important;
	}
	
	.sidebar-offcanvas .nav>.nav-item.active:before {
		background-color: rgba(87, 182, 87, 1) !important;
	} */

	/* .sidebar-icon-only .nav .nav-item-open:not(:active) {
		background-color: rgba(87, 13, 87, 1);
	} */
</style>
<nav class="sidebar sidebar-offcanvas" id="sidebar">
	<ul class="nav">
		<li class="nav-item <?php echo $this->uri->segment(1) == 'overview' ? 'active': '' ?>">
			<a class="nav-link" href="<?php echo site_url('overview') ?>">
				<i class="icon-grid menu-icon"></i>
				<span class="menu-title">Dashboard</span>
			</a>
		</li>
		<li class="nav-item <?php echo $this->uri->segment(1) == 'user' ? 'active': '' ?>">
			<a class="nav-link" href="<?php echo site_url('user') ?>">
				<i class="icon-head menu-icon"></i>
				<span class="menu-title">Admin</span>
			</a>
		</li>
		<li class="nav-item <?php echo $this->uri->segment(1) == 'systemfiltering' ? 'active': '' ?>">
			<a class="nav-link" href="<?php echo site_url('systemfiltering') ?>">
				<i class="icon-power menu-icon"></i>
				<span class="menu-title">System Filtering</span>
			</a>
		</li>
		<li class="nav-item <?php echo $this->uri->segment(1) == 'validasi' ? 'active': '' ?>">
			<a class="nav-link" href="<?php echo site_url('validasi') ?>">
				<i class="icon-check menu-icon"></i>
				<span class="menu-title">Validasi Berita</span>
			</a>
		</li>
		<li class="nav-item <?php echo $this->uri->segment(1) == 'databerita' ? 'active': '' ?>">
			<a class="nav-link" href="<?php echo site_url('databerita') ?>">
				<i class="icon-paper menu-icon"></i>
				<span class="menu-title">Data Berita</span>
			</a>
		</li>
		<li class="nav-item <?php echo $this->uri->segment(1) == 'riwayat' ? 'active': '' ?>">
			<a class="nav-link" href="<?php echo site_url('riwayat') ?>">
				<i class="icon-clock menu-icon"></i>
				<span class="menu-title">Riwayat Validasi</span>
			</a>
		</li>
	</ul>
</nav>
