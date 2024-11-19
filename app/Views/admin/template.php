<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | PGI Madiun</title>
    <link rel="icon" href="/img/logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="/template/css/adminstyles.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="body-pd" id="body-pd">
    <header class="header body-pd" id="header">
        <div class="header_toggle"> <i class='bx bx-menu bx-x' id="header-toggle"></i> </div>
        <div class="header_img"> <img src="/img/avatar5.png" alt=""> </div>
    </header>
    <div class="l-navbar nav-bar show" id="nav-bar">
        <nav class="nav">
            <div class="top-half">
                <a href="<?php echo base_url('administrator/beranda') ?>" class="nav_logo">
                    <img src="/img/logo.png" alt="Logo" class="nav_logo-icon" style="width: 28px; height: 35px;">
                    <span class="nav_logo-name">PGI MADIUN</span>
                </a>
            </div>
            <div class="bottom-half">
                <ul class="nav_list">
                    <li class="nav-item <?= uri_string() == 'beranda' ? 'active' : '' ?>">
                        <a href="<?php echo base_url('administrator/beranda'); ?>" class="nav-link">
                            <i class="bx bx-home nav_icon" data-toggle="tooltip" data-placement="top" title="Dashboard"></i>
                            <span class="nav_name">Dashboard</span>
                        </a>
                    </li>
                    <li class="dropdown <?= in_array(uri_string(), ['tournament/kategori', 'tournament']) ? 'active' : '' ?>">
                        <a href="#" class="nav_link" onclick="toggleDropdown(event)">
                            <i class="bx bx-trophy nav_icon" data-toggle="tooltip" data-placement="top" title="Turnament"></i>
                            <span class="nav_name">Turnament</span>
                            <i class="bx bx-chevron-down dropdown_icon"></i>
                        </a>
                        <ul class="dropdown_menu">
                            <li class="<?= uri_string() == 'tournament/kategori' ? 'active' : '' ?>"><a href="<?php echo base_url('administrator/tournament/kategori') ?>" class="dropdown_item"><i class="bx bx-circle menu_icon" data-toggle="tooltip" data-placement="top" title="Kategori Turnament"></i> Kat. Turnament</a></li>
                            <li class="mb-4 <?= uri_string() == 'tournament' ? 'active' : '' ?>"><a href="<?php echo base_url('administrator/tournament') ?>" class="dropdown_item"><i class="bx bx-circle menu_icon" data-toggle="tooltip" data-placement="top" title="List Turnament"></i> List Turnament</a></li>
                        </ul>
                    </li>
                    <li class="dropdown <?= in_array(uri_string(), ['artikel/kategori', 'artikel']) ? 'active' : '' ?>">
                        <a href="#" class="nav_link" onclick="toggleDropdown(event)">
                            <i class="bx bx-receipt nav_icon" data-toggle="tooltip" data-placement="top" title="Artikel"></i>
                            <span class="nav_name">Artikel</span>
                            <i class="bx bx-chevron-down dropdown_icon"></i>
                        </a>
                        <ul class="dropdown_menu">
                            <li class="<?= uri_string() == 'artikel/kategori' ? 'active' : '' ?>"><a href="<?php echo base_url('administrator/artikel/kategori') ?>" class="dropdown_item"><i class="bx bx-circle menu_icon" data-toggle="tooltip" data-placement="top" title="Kategori Artikel"></i> Kategori Artikel</a></li>
                            <li class="mb-4 <?= uri_string() == 'artikel' ? 'active' : '' ?>"><a href="<?php echo base_url('administrator/artikel') ?>" class="dropdown_item"><i class="bx bx-circle menu_icon" data-toggle="tooltip" data-placement="top" title="List Artikel"></i> List Artikel</a></li>
                        </ul>
                    </li>
                    <li class="dropdown <?= in_array(uri_string(), ['album', 'foto', 'video']) ? 'active' : '' ?>">
                        <a href="#" class="nav_link" onclick="toggleDropdown(event)">
                            <i class="bx bx-image-alt nav_icon" data-toggle="tooltip" data-placement="top" title="Gallery"></i>
                            <span class="nav_name">Gallery</span>
                            <i class="bx bx-chevron-down dropdown_icon"></i>
                        </a>
                        <ul class="dropdown_menu">
                            <li class="<?= uri_string() == 'album' ? 'active' : '' ?>"><a href="<?php echo base_url('administrator/album') ?>" class="dropdown_item"><i class="bx bx-circle menu_icon" data-toggle="tooltip" data-placement="top" title="Kategori Gallery"></i> Kategori Galery</a></li>
                            <li class="<?= uri_string() == 'foto' ? 'active' : '' ?>"><a href="<?php echo base_url('administrator/foto') ?>" class="dropdown_item"><i class="bx bx-circle menu_icon" data-toggle="tooltip" data-placement="top" title="Foto"></i> Foto</a></li>

                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="nav_link" onclick="toggleDropdown(event)">
                            <i class="bx bx-book-content nav_icon" data-toggle="tooltip" data-placement="top" title="Content"></i>
                            <span class="nav_name">Content</span>
                            <i class="bx bx-chevron-down dropdown_icon"></i>
                        </a>
                        
                    </li>
                    <li class="dropdown <?= in_array(uri_string(), ['menu', 'usermanager', 'banners', 'contact', 'link']) ? 'active' : '' ?>">
                        <a href="#" class="nav_link" onclick="toggleDropdown(event)">
                            <i class="bx bx-cog nav_icon" data-toggle="tooltip" data-placement="top" title="Setting"></i>
                            <span class="nav_name">Setting</span>
                            <i class="bx bx-chevron-down dropdown_icon"></i>
                        </a>
                        <ul class="dropdown_menu">
                            <li class="<?= uri_string() == 'menu' ? 'active' : '' ?>"><a href="<?php echo base_url('administrator/menu') ?>" class="dropdown_item"><i class="bx bx-circle menu_icon" data-toggle="tooltip" data-placement="top" title="Menu"></i> Menu</a></li>
                            <li class="<?= uri_string() == 'banners' ? 'active' : '' ?>"><a href="<?php echo base_url('administrator/banners') ?>" class="dropdown_item"><i class="bx bx-circle menu_icon" data-toggle="tooltip" data-placement="top" title="Banner"></i> Banner</a></li>
                            <li class="<?= uri_string() == 'contact' ? 'active' : '' ?>"><a href="<?php echo base_url('administrator/contact') ?>" class="dropdown_item"><i class="bx bx-circle menu_icon" data-toggle="tooltip" data-placement="top" title="Contact"></i> Contact</a></li>
                            <li class="<?= uri_string() == 'link' ? 'active' : '' ?>"><a href="<?php echo base_url('administrator/link') ?>" class="dropdown_item"><i class="bx bx-circle menu_icon" data-toggle="tooltip" data-placement="top" title="Link"></i> Link</a></li>
                            <li class=" <?= uri_string() == 'video' ? 'active' : '' ?>"><a href="<?php echo base_url('administrator/video') ?>" class="dropdown_item"><i class="bx bx-circle menu_icon" data-toggle="tooltip" data-placement="top" title="Video"></i> Video</a></li>
                            <li class=" <?= uri_string() == 'chatwa' ? 'active' : '' ?>"><a href="<?php echo base_url('administrator/chatwa') ?>" class="dropdown_item"><i class="bx bx-circle menu_icon" data-toggle="tooltip" data-placement="top" title="Video"></i> Chat Wa</a></li>
                            <li class="<?= uri_string() == 'usermanager' ? 'active' : '' ?>"><a href="<?php echo base_url('administrator/usermanager') ?>" class="dropdown_item"><i class="bx bx-circle menu_icon" data-toggle="tooltip" data-placement="top" title="User Manager"></i> User Manager</a></li>
                        </ul>
                    </li>
                </ul>
                <a href="<?php echo base_url('administrator/logout') ?>" class="nav-link" id="logout-link">
                    <i class='bx bx-log-out nav_icon' data-toggle="tooltip" data-placement="top" title="Logout"></i>
                    <span class="nav_name">Logout</span>
                </a>
            </div>
        </nav>
    </div>
    <div class="content">
        <?= $this->renderSection('content'); ?>
    </div>


    <script src="/template/js/java.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
    <script src="<?php echo base_url('/ckeditor/ckeditor.js') ?>"></script>
    <script>
        CKEDITOR.replace('deskripsi', {
            filebrowserUploadUrl: "<?= base_url('administrator/foto/image-upload/upload') ?>",
            filebrowserUploadMethod: 'form',
        });
    </script>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>