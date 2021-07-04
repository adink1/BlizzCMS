<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $template['title'] ?></title>
    <link rel="icon" type="image/x-icon" href="<?= $template['assets'].'images/favicon.ico' ?>">
    <link rel="stylesheet" href="<?= $template['assets'].'css/uikit.min.css' ?>">
    <link rel="stylesheet" href="<?= $template['assets'].'css/panel.css' ?>">
    <script src="<?= $template['assets'].'js/uikit.min.js' ?>"></script>
    <script src="<?= $template['assets'].'js/uikit-icons.min.js' ?>"></script>
    <script src="<?= $template['assets'].'js/jquery.min.js' ?>"></script>
    <script src="<?= $template['assets'].'fontawesome/js/all.js' ?>" defer></script>
    <?= $template['head_data'] ?>
  </head>
  <body>
    <header class="uk-background-primary">
      <div class="uk-container">
        <nav class="uk-navbar" uk-navbar>
          <div class="uk-navbar-left">
            <a class="uk-navbar-item uk-logo" href="<?= site_url('admin') ?>">BlizzCMS</a>
          </div>
          <div class="uk-navbar-right">
            <ul class="uk-navbar-nav uk-visible@m">
              <li><a href="<?= site_url() ?>"><i class="fas fa-home fa-lg"></i></a></li>
              <li>
                <a href="#"><i class="fas fa-language"></i> <?= $this->language->current_name() ?></a>
                <div class="uk-navbar-dropdown">
                  <ul class="uk-nav uk-navbar-dropdown-nav">
                    <?php foreach ($this->language->list() as $lang): ?>
                    <li><a href="<?= site_url('switcher/'.$lang['code']) ?>"><?= $lang['name'] ?></a></li>
                    <?php endforeach ?>
                  </ul>
                </div>
              </li>
              <li>
                <a href="#">
                  <img class="uk-border-circle profile-img" src="<?= $template['uploads'].'avatars/'.$this->cms->user_avatar() ?>" alt="Avatar">
                  <span class="uk-text-middle uk-text-bold"><?= $this->session->userdata('nickname') ?><span uk-icon="icon: triangle-down"></span></span>
                </a>
                <div class="uk-navbar-dropdown">
                  <ul class="uk-nav uk-navbar-dropdown-nav">
                    <li><a href="<?= site_url('user') ?>"><i class="fas fa-user-circle"></i> <?= lang('user_panel') ?></a></li>
                    <li><a href="<?= site_url('logout') ?>"><i class="fas fa-sign-out-alt"></i> <?= lang('logout') ?></a></li>
                  </ul>
                </div>
              </li>
            </ul>
            <a class="uk-navbar-toggle uk-hidden@m" uk-navbar-toggle-icon href="#admin-mobile" uk-toggle></a>
          </div>
        </nav>
      </div>
    </header>
    <nav class="uk-navbar-container uk-visible@m">
      <div class="uk-container">
        <div class="uk-navbar" data-uk-navbar>
          <div class="uk-navbar-left">
            <ul class="uk-navbar-nav">
              <li class="uk-active"><a href="<?= site_url('admin') ?>"><span class="uk-margin-small-right"><i class="fas fa-tachometer-alt"></i></span><?= lang('dashboard') ?></a></li>
              <li>
                <a href="#"><span class="uk-margin-small-right"><i class="fas fa-sliders-h"></i></span><?= lang('settings') ?><span class="uk-margin-xsmall-top" uk-icon="icon: triangle-down"></span></a>
                <div class="uk-navbar-dropdown">
                  <ul class="uk-nav uk-navbar-dropdown-nav">
                    <li><a href="<?= site_url('admin/system') ?>"><?= lang('system') ?></a></li>
                    <li><a href="<?= site_url('admin/mods') ?>"><?= lang('modules') ?></a></li>
                    <li><a href="<?= site_url('admin/realms') ?>"><?= lang('realms') ?></a></li>
                  </ul>
                </div>
              </li>
              <li>
                <a href="#"><span class="uk-margin-small-right"><i class="fas fa-users"></i></span><?= lang('users') ?><span class="uk-margin-xsmall-top" uk-icon="icon: triangle-down"></span></a>
                <div class="uk-navbar-dropdown">
                  <ul class="uk-nav uk-navbar-dropdown-nav">
                    <li><a href="<?= site_url('admin/users') ?>"><?= lang('all_users') ?></a></li>
                    <li><a href="<?= site_url('admin/users/banned') ?>"><?= lang('banned_users') ?></a></li>
                  </ul>
                </div>
              </li>
              <li>
                <a href="#"><span class="uk-margin-small-right" ><i class="fas fa-th"></i></span><?= lang('sections') ?><span class="uk-margin-xsmall-top" uk-icon="icon: triangle-down"></span></a>
                <div class="uk-navbar-dropdown">
                  <ul class="uk-nav uk-navbar-dropdown-nav">
                    <li><a href="<?= site_url('admin/menu') ?>"><?= lang('menu') ?></a></li>
                    <li><a href="<?= site_url('admin/news') ?>"><?= lang('news') ?></a></li>
                    <li><a href="<?= site_url('admin/pages') ?>"><?= lang('pages') ?></a></li>
                    <li><a href="<?= site_url('admin/slides') ?>"><?= lang('slides') ?></a></li>
                  </ul>
                </div>
              </li>
            </ul>
          </div>
          <div class="uk-navbar-right"></div>
        </div>
      </div>
    </nav>

    <?= $template['body'] ?>

    <section class="uk-section uk-section-xsmall">
      <div class="uk-container uk-container-expand">
        <hr class="uk-hr">
        <div class="uk-grid uk-grid-small" data-uk-grid>
          <div class="uk-width-expand@s">
            <p class="uk-text-small uk-text-center uk-text-left@s">{elapsed_time}</p>
          </div>
          <div class="uk-width-auto@s">
            <p class="uk-text-small uk-text-center uk-text-right@s">Copyright <i class="far fa-copyright"></i> <?= date('Y') ?> <span class="uk-text-bold">WoW-CMS</span>. <?= lang('rights_reserved') ?></p>
          </div>
        </div>
      </div>
    </section>

    <div id="admin-mobile" data-uk-offcanvas="overlay: true">
      <div class="uk-offcanvas-bar">
        <div class="sidebar-head uk-text-center">
          <a class="uk-logo" href="<?= site_url('admin') ?>">BlizzCMS</a>
        </div>
        <ul class="uk-nav-default uk-nav-parent-icon" uk-nav>
          <li><a href="<?= site_url('admin') ?>"><span class="uk-margin-small-right"><i class="fas fa-tachometer-alt"></i></span><?= lang('dashboard') ?></a></li>
          <li class="uk-parent">
            <a href="#"><span class="uk-margin-small-right"><i class="fas fa-sliders-h"></i></span><?= lang('settings') ?></a>
            <ul class="uk-nav-sub">
              <li><a href="<?= site_url('admin/system') ?>"><?= lang('system') ?></a></li>
              <li><a href="<?= site_url('admin/mods') ?>"><?= lang('modules') ?></a></li>
              <li><a href="<?= site_url('admin/realms') ?>"><?= lang('realms') ?></a></li>
            </ul>
          </li>
          <li class="uk-parent">
            <a href="#"><span class="uk-margin-small-right"><i class="fas fa-users"></i></span><?= lang('users') ?></a>
            <ul class="uk-nav-sub">
              <li><a href="<?= site_url('admin/users') ?>"><?= lang('all_users') ?></a></li>
              <li><a href="<?= site_url('admin/users/banned') ?>"><?= lang('banned_users') ?></a></li>
            </ul>
          </li>
          <li class="uk-parent">
            <a href="#"><span class="uk-margin-small-right"><i class="fas fa-th"></i></span><?= lang('sections') ?></a>
            <ul class="uk-nav-sub">
              <li><a href="<?= site_url('admin/menu') ?>"><?= lang('menu') ?></a></li>
              <li><a href="<?= site_url('admin/news') ?>"><?= lang('news') ?></a></li>
              <li><a href="<?= site_url('admin/pages') ?>"><?= lang('pages') ?></a></li>
              <li><a href="<?= site_url('admin/slides') ?>"><?= lang('slides') ?></a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
    <?= $template['body_data'] ?>
  </body>
</html>
