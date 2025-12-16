<?php
use Theme\MayMacCTH\Http\Controllers\ShopwiseController;
Route::group(['controller' => ShopwiseController::class, 'middleware' => ['web', 'core']], function () {
    Route::get('create_folder_storage',function(){
        $target =  base_path("platform/themes/may_mac_cth/public/storage");
        $short_cut = base_path("public/storage");
        symlink($target, $short_cut);
        // $target =  base_path("platform/themes/may_mac_cth/public");
        // $short_cut = base_path("public/themes/may_mac_cth");
        // symlink($target, $short_cut);
    });
    Route::group(apply_filters(BASE_FILTER_GROUP_PUBLIC_ROUTE, []), function () {
        Route::group(['prefix' => 'ajax', 'as' => 'public.ajax.'], function () {
            Route::get('products', 'ajaxGetProducts')
                ->name('products');
            Route::get('featured-product-categories', 'getFeaturedProductCategories')
                ->name('featured-product-categories');
            Route::get('trending-products', 'ajaxGetTrendingProducts')
                ->name('trending-products');
            Route::get('featured-brands', 'ajaxGetFeaturedBrands')
                ->name('featured-brands');
            Route::get('featured-products', 'ajaxGetFeaturedProducts')
                ->name('featured-products');
            Route::get('top-rated-products', 'ajaxGetTopRatedProducts')
                ->name('top-rated-products');
            Route::get('on-sale-products', 'ajaxGetOnSaleProducts')
                ->name('on-sale-products');
            Route::get('cart', 'ajaxCart')
                ->name('cart');
            Route::get('quick-view/{id}', 'getQuickView')
                ->name('quick-view')
                ->wherePrimaryKey();
            Route::get('featured-posts', 'ajaxGetFeaturedPosts')
                ->name('featured-posts');
            Route::get('testimonials', 'ajaxGetTestimonials')
                ->name('testimonials');
            Route::get('product-reviews/{id}', 'ajaxGetProductReviews')
                ->name('product-reviews')
                ->wherePrimaryKey();
            Route::get('get-flash-sales', 'ajaxGetFlashSales')
                ->name('get-flash-sales');
            Route::get('search-products', 'ajaxSearchProducts')
                ->name('search-products');

        });

    });
});

Theme::routes();
