<nav class="navbar navbar-expand-lg navbar-light bg-light  sticky-top" style="height: 100px;" >
          <div class="container">
              <a class="navbar-brand" href="/">
                  <img src="{{ asset ('img/logoxshop-Photoroom.png-Photoroom.png') }}" alt="Logo" width="150" height="130">
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                  aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav">
                      <li class="nav-item">
                          <a class="nav-link" href="/">
                              <i class="fa-solid fa-house"></i>
                              Trang chủ
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="/product">
                              <i class="fa-solid fa-briefcase"></i>
                              Sản phẩm
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="/about">
                              <i class="fa-regular fa-paper-plane"></i>
                              Giới thiệu
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="/contact">
                              <i class="fa-solid fa-phone"></i>
                              Liên hệ
                          </a>
                      </li>
                  </ul>
                  <?php
                $cart = session()->get('cart', []);
                $totalQuantity = 0;
                foreach ($cart as $item) {
                    $totalQuantity += $item['quantity'];
                }
                ?>
             @auth
            <ul class="navbar-nav ms-auto me-2">
                <!-- Thanh dropdown cho người dùng đã đăng nhập -->
                <form class="d-flex me-3" role="search" action="{{ route('product.search') }}" method="GET">
                        <input class="form-control me-2" type="search" name="query" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-danger" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
                <li class="nav-item dropdown me-3">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}" class="rounded-circle" style="width: 30px; height: 30px; object-fit: cover;">
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/profile">Hồ sơ</a></li>
                        <hr>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">Đăng xuất</button>
                            </form>
                        </li>
                    </ul>
                </li>
                <!-- Thanh dropdown cho giỏ hàng của người dùng đã đăng nhập -->
                <li class="nav-item dropdown me-3">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fa-solid fa-cart-shopping fa-xl"></i>
                        <span class="position-absolute bottom-25 start-75 translate-middle badge rounded-pill bg-danger">
                        {{ $totalQuantity }}
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/cart">Cart</a></li>
                        <li><a class="dropdown-item" href="/history">Lịch sử mua hàng</a></li>
                    </ul>
                </li>
            </ul>
            @else
                  <ul class="navbar-nav ms-auto me-2">
                    <form class="d-flex me-3" role="search" action="{{ route('product.search') }}" method="GET">
                        <input class="form-control me-2" type="search" name="query" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-danger" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                    <li class="nav-item dropdown me-3">
                          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                              aria-expanded="false">
                              <i class="fa-solid fa-user fa-xl"></i>
                          </a>
                          <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="/login">Đăng nhập</a></li>
                              <li><a class="dropdown-item" href="/register">Đăng ký</a></li>
                              <!-- <hr>
                              <li><a class="dropdown-item" href="/forgot">Quên mật khẩu</a></li>
                              <li><a class="dropdown-item" href="/hoso">Hồ sơ</a></li> -->
                          </ul>
                    </li>
                      <li class="nav-item dropdown me-3">
                          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                              aria-expanded="false">
                              <i class="fa-solid fa-cart-shopping fa-xl"></i>
                              <span class="position-absolute bottom-25 start-75 translate-middle badge rounded-pill bg-danger">
                                {{ $totalQuantity }}
                                </span>
                          </a>
                          <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="/cart">Cart</a></li>
                          </ul>
                      </li>
                  </ul>
                @endauth
              </div>
          </div>
     </nav>
     