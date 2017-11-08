<?php
/*
 *                     后台
 *  用户管理    商店管理    游戏管理   歌曲
 *    user      shop        game     music
 * 添加 删除 修改  查看
 *
 * 路由：（规则）
 * localhost/ktvapp/index.php/shop/add
 *
 * localhost/ktvapp/index.php?m=admin&f=game&fn=add
 * App 业务的处理
 *    views 模版html文件
 * Core 公共的库 常用的函数、功能
 * Public 静态的资源
 * */
include 'Core/router.php';
/*把请求分发到不同的地方*/
router::run();

?>