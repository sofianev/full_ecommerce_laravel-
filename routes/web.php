<?php

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

Route::get('/', function () {return view('pages.index');});
//auth & user
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/password/change', 'HomeController@changePassword')->name('password.change');
Route::post('/password/update', 'HomeController@updatePassword')->name('password.update');
Route::get('/user/logout', 'HomeController@Logout')->name('user.logout');

//admin=======

Route::get('admin/home', 'AdminController@index');
Route::get('admin', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin', 'Admin\LoginController@login');

        // Password Reset Routes...
Route::get('admin/password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin-password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin/reset/password/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('admin/update/reset', 'Admin\ResetPasswordController@reset')->name('admin.reset.update');
Route::get('/admin/Change/Password','AdminController@ChangePassword')->name('admin.password.change');
Route::post('/admin/password/update','AdminController@Update_pass')->name('admin.password.update'); 
Route::get('admin/logout', 'AdminController@logout')->name('admin.logout');




              /////Admin section 
                       /////category
Route::get('admin/category', 'Admin\Category\CategoryController@category')->name('categories');
Route::post('admin/store/category','Admin\Category\CategoryController@storecategory')->name('store.category');
Route::get('delete/category/{id}', 'Admin\Category\CategoryController@Deletecategory');
Route::get('edit/category/{id}', 'Admin\Category\CategoryController@Editcategory');
Route::post('update/category/{id}', 'Admin\Category\CategoryController@Updatecategory');
               
                     /////brands
Route::get('admin/brand', 'Admin\Category\BrandController@brand')->name('brands');
Route::post('admin/store/brand', 'Admin\Category\BrandController@storebrand')->name('store.brand');
Route::get('delete/brand/{id}', 'Admin\Category\BrandController@Deletebrand');
Route::get('edit/brand/{id}', 'Admin\Category\BrandController@Editbrand');
Route::post('update/brand/{id}', 'Admin\Category\BrandController@Updatebrand');

                 //////subcategories
Route::get('admin/subcategory', 'Admin\Category\SubCategoryController@subcategories')->name('sub.categories');
Route::post('admin/store/subcat','Admin\Category\SubCategoryController@storesubcat')->name('store.subcategory');
Route::get('delete/subcategory/{id}', 'Admin\Category\SubCategoryController@Deletesubcat');
Route::get('edit/subcat/{id}', 'Admin\Category\SubCategoryController@Editsubcat');
Route::post('update/subcat/{id}', 'Admin\Category\SubCategoryController@Updatesubcat');

                     /////coupons
Route::get('admin/coupon', 'Admin\Category\CouponController@coupon')->name('admin.coupon');
Route::post('admin/store/coupon', 'Admin\Category\CouponController@storecoupon')->name('store.coupon');
Route::get('delete/coupon/{id}', 'Admin\Category\CouponController@Deletecoupon');
Route::get('edit/coupon/{id}', 'Admin\Category\CouponController@Editcoupon');
Route::post('update/coupon/{id}', 'Admin\Category\CouponController@Updatecoupon');

          ///// newslaters
Route::get('admin/newslater', 'Admin\Category\CouponController@newslater')->name('admin.newslater');

     //// select subcategory with ajax json file
Route::get('get/subcategory/{category_id}', 'Admin\ProductController@Getsubcat');

              /////product

Route::get('admin/product/all', 'Admin\ProductController@index')->name('all.product');
Route::get('admin/product/add', 'Admin\ProductController@create')->name('add.product');
Route::post('admin/sotre/product', 'Admin\ProductController@store')->name('store.product');
Route::get('inactive/product/{id}', 'Admin\ProductController@inactive');
Route::get('active/product/{id}', 'Admin\ProductController@active');
Route::get('delete/product/{id}', 'Admin\ProductController@Deleteproduct');
Route::get('view/product/{id}', 'Admin\ProductController@viewproduct');
Route::get('edit/product/{id}', 'Admin\ProductController@Editproduct');
Route::post('update/product/withoutphoto/{id}', 'Admin\ProductController@updateproductwithoutphoto');
Route::post('update/product/photo/{id}', 'Admin\ProductController@updateproductphoto');

                       
                         //////blog_admin

 Route::get('blog/category/list', 'Admin\PostController@blogcatlist')->name('add.bolg.categorylist');
 Route::post('blog/store/category', 'Admin\PostController@storeblogcat')->name('store.blogcategory');
 Route::get('delete/blogcategory/{id}', 'Admin\PostController@Deleteblogcat');
 Route::get('edit/blogcategory/{id}', 'Admin\PostController@Editblogcat');
 Route::post('update/blog/category/{id}', 'Admin\PostController@Updateblogcat');

 Route::get('admin/add/post', 'Admin\PostController@create')->name('add.blogpost');
 Route::get('admin/all/post', 'Admin\PostController@index')->name('all.blogpost');
 Route::post('admin/sotre/post', 'Admin\PostController@store')->name('store.post');
 Route::get('delete/post/{id}', 'Admin\PostController@Deletepost');
 Route::get('edit/post/{id}', 'Admin\PostController@Editpost');
 Route::post('update/post/{id}', 'Admin\PostController@updatepost');







                        
                        ///// frontend
Route::post('store/newslater', 'FrontController@storeNewslater')->name('store.newslater');
Route::get('delete/sub/{id}', 'Admin\Category\CouponController@Deletesub');
       
                          //add wish list
Route::get('add/wishlist/{id}', 'WishlistController@addWishlist');

                        // //add to cart
Route::get('add/cart/{id}', 'CartController@AddCart');
Route::get('check', 'CartController@check');
Route::get('product/cart', 'CartController@ShowCart')->name('show.cart');
Route::get('remove/cart/{rowId}', 'CartController@removeCart');
Route::post('update/cart/item/', 'CartController@UpdateCart')->name('update.cartitem');
Route::get('/cart/product/view/{id}', 'CartController@ViewProduct');
Route::post('insert/into/cart/', 'CartController@insertCart')->name('insert.into.cart');
Route::get('user/checkout/', 'CartController@Checkout')->name('user.checkout');
Route::get('user/wishlist/', 'CartController@wishlist')->name('user.wishlist');


Route::post('user/apply/coupon/', 'CartController@Coupon')->name('apply.coupon');
Route::get('coupon/remove/', 'CartController@CouponRemove')->name('coupon.remove');




Route::get('/product/details/{id}/{product_name}', 'ProductController@ProductView');
Route::post('/cart/product/add/{id}', 'ProductController@AddCart');





Route::get('payment/page', 'CartController@PaymentPage')->name('payment.step');

/// Blog Post Route 

Route::get('blog/post/', 'BlogController@blog')->name('blog.post');
Route::get('language/english', 'BlogController@English')->name('language.english');
Route::get('language/Français', 'BlogController@Français')->name('language.Français');
Route::get('blog/single/{id}', 'BlogController@blogSingle');



