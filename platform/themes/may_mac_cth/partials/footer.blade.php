  <!-- Footer -->
  <footer class="footer bg-primary text-white py-5">
      <div class="container">
          <div class="row gy-4">
              <!-- Logo + Giới thiệu -->
              <div class="col-12 col-md-6 col-lg-3">
                  <a href="index.html"><img src="{{ RvMedia::getImageUrl(theme_option('logo_footer')) }}" alt="Logo" class="footer-logo mb-3"></a>
                  <p class="footer-slogan">MAY MẶC CTH lắng nghe bạn!</p>
                  <p class="footer-desc">
                      Chúng tôi luôn trân trọng mọi ý kiến đóng góp của khách hàng,
                      không ngừng cải thiện để mang đến sản phẩm và dịch vụ tốt nhất.
                  </p>
                  <a href="{{url("contact")}}" class="btn btn-warning footer-btn">
                      ĐÓNG GÓP Ý KIẾN →
                  </a>
                  <p class="footer-tax mt-3"><strong>MÃ SỐ THUẾ:</strong> 0202167805</p>
              </div>

              <!-- Về chúng tôi -->
              <div class="col-12 col-md-6 col-lg-3 xs-flex">
                  <div class="mb-4 flex-col-1">
                      <p class="footer-title">VỀ CHÚNG TÔI</p>

                      {!! Menu::renderMenuLocation('footer-menu', ['view' => 'menus.sub-menu', 'options' => ['class' => 'footer-links']]) !!}
                  </div>
                  <div class="flex-col-1">
                      <p class="footer-title mb-3">THÔNG TIN LIÊN HỆ</p>

                      <div class="d-flex align-items-start mb-3">
                          <i class="bx bx-map text-warning me-2" style="font-size: 16px; min-width: 22px; margin-top: 3px;"></i>
                          <span id="footerAddress" style="font-size: 14px; color: #ffffffd9;">{{ theme_option('address') }}</span>
                      </div>

                      <div class="d-flex align-items-start mb-3">
                          <i class="bx bx-globe text-success me-2" style="font-size: 16px; min-width: 22px; margin-top: 3px;"></i>
                          <a href="{{ theme_option('website') }}" target="_blank" class="text-decoration-none" style="font-size: 14px; color: #ffffffd9;">
                              {{ theme_option('website') }}</a>
                      </div>

                      <div class="d-flex align-items-start mb-4">
                          <i class="bx bx-phone text-danger me-2" style="font-size: 16px; min-width: 22px; margin-top: 3px;"></i>
                          <span id="footerPhone" style="font-size: 14px; color: #ffffffd9;">{{ theme_option('hotline') }}</span>
                      </div>
                  </div>
              </div>

              <div class="col-12 col-lg-6">
                  <div class="row">
                      <div class="col-6">
                          <p class="footer-title">SẢN PHẨM</p>
                          {!! Menu::renderMenuLocation('categories-menu', ['view' => 'menus.sub-menu', 'options' => ['id' => 'footerProductsCategories', 'class' => 'footer-links']]) !!}
                      </div>

                      <div class="col-6">
                          <div class="mb-4">
                              <p class="footer-title">TIN TỨC</p>

                              {!! Menu::renderMenuLocation('links-menu', ['view' => 'menus.sub-menu', 'options' => ['id' => 'footerNewsCategories', 'class' => 'footer-links']]) !!}
                          </div>
                          <div class="mb-4 d-none d-sm-block">
                              <p class="footer-title">PHƯƠNG THỨC THANH TOÁN</p>
                              <div class="d-flex gap-2">
                                  <img src="assets/images/cash.png" height="28" style="margin-right: 10px;">
                                  <img src="assets/images/mastercard.png" height="28" style="margin-right: 10px;">
                                  <img src="assets/images/visa.png" height="28">
                              </div>
                          </div>
                      </div>
                  </div>
                <div class="mb-4 d-block d-sm-none">
                    <p class="footer-title">PHƯƠNG THỨC THANH TOÁN</p>
                    <div class="d-flex gap-2 justify-content-center">
                        <img src="assets/images/cash.png" height="28" style="margin-right: 10px;">
                        <img src="assets/images/mastercard.png" height="28" style="margin-right: 10px;">
                        <img src="assets/images/visa.png" height="28">
                    </div>
                </div>
                  <div class="footer-contact-btns mt-4">

                      <a href="https://zalo.me/0783159798" target="_blank" class="contact-btn">
                          <div class="icon-wrap">
                              <img src="assets/images/zalo.png" alt="Zalo">
                          </div>
                          <div class="text-wrap">
                              <span class="contact-label">TƯ VẤN QUA</span>
                              <span class="contact-value">0783159798</span>
                          </div>
                      </a>

                      <a href="tel:0783159798" class="contact-btn">
                          <div class="icon-wrap">
                              <img src="assets/images/hotline.png" alt="Hotline">
                          </div>
                          <div class="text-wrap">
                              <span class="contact-label">HOTLINE TƯ VẤN</span>
                              <span class="contact-value">0783159798</span>
                          </div>
                      </a>

                      <a href="#" class="contact-btn">
                          <div class="icon-wrap">
                              <img src="assets/images/hotline.png" alt="Xem mẫu">
                          </div>
                          <div class="text-wrap">
                              <span class="contact-label">XEM VẢI &amp; MẪU</span>
                              <span class="contact-value">0783159798</span>
                          </div>
                      </a>
                  </div>
              </div>
          </div>
      </div>
  </footer>

  <!-- <script src="asset/bootstrap/js/bootstrap.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ base }}/assets/js/script.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js" integrity="sha512-IsNh5E3eYy3tr/JiX2Yx4vsCujtkhwl7SLqgnwLNgf04Hrt9BT9SXlLlZlWx+OK4ndzAoALhsMNcCmkggjZB1w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" integrity="sha512-+EoPw+Fiwh6eSeRK7zwIKG2MA8i3rV/DGa3tdttQGgWyatG/SkncT53KHQaS5Jh9MNOT3dmFL0FjTY08And/Cw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Latest jQuery -->
  <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.css') }}">
  <script src="{{ asset('assets/js/jquery-ui.js') }}"></script>
  <!-- elevatezoom js -->
  <script src="{{ asset('assets/js/jquery.elevatezoom.js') }}"></script>

  <script src="{{ asset('assets/js/scripts.js') }}"></script>

  <!-- Cart -->
  <script type="text/javascript" src="{{ asset('themes/assets/js/product_cart.js') }}"></script>
  <div id="globalToast" class="global-toast">
        <i id="toastIcon" class='bx'></i>
        <span id="toastMessage">Thông báo</span>
    </div>
  <script>
      document.addEventListener('DOMContentLoaded', function() {
          const BASE_URL = '/MayMacCTH';
          const catalogMap = {
              'huong-dan-mua-hang': 1,
              'huong-dan-chon-size': 2,
              'chinh-sach-doi-tra': 3,
              'chinh-sach-giao-hang': 4,
              'faq': 5
          };

          const guideCardLinks = document.querySelectorAll('.guide-card-link');
          const guideContentArea = document.querySelector('.guide-content-area');
          const allGuideContents = document.querySelectorAll('.guide-content');
          const allTriggerCards = document.querySelectorAll('.guide-card');
          const allGuideImages = document.querySelectorAll('.guide-card .guide-image');
          let activeCardLink = null;

          allGuideContents.forEach(content => content.style.display = 'none');

          guideCardLinks.forEach(cardLink => {
              cardLink.addEventListener('click', function(e) {
                  e.preventDefault();
                  const targetIds = cardLink.getAttribute('data-target').split(',');
                  const isAlreadyActive = (activeCardLink === cardLink);
                  const isMobile = window.innerWidth < 768;

                  allGuideContents.forEach(c => c.style.display = 'none');
                  allTriggerCards.forEach(t => t.classList.remove('active-card'));
                  allGuideImages.forEach(img => img.src = img.src.replace('-active.png', '.png'));

                  if (isAlreadyActive) {
                      if (isMobile) {
                          const oldWrapper = cardLink.parentElement.querySelector('.guide-content-wrapper');
                          if (oldWrapper) oldWrapper.remove();
                      } else {
                          guideContentArea.style.display = 'none';
                      }
                      activeCardLink = null;
                      return;
                  }

                  activeCardLink = cardLink;
                  const clickedCard = cardLink.querySelector('.guide-card');
                  const img = clickedCard.querySelector('.guide-image');
                  img.src = img.src.replace('.png', '-active.png');
                  clickedCard.classList.add('active-card');

                  if (!isMobile) {
                      guideContentArea.style.display = 'flex';
                      targetIds.forEach(id => {
                          const el = document.getElementById(id);
                          if (el && el.querySelector('.card-title').textContent.trim()) {
                              el.style.display = 'block';
                          }
                      });
                      return;
                  }

                  const oldWrapper = cardLink.parentElement.querySelector('.guide-content-wrapper');
                  if (oldWrapper) oldWrapper.remove();

                  const wrapper = document.createElement('div');
                  wrapper.classList.add('guide-content-wrapper', 'mt-3');

                  targetIds.forEach(id => {
                      const content = document.getElementById(id);
                      if (content && content.querySelector('.card-title').textContent.trim()) {
                          const clone = content.cloneNode(true);
                          clone.style.display = 'block';
                          clone.classList.add('mb-3');
                          wrapper.appendChild(clone);
                      }
                  });

                  cardLink.parentElement.appendChild(wrapper);
              });
          });

          const langButtons = document.querySelectorAll(".choose-lang");
          const currentFlag = document.getElementById("currentFlag");
          const currentLang = document.getElementById("currentLang");

          langButtons.forEach(btn => {
              btn.addEventListener("click", function(e) {
                  e.preventDefault();
                  const lang = this.getAttribute("data-lang");
                  const flag = this.getAttribute("data-flag");

                  currentFlag.src = flag;
                  currentLang.textContent = lang;
              });
          });

          // Hiệu ứng fade-in/fade-out
          const fadeElements = document.querySelectorAll(".fade-element");

          const observer = new IntersectionObserver((entries) => {
              entries.forEach(entry => {
                  if (entry.isIntersecting) {
                      entry.target.classList.add("visible");
                  } else {
                      entry.target.classList.remove("visible");
                  }
              });
          }, {
              threshold: 0.4
          });

          fadeElements.forEach(el => observer.observe(el));
      });

      document.addEventListener('DOMContentLoaded', async () => {
          const bannerContainer = document.getElementById("bannerContainer");
          const dotsContainer = document.getElementById("bannerDots");
          let banners = [];
          let dots = [];
          let currentBanner = 0;
          let interval;

          //   async function loadBanners() {
          //       try {
          //           const res = await fetch('../../../api/banner/get_banner.php');
          //           const data = await res.json();
          //           if (!data.success || !data.data.length) return;

          //           bannerContainer.querySelectorAll(".banner-image").forEach(img => img.remove());
          //           dotsContainer.innerHTML = '';

          //           let activeIndex = 0;
          //           data.data.forEach(banner => {
          //               if (banner.is_active != 1) return;

          //               const img = document.createElement('img');
          //               img.src = `../../assets/images/upload/${banner.image}`;
          //               img.alt = banner.title;
          //               img.className = 'banner-image';
          //               if (activeIndex === 0) img.classList.add('active');
          //               bannerContainer.appendChild(img);

          //               // tạo dot
          //               const dot = document.createElement('span');
          //               dot.className = 'dot';
          //               dot.dataset.index = activeIndex;
          //               if (activeIndex === 0) dot.classList.add('active');
          //               dotsContainer.appendChild(dot);

          //               dot.addEventListener('click', (e) => {
          //                   const idx = parseInt(e.target.dataset.index);
          //                   showBanner(idx);
          //                   resetInterval();
          //               });

          //               activeIndex++;
          //           });

          //           banners = bannerContainer.querySelectorAll(".banner-image");
          //           dots = dotsContainer.querySelectorAll(".dot");

          //           if (banners.length > 1) {
          //               interval = setInterval(nextBanner, 4000);
          //           }
          //       } catch (err) {
          //           console.error('Lỗi load banner:', err);
          //       }
          //   }

          function showBanner(index) {
              if (!banners.length) return;
              banners[currentBanner].classList.remove("active");
              dots[currentBanner].classList.remove("active");

              currentBanner = index;
              banners[currentBanner].classList.add("active");
              dots[currentBanner].classList.add("active");
          }

          function nextBanner() {
              showBanner((currentBanner + 1) % banners.length);
          }

          function resetInterval() {
              clearInterval(interval);
              interval = setInterval(nextBanner, 4000);
          }

          //   await loadBanners();

          //load products
          //   const productList = document.getElementById('homeProductList');

          //   async function loadHomeProducts() {
          //       try {
          //           const res = await fetch('../../../api/product/get_product.php');

          //           if (!res.ok) {
          //               throw new Error(`HTTP ${res.status}`);
          //           }

          //           const result = await res.json();

          //           productList.innerHTML = '';

          //           if (!result.success || !result.data || result.data.length === 0) {
          //               productList.innerHTML = `<div class="col-12 text-center py-5"><p class="text-muted fs-5">Chưa có sản phẩm nào</p></div>`;
          //               return;
          //           }

          //           const activeProducts = result.data.filter(p => p.is_active == 1);

          //           if (activeProducts.length === 0) {
          //               productList.innerHTML = `<div class="col-12 text-center py-5"><p class="text-muted fs-5">Chưa có sản phẩm nào được hiển thị</p></div>`;
          //               return;
          //           }

          //           activeProducts.slice(0, 10).forEach(product => {
          //               const price = (parseInt(product.price) || 0).toLocaleString('vi-VN');
          //               const imageUrl = product.primary_image ?
          //                   `../../assets/images/upload/${product.primary_image}` :
          //                   `../../assets/images/no-image.jpg`;

          //               const col = document.createElement('div');
          //               col.className = 'col';

          //               col.innerHTML = `
        //                     <div class="card h-100 product-card border-0 shadow-sm overflow-hidden">
        //                         <a href="../../../public/views/client/product-detail.html?id=${product.product_id}" class="text-decoration-none text-dark">
        //                             <div class="product-image-container position-relative">
        //                                 <img src="${imageUrl}"
        //                                     class="card-img-top"
        //                                     alt="${product.name}"
        //                                     style="object-fit: cover;"
        //                                     onerror="this.src='../../../MayMacCTH/public/assets/images/no-image.jpg'">
        //                             </div>
        //                         </a>
        //                         <div class="card-body text-center p-2">
        //                             <p class="card-text mb-2 text-truncate fw-medium" title="${product.name}">
        //                                 ${product.name}
        //                             </p>
        //                             <!--
        //                             <p class="product-price text-danger fw-bold fs-5 mb-0">
        //                                 ${price}<span class="currency-symbol">đ</span>
        //                             </p>
        //                             -->
        //                             <div class="price fw-bold fs-5 mb-2" style="color: #174DAF;">${price}đ</div>
        //                         </div>
        //                     </div>
        //                 `;

          //               productList.appendChild(col);
          //           });

          //       } catch (err) {
          //           console.error('Lỗi tải sản phẩm:', err);
          //           productList.innerHTML = `
        //                 <div class="col-12 text-center py-5 text-danger">
        //                     <i class="bi bi-exclamation-triangle"></i><br>
        //                     Không thể tải sản phẩm. Vui lòng thử lại!
        //                 </div>
        //             `;
          //       }
          //   }
          //   loadHomeProducts();


          const searchWrap = document.querySelector('.search-dropdown-wrap');
          const searchTrigger = document.querySelector('.search-trigger');
          const searchList = document.getElementById('searchCategoryUl');

          if (searchWrap && searchTrigger && searchList) {
              searchTrigger.addEventListener('click', (e) => {
                  e.stopPropagation();
                  searchList.classList.toggle('show');
              });

              document.addEventListener('click', (e) => {
                  if (!searchWrap.contains(e.target)) {
                      searchList.classList.remove('show');
                  }
              });
          }
          const btnSearch = document.getElementById('btnSearch');
        //   const searchInput = document.getElementById('searchInput');

        //   const performSearch = () => {
        //       const keyword = searchInput.value.trim();
        //       const categoryId = document.getElementById('categorySelectValue').value;

        //       let url = 'products.html';
        //       const params = new URLSearchParams();

        //       if (keyword) params.append('q', keyword);
        //       if (categoryId) params.append('category', categoryId);

        //       if (params.toString()) url += '?' + params.toString();
        //       window.location.href = url;
        //   };

        //   if (btnSearch) btnSearch.addEventListener('click', performSearch);
        //   if (searchInput) searchInput.addEventListener('keypress', e => {
        //       if (e.key === 'Enter') performSearch();
        //   });
          updateCartCount();
      });

      function selectSearchCategory(id, name) {
          document.getElementById('categoryDisplayText').innerText = name;
          document.getElementById('categorySelectValue').value = id;

          const searchList = document.getElementById('searchCategoryUl');
          if (searchList) searchList.classList.remove('show');
      }

      function updateCartCount() {
          const cart = JSON.parse(localStorage.getItem('cart') || '[]');
          const totalItems = cart.length;

          const el = document.getElementById('cartCount');
          if (el) {
              el.textContent = totalItems;
              el.style.display = totalItems > 0 ? 'block' : 'none';
          }
      }

    //   document.addEventListener('DOMContentLoaded', async () => {
    //       const addressEl = document.getElementById('footerAddress');
    //       const websiteEl = document.getElementById('footerWebsite');
    //       const phoneEl = document.getElementById('footerPhone');

    //       if (!addressEl && !websiteEl && !phoneEl) return;

    //       try {
    //           const res = await fetch(`https://demo9.sibic.vn/api/contact/get_contact.php?t=${Date.now()}`);
    //           const data = await res.json();

    //           if (data.success && data.data && data.data.length > 0) {
    //               const c = data.data[0];

    //               if (addressEl) {
    //                   addressEl.textContent = c.address || 'Chưa cập nhật địa chỉ';
    //               }

    //               if (websiteEl) {
    //                   if (c.website && c.website.trim()) {
    //                       const url = c.website.match(/^https?:\/\//i) ? c.website : '../../../../https@/' + c.website;
    //                       websiteEl.outerHTML = `<a href="${url}" target="_blank" class="text-white text-decoration-none">${c.website}</a>`;
    //                   } else {
    //                       websiteEl.textContent = 'Chưa có website';
    //                   }
    //               }

    //               if (phoneEl) {
    //                   phoneEl.textContent = c.phone_number || 'Chưa cập nhật số điện thoại';
    //               }
    //           }
    //       } catch (err) {
    //           console.error('Lỗi load footer contact:', err);
    //       }
    //   });

      function getExcerpt(contentJson, maxLength = 130) {
          try {
              const blocks = JSON.parse(contentJson).blocks;
              let text = '';
              for (const block of blocks) {
                  if ((block.type === 'paragraph' || block.type === 'header') && block.data.text) {
                      text += block.data.text.replace(/<[^>]*>/g, '') + ' ';
                      if (text.length >= maxLength) break;
                  }
              }
              return text.trim().substring(0, maxLength) + (text.length > maxLength ? '...' : '');
          } catch {
              return 'Xem chi tiết để biết thêm...';
          }
      }
  </script>
  </body>

  </html>
