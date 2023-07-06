# Laravel Drag and Drop menu editor like wordpress


forked from https://github.com/lordmacu/wmenu

forked from https://github.com/harimayco/wmenu-builder

![Laravel drag and drop menu](https://raw.githubusercontent.com/harimayco/wmenu-builder/master/screenshot.png)

### Installation

1. In composer.json add this lines after ``` "require-dev" ```

```json

      "repositories": [
        {
          "type": "vcs",
          "url": "https://github.com/eliaskorolev/menu-builder.git"
        }
      ]
 
```



2. In composer.json ``` require ``` add this line at 

```json
 "eliaskorolev/menu-builder": "^0.3" 
 ```


3. Run this command in terminal

```php
composer install 
```

Composer will ask you a token to download this package from private repository - take it from the author

4. Run publish

```php
php artisan vendor:publish --provider="Eliaskorolev\Menu\MenuServiceProvider"
```


5. Run migrate

```php
php artisan migrate
```

DONE

### Menu Builder Usage Example - displays the builder

On your view blade file

```php
@extends('app')

@section('contents')
    {!! Menu::render() !!}
@endsection

//YOU MUST HAVE JQUERY LOADED BEFORE menu scripts
@push('scripts')
    {!! Menu::scripts() !!}
@endpush
```

### Using The Model

Call the model class

```php
use Eliaskorolev\Menu\Models\Menus;
use Eliaskorolev\Menu\Models\MenuItems;

```

### Menu Usage Example (a)

A basic two-level menu can be displayed in your blade template

##### Using Model Class
```php

/* get menu by id*/
$menu = Menus::find(1);
/* or by name */
$menu = Menus::where('name','Test Menu')->first();

/* or get menu by name and the items with EAGER LOADING (RECOMENDED for better performance and less query call)*/
$menu = Menus::where('name','Test Menu')->with('items')->first();
/*or by id */
$menu = Menus::where('id', 1)->with('items')->first();

//you can access by model result
$public_menu = $menu->items;

//or you can convert it to array
$public_menu = $menu->items->toArray();

```

##### or Using helper
```php
// Using Helper 
$public_menu = Menu::getByName('Public'); //return array

```

### Menu Usage Example (b)

Now inside your blade template file place the menu using this simple example

```php
<div class="nav-wrap">
    <div class="btn-menu">
        <span></span>
    </div><!-- //mobile menu button -->
    <nav id="mainnav" class="mainnav">

        @if($public_menu)
        <ul class="menu">
            @foreach($public_menu as $menu)
            <li class="">
                <a href="{{ $menu['link'] }}" title="">{{ $menu['label'] }}</a>
                @if( $menu['child'] )
                <ul class="sub-menu">
                    @foreach( $menu['child'] as $child )
                        <li class=""><a href="{{ $child['link'] }}" title="">{{ $child['label'] }}</a></li>
                    @endforeach
                </ul><!-- /.sub-menu -->
                @endif
            </li>
            @endforeach
        @endif

        </ul><!-- /.menu -->
    </nav><!-- /#mainnav -->
 </div><!-- /.nav-wrap -->
```

### HELPERS

### Get Menu Items By Menu ID

```php
use Eliaskorolev\Menu\Facades\Menu;
...
/*
Parameter: Menu ID
Return: Array
*/
$menuList = Menu::get(1);
```

### Get Menu Items By Menu Name

In this example, you must have a menu named _Admin_

```php
use Eliaskorolev\Menu\Facades\Menu;
...
/*
Parameter: Menu ID
Return: Array
*/
$menuList = Menu::getByName('Admin');
```

### Customization

you can edit the menu interface in **_resources/views/vendor/wmenu/menu-html.blade.php_**

### Credits

- [wmenu](https://github.com/lordmacu/wmenu) laravel package menu like wordpress
- [wmenu-builder](https://github.com/harimayco/wmenu-builder) laravel package menu like wordpress

### Compatibility

- Tested with laravel 5.2, 5.3, 5.4, 5.5, 5.6, 5.7, 5.8, 6.x, 7.x, ...., 10.x
