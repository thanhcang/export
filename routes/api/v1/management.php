<?php
Route::group(['prefix' => 'managements', 'namespace' => 'Managements'], function () {
    require api_v1_path('Managements/ListsOptions/route.php');
    require api_v1_path('Managements/Roles/route.php');
    require api_v1_path('Managements/Products/route.php');
    require api_v1_path('Managements/Contacts/route.php');
});
