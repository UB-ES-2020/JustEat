<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<!-- Users, Roles, Permissions -->
<li class="nav-item nav-dropdown">
	<a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-users"></i> Authentication</a>
	<ul class="nav-dropdown-items">
		<li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-user"></i> <span>Users</span></a></li>
		<li class='nav-item'><a class='nav-link' href='{{ backpack_url('address') }}'><i class='nav-icon la la-question'></i> Addresses</a></li>
		<li class='nav-item'><a class='nav-link' href='{{ backpack_url('paymentmethod') }}'><i class='nav-icon la la-question'></i> PaymentMethods</a></li>
		<li class="nav-item"><a class="nav-link" href="{{ backpack_url('role') }}"><i class="nav-icon la la-id-badge"></i> <span>Roles</span></a></li>
		<li class="nav-item"><a class="nav-link" href="{{ backpack_url('permission') }}"><i class="nav-icon la la-key"></i> <span>Permissions</span></a></li>
	</ul>
</li>

<!-- Restaurants, Categories -->
<li class="nav-item nav-dropdown">
	<a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-users"></i> Restaurant Management</a>
	<ul class="nav-dropdown-items">
		<li class='nav-item'><a class='nav-link' href='{{ backpack_url('restaurant') }}'><i class='nav-icon la la-question'></i> Restaurants</a></li>
		<li class='nav-item'><a class='nav-link' href='{{ backpack_url('deliveryzone') }}'><i class='nav-icon la la-question'></i> DeliveryZones</a></li>
		<li class='nav-item'><a class='nav-link' href='{{ backpack_url('schedule') }}'><i class='nav-icon la la-question'></i> Schedules</a></li>
		<li class='nav-item'><a class='nav-link' href='{{ backpack_url('category') }}'><i class='nav-icon la la-question'></i> Categories</a></li>
		<li class='nav-item'><a class='nav-link' href='{{ backpack_url('rating') }}'><i class='nav-icon la la-question'></i> Ratings</a></li>
	</ul>
</li>

<!-- Products, Product Categories -->
<li class="nav-item nav-dropdown">
	<a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-users"></i> Product Management</a>
	<ul class="nav-dropdown-items">
		<li class='nav-item'><a class='nav-link' href='{{ backpack_url('product') }}'><i class='nav-icon la la-question'></i> Products</a></li>
		<li class='nav-item'><a class='nav-link' href='{{ backpack_url('productcategory') }}'><i class='nav-icon la la-question'></i> ProductCategories</a></li>
	</ul>
</li>

<!-- Products, Product Categories -->
<li class="nav-item nav-dropdown">
	<a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-users"></i> Order Management</a>
	<ul class="nav-dropdown-items">
		<li class='nav-item'><a class='nav-link' href='{{ backpack_url('order') }}'><i class='nav-icon la la-question'></i> Orders</a></li>
		<li class='nav-item'><a class='nav-link' href='{{ backpack_url('orderitem') }}'><i class='nav-icon la la-question'></i> OrderItems</a></li>
	</ul>
</li>