<?php
                     use App\Admin\Models\AdminModel;
                     $categoryRecord = AdminModel::where('id', Admin::user()->id)->first();
                     ?>
  <!--start top header-->
  <header class="top-header">
      <nav class="navbar navbar-expand gap-3">
          <div class="mobile-toggle-icon fs-3">
              <i class="bi bi-list"></i>
          </div>
          <form class="searchbar">
              <div class="position-absolute top-50 translate-middle-y search-icon ms-3"><i class="bi bi-search"></i></div>
              <input class="form-control" type="text" placeholder="Type here to search">
              <div class="position-absolute top-50 translate-middle-y search-close-icon"><i class="bi bi-x-lg"></i></div>
          </form>
          <div class="top-navbar-right ms-auto">
              <ul class="navbar-nav align-items-center">
                  <li class="nav-item search-toggle-icon">
                      <a class="nav-link" href="#">
                          <div class="">
                              <i class="bi bi-search"></i>
                          </div>
                      </a>
                  </li>
                  <li class="nav-item dropdown dropdown-user-setting">
                      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                          <div class="user-setting d-flex align-items-center">
                              <img src="{{asset('assets/images/avatars/avatar-1.png')}}" class="user-img" alt="">
                          </div>
                      </a>
                      <ul class="dropdown-menu dropdown-menu-end">
                          <li>
                              <a class="dropdown-item" href="#">
                                  <div class="d-flex align-items-center">
                                      <img src="{{asset('assets/images/avatars/avatar-1.png')}}" alt="" class="rounded-circle" width="54" height="54">
                                      <div class="ms-3">
                                          <h6 class="mb-0 dropdown-user-name">{{ Admin::user()->name }}</h6>
                                          <small class="mb-0 dropdown-user-designation text-secondary">{{ Admin::user()->name }}</small>
                                      </div>
                                  </div>
                              </a>
                          </li>
                          <li>
                              <hr class="dropdown-divider">
                          </li>
                          <li>
                              <a class="dropdown-item" href="{{url('vendor/EditStoreUser')}}/{{Admin::user()->id}}">
                                  <div class="d-flex align-items-center">
                                      <div class=""><i class="bi bi-person-fill"></i></div>
                                      <div class="ms-3"><span>Profile</span></div>
                                  </div>
                              </a>
                          </li>
                          <li>
                              <a class="dropdown-item" href="{{url('vendor/EditStore')}}/{{$categoryRecord->store_user_id}}">
                                  <div class="d-flex align-items-center">
                                      <div class=""><i class="bi bi-gear-fill"></i></div>
                                      <div class="ms-3"><span>{{trans('admin.setting')}}</span></div>
                                  </div>
                              </a>
                          </li>
                          
                          <li>
                              <hr class="dropdown-divider">
                          </li>
                          <li>
                              <a class="dropdown-item" href="{{ admin_url('auth/logout') }}">
                                  <div class="d-flex align-items-center">
                                      <div class=""><i class="bi bi-lock-fill"></i></div>
                                      <div class="ms-3"><span>{{ trans('admin.logout') }}</span></div>
                                  </div>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li class="nav-item dropdown dropdown-large">
                      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                          <div class="projects">
                              <i class="bi bi-grid-3x3-gap-fill"></i>
                          </div>
                      </a>
                    
                  </li>
              </ul>
          </div>
      </nav>
  </header>
  <!--end top header-->