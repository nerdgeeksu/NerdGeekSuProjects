<?php /* Smarty version Smarty-3.1.12, created on 2015-12-13 18:12:28
         compiled from "C:\Program Files (x86)\Ampps\www\oxwall\ow_plugins\forum\views\components\forum_group.html" */ ?>
<?php /*%%SmartyHeaderCode:22069566e258c60a0c5-06368392%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f492b293d311e54996f87afc754b3757ee50c7f2' => 
    array (
      0 => 'C:\\Program Files (x86)\\Ampps\\www\\oxwall\\ow_plugins\\forum\\views\\components\\forum_group.html',
      1 => 1441713646,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22069566e258c60a0c5-06368392',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'authError' => 0,
    'addTopicUrl' => 0,
    'showCaption' => 0,
    'isHidden' => 0,
    'componentForumCaption' => 0,
    'breadcrumb' => 0,
    'paging' => 0,
    'search' => 0,
    'canEdit' => 0,
    'topicList' => 0,
    'topic' => 0,
    'attachments' => 0,
    'usernames' => 0,
    'displayNames' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_566e258c6984b3_74166532',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_566e258c6984b3_74166532')) {function content_566e258c6984b3_74166532($_smarty_tpl) {?><?php if (!is_callable('smarty_block_style')) include 'C:\\Program Files (x86)\\Ampps\\www\\oxwall\\ow_smarty\\plugin\\block.style.php';
if (!is_callable('smarty_block_script')) include 'C:\\Program Files (x86)\\Ampps\\www\\oxwall\\ow_smarty\\plugin\\block.script.php';
if (!is_callable('smarty_function_decorator')) include 'C:\\Program Files (x86)\\Ampps\\www\\oxwall\\ow_smarty\\plugin\\function.decorator.php';
if (!is_callable('smarty_function_text')) include 'C:\\Program Files (x86)\\Ampps\\www\\oxwall\\ow_smarty\\plugin\\function.text.php';
if (!is_callable('smarty_function_cycle')) include 'C:\\Program Files (x86)\\Ampps\\www\\oxwall\\ow_libraries\\smarty3\\plugins\\function.cycle.php';
if (!is_callable('smarty_function_user_link')) include 'C:\\Program Files (x86)\\Ampps\\www\\oxwall\\ow_smarty\\plugin\\function.user_link.php';
?><?php $_smarty_tpl->smarty->_tag_stack[] = array('style', array()); $_block_repeat=true; echo smarty_block_style(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>


.ow_forum_attachment_icon {
display: inline-block;
background-repeat: no-repeat;
cursor: pointer;
width: 14px;
height: 17px;
}

<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_style(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>


<?php if (empty($_smarty_tpl->tpl_vars['authError']->value)){?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('script', array()); $_block_repeat=true; echo smarty_block_script(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>


$(".btn_add_topic").click(function(){
window.location.href='<?php echo $_smarty_tpl->tpl_vars['addTopicUrl']->value;?>
';
});

<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_script(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php }?>
<?php if (!empty($_smarty_tpl->tpl_vars['showCaption']->value)){?>
    <?php if ($_smarty_tpl->tpl_vars['isHidden']->value){?>
    <div class="ow_stdmargin">
        <?php echo $_smarty_tpl->tpl_vars['componentForumCaption']->value;?>

    </div>
    <?php }else{ ?>
    <?php echo $_smarty_tpl->tpl_vars['breadcrumb']->value;?>

    <?php }?>
<?php }?>

<?php if (!empty($_smarty_tpl->tpl_vars['authError']->value)){?>
    <div class="ow_anno ow_std_margin ow_nocontent"><?php echo $_smarty_tpl->tpl_vars['authError']->value;?>
</div>
<?php }else{ ?>
<div class="clearfix">
    <div class="ow_left"><?php echo $_smarty_tpl->tpl_vars['paging']->value;?>
</div>
    <div class="ow_right ow_txtright ow_smallmargin">
        <div class="ow_smallmargin">
            <?php echo $_smarty_tpl->tpl_vars['search']->value;?>

        </div>
        <?php if ($_smarty_tpl->tpl_vars['canEdit']->value){?>
        <?php echo smarty_function_decorator(array('name'=>'button','langLabel'=>'forum+new_topic_btn','class'=>'ow_ic_add btn_add_topic'),$_smarty_tpl);?>

        <?php }?>
    </div>

</div>

<table class="ow_table_1 ow_forum_topic">
    <tr class="ow_tr_first">
        <th class="ow_icon"></th>
        <th class="ow_title"><?php echo smarty_function_text(array('key'=>'forum+topic'),$_smarty_tpl);?>
</th>
        <th class="ow_posts"><?php echo smarty_function_text(array('key'=>'forum+replies'),$_smarty_tpl);?>
</th>
        <th class="ow_views"><?php echo smarty_function_text(array('key'=>'forum+views'),$_smarty_tpl);?>
</th>
        <th class="ow_author"><?php echo smarty_function_text(array('key'=>'forum+last_reply'),$_smarty_tpl);?>
</th>
    </tr>
    <?php  $_smarty_tpl->tpl_vars['topic'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['topic']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['topicList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['topic']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['topic']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['topic']->key => $_smarty_tpl->tpl_vars['topic']->value){
$_smarty_tpl->tpl_vars['topic']->_loop = true;
 $_smarty_tpl->tpl_vars['topic']->iteration++;
 $_smarty_tpl->tpl_vars['topic']->last = $_smarty_tpl->tpl_vars['topic']->iteration === $_smarty_tpl->tpl_vars['topic']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['topic']['last'] = $_smarty_tpl->tpl_vars['topic']->last;
?>
    <tr class="<?php echo smarty_function_cycle(array('values'=>'ow_alt1, ow_alt2'),$_smarty_tpl);?>
 <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['topic']['last']){?>ow_tr_last<?php }?>">
        <td class="ow_icon">
            <?php if ($_smarty_tpl->tpl_vars['topic']->value['new']){?><span class="ow_lbutton ow_green"><?php echo smarty_function_text(array('key'=>'forum+new'),$_smarty_tpl);?>
</span><?php }?>
            <?php if ($_smarty_tpl->tpl_vars['topic']->value['locked']){?><span class="ow_lbutton ow_red"><?php echo smarty_function_text(array('key'=>'forum+locked'),$_smarty_tpl);?>
</span><?php }?>
            <?php if ($_smarty_tpl->tpl_vars['topic']->value['sticky']){?><span class="ow_lbutton"><?php echo smarty_function_text(array('key'=>'forum+sticky'),$_smarty_tpl);?>
</span><?php }?>
        </td>
        <td class="ow_title">
            <?php if (isset($_smarty_tpl->tpl_vars['attachments']->value[$_smarty_tpl->tpl_vars['topic']->value['id']])){?>
            <span class="ow_forum_attachment_icon ow_ic_attach" title="<?php echo smarty_function_text(array('key'=>'forum+topic_attachments','count'=>$_smarty_tpl->tpl_vars['attachments']->value[$_smarty_tpl->tpl_vars['topic']->value['id']]),$_smarty_tpl);?>
">&nbsp;</span>
            <?php }?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['topic']->value['topicUrl'];?>
"><?php echo $_smarty_tpl->tpl_vars['topic']->value['title'];?>
</a></td>
        <td class="ow_posts"><?php if ($_smarty_tpl->tpl_vars['topic']->value['replyCount']){?><?php echo $_smarty_tpl->tpl_vars['topic']->value['replyCount'];?>
<?php }else{ ?>-<?php }?></td>
        <td class="ow_views"><?php echo $_smarty_tpl->tpl_vars['topic']->value['viewCount'];?>
</td>
        <td class="ow_author ow_small">
            <?php if (isset($_smarty_tpl->tpl_vars['topic']->value['lastPost'])){?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['topic']->value['lastPost']['postUrl'];?>
"><?php echo smarty_function_text(array('key'=>'forum+last_reply'),$_smarty_tpl);?>
</a> <?php echo smarty_function_text(array('key'=>'forum+by'),$_smarty_tpl);?>

            <?php echo smarty_function_user_link(array('username'=>$_smarty_tpl->tpl_vars['usernames']->value[$_smarty_tpl->tpl_vars['topic']->value['lastPost']['userId']],'name'=>$_smarty_tpl->tpl_vars['displayNames']->value[$_smarty_tpl->tpl_vars['topic']->value['lastPost']['userId']]),$_smarty_tpl);?>

            <span class="ow_nowrap ow_remark"><?php echo $_smarty_tpl->tpl_vars['topic']->value['lastPost']['createStamp'];?>
</span>
            <?php }?>
        </td>
    </tr>
    <?php } ?>

    <?php if (!$_smarty_tpl->tpl_vars['topicList']->value){?>
    <tr>
        <td colspan="5"><?php echo smarty_function_text(array('key'=>'forum+no_topic'),$_smarty_tpl);?>
</td>
    </tr>
    <?php }?>
</table>

<div class="ow_std_margin clearfix">
    <div class="ow_left">
        <?php echo $_smarty_tpl->tpl_vars['paging']->value;?>

    </div>
    <div class="ow_right">
        <?php if ($_smarty_tpl->tpl_vars['canEdit']->value){?>
        <?php echo smarty_function_decorator(array('name'=>'button','langLabel'=>'forum+new_topic_btn','class'=>'ow_ic_add btn_add_topic'),$_smarty_tpl);?>

        <?php }?>
    </div>
</div>
<?php }?><?php }} ?>