<?php /* Smarty version Smarty-3.1.12, created on 2015-12-13 18:09:52
         compiled from "C:\Program Files (x86)\Ampps\www\oxwall\ow_system_plugins\base\decorators\box_cap.html" */ ?>
<?php /*%%SmartyHeaderCode:6512566e24f08348f6-30857344%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '26ba71e65bca22fa8e05db3b98a1210831a7dd75' => 
    array (
      0 => 'C:\\Program Files (x86)\\Ampps\\www\\oxwall\\ow_system_plugins\\base\\decorators\\box_cap.html',
      1 => 1441713644,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6512566e24f08348f6-30857344',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_566e24f0866cf2_16784937',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_566e24f0866cf2_16784937')) {function content_566e24f0866cf2_16784937($_smarty_tpl) {?><?php if (!is_callable('smarty_function_text')) include 'C:\\Program Files (x86)\\Ampps\\www\\oxwall\\ow_smarty\\plugin\\function.text.php';
?>
<div class="ow_box_cap<?php if (!empty($_smarty_tpl->tpl_vars['data']->value['type'])){?>_<?php echo $_smarty_tpl->tpl_vars['data']->value['type'];?>
<?php }?><?php if (!empty($_smarty_tpl->tpl_vars['data']->value['addClass'])){?> <?php echo $_smarty_tpl->tpl_vars['data']->value['addClass'];?>
<?php }?>">
	<div class="ow_box_cap_right">
		<div class="ow_box_cap_body">
			<h3 class="<?php if (!empty($_smarty_tpl->tpl_vars['data']->value['iconClass'])){?><?php echo $_smarty_tpl->tpl_vars['data']->value['iconClass'];?>
<?php }else{ ?>ow_ic_file<?php }?>">
			<?php if (!empty($_smarty_tpl->tpl_vars['data']->value['href'])){?><a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['href'];?>
" <?php if (!empty($_smarty_tpl->tpl_vars['data']->value['extraString'])){?><?php echo $_smarty_tpl->tpl_vars['data']->value['extraString'];?>
<?php }?>><?php }?>
			<?php if (!empty($_smarty_tpl->tpl_vars['data']->value['langLabel'])){?>
			   <?php echo smarty_function_text(array('key'=>$_smarty_tpl->tpl_vars['data']->value['langLabel']),$_smarty_tpl);?>

			<?php }else{ ?>
			   <?php if (!empty($_smarty_tpl->tpl_vars['data']->value['label'])){?><?php echo $_smarty_tpl->tpl_vars['data']->value['label'];?>
<?php }else{ ?>&nbsp;<?php }?>
		    <?php }?>
		    <?php if (!empty($_smarty_tpl->tpl_vars['data']->value['href'])){?></a><?php }?>
			</h3>
		   <?php if (!empty($_smarty_tpl->tpl_vars['data']->value['content'])){?><?php echo $_smarty_tpl->tpl_vars['data']->value['content'];?>
<?php }?>
		</div>
	</div>
</div><?php }} ?>