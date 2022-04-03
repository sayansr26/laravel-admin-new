<?php
                     use App\Admin\Models\AdminModel;
                     $categoryRecord = AdminModel::where('id', Admin::user()->id)->first();
                     ?>
<!--start sidebar -->
    <aside class="sidebar-wrapper" data-simplebar="true">
       <div class="sidebar-header">
            <div>
                <img src="{{asset('assets/images/logo-icon.png')}}" class="logo-icon" alt="logo icon">
            </div>
            <div>
                <h4 class="logo-text">Jewel Pricing</h4>
            </div>
            <div class="toggle-icon ms-auto"> <i class="bi bi-list"></i>
            </div>
        </div>
        <!--navigation-->
        <ul class="metismenu" id="menu">
            <li>
                <a href="{{url('admin/')}}">
                    <div class="parent-icon"><i class="bi bi-house-fill"></i>
                    </div>
                    <div class="menu-title">Dashboard</div>
                </a>
            </li>
			@if(Admin::user()->user_role == 'Admin')
            <li class="menu-label">Product Info</li>
            <li>
                <a href="{{url('admin/category')}}">
                    <div class="parent-icon"><i class="bi bi-plus-circle"></i>
                    </div>
                    <div class="menu-title">Categories</div>
                </a>

            </li>
          
           
           <li>
                <a href="{{url('admin/productPurity')}}">
                    <div class="parent-icon"><i class="bi bi-plus-circle"></i>
                    </div>
                    <div class="menu-title">Product Purity</div>
                </a>

            </li>  
            <li>
                <a href="{{url('admin/product')}}">
                    <div class="parent-icon"><i class="bi bi-plus-circle"></i>
                    </div>
                    <div class="menu-title">Product List</div>
                </a>

            </li> 

            <li class="menu-label">Order Info</li>
            <li>
                <a href="{{url('admin/order')}}">
                    <div class="parent-icon"><i class="bi bi-plus-circle"></i>
                    </div>
                    <div class="menu-title">Order</div>
                </a>
            </li>
          
            <li>
                <a href="{{url('admin/orderCommission')}}">
                    <div class="parent-icon"><i class="bi bi-plus-circle"></i>
                    </div>
                    <div class="menu-title">Seller Payment</div>
                </a>
            </li>
          
           <li>
                <a href="{{url('admin/sellerReport')}}">
                    <div class="parent-icon"><i class="bi bi-plus-circle"></i>
                    </div>
                    <div class="menu-title">Seller Report</div>
                </a>
            </li>
          
          <!--  <li>
                <a href="transactions.php">
                    <div class="parent-icon"><i class="bi bi-plus-circle"></i>
                    </div>
                    <div class="menu-title">Transactions</div>
                </a>

            </li>-->
          <li class="menu-label">Setting</li>
           <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="bi bi-plus-circle"></i>
                    </div>
                    <div class="menu-title">Setting</div>
                </a>
              	           
                <ul>
                  <li>
                      <a href="{{url('admin/storeuser')}}">
                          <i class="bi bi-circle"></i>                         
                          User
                      </a>
                  </li>
                 </ul>
                <ul>
                    <li>
                        <a href="{{url('admin/store')}}">
                            <i class="bi bi-circle"></i>                           
                           User Store
                        </a>
                    </li>
                 </ul>             
                <!--<ul>
                  <li>
                      <a href="user-profile.php">
                          <i class="bi bi-circle"></i>
                         User Profile
                      </a>
                  </li> 
				</ul>-->
             	<ul>
                    <li><a href="{{url('admin/commission')}}">
                   	 <i class="bi bi-circle"></i>Commission</a>
           			</li>
                </ul> 
                <ul>
                   <li>
                      <a href="javascript:;" class="has-arrow">
                          <div class="parent-icon"><i class="bi bi-plus-circle"></i>
                          </div>
                          <div class="menu-title">Product Variant</div>
                      </a>
                      <ul>
                          <li><a href="{{url('admin/productVariantColor')}}/{{1}}"><i class="bi bi-circle"></i>Color</a></li>
                        <!--  <li><a href="{{url('admin/productVariant')}}/{{2}}"><i class="bi bi-circle"></i>Brand</a></li>-->
                          <li><a href="{{url('admin/productVariant')}}/{{3}}"><i class="bi bi-circle"></i>Shape</a></li>
                          <li><a href="{{url('admin/productVariant')}}/{{4}}"><i class="bi bi-circle"></i>Clarity</a></li>
                          <li><a href="{{url('admin/productVariant')}}/{{5}}"><i class="bi bi-circle"></i>Cut</a></li>
                          <li><a href="{{url('admin/productVariant')}}/{{6}}"><i class="bi bi-circle"></i>Certification</a></li>
                      </ul>
            		</li>
               </ul>
            </li>
            
           
          
           <li class="menu-label">Blogs</li>
            <li>
                <a href="{{url('admin/blog')}}">
                    <div class="parent-icon"><i class="bi bi-person-lines-fill"></i>
                    </div>
                    <div class="menu-title">Blog</div>
                </a>
            </li>
          
           <!-- <li class="menu-label">Our Brands</li>
            <li>
                <a href="{{url('admin/brand')}}">
                    <div class="parent-icon"><i class="bi bi-person-lines-fill"></i>
                    </div>
                    <div class="menu-title">Brand</div>
                </a>
            </li>-->
          
            <li>
                <a href="#" target="_blank">
                    <div class="parent-icon"><i class="bi bi-telephone-fill"></i>
                    </div>
                    <div class="menu-title">Support</div>
                </a>
            </li>
           @else
          
          	<li class="menu-label">Product Info</li> 
              <li>
                <a href="{{url('vendor/category')}}">
                    <div class="parent-icon"><i class="bi bi-plus-circle"></i>
                    </div>
                    <div class="menu-title">Categories</div>
                </a>

            </li>   
            <li>
                <a href="{{url('vendor/productPurity')}}">
                    <div class="parent-icon"><i class="bi bi-plus-circle"></i>
                    </div>
                    <div class="menu-title">Product Purity(Price)</div>
                </a>

            </li>         
            <li>
                <a href="{{url('vendor/product')}}">
                    <div class="parent-icon"><i class="bi bi-plus-circle"></i>
                    </div>
                    <div class="menu-title">Product List</div>
                </a>
            </li>
          
           <li class="menu-label">Order Info</li>
            <li>
                <a href="{{url('vendor/order')}}">
                    <div class="parent-icon"><i class="bi bi-plus-circle"></i>
                    </div>
                    <div class="menu-title">Order</div>
                </a>
            </li>
          
            <li>
                <a href="{{url('vendor/orderCommission')}}">
                    <div class="parent-icon"><i class="bi bi-plus-circle"></i>
                    </div>
                    <div class="menu-title">Order Wise Commission</div>
                </a>
            </li>
          
          
           <li class="menu-label">Setting</li>
           <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="bi bi-plus-circle"></i>
                    </div>
                    <div class="menu-title">Setting</div>
                </a>  
                <ul>
                    <li><a href="{{url('vendor/EditStoreUser')}}/{{Admin::user()->id}}">
                   	 <i class="bi bi-circle"></i>Profile</a>
           			</li>
                </ul>            	           
                <ul>
                    <li><a href="{{url('vendor/EditStore')}}/{{$categoryRecord->store_user_id}}">
                   	 <i class="bi bi-circle"></i>Seller Profile</a>
           			</li>
                </ul>  
             	<ul>
                    <li><a href="{{url('vendor/commission')}}">
                   	 <i class="bi bi-circle"></i>Commission</a>
           			</li>
                </ul> 
                <ul>
                    <li><a href="{{url('vendor/return-policy')}}">
                    <i class="bi bi-person-lines-fill"></i>Return Policy</a>
           			</li>
                </ul>
              
          	 </li>
          @endif
          
        </ul>
        <!--end navigation-->
    </aside>
    <!--end sidebar -->