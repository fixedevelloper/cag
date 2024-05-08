<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\ShoppingCart;
use App\Repositories\CartRepository;
use App\Repositories\CategoryRepository;
use Illuminate\Support\ServiceProvider;

class GlobalTemplateServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        view()->composer(['back/_partials/_header', 'back.categories.sidebar-category'], function ($view) {
            $view->with('categories', $this->getCategories());
            $view->with('cartCount', $this->getCartCount());
            $view->with('cart_', $this->getCart());
        });
    }
    /**
     * @return int
     */
    private function getCartCount()
    {
        $cartRepo = new CartRepository(new ShoppingCart);
        return $cartRepo->countItems();
    }
    private function getCartItems()
    {
        $cartRepo = new CartRepository(new ShoppingCart);
        return $cartRepo->getCartItems();
    }
    private function getCart()
    {
        $cartRepo = new CartRepository(new ShoppingCart);
        return [
            'items'=>$cartRepo->getCartItems(),
            'subTotal'=>$cartRepo->getSubTotal(),
            'total'=>$cartRepo->getTotal(),
            'tax'=>$cartRepo->getTax(),
        ];
    }
    private function getCategories()
    {
        $categoryRepo = new CategoryRepository(new Category);
        return $categoryRepo->listCategories('name', 'asc', 1);
    }

}
