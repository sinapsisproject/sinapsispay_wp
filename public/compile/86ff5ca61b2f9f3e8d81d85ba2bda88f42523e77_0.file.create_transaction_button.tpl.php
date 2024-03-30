<?php
/* Smarty version 4.4.1, created on 2024-03-30 05:22:41
  from 'C:\wamp64\www\sinapsis\wp-content\plugins\sinapsispay_wp\public\partials\create_transaction_button.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_6607a1a1f1f3e3_85270101',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '86ff5ca61b2f9f3e8d81d85ba2bda88f42523e77' => 
    array (
      0 => 'C:\\wamp64\\www\\sinapsis\\wp-content\\plugins\\sinapsispay_wp\\public\\partials\\create_transaction_button.tpl',
      1 => 1711776138,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6607a1a1f1f3e3_85270101 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\sinapsis\\wp-content\\plugins\\profile_wp\\public\\assets\\smarty\\libs\\plugins\\modifier.number_format.php','function'=>'smarty_modifier_number_format',),));
?>

<?php if ($_smarty_tpl->tpl_vars['display_price']->value == 'si') {?>
<div class="col-12 d-inline-flex">
  <button onclick="create_transaction(<?php echo $_smarty_tpl->tpl_vars['id_curso']->value;?>
)" type="button">
        <div id="loading_create_transaction_user" style="width: 1rem; height: 1rem; margin-right: 6px; display: none;" class="spinner-border" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <?php echo $_smarty_tpl->tpl_vars['text_button']->value;?>

        <i style="margin-left: 10px;" class="fa-solid fa-arrow-right"></i>
    </button>
    <h3 class="title-price">$ <?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['curso']->value->precio,0,',','.');?>
</h3>
</div>
<?php }
if ($_smarty_tpl->tpl_vars['display_price']->value == 'no') {?>
<button onclick="create_transaction(<?php echo $_smarty_tpl->tpl_vars['id_curso']->value;?>
)" type="button">
    <div id="loading_create_transaction_user" style="width: 1rem; height: 1rem; margin-right: 6px; display: none;" class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
    <?php echo $_smarty_tpl->tpl_vars['text_button']->value;?>

    <i style="margin-left: 10px;" class="fa-solid fa-arrow-right"></i>
</button>
<?php }?>

<div class="modal fade" id="modalpay" data-bs-backdrop="static" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      
      <div class="modal-body modal-pay">

        <div class="row">
            <div class="col-12 text-end">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
            </div>
        </div>

        <div class="row">

            <div class="col-5 img-curso-pay text-end">
                <img style="width: 80%;" src="<?php echo $_smarty_tpl->tpl_vars['curso']->value->imagen;?>
" alt="">
            </div>
            <div class="col-7 description-pay">
                <h3 style="color: white;"><?php echo $_smarty_tpl->tpl_vars['curso']->value->nombre;?>
</h3>
                <p><?php echo $_smarty_tpl->tpl_vars['curso']->value->descripcion_corta;?>
</p>

                <div class="row">
                    <div class="col-6 doctor-pay">
                        <p><?php echo $_smarty_tpl->tpl_vars['instructor']->value->nombre;?>
</p>
                    </div>
                    <div class="col-6 text-end price-pay">
                        <h3 style="color: white;">$ <?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['curso']->value->precio,0,',','.');?>
</h3>
                    </div>
                </div>

            </div>


            <div class="row box-total-pay">
                <div class="col-6 text-start subtotal-pay">
                    <p>Subtotal</p>
                </div>
                <div class="col-6 text-end subtotal-price">
                    <p>$<?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['curso']->value->precio,0,',','.');?>
</p>
                </div>
                <hr class="mb-2">
                <div class="col-6 text-start total-pay">
                    <p>Total</p>
                </div>
                <div class="col-6 text-end total-price">
                    <p>$<?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['curso']->value->precio,0,',','.');?>
</p>
                </div>
            </div>

            <div class="row">
                <div class="col-12 text-center mb-5">
                    <div id="divbuttonpay"></div>
                </div>

                


            </div>

        </div>

      </div>
      
    </div>
  </div>
</div>
<?php }
}
