<?php

// 首页
Route::get('/','Home\IndexController@index');


Route::group(['prefix'=>'/Home'],function(){

	//收藏显示
	Route::get('/collection/index','Home\CollectionController@index')->middleware('homeLogin');
	// 收藏删除
	Route::get('/collection/delete/{id?}','Home\CollectionController@delete');
	// 添加收藏
	Route::get('/collection/addCollect','Home\CollectionController@addCollect');






	// 处理购物车订单请求
	Route::post('/submit','Home\PaymentController@submit')->middleware('homeLogin');
	// 处理直接购买订单请求
	Route::post('/submitFromBuy','Home\PaymentController@submitFromBuy')->middleware('homeLogin');

	// 支付完成
	Route::get('/complete/{orderNum}','Home\PaymentController@complete');
	// 生成订单号，处理订单
	Route::post('/genOrder','Home\PaymentController@genOrder');

	Route::get('/order','Home\OrderController@index');


	// 发起支付
	Route::get('/payoff/{orderNum}','Home\PayoffController@index');
	// 支付结果同步回调
	Route::any('/payback/return','Home\PayoffController@payReturn');



	// 购物车页
	Route::get('/shop','Home\ShopController@index');
	// 添加商品
	Route::get('/shop/add','Home\ShopController@add');

	//修改数量 
	Route::post('/shop/store','Home\ShopController@store');
		// 选择订单
	Route::post('/shop/select','Home\ShopController@select');

	// 提交订单
	Route::post('/shop/submit','Home\ShopController@submit');

	// 删除订单
	Route::post('/shop/delete','Home\ShopController@delete');



	// 微博测试
	Route::get('/weiboLogin/login','Home\WeiboLoginController@login');

	// 微博登录获取code回调
	Route::any('/weiboLogin/callback','Home\WeiboLoginController@callback');




	// QQ测试，后期登录页面完善之后删除
	Route::get('/QQLogin','Home\QQLoginController@index');


	// 微博登录获取code回调
	Route::any('/QQLogin/callback','Home\WeiboLoginController@callback');


	// 商品列表
	Route::get('/goodsList','Home\GoodsListController@index');





	// 加入购物车、添加收藏等需要用户登录的功能如果用户没有登录同意导流到这里
	Route::get('/toLogin',function(){})->middleware('homeLogin');


	Route::get('/address','Home\AddressController@index');
	Route::get('/address/getCity','Home\AddressController@getCity');
	Route::get('/address/editCity','Home\AddressController@editCity');
	Route::get('/address/editIndex','Home\AddressController@editIndex');
	Route::get('/address/allInfo','Home\AddressController@allInfo');
	Route::get('/address/allEdit','Home\AddressController@allEdit');
	Route::get('/address/delete','Home\AddressController@delete');


	// 商品详情
	Route::get('/goods/{id}','Home\GoodsController@index');
	Route::get('/goods/getAttr/{id}','Home\GoodsController@getAttr');
	Route::get('/addShop','Home\GoodsController@addShop');


	// 订单详情
	Route::get('/orderDetail/{orderNum?}','Home\OrderdetailController@index');


	// 个人信息
	Route::get('/userinfo', 'Home\UserinfoController@index');
	Route::post('/userinfo/edit/{id}', 'Home\UserinfoController@edit');
	Route::get('/userinfo/upload','Home\UserinfoController@upload');
	Route::post('/userinfo/upload/{id}','Home\UserinfoController@doupload');


	// 个人安全
	Route::get('/safety','Home\SafetyController@index');
	Route::get('/safety/password','Home\SafetyController@edit');
	Route::get('/safety/password/edit','Home\SafetyController@doedit');

});







Route::group(['prefix'=>'Home'],function(){
		//前台注册
	Route::resource('/Qtglregister','Home\QtglRegisterController');
	// 生成并发送验证码
	Route::get('/register/getcode/{number}','Home\QtglRegisterController@getCode');
	// 删除session里的验证码
	Route::get('/register/deletecode','Home\QtglRegisterController@deleteCode');
	// 激活邮箱
	Route::get('/register/mailactive','Home\QtglRegisterController@mailActive');
	//前台注册跳转
	Route::resource('/Qtglskip','Home\QtglSkipController');


	//前台专题导航
	Route::resource('/Qtglspecial','Home\QtglSpecialController');
	//前台专题内容
	Route::resource('/Qtglcontent','Home\QtglContentController');
	//前台专题导航图片跳转专挑内容
	Route::get('/Qtglcontenta/chaxun/{id}','Home\QtglContentController@chaxun');
});



// {建议收集}
//建议收集置顶首页
Route::get('/home/propose','Home\ProposeController@index');

// ajax提交建议热度量
Route::get('/home/ajaxheat','Home\ProposeController@ajaxHeat');

// 用户提交建议
Route::post('/home/propose/store','Home\ProposeController@store');

//建议收集选择页
Route::get('/home/propose/{id}','Home\ProposeController@index');


// 登录
Route::resource('/Home/Qtgluser','Home\QtglUserController');

//验证码
Route::get('/Home/captch/{tmp}','Home\QtglUserController@captch');
// 验证登录
Route::post('/admin_index','Home\QtglUserController@dologin');
// 登出
Route::get('/Home/logout','Home\QtglUserController@logout');







