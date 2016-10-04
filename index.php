<?php
/**
 * Created by PhpStorm.
 * User: catri
 * Date: 03/10/2016
 * Time: 23:29
 */
?>

<link rel="stylesheet" type="text/css" href="/css/header.css"/>

<div id='QMT_header'>

  <div class="flex-wrap <?= isset($header_type) && $header_type == 'wide' ? '' : 'container' ?>">

    <div class="logo">
      <a href='<?= $first_page ?>'>
        <img class='qmt-logo-header' src='<?= $url_logo ?>'>
      </a>
    </div>

    <div class="search">
      <? if($withSearch): ?>
    <input class="typeahead form-control" type="text" placeholder="<?= buildSearchPlaceholder($usuario_id,$id_aplicativo) ?>">
    <? if(!$noBootstrap): ?>
        <div class="icon-search"><span class="glyphicon glyphicon-search"></span></div>
    <? endif; ?>
    <? if($noBootstrap): ?>
        <div class="icon-search"><span class="glyphicons search"></span></div>
    <? endif; ?>
<? endif; ?>
</div>

<div class='control'>
    <!-- Select sociedad -->
    <? if($showSociedad): ?>
        <div id="divSociedad">
            <select id="sociedad" class="form-control sociedad">
                <?= $options_sociedad ?>
            </select>
            <span class="caret"></span>
        </div>
    <? endif; ?>

    <!-- Button Username-->
    <? if(!$showImpersonar): ?>
        <div class="header-username">
            <?= $_SESSION['usuario_nombre'] ?>
        </div>
    <? endif; ?>

    <!-- Select impersonar -->
    <? if($showImpersonar): ?>
        <div id="divImpersonar">
            <select id="impersonar" class="form-control">
                <?= isset($options_impersonar) ? $options_impersonar : '' ?>
            </select>
            <span class="caret"></span>
        </div>
    <? endif; ?>

    <div>
        <a id="header-functions-funciones" class='btn btn-transparent dropdown-toggle' data-toggle="dropdown" data-id="header-functions-dropdown">
            <i class="glyphicons show_thumbnails"></i>
        </a>

        <div id="header-functions-dropdown" class="dropdown-menu" role="menu">
            <div class="dropdown-content">
                <?=$functionsDropdown?>
            </div>
        </div>
    </div>

    <!-- <div class="divisor"></div> -->

    <div>
        <a title="<?= _("Configuración") ?>" class='btn btn-transparent dropdown-toggle' id="header-functions-configuracion" data-toggle="dropdown" data-id="header-configuration-dropdown">
            <i class="glyphicons cogwheel"></i>
            <span class='label label-primary count-soporte'><?=countTicketsSupport($usuario_id)?></span>
        </a>

        <div id="header-configuration-dropdown" class="dropdown-menu" role="menu">
            <div class="dropdown-content">
                <div class="sub-menu-list aplicativos">
                    <p class="sub-menu-title"><?=_('Opciones')?></p>
                    <ul class="unstyled">
                        <li>
                            <?php if ($show_panel == 1){
                                $panel_control = get_website_url() . "/panel_control/";
                                ?>
                                <a href="<?= $panel_control ?>"><?=_('Panel de Control')?></a>
                            <?php } ?>
                        </li>
                        <li>
                            <a href="<?= $config ?>"><?=_('Configuración')?></a>
                        </li>
                        <?php if ($remove_cc != 1): ?>
                            <li>
                                <a href="<?= $usuarios_cc ?>"><?=_('Cuenta Corriente')?></a>
                            </li>
                        <?endif;?>
                        <?php
                        if ($remove_soporte != 1){
                            $soporte = get_website_url() . "/soporte.php?apli=" . $id_aplicativo;
                            $countSupport = countTicketsSupport($usuario_id);
                            ?>
                            <li>
                                <a href="<?= $soporte ?>"><?=_('Soporte')?> <span class='badge badge-primary'><?= $countSupport ?></span></a>
                            </li>
                            <li>
                                <a target="_blank" href="https://chrome.google.com/webstore/detail/quadminds-notification-ex/cgbgjpjkjajlkndnofmpeagmnfolnigm/related"><?=_('Notificaciones para Chrome')?></a>
                            </li>
                            <?
                        }
                        if ($ver_interfaces){
                            ?>
                            <li>
                                <a href="<?=get_website_url()?>/monitor_interfaces.php?apli=<?=$id_aplicativo?>"><?=_('Monitor de interfaces')?></a>
                            </li>
                            <?
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div>
        <a title="<?= _("Cerrar sesión") ?>" class='btn btn-transparent' id="header-functions-exit" href="<?= $logout ?>">
            <i class="glyphicons power"></i>
        </a>
    </div>

</div>

</div>

</div>