// 订单状态
Route::get('/home/order/statu','Home\OrderStatuController@index')->middleware('homeLogin');
	// 删除
Route::post('/home/order/ajaxdel','Home\OrderStatuController@delete')->middleware('homeLogin');
	// 修改状态
Route::post('/home/order/ajaxupdate','Home\OrderStatuController@update')->middleware('homeLogin');

	// 更新数据
Route::post('/home/order/ajaxup','Home\OrderStatuController@up')->middleware('homeLogin');













// 后台


//后台用户管理,1参数地址，2参数控制器

Route::group(['middleware'=>'authcontrol'],function(){

	Route::resource('/Htgl_user','Admin\Htgl_UserController');
	//后台专题管理
	Route::resource('/Htgl_special','Admin\Htgl_SpecialController');
	//后台文章管理
	Route::resource('/Htgl_article','Admin\Htgl_ArticleController');
	//后台热门管理
	Route::resource('/Htgl_hosspecial','Admin\Htgl_HosspecialController');

});




// 后台群组
Route::group(['prefix'=>'/Admin','middleware'=>'login','middleware'=>'authcontrol'],function(){
	// 商品管理
	Route::any('/goods','Admin\GoodsController@index');
	//商品添加
	Route::any('/goods/add','Admin\GoodsController@add');
	// 商品修改
	Route::any('/goods/edit/{id}','Admin\GoodsController@edit');
	// 商品删除
	Route::any('/goods/delete/{id}','Admin\GoodsController@delete');
	// 获取类别属性,ajax请求
	Route::get('/goods/getAttr','Admin\GoodsController@getAttr');
	// 添加商品图片
	Route::any('/goods/add/image/{id}','Admin\GoodsController@addImage');


	// 链接管理
	Route::any('/links/index','Admin\LinksController@index');
	Route::any('/links/add','Admin\LinksController@add');
	// 修改链接
	Route::any('/links/edit/{id}','Admin\LinksController@edit');
	// 删除链接
	Route::get('/links/delete/{id}','Admin\LinksController@delete');


	// 关键词管理
	Route::any('/keywords/index','Admin\KeyWordsController@index');
	// 修改关键词
	Route::any('/keywords/edit/{id}','Admin\KeyWordsController@edit');
	// 添加关键词
	Route::any('/keywords/add','Admin\KeyWordsController@add');
	// 删除链接
	Route::get('/keywords/delete/{id}','Admin\KeywordsController@delete');


	// 后台用户管理
	Route::any('/auth/user','Admin\AuthController@userIndex');
	// 删除用户
	Route::get('/auth/user/delete/{id}','Admin\AuthController@userDelete');
	// 修改用户
	Route::any('/auth/user/edit/{id?}','Admin\AuthController@userEdit');


	// 角色管理
	Route::any('/auth/role','Admin\AuthController@roleIndex');
	// 编辑角色
	Route::any('/auth/role/edit/{id?}','Admin\AuthController@roleEdit');
	// 添加角色
	Route::any('/auth/role/add','Admin\AuthController@roleAdd');
	// 删除角色
	Route::get('/auth/role/delete/{id}','Admin\AuthController@roleDelete');


	// 权限管理
	Route::any('/auth','Admin\AuthController@index');
	// 增加权限
	Route::any('/auth/add','Admin\AuthController@add');
	// 删除权限
	Route::get('/auth/delete/{id}','Admin\AuthController@delete');
	// 修改权限
	Route::any('/auth/edit/{id?}','Admin\AuthController@edit');

	// 品牌管理
	Route::resource('/brand','Admin\BrandController');
	Route::post('/brand','Admin\BrandController@doupload');

	// 类别管理
	Route::resource('/column','Admin\ColumnController');
	Route::get('/column/subclass/{id}','Admin\ColumnController@createSubclass');
	Route::post('/column/subclass','Admin\ColumnController@storeSubclass');

});





// 后台登录
Route::get('/admin/login',function(){
	return view('Admin.login');
});

// 验证码
Route::get('/admin/captcha/{tmp}','Admin\LoginController@captcha');

// 验证登录
Route::post('/admin/dologin','Admin\LoginController@doLogin');

// ajax动态验证
Route::get('/admin/doAjax','Admin\LoginController@doAjax');

// 后台路由群组
Route::group(['prefix' => '/admin','middleware' => 'login'],function(){

	//后台首页
	Route::get('/index','Admin\LoginController@index');

	// 添加管理员
	Route::get('/register','Admin\LoginController@register');

	// 执行添加管理员
	Route::post('/doregister','Admin\LoginController@doRegister');

	//用户退出
	Route::get('/over','Admin\LoginController@over');


	// 意见类别管理
	Route::resource('/advice','Admin\AdviceController');

	// 查看类别下客户建议
	Route::get('/uAdvice/{tid}','Admin\UserAdviceController@index');
	// 排序建议
	Route::post('/uAdvice/{tid}','Admin\UserAdviceController@index');
	//删除建议
	Route::post('/uAdvice/delete/{tid}','Admin\UserAdviceController@delete');
});


// 后台访问没有权限时提示页面
Route::get('/Admin/noAuth',function(){
	return view('Admin.noAuth');
});